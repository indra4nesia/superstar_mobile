@extends('member.layout.index')

@section('content')
<div class="pb-3"></div>
<div class="container">
  <div class="card">
    <div class="card-body">
      @if(!empty($pesan))
      <div class="alert alert-success"> {{ $pesan }}</div>
      @endif
      <h6 class="mb-3 text-center">Check-in History</h6>
      <table class="w-100" id="dataTable">
        <thead>
          <tr>
            <th>GYM Branch</th>
            <th>Member Package</th>
            <th>Check-in</th>
            <th>Check-out</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<div class="pb-3"></div>

<script>
  var table = new DataTable("#dataTable", {
    ajax: {
      url: "{{ url('member/history/check_in_json') }}",
      content: {
        type: "json",
        headings: true
      }
    }
  });

  // Remove demo loader
  table.on("datatable.ajax.loaded", function() {
    // IE9
    this.wrapper.className = this.wrapper.className.replace(" dataTable-loading", "");
  });
</script>
@stop