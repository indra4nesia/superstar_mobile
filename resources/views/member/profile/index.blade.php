@extends('member.layout.index')

@section('content')
<div class="page-content-wrapper py-3">
  <div class="container">

    @if(session('pesan'))
    <div class="bg-white alert custom-alert-1 alert-{{ session('variant') }} alert-dismissible fade show" role="alert">
      @if( session('variant')=='success' )
      <i class="bi bi-check-circle"></i>
      @endif
      {{ session('pesan') }}
      <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <div class="bg-white alert custom-alert-1 alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-x-circle"></i>
      {{ $error }}
      <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
    @endif

    <!-- User Information-->
    <div class="card user-info-card mb-3">
      <div class="card-body d-flex align-items-center">
        <div class="user-profile me-3"><img src="{{ url('assets/img/bg-img/2.jpg') }}" alt=""><i class="bi bi-pencil"></i>
          <form action="#">
            <input class="form-control" type="file">
          </form>
        </div>
        <div class="user-info">
          <div class="d-flex align-items-center">
            <h5 class="mb-1">{{ $data['nama'] }}</h5>
          </div>
          <p class="mb-0">{{ $data['tipe_members'] }}</p>
        </div>
      </div>
    </div>



    <!-- User Meta Data-->
    <div class="card user-data-card">

      <!-- start::wrapper-tab -->
      <div class="standard-tab">
        <ul class="nav rounded-lg mb-2 p-2 shadow-sm" id="affanTabs1" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="btn active" id="bootstrap-tab" data-bs-toggle="tab" data-bs-target="#bootstrap" type="button" role="tab" aria-controls="bootstrap" aria-selected="true">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="btn" id="pwa-tab" data-bs-toggle="tab" data-bs-target="#pwa" type="button" role="tab" aria-controls="pwa" aria-selected="false">Barcode</button>
          </li>
        </ul>

        <div class="tab-content rounded-lg p-3 shadow-sm" id="affanTabs1Content">
          <!-- start::tab 1 -->
          <div class="tab-pane fade show active" id="bootstrap" role="tabpanel" aria-labelledby="bootstrap-tab">
            <form action="{{ url('member/profile') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group mb-3">
                <label class="form-label" for="fullname">Full Name</label>
                <input class="form-control" id="fullname" name="nama" type="text" value="{{ $data['nama'] }}" placeholder="Full Name">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="job">Member Type</label>
                <input class="form-control" id="job" type="text" value="{{ $data['tipe_members'] }}" placeholder="Member Type" readonly>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" id="email" type="text" value="{{ $data['email'] }}" placeholder="Email Address" readonly>
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="whatsapp">Whatsapp</label>
                <input class="form-control" id="whatsapp" name="whatsapp" type="text" value="{{ $data['whatsapp'] }}" placeholder="Whatsapp">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="portfolio">Emergency Phone</label>
                <input class="form-control" id="portfolio" name="telphone_darurat" type="text" value="{{ $data['telphone_darurat'] }}" placeholder="Emergency Phone">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="bio">Address</label>
                <textarea class="form-control" id="address" name="alamat" cols="30" rows="10" placeholder="Address.">{{ $data['alamat'] }}</textarea>
              </div>
              <button class="btn btn-primary w-100" type="submit">
                <i class="fas fa-save"></i>
                Save
              </button>
            </form>
          </div>
          <!-- end::tab 1 -->
          <!-- start::tab 1 -->
          <div class="tab-pane fade" id="pwa" role="tabpanel" aria-labelledby="pwa-tab">
            <h6 class="text-center mt-1 mb-2">My Barcode</h6>
            <div class="visible-print text-center">
              <p class="mt-2">Scan me for all transaction.</p>
            </div>
          </div>
          <!-- end::tab 1 -->
        </div>
      </div>
      <!-- end::wrapper-tab -->

    </div>
  </div>
</div>
@stop