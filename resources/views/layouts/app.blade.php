<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Regular Tables - Tables are the backbone of almost all web applications.</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="Tables are the backbone of almost all web applications.">
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>--}}
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        .widget-numbers {
            font-size: 1.3rem !important;
            font-weight:normal !important;
        }
        .table-code-lab {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-code-lab .table-responsive {
            margin: 30px 0;
        }

        .table-code-lab .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            /*min-width: 1000px;*/
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-code-lab .table-title {
            padding-bottom: 15px;
            background: #2e3192;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-code-lab .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-code-lab tfoot{
            /*color: white;*/
            background-color: white;
            position: sticky;
            bottom: 0px;
            z-index:1;
        }

        .table-code-lab thead{
            /*color: white;*/
            background-color: white;
            position: sticky;
            top: 60px;
            z-index:1;
        }

        .table-code-lab .table-title .btn-group {
            float: right;
        }

        .table-code-lab .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-code-lab .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-code-lab .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-code-lab table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table-code-lab table.table tr th:first-child {
            width: 60px;
        }

        /*.table-code-lab table.table tr th:last-child {*/
        /*    width: 100px;*/
        /*}*/

        .table-code-lab table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        .table-code-lab table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        .table-code-lab table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        .table-code-lab table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        .table-code-lab table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        .table-code-lab table.table td a:hover {
            color: #2196F3;
        }

        .table-code-lab table.table td a.edit {
            color: #FFC107;
        }

        .table-code-lab table.table td a.delete {
            color: #F44336;
        }

        .table-code-lab table.table td i {
            font-size: 19px;
        }

        .table-code-lab table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .table-code-lab .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .table-code-lab .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .table-code-lab .pagination li a:hover {
            color: #666;
        }

        .table-code-lab .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .table-code-lab .pagination li.active a:hover {
            background: #0397d6;
        }

        .table-code-lab .pagination li.disabled i {
            color: #ccc;
        }

        .table-code-lab .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .table-code-lab .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .table-code-lab .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .table-code-lab .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .table-code-lab .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }

        .table-code-lab .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }


        /* Modal styles */
        .modal-code-lab .modal .modal-dialog {
            max-width: 400px;
        }

        .modal-code-lab .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal-code-lab .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal-code-lab .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal-code-lab .modal .modal-title {
            display: inline-block;
        }

        .modal-code-lab .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal-code-lab .modal textarea.form-control {
            resize: vertical;
        }

        .modal-code-lab .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal-code-lab .modal form label {
            font-weight: normal;
        }

        .modal-code-lab .show {
            display: block;
            animation: slide_in_show 0.5s
        }

        .modal-code-lab .form-group {
            margin-bottom: 1rem;
        }

        .modal-code-lab .form-group label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        @keyframes slide_in_show {
            0% {
                opacity: 0;
                transform: translate(0, -50px);
            }

            100% {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }
    </style>
        @livewireStyles
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow bg-dark header-text-light">

        <div class="app-header__logo">
            <div class="logo-src" style="display: flex;height: 50px;width:150px;
            background-position-x: 10px;
    background-size: 125px;
    background-repeat: no-repeat;">

{{--                <img style="width: 50px;" src ="{{asset('icons/svg/dishub.svg')}}">--}}
{{--                <p style="color: white">DISHUB <br> By Rapik</p>--}}
            </div>
            <div class="header__pane ms-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>

        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
{{--                <div class="search-wrapper">--}}
{{--                    <div class="input-holder">--}}
{{--                        <input type="text" class="search-input" placeholder="Type to search">--}}
{{--                        <button class="search-icon"><span></span></button>--}}
{{--                    </div>--}}
{{--                    <button class="btn-close"></button>--}}
{{--                </div>--}}
{{--                <ul class="header-menu nav">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="javascript:void(0);" class="nav-link">--}}
{{--                            <i class="nav-link-icon fa fa-database"> </i>--}}
{{--                            Statistics--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="btn-group nav-item">--}}
{{--                        <a href="javascript:void(0);" class="nav-link">--}}
{{--                            <i class="nav-link-icon fa fa-edit"></i>--}}
{{--                            Projects--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="dropdown nav-item">--}}
{{--                        <a href="javascript:void(0);" class="nav-link">--}}
{{--                            <i class="nav-link-icon fa fa-cog"></i>--}}
{{--                            Settings--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pe-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="https://ui-avatars.com/api/?name={{urlencode(Auth::user()->name)}}" alt="">
                                        <i class="fa fa-angle-down ms-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item">Logout</button>
                                        </form>
{{--                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>--}}
{{--                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>--}}
{{--                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>--}}
{{--                                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>--}}
{{--                                        <div tabindex="-1" class="dropdown-divider"></div>--}}
{{--                                        <button type="button" tabindex="0" class="dropdown-item">Dividers</button>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ms-3 header-user-info">
                                <div class="widget-heading">
                                    {{Auth::user()->name}}
                                </div>
                                <div class="widget-subheading">
                                    {{Auth::user()->email}}
                                </div>
                            </div>
{{--                            <div class="widget-content-right header-user-info ms-3">--}}
{{--                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">--}}
{{--                                    <i class="fa text-white fa-calendar pe-1 ps-1"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main">
        <div class="app-sidebar sidebar-shadow bg-slick-carbon sidebar-text-light">
            <div class="app-header__logo">
                <div class="logo-src">
                </div>
                <div class="header__pane ms-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    @auth('field_worker')
                        <ul class="vertical-nav-menu">

                            <li class="app-sidebar__heading">Dashboard</li>
                            {{--                        <li class="mm-active">--}}
                            <li class="">
                                <a href="/">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Home
                                </a>
                            </li>
                        </ul>
                    @endauth
                    @auth('staff')
                    <ul class="vertical-nav-menu">

                        <li class="app-sidebar__heading">Dashboard</li>
{{--                        <li class="mm-active">--}}
                        <li class="">
                            <a href="/home">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Home
                            </a>
                        </li>
                        <li class="">
                            <a href="/home/transaksi">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Transaksi
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Laporan</li>
                        <li class="">
                            <a href="/report/detail">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Detail Transaksi
                            </a>
                        </li>
                        <li class="">
                            <a href="/report/dayly">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Transaksi Harian
                            </a>
                        </li>
                        <li class="">
                            <a href="/report/monthly">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Transaksi Bulanan
                            </a>
                        </li>
                        <li class="">
                            <a href="/report/yearly">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Transaksi Tahunan
                            </a>
                        </li>
{{--                        <li class="app-sidebar__heading">Under development</li>--}}
{{--                        <li>--}}
{{--                            <a>--}}
{{--                                <i class="metismenu-icon pe-7s-diamond"></i>--}}
{{--                                Laporan--}}
{{--                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
{{--                            </a>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="/home/report">--}}
{{--                                        <i class="metismenu-icon"></i>--}}
{{--                                        Laporan Exel--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                    </ul>
                    @endauth
                </div>
            </div>
        </div>

        <div class="app-main__outer">
            <div class="app-main__inner">
                @if(isset($slot))
                    {{ $slot }}

                @endif

                {{-- optional jika ingin menggunakan cara lama--}}
                @yield('content')

                {{-- Khusus Inertia--}}
                @if(isset($page))
                    @inertia
                @endif

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        console.log('jamet ')
        // Activate tooltip
        // $('[data-toggle="tooltip"]').tooltip();

        window.addEventListener('alert-success', event => {
            alertify.success( event.detail.message);
        })

        window.addEventListener('alert-error', event => {
            alertify.error( event.detail.message);
        })
    })

</script>
@stack('bottom-scripts')
@livewireScripts

</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Dashboard') }} {{ isset($title) ? $title : '' }}</title>--}}

{{--    <!-- Bootstrap CSS -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}
{{--    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>--}}

{{--    <!-- Custom fonts for this template-->--}}
{{--    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}

{{--    <!-- Custom styles for this template-->--}}
{{--    --}}{{--    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/base.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">--}}
{{--    --}}{{--    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">--}}

{{--<!-- Scripts -->--}}
{{--    --}}{{--    @routes--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>--}}

{{--@if(isset($style))--}}
{{--    {{ $style }}--}}
{{--@endif--}}

{{--@stack('stack-style')--}}
{{--<!-- push('stack-style') -->--}}

{{--    <style media="all">--}}
{{--        .boostrap-livewire-overlay-livewire-loading {--}}
{{--            position: fixed;--}}
{{--            display: block;--}}
{{--            width: 100%;--}}
{{--            height: 100%;--}}
{{--            top: 0;--}}
{{--            left: 0;--}}
{{--            right: 0;--}}
{{--            bottom: 0;--}}
{{--            background-color: rgba(141, 140, 140, 0.5);--}}
{{--            z-index: 2;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        .bootstrap-livewire-loading-area {--}}
{{--            padding-top: 40vh;--}}
{{--        }--}}
{{--    </style>--}}

{{--    @livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--@auth('staff')--}}
{{--    <div class="sidebar">--}}
{{--        <div class="logo-details">--}}
{{--            <i class='bx bxl-c-plus-plus icon'></i>--}}
{{--            <div class="logo_name">CodingLab</div>--}}
{{--            <i class='bx bx-menu' id="btn"></i>--}}
{{--        </div>--}}

{{--        <ul class="nav-list">--}}
{{--            --}}{{--                <li>--}}
{{--            --}}{{--                    <i class='bx bx-search'></i>--}}
{{--            --}}{{--                    <input type="text" placeholder="Search...">--}}
{{--            --}}{{--                    <span class="tooltip">Search</span>--}}
{{--            --}}{{--                </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-grid-alt'></i>--}}
{{--                    <span class="links_name">Dashboard</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Dashboard</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-user'></i>--}}
{{--                    <span class="links_name">User</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">User</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-group'></i>--}}
{{--                    <span class="links_name">Member</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Member</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bxs-car-garage'></i>--}}
{{--                    <span class="links_name">Kendaraan</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Vehicle</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-task'></i>--}}
{{--                    <span class="links_name">Karcis</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Karcis</span>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-news'></i>--}}
{{--                    <span class="links_name">Voucher</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Voucher</span>--}}
{{--            </li>--}}

{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-pie-chart-alt-2'></i>--}}
{{--                    <span class="links_name">Analytics</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Analytics</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-map'></i>--}}
{{--                    <span class="links_name">Pos</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Pos</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-spreadsheet'></i>--}}
{{--                    <span class="links_name">Shift</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Shift</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-wallet'></i>--}}
{{--                    <span class="links_name">Jenis Pembayaran</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Jenis Pembayaran</span>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">--}}
{{--                    <i class='bx bx-cog'></i>--}}
{{--                    <span class="links_name">Setting</span>--}}
{{--                </a>--}}
{{--                <span class="tooltip">Setting</span>--}}
{{--            </li>--}}

{{--            <!-- <li class="profile">--}}
{{--               <div class="profile-details">--}}
{{--                 <img src="profile.jpg" alt="profileImg">--}}
{{--                 <div class="name_job">--}}
{{--                   <div class="name">Prem Shahi</div>--}}
{{--                   <div class="job">Web designer</div>--}}
{{--                 </div>--}}
{{--               </div>--}}
{{--               <i class='bx bx-log-out' id="log_out" ></i>--}}
{{--                 </li> -->--}}

{{--        </ul>--}}
{{--    </div>--}}
{{--@endauth--}}

{{--@if(session('success'))--}}
{{--    <div class="alert alert-primary" role="alert">--}}
{{--        {{ session('success') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session('failed'))--}}
{{--    <div class="alert alert-danger" role="alert">--}}
{{--        {{ session('failed') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{-- menggunakan x-component --}}
{{--@if(isset($slot))--}}
{{--    {{ $slot }}--}}

{{--@endif--}}

{{-- optional jika ingin menggunakan cara lama --}}
{{--@yield('content')--}}

{{-- Khusus Inertia --}}
{{--@if(isset($page))--}}
{{--    @inertia--}}
{{--@else--}}
{{--    --}}{{--                        <div id="app"></div>--}}
{{--@endif--}}

{{--<!-- Option 1: Bootstrap Bundle with Popper -->--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>--}}

{{--</body>--}}

{{--<footer class="sticky-footer bg-white">--}}
{{--    <div class="container my-auto">--}}
{{--        <div class="copyright text-center my-auto">--}}
{{--            <span>Copyright &copy; {{ date('Y') }} {{ config('app.name') }}</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}


{{--<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>--}}
{{--                <button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">×</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
{{--                <form action="{{ route('logout') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <button class="btn btn-primary">Logout</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--@if(isset($javascript))--}}
{{--    {{ $javascript }}--}}
{{--@endif--}}

{{--@stack('stack-js')--}}
{{--<!-- Bootstrap core JavaScript-->--}}
{{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--<!-- Core plugin JavaScript-->--}}
{{--<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>--}}
{{--<!-- Custom scripts for all pages-->--}}
{{--<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>--}}

{{--@if(isset($javascript_bottom))--}}
{{--    {{ $javascript_bottom }}--}}
{{--@endif--}}
{{--<x-slot name="javascript_bottom">--}}
{{--    <script type="text/javascript">--}}
{{--    </script>--}}
{{--</x-slot>--}}
{{--@stack('stack-bottom')--}}

{{--@livewireScripts--}}
{{--</html>--}}

