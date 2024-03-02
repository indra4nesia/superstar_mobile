@extends('member.layout.index')

@section('content')
<div class="order-success-wrapper">
  <div class="custom-container">
    <div class="order-done-content">
      <svg class="bi bi-check-circle-fill text-success mb-4" width="60" height="60" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
      </svg>
      <h5> Welcome! </h5>
      <p> You already checked-in, Enjoy our facility ! </p>
      <a class="btn btn-warning mt-3" href="{{ url('member/dashboard') }}">Dashboard</a>
    </div>
  </div>
</div>
@stop