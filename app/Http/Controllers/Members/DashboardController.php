<?php

namespace App\Http\Controllers\Members;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
  public function index() {
    $data['title'] = 'Golden Six | Scan';
    return view('member.dashboard.index', ['data' => $data]);
  }
}
