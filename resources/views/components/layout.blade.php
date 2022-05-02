<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }} {{ isset($title) ? $title : '' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{--    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}

<!-- Scripts -->
{{--    @routes--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

@if(isset($style))
    {{ $style }}
@endif

@stack('stack-style')
<!-- push('stack-style') -->

    <style media="all">
        .boostrap-livewire-overlay-livewire-loading {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(141, 140, 140, 0.5);
            z-index: 2;
            cursor: pointer;
        }

        .bootstrap-livewire-loading-area {
            padding-top: 40vh;
        }
    </style>

    @livewireStyles
</head>
<body>
    @auth('staff')
        <div class="sidebar">
            <div class="logo-details">
                <i class='bx bxl-c-plus-plus icon'></i>
                <div class="logo_name">CodingLab</div>
                <i class='bx bx-menu' id="btn"></i>
            </div>

                <ul class="nav-list">
                    {{--                <li>--}}
                    {{--                    <i class='bx bx-search'></i>--}}
                    {{--                    <input type="text" placeholder="Search...">--}}
                    {{--                    <span class="tooltip">Search</span>--}}
                    {{--                </li>--}}
                    <li>
                        <a href="#">
                            <i class='bx bx-grid-alt'></i>
                            <span class="links_name">Dashboard</span>
                        </a>
                        <span class="tooltip">Dashboard</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-user'></i>
                            <span class="links_name">User</span>
                        </a>
                        <span class="tooltip">User</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-group'></i>
                            <span class="links_name">Member</span>
                        </a>
                        <span class="tooltip">Member</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bxs-car-garage'></i>
                            <span class="links_name">Kendaraan</span>
                        </a>
                        <span class="tooltip">Vehicle</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-task'></i>
                            <span class="links_name">Karcis</span>
                        </a>
                        <span class="tooltip">Karcis</span>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-news'></i>
                            <span class="links_name">Voucher</span>
                        </a>
                        <span class="tooltip">Voucher</span>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="links_name">Analytics</span>
                        </a>
                        <span class="tooltip">Analytics</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-map'></i>
                            <span class="links_name">Pos</span>
                        </a>
                        <span class="tooltip">Pos</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-spreadsheet'></i>
                            <span class="links_name">Shift</span>
                        </a>
                        <span class="tooltip">Shift</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-wallet'></i>
                            <span class="links_name">Jenis Pembayaran</span>
                        </a>
                        <span class="tooltip">Jenis Pembayaran</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class='bx bx-cog'></i>
                            <span class="links_name">Setting</span>
                        </a>
                        <span class="tooltip">Setting</span>
                    </li>

                    <!-- <li class="profile">
                       <div class="profile-details">
                         <img src="profile.jpg" alt="profileImg">
                         <div class="name_job">
                           <div class="name">Prem Shahi</div>
                           <div class="job">Web designer</div>
                         </div>
                       </div>
                       <i class='bx bx-log-out' id="log_out" ></i>
                         </li> -->

                </ul>
        </div>
    @endauth

    @if(session('success'))
        <div class="alert alert-primary" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('failed'))
        <div class="alert alert-danger" role="alert">
            {{ session('failed') }}
        </div>
    @endif

    {{-- menggunakan x-component --}}
    @if(isset($slot))
        {{ $slot }}

    @endif

    {{-- optional jika ingin menggunakan cara lama --}}
    @yield('content')

    {{-- Khusus Inertia --}}
    @if(isset($page))
        @inertia
    @else
        {{--                        <div id="app"></div>--}}
    @endif

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{ date('Y') }} {{ config('app.name') }}</span>
        </div>
    </div>
</footer>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
@if(isset($javascript))
    {{ $javascript }}
@endif

@stack('stack-js')
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

@if(isset($javascript_bottom))
    {{ $javascript_bottom }}
@endif
{{--<x-slot name="javascript_bottom">--}}
{{--    <script type="text/javascript">--}}
{{--    </script>--}}
{{--</x-slot>--}}
@stack('stack-bottom')

@livewireScripts
</html>
