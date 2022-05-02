<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }} {{ isset($title) ? $title : '' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{--    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @routes
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @if(isset($style))
        {{ $style }}
    @endif

    @stack('stack-style')
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

@auth('staff')
    <body class="font-sans antialiased @stack('class-body')">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion @stack('class-nav')"
            id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?ref=logo">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>

            @can(roles_and_permission()::PERMISSION_CONSULTANT)
                <livewire:widgets.consultation-navbar-alert/>
            @endcan

            @can(roles_and_permission()::PERMISSION_TICKETING . \App\Enums\RolesAndPermissionEnum::READ)
                <livewire:widgets.ticket-navbar-alert/>
            @endcan

            @canany(get_permissions_via_role(enum_roles_and_permission()::ROLE_STAFF, enum_guard()::STAFF))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Kelola Data</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola:</h6>

                            @can(\App\Enums\RolesAndPermissionEnum::PERMISSION_MANAGE_CONSULTATION . \App\Enums\RolesAndPermissionEnum::READ)
                                <a class="collapse-item"
                                   href="{{ route('dashboard.manage-consultations.index') }}">Consultations
                                </a>
                            @endcan
                            @can(\App\Enums\RolesAndPermissionEnum::PERMISSION_LICENSE_AND_AGREEMENT . \App\Enums\RolesAndPermissionEnum::READ)
                                <a class="collapse-item"
                                   href="{{ route('dashboard.license-agreement.index') }}">License and Agreement
                                </a>
                            @endcan
                            @can(roles_and_permission()::PERMISSION_RULE. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.rules.index') }}">Rules</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_INDIVIDUAL_RULE. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.rules-umkm.index') }}">UMKM Rules</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_UMKM_RULE. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.rules-individual.index') }}">Individual Rules</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_PRODUCT. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.products.index') }}">Product</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_DISCOUNT. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.discount.index') }}">Diskon</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_VOUCHER. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.vouchers.index') }}">Voucher</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_CATEGORY_CONTACTS_US. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.contact-us-category.index') }}">Kategori
                                    Contact Us</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_PARAMETER. roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.parameters.index') }}">Parameter</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_PROMOTION . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.promotions.index') }}">Promotion</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_ICON . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.icons.index') }}">Icon</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_MANAGE_USER . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.manage-users.index') }}">Kelola
                                    User</a>
                                <a class="collapse-item" href="{{ route('dashboard.manage-user-testing.index') }}">Kelola
                                    User Testing</a>
                            @endcan

                            {{--                            @can(roles_and_permission()::PERMISSION_MANAGE_USER . roles_and_permission()::READ)--}}
                            <a class="collapse-item" href="{{ route('dashboard.mapping-user-location.index') }}">Map User Location</a>
                            {{--                            @endcan--}}

                            @can(roles_and_permission()::PERMISSION_TAX_RATE . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.tax-rates.index') }}">Kurs Pajak</a>
                            @endcan

                        </div>
                    </div>
                </li>
            @endcanany

            @canany(get_permissions_via_role(enum_roles_and_permission()::ROLE_FINANCIAL, enum_guard()::STAFF))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance"
                       aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-money-check"></i>
                        <span>Kelola Pembayaran</span>
                    </a>
                    <div id="collapseFinance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola:</h6>
                            @can(roles_and_permission()::PERMISSION_USER_TRANSACTION . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.user-transactions.index') }}">
                                    Transaksi User</a>
                            @endcan
                            @can(roles_and_permission()::PERMISSION_PAYMENT_METHOD . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.payment-methods.index') }}">Metode
                                    Pembayaran</a>
                            @endcan
                            @can(roles_and_permission()::PERMISSION_PAYMENT_CHANNEL . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.payment-channels.index') }}">Channel
                                    Pembayaran</a>
                            @endcan
                            @can(roles_and_permission()::PERMISSION_PAYMENT_PROVIDER . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.payment-providers.index') }}">Layanan
                                    Pembayaran</a>
                            @endcan
                        </div>
                    </div>
                </li>
            @endcanany

            @canany(get_permissions_via_role(enum_roles_and_permission()::ROLE_ADMIN, enum_guard()::STAFF))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin"
                       aria-expanded="true" aria-controls="collapseAdmin">
                        <i class="fas fa-fw fa-user-secret"></i>
                        <span>Menu Admin</span>
                    </a>
                    <div id="collapseAdmin" class="collapse" aria-labelledby="collapseAdmin"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kelola:</h6>

                            @can(roles_and_permission()::PERMISSION_STAFF . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.staffs.index') }}">Staff</a>
                            @endcan

                            @can(\App\Enums\RolesAndPermissionEnum::PERMISSION_ROLES_AND_PERMISSION . \App\Enums\RolesAndPermissionEnum::READ)
                                <a class="collapse-item"
                                   href="{{ route('dashboard.staff-role-and-permissions.index') }}">Edit Permission
                                    Staff</a>
                            @endcan

                            @can(\App\Enums\RolesAndPermissionEnum::PERMISSION_PERMISSION . \App\Enums\RolesAndPermissionEnum::READ)
                                <a class="collapse-item"
                                   href="{{ route('dashboard.permissions.index') }}">Permissions (⚠️⛔️)</a>
                            @endcan

                        </div>
                    </div>
                </li>
            @endcanany


            @canany(get_permissions_via_role(enum_roles_and_permission()::ROLE_STATISTIC, enum_guard()::STAFF))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStatistic"
                       aria-expanded="true" aria-controls="collapseStatistic">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>Statistik</span>
                    </a>
                    <div id="collapseStatistic" class="collapse" aria-labelledby="collapseStatistic"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Statistik:</h6>

                            @can(roles_and_permission()::PERMISSION_LOG . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.statistic-logs') }}">Logs</a>
                            @endcan

                            @can(roles_and_permission()::PERMISSION_GENERATED_LINK . roles_and_permission()::READ)
                                <a class="collapse-item" href="{{ route('dashboard.statistic-user-generate-link') }}">User Generate Link</a>
                            @endcan
                        </div>
                    </div>
                </li>
            @endcanany

            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                {{--
                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                --}}

                <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        {{--
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                             alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>
                        --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth('staff')->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                     src="{{ auth('staff')->user()->profile_photo_url }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                {{--                                <a class="dropdown-item" href="#">--}}
                                {{--                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                                {{--                                    Profile--}}
                                {{--                                </a>--}}
                                {{--                                <a class="dropdown-item" href="#">--}}
                                {{--                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                                {{--                                    Settings--}}
                                {{--                                </a>--}}
                                <a class="dropdown-item" href="{{route('dashboard.accounts.index')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan
                                </a>
                                <a class="dropdown-item" href="{{route('dashboard.manage-password.index')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Reset Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    {{-- menggunakan x-component --}}
                    @if(isset($title))
                        <h1 class="h3 mb-4 text-gray-800">
                            {{ $title }}
                        </h1>
                    @endif
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

                    @auth('staff')
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ date('Y') }} {{ config('app.name') }}</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>


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

    @endauth

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

    @stack('stack-bottom')
    @livewireScripts
    </body>
</html>
