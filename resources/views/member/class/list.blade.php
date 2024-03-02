@extends('member.layout.index')

@section('content')
<div class="pb-3"></div>
<div class="container">
    <div class="card">
        <div class="card-body">
            @if(!empty($pesan))
            <div class="alert alert-success"> {{ $pesan }}</div>
            @endif
            <h6 class="mb-3 text-center">Class</h6>
            <table class="w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Trainer</th>
                        <th>Studio</th>
                        <th>Slot</th>
                        <th>Start</th>
                        <th>End</th>
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
            url: "{{ url('member/class/list') }}",
            content: {
                type: "json",
                headings: true
            }
        }
    });

    // Remove demo loader
    table.on("datatable.ajax.loaded", function () {
        // IE9
        this.wrapper.className = this.wrapper.className.replace(" dataTable-loading", "");
    });
</script>
@stop