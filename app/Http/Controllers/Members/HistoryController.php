<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class HistoryController extends Controller {

    public function check_in() {
        $data['title'] = 'Superstar Fitness | Dashboard';
        // $automatic_checkout = DB::table('member_checkin')
        // ->whereNull('tanggal_checkout')
        // ->where(DB::raw('tanggal_checkin - interval 60 minute'), '>=', date('Y-m-d H:i:s'))
        // ->get();
        // for($i=0; $i<count($automatic_checkout); $i++) {
        // }
        // dd($automatic_checkout);
        return view('member.history.checkin', ['data' => $data]);
    }

    public function check_in_json() {
        $data = DB::table('member_checkin')
                ->select(
                        'branch.name',
                        'tipe_member.nama',
                        'member_checkin.tanggal_checkin',
                        'member_checkin.tanggal_checkout',
                        'member_checkin.id',
                )
                ->leftjoin('branch', 'branch.id', 'member_checkin.id_branch')
                ->leftjoin('tipe_member', 'tipe_member.id', 'member_checkin.id_tipe_member')
                ->where('id_member', Auth::user()->id)
                ->get();
        for ($i = 0; $i < count($data); $i++) {
            if (!$data[$i]->tanggal_checkout) {
                $data[$i]->tanggal_checkout = '<a href="' . url('member/history/check-out-gym') . '/' . $data[$i]->id . '" onclick="return confirm(`Checkout GYM ?`)" class="btn btn-sm btn-round btn-info">Check-out</a>';
            }
        }
        return $data;
    }

    public function session_with_pt() {
        $data['title'] = 'Superstar Fitness | Dashboard';
        return view('member.history.session-with-pt', ['data' => $data]);
    }

    public function session_with_pt_json() {
        $data = DB::table('member_checkin_session')
                ->select(
                        'personal_trainer.nama AS pt_name',
                        'tipe_member.nama AS member_type',
                        'member_checkin_session.tanggal_checkin',
                        'member_checkin_session.tanggal_checkout',
                        'member_checkin_session.id',
                )
                ->leftjoin('personal_trainer', 'personal_trainer.id', 'member_checkin_session.id_pt')
                ->leftjoin('tipe_member', 'tipe_member.id', 'member_checkin_session.id_tipe_member')
                ->where('id_member', Auth::user()->id)
                ->get();
        for ($i = 0; $i < count($data); $i++) {
            if (!$data[$i]->tanggal_checkout) {
                $data[$i]->tanggal_checkout = '<a href="' . url('member/history/check-out-pt') . '/' . $data[$i]->id . '" onclick="return confirm(`End this session ?`)" class="btn btn-sm btn-round btn-info">Check-out</a>';
            }
        }
        return $data;
    }

    public function checkout_gym($id) {
        DB::table('member_checkin')->where('id', $id)->update([
            'tanggal_checkout' => date('Y-m-d H:i:s')
        ]);
        return view('member.history.checkin')->with('pesan', 'Checkout GYM success');
    }

    public function checkout_pt($id) {
        DB::table('member_checkin_session')->where('id', $id)->update([
            'tanggal_checkout' => date('Y-m-d H:i:s')
        ]);
        return view('member.history.session-with-pt')->with('pesan', 'End session success');
    }

}
