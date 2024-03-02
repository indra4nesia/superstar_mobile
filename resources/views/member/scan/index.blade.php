@extends('member.layout.index')

@section('content')

<div class="mb-1" style="color:transparent">.</div>
<div class="container">
    <div class="card text-center">
        <div id="qr-reader" style="width: 100%; height: 110%; margin: auto"></div>
    </div>
</div>
<div class="pb-3"></div>

<script src="{{ url('assets/js/scan/html5-qrcode.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
                || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        
        let config = {
            fps: 10,
            qrbox: {width: 300, height: 400},
            video: {
                facingMode: {
                    exact: "environment"
                }
            }
        };

        let html5QrcodeScanner = new Html5QrcodeScanner(
          "qr-reader", config, /* verbose= */ true);
        html5QrcodeScanner.render(onScanSuccess);
        
        
        
        function pesanToast(icon, title) {
            Swal.fire({
                icon: icon, title: title,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        }
        
        function onScanSuccess(decodedText, decodedResult) {
            let data_scan = JSON.parse(decodedText);    
            let token = '{{ csrf_token() }}';
            //console.log(data_scan);

            // # Check-in member
            if (data_scan.action == 'member_checkin_gym') {
                //html5QrcodeScanner.pause();
                Swal.fire({
                    title: 'Start checkin ?', text: "You will check in in this Club ?",
                    confirmButtonText: 'Yes, Check-in!',
                    icon: 'info', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function (res) {
                            if (xhr.readyState === 4) {
                                console.log(res);
                                if (xhr.status == 200) {
                                    window.location.replace("{{ url('member/scan/signin_success') }}");
                                } else if (xhr.status >= 400) {
                                    pesanToast('error', JSON.parse(this.response).message);
                                    setTimeout(function () {
                                        html5QrcodeScanner.resume();
                                    }, 2000);
                                    // window.location.replace("{{ url('member/scan/signin_error') }}")
                                }
                            }
                        };
                        let data = JSON.stringify({
                            id_branch: data_scan.id_branch,
                        });
                        xhr.open("POST", "scan/checkingym", true);
                        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.send(data);
                    } 
                })
                
            }

            // # Check-in session personal trainer (member)
            if (data_scan.action == 'member_checkin_sessionpt') {
                //html5QrcodeScanner.pause();
                Swal.fire({
                    title: 'Start session ?', text: "You will use 1 session with Personal Trainer ?",
                    confirmButtonText: 'Yes, Check-in!',
                    icon: 'info', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let xhr = new XMLHttpRequest();
                        let data = JSON.stringify({
                            id_pt: data_scan.id_pt,
                            member_tipe: "{{ Auth::user()->tipe_member }}"
                        });
                        xhr.onreadystatechange = function (res) {
                            if (xhr.readyState === 4) {
                                if (xhr.status == 200) {
                                    window.location.replace("{{ url('member/scan/signin_success') }}")
                                } else if (xhr.status >= 400) {
                                    pesanToast('error', JSON.parse(this.response).message);
                                    setTimeout(function () {
                                        html5QrcodeScanner.resume();
                                    }, 2000);
                                    // window.location.replace("{{ url('member/scan/signin_error') }}")
                                }
                            }
                        };
                        xhr.open("POST", "scan/checkinsessionpt", true);
                        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.send(data);
                    } 
                })
            }
            
            html5QrcodeScanner.clear();

        }

    });
</script>
@stop