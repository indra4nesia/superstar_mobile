<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class ScanController extends Controller {

    public function index() {
        $data['title'] = 'Superstar Fitness | Dashboard';
        return view('member.scan.index', ['data' => $data]);
    }

    # Member check-in (gym)
    public function checkInGym(Request $req) {
        DB::beginTransaction();
        try {
            $user_checkin = DB::table('member_checkin')
                    ->where('id_member', Auth::user()->id)
                    ->where('id_branch', $req->id_branch)
                    ->whereRaw("DATE_FORMAT(tanggal_checkin, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')")
                    ->first();
            if ($user_checkin) {
                return response()->json(['message' => 'Your already Checked-in'], 400);
            }
            $data = DB::table('member_checkin')->insert([
                'id_member' => Auth::user()->id,
                'id_tipe_member' => Auth::user()->tipe_member,
                'id_branch' => $req->id_branch,
                'tanggal_checkin' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            DB::commit();
            return response()->json(['message' => 'Check-in success'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => 'Check-in error'], 400);
        }
    }

    # Member check-in (session personal trainer)
    public function checkinSessionPT(Request $req) {
        DB::beginTransaction();
        try {
            $user_invoice = DB::table('invoice')
                    ->where('status', 1)
                    ->where('member_id', Auth::user()->id)
                    ->first();

            if (!$user_invoice) {
                # tidak ada invoice
                return response()->json(['message' => 'Your doesnt have an active invoice yet!'], 400);
            }
            $get_session = DB::table('member_pt')
                    ->select('sisa AS sisa_sesi')
                    ->where('member_id', Auth::user()->id)
                    ->where('pt_id', $req->id_pt)
                    ->first();

            if (!$get_session || $get_session->sisa_sesi <= 0) {
                return response()->json(['message' => 'Your session has 0 left!'], 400);
            }

            # max 3
            $user_checkin = DB::table('member_checkin_session')
                    ->where('id_member', Auth::user()->id)
                    ->where('id_pt', $req->id_pt)
                    ->whereRaw("DATE_FORMAT(tanggal_checkin, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')")
                    ->get();

            if (count($user_checkin) >= 3) {
                return response()->json(['message' => 'Max 3 session in a day'], 400);
            }

            for ($i = 0; $i < count($user_checkin); $i++) {
                # jika belum checkout
                if (!$user_checkin[$i]->tanggal_checkout) {
                    return response()->json(['message' => 'You have active session, please checkout before checkin again'], 400);
                }
            }

            $user_use_session = DB::table('member_checkin_session')->insert([
                'id_pt' => $req->id_pt,
                'id_member' => Auth::user()->id,
                'id_tipe_member' => Auth::user()->tipe_member,
                'tanggal_checkin' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $user_update_session = DB::table('member_pt')
                    ->where('member_id', Auth::user()->id)
                    ->where('pt_id', $req->id_pt)
                    ->update([
                'sisa' => DB::raw('sisa - 1')
            ]);

            DB::commit();
            return response()->json(['message' => 'Check-in success'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e], 400);
        }
    }

    # Member check-in with personal trainer => for session class
    public function signinSuccess() {
        $data['title'] = 'Superstar Fitness | Sign-in Success';
        return view('member.scan.scanned_page_success', ['data' => $data]);
    }

    # Just return view
    public function signinError() {
        $data['title'] = 'Superstar Fitness | Sign-in Error';
        return view('member.scan.scanned_page_error', ['data' => $data]);
    }

}
