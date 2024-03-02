@extends('member.layout.index')

@section('content')
<div class="pb-3"></div>
<div class="container">
  <div class="card card-bg-img bg-img bg-overlay mb-3" style="background-image: url('/assets/img/bg-img/3.jpg')">
    <div class="card-body direction-rtl p-5">
      <h2 class="text-white">Selamat Datang</h2>
      <p class="mb-4 text-white">{{ Auth::user()->nama }}.</p>
      <a class="btn btn-success" href="{{ url('member/scan') }}">Check-in</a>
    </div>
  </div>
</div>
<div class="pb-3"></div>
@stop