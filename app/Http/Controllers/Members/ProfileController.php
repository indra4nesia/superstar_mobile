<?php

namespace App\Http\Controllers\Members;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class ProfileController extends Controller {
  

  public function index(Request $req) {

    if ($req->isMethod('get')) {
      $data = DB::table('members')->select(
        'members.*',
        'tipe_member.nama AS tipe_members'
      )
      ->leftjoin('tipe_member', 'tipe_member.id', 'members.tipe_member')
      ->where('members.id', Auth::user()->id)
      ->first();
      $data = (array)$data;
      $data['title'] = 'Golden Six | Profile';
      return view('member.profile.index', ['data' => $data]);
    }

    $validator = Validator::make($req->all(), [
      'nama' => 'required|max:255',
      'whatsapp' => 'required',
      'telphone_darurat' => 'required'
    ]);

    if ($validator->fails()) {
      return redirect('profile')->withErrors($validator)->withInput();
    }

    DB::table('members')->where('id', Auth::user()->id)->update([
      'nama' => $req->nama,
      'whatsapp' => $req->whatsapp,
      'telphone_darurat' => $req->telphone_darurat,
      'alamat' => $req->alamat,
    ]);

    return redirect('member/profile')
    ->withInput()
    ->with(['pesan' => 'Profile saved', 'variant' => 'success']);

  }

}
