<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller {

    public function list() {
        $data['title'] = 'Superstar Fitness | Dashboard';
        return view('member.class.list', ['data' => $data]);
    }

    public function list_json() {

        $data = DB::select('
      SELECT
        class.nama AS class_name,
        trainer.nama AS trainer_name,
        studio.nama AS studio_name,
        studio.slot AS studio_slot,
        class_schedule.start AS start,
        class_schedule.end AS end
      FROM class
      LEFT JOIN class_schedule ON class_schedule.class_id = class.id
      LEFT JOIN trainer ON trainer.id = class_schedule.trainer_id
      LEFT JOIN studio ON studio.id = class_schedule.studio_id
      WHERE class.status = 1
      AND class_schedule.status = 1
      AND class_schedule.start <= ADDDATE(NOW(),+7)
      AND NOT class_schedule.end >= ADDDATE(NOW(),+7)
      ORDER BY class.id DESC
    ');

        for ($i = 0; $i < count($data); $i++) {
            if (!$data[$i]->tanggal_checkout) {
                $data[$i]->tanggal_checkout = '<a href="' . url('member/history/check-out-gym') . '/' . $data[$i]->id . '" onclick="return confirm(`Checkout GYM ?`)" class="btn btn-sm btn-round btn-info">Check-out</a>';
            }
        }
        return $data;
    }

    public function joinClas($idClass, $idStudio) {
        # check slot
        $studio_slot = DB::table('studio')->select('slot')->where('id', $idStudio)->first();
        $member_joined_class = DB::table('class_product')
                ->select('count(class_product.*) AS total_joined')
                ->leftjoin('class_schedule', 'class_schedule.id', 'class_product.class_schedule_id')
                ->where('class_schedule.class_id', $idClass)
                ->first();
        $slot_available = $studio_slot->slot - $member_joined_class->total_joined;
        if ($slot_available <= 0) {
            return view('member.class.list')->with('pesan', 'Class slot full');
        }
        # check if already joined slot
        $check_joined_slot = DB::table('class_product')
                ->leftjoin('class_schedule', 'class_schedule.id', 'class_product.class_schedule_id')
                ->where('class_schedule.class_id', $idClass)
                ->where('class_product.member_id', Auth::user('id'))
                ->where('class_schedule.status', 1)
                ->get();
        if (count($check_joined_slot) >= 1) {
            return view('member.class.list')->with('pesan', 'You already joined class');
        }

        #insert
        $join_slot = DB::table('class_product')->insert([
            'member_id' => Auth::user()->id
        ]);
        if ($join_slot) {
            return view('member.class.list')->with('pesan', 'Success joined class');
        }
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
