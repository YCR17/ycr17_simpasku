<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>Sistem Manajemen Pasien by Yasir</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Yasir" />
    <meta name="author" content="" />
    <meta name="keywords" content="Yasir" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo.png') }}" />

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logos/logo.png') }}" alt="loader" class="lds-ripple img-fluid'" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logos/logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @yield('wrapper')
    </div>

    <div id="modalContainers">
        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalSuccess" tabindex="-1" aria-labelledby="vertical-center-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content modal-filled bg-success-subtle text-success">
                    <div class="modal-body p-4">
                        <div class="text-center text-success">
                            <i class="ti ti-circle-check fs-7"></i>
                            <h4 class="mt-2" id="modaltitle">Well Done!</h4>
                            <p class="mt-3 text-success-50" id="modalmessage">
                                Task successfully.
                            </p>
                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="vertical-center-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-info-subtle">
                    <div class="modal-body p-4">
                        <div class="text-center text-info">
                            <i class="ti ti-info-circle fs-7"></i>
                            <h4 class="mt-2" id="modaltitle">Heads up!</h4>
                            <p class="mt-3" id="modalmessage">
                                Info
                            </p>
                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalWarning" tabindex="-1" aria-labelledby="vertical-center-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-warning-subtle">
                    <div class="modal-body p-4">
                        <div class="text-center text-warning">
                            <i class="ti ti-alert-octagon fs-7"></i>
                            <h4 class="mt-2" id="modaltitle">Warning</h4>
                            <p class="mt-3" id="modalmessage">
                                Unknown message
                            </p>
                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalDanger" tabindex="-1" aria-labelledby="vertical-center-modal"
            aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content modal-filled bg-danger-subtle">
                    <div class="modal-body p-4">
                        <div class="text-center text-danger">
                            <i class="ti ti-hexagon-letter-x fs-7"></i>
                            <h4 class="mt-2" id="modaltitle">Oh snap!</h4>
                            <p class="mt-3" id="modalmessage">
                                An unknown error has occurred.
                            </p>
                            <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="vertical-center-modal" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content modal-filled bg-info-subtle">
                    <div class="modal-body p-4">
                        <div class="text-center text-info">
                            <div class="text-center">
                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                            </div>
                            {{-- <i class="ti ti-info-circle fs-7"></i> --}}
                            <h4 class="mt-2" id="modaltitle">Loading...</h4>
                            <p class="mt-3" id="modalmessage">
                                Mohon tunggu sebentar, Kami sedang menjalankan request Anda...
                            </p>
                            {{-- <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal">
              Continue
            </button> --}}
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="modalLoading1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center d-none">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Static backdrop Modal
                        </h4>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body py-5">
                        <div class="text-center">
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                        <div class="text-center">

                            <strong>Loading, mohon tunggu sebentar...</strong>
                        </div>
                    </div>
                    <div class="modal-footer d-none">
                        <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        
    <!-- Vertically centered modal -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content modal-filled bg-danger-subtle">
                <div class="modal-body p-4">
                    <div class="text-center text-danger">
                        <i class="ti ti-hexagon-letter-x fs-7"></i>
                        <h4 class="mt-2" id="modaltitle">Konfirmasi Logout</h4>
                        <p class="mt-3" id="modalmessage">
                            Anda yakin ingin keluar dari sistem ?
                        </p>

                        <a href="{{ url('auth/logout') }}" class="btn btn-danger my-2" data-pasien-id="">
                            Ya, Keluar
                        </a>
                        <button type="button" class="btn btn-light ms-3 my-2" data-bs-dismiss="modal">
                            Batalkan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    </div>

    </div>


    <!--  Import Js Files -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!--  current page js files -->


    <script src="{{ url('assets/js/plugins/toastr.min.js') }}"></script>
    <script src="{{ url('assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>

    <script>
        toastr.options = {
            "newestOnTop": true,
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true,
            "timeOut": 0,
        };

        @if (session()->has('flash_message'))
            @foreach (session('flash_message') as $message)
                toastr.{{ $message['type'] }}('{{ $message['message'] }}', '{{ $message['title'] }}');
            @endforeach
        @endif

        // @error('username')
        //     toastr.warning('{{ $message }}', 'Input Error')
        // @enderror
        // @error('password')
        //     toastr.warning('{{ $message }}', 'Input Error')
        // @enderror
        // @error('email')
        //     toastr.warning('{{ $message }}', 'Input Error')
        // @enderror

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning('{{ $error }}', 'Input Error')
            @endforeach
        @endif
    </script>
    <script>
        function showModal(type = 'info', title, message, onhidden = null) {
            let modal, mtitle, mmessage;
            switch (type) {
                case 'success':
                    modal = $('#modalSuccess');
                    break;
                case 'info':
                    modal = $('#modalInfo');
                    break;
                case 'warning':
                    modal = $('#modalWarning');
                    break;
                case 'danger':
                    modal = $('#modalDanger');
                    break;

                default:
                    modal = $('#modalInfo');
                    break;
            }
            mtitle = modal.find('#modaltitle');
            mmessage = modal.find('#modalmessage');
            mtitle.html(title ?? 'null');
            mmessage.html(message ?? 'null');

            if (typeof onhidden === "function") {
                modal.off('hidden.bs.modal').on('hidden.bs.modal', function() {
                    onhidden(); // Jalankan callback setelah modal tertutup
                });
            }

            modal.modal('show');
        }

        function showLoading(title, message) {
            let modal, mtitle, mmessage;
            modal = $('#modalLoading');
            mtitle = modal.find('#modaltitle');
            mmessage = modal.find('#modalmessage');
            mtitle.html(title);
            mmessage.html(message);
            modal.modal('show');
        }

        function hideLoading() {
            setTimeout(() => {
                $('#modalLoading').modal('hide');
            }, 1000);
        }

        function showLogout() {
            $('#modalLogout').modal('show');
        }
    </script>
    @yield('script')

</body>

</html>
