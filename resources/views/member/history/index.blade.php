@extends('member.layout.index')

@section('content')
<div class="pb-3"></div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>History</h3>
            <div class="list-group">
                <a href="{{ URL('member/history/check_in') }}" class="list-group-item">Check-in</a>
                <a href="{{ URL('member/history/session_with_pt') }}" class="list-group-item">Session with Personal Trainer</a>
            </div>
        </div>
    </div>
</div>
<div class="pb-3"></div>
@stop