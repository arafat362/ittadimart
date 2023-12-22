<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - SheraWeb</title>

    <!-- inject:css-->
    <link rel="stylesheet" href="{{ asset('backend/vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor_assets/css/line-awesome.min.css') }}">
    @stack('page-css')
    <link rel="stylesheet" href="{{ asset('backend/style.css') }}">
    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/img/favicon.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="layout-light side-menu">
    {{-- <div class="mobile-search">
        <form action="/" class="search-form">
            <img src="{{ asset('backend/img') }}/svg/search.svg" alt="search" class="svg">
            <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                aria-label="Search">
        </form>
    </div> --}}
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a href="#" class="sidebar-toggle">
                        <img class="svg" src="{{ asset('backend/img/svg/align-center-alt.svg') }}" alt="img">
                    </a>
                    <a class="navbar-brand" href="index.html">
                        <img class="dark" src="{{ asset('backend/img/logo-dark.png') }}" alt="logo">
                        <img class="light" src="{{ asset('backend/img/logo-white.png') }}" alt="logo">
                    </a>

                </div>
                
            </div>
            <!-- ends: navbar-left -->
            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    {{-- <li class="nav-search">
                        <a href="#" class="search-toggle">
                            <i class="uil uil-search"></i>
                            <i class="uil uil-times"></i>
                        </a>
                        <form action="/" class="search-form-topMenu">
                            <span class="search-icon uil uil-search"></span>
                            <input class="form-control me-sm-2 box-shadow-none" type="search"
                                placeholder="Search..." aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-message">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle icon-active">
                                <img class="svg" src="{{ asset('backend/img') }}/svg/message.svg" alt="img">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <h2 class="dropdown-wrapper__title">Messages <span
                                            class="badge-circle badge-success ms-1">2</span></h2>
                                    <ul>
                                        <li class="author-online has-new-message">
                                            <div class="user-avater">
                                                <img src="{{ asset('backend/img') }}/team-1.png" alt="">
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span
                                                        class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline has-new-message">
                                            <div class="user-avater">
                                                <img src="{{ asset('backend/img') }}/team-1.png" alt="">
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span
                                                        class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-online has-new-message">
                                            <div class="user-avater">
                                                <img src="{{ asset('backend/img') }}/team-1.png" alt="">
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                    <span
                                                        class="msg-count badge-circle badge-success badge-sm">1</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline">
                                            <div class="user-avater">
                                                <img src="{{ asset('backend/img') }}/team-1.png" alt="">
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="author-offline">
                                            <div class="user-avater">
                                                <img src="{{ asset('backend/img') }}/team-1.png" alt="">
                                            </div>
                                            <div class="user-message">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">Web Design</a>
                                                    <span class="time-posted">3 hrs ago</span>
                                                </p>
                                                <p>
                                                    <span class="desc text-truncate" style="max-width: 215px;">Lorem
                                                        ipsum
                                                        dolor amet cosec Lorem ipsum</span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="" class="dropdown-wrapper__more">See All Message</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- ends: nav-message -->
                    <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle icon-active">
                                <img class="svg" src="{{ asset('backend/img') }}/svg/alarm.svg" alt="img">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <h2 class="dropdown-wrapper__title">Notifications <span
                                            class="badge-circle badge-warning ms-1">4</span></h2>
                                    <ul>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--primary">
                                                <img class="svg" src="{{ asset('backend/img') }}/svg/inbox.svg" alt="inbox">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--secondary">
                                                <img class="svg" src="{{ asset('backend/img') }}/svg/upload.svg" alt="upload">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li
                                            class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--success">
                                                <img class="svg" src="{{ asset('backend/img') }}/svg/log-in.svg" alt="log-in">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--info">
                                                <img class="svg" src="{{ asset('backend/img') }}/svg/at-sign.svg" alt="at-sign">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                            <div class="nav-notification__type nav-notification__type--danger">
                                                <img src="{{ asset('backend/img') }}/svg/heart.svg" alt="heart" class="svg">
                                            </div>
                                            <div class="nav-notification__details">
                                                <p>
                                                    <a href="" class="subject stretched-link text-truncate"
                                                        style="max-width: 180px;">James</a>
                                                    <span>sent you a message</span>
                                                </p>
                                                <p>
                                                    <span class="time-posted">5 hours ago</span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- ends: .nav-notification -->
                    <li class="nav-settings">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <img src="{{ asset('backend/img') }}/setting.png" alt="setting">
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper dropdown-wrapper--large">
                                    <ul class="list-settings">
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/mail.png" alt=""></div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">All Features</a>
                                                </h6>
                                                <p>Introducing Increment subscriptions </p>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/color-palette.png" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">Themes</a>
                                                </h6>
                                                <p>Third party themes that are compatible</p>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/home.png" alt=""></div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">Payments</a>
                                                </h6>
                                                <p>We handle billions of dollars</p>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/video-camera.png" alt=""></div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">Design Mockups</a>
                                                </h6>
                                                <p>Share planning visuals with clients</p>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/document.png" alt=""></div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">Content Planner</a>
                                                </h6>
                                                <p>Centralize content gethering and editing</p>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="me-3"><img src="{{ asset('backend/img') }}/microphone.png" alt=""></div>
                                            <div class="flex-grow-1">
                                                <h6>
                                                    <a href="" class="stretched-link">Diagram Maker</a>
                                                </h6>
                                                <p>Plan user flows & test scenarios</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- ends: .nav-support -->
                    <li class="nav-flag-select">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('backend/img') }}/flag.png" alt=""
                                    class="rounded-circle"></a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper dropdown-wrapper--small">
                                    <a href=""><img src="{{ asset('backend/img') }}/eng.png" alt=""> English</a>
                                    <a href=""><img src="{{ asset('backend/img') }}/ger.png" alt=""> German</a>
                                    <a href=""><img src="{{ asset('backend/img') }}/spa.png" alt=""> Spanish</a>
                                    <a href=""><img src="{{ asset('backend/img') }}/tur.png" alt=""> Turkish</a>
                                    <a href=""><img src="{{ asset('backend/img') }}/iraq.png" alt=""> Arabic</a>
                                </div>
                            </div>

                        </div>
                    </li>
                    <!-- ends: .nav-flag-select --> --}}
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
                                <span class="nav-item__title">{{ Auth::user()->name }}<i class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <span>Administrator</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <i class="uil uil-user"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="uil uil-setting"></i> Settings</a>
                                            </li>
                                        </ul>
                                        <a href="javascript:void(0)" class="nav-author__signout" onclick="document.getElementById('logoutForm').submit()">
                                            <i class="uil uil-sign-out-alt"></i> Sign Out
                                        </a>
                                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <!-- ends: .dropdown-wrapper -->
                            </div>
                        </div>
                    </li>
                    <!-- ends: .nav-author -->
                </ul>
                <!-- ends: .navbar-right__menu -->
                {{-- <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-search">
                        <img src="{{ asset('backend/img') }}/svg/search.svg" alt="search" class="svg feather-search">
                        <img src="{{ asset('backend/img') }}/svg/x.svg" alt="x" class="svg feather-x">
                    </a>
                    <a href="#" class="btn-author-action">
                        <img class="svg" src="{{ asset('backend/img') }}/svg/more-vertical.svg" alt="more-vertical">
                    </a>
                </div> --}}
            </div>
            <!-- ends: .navbar-right -->
        </nav>
    </header>
    <main class="main-content">

        <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li>
                            <a href="{{ route('dashboard') }}" class="">
                                <span class="nav-icon uil uil-create-dashboard"></span>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-child">
                            <a href="javascript:void(0)" class="">
                                <span class="nav-icon uil uil-briefcase-alt"></span>
                                <span class="menu-text">Products</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li class="l_sidebar">
                                    <a href="{{ route('product.create') }}">Add New Product</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="{{ route('product.index') }}">All Products</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('order.index') }}" class="">
                                <span class="nav-icon uil uil-shopping-cart-alt"></span>
                                <span class="menu-text">Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="contents">

            <div class="container-fluid">

                @if (session()->has('message'))
                    <div class="alert alert-dismissible alert-{{ session()->get('alert-type') }} fade mb-0 mt-30 show" role="alert">

                        <div class="alert-icon">
                            <img src="{{ asset('backend/img/svg/layers.svg') }}" alt="layers" class="svg">
                        </div>

                        <div class="alert-content">

                        <p>{{ session()->get('message') }}</p>

                        <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                            <img src="{{ asset('backend/img/svg/x.svg') }}" alt="x" class="svg" aria-hidden="true">
                        </button>

                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
            
            <footer class="footer-wrapper">
                <div class="footer-wrapper__inside">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-copyright">
                                    <p><span>© {{ date('Y') }}</span><a href="https://facebook.com/SheraWeb/" target="_blank">SheraWeb</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-menu text-end">
                                    <ul>
                                        <li>
                                            <a href="#">About</a>
                                        </li>
                                        <li>
                                            <a href="#">Team</a>
                                        </li>
                                        <li>
                                            <a href="#">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ends: .Footer Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
    </main>

    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>

    <!-- inject:js-->
    <script src="{{ asset('backend') }}/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('backend') }}/vendor_assets/js/jquery/jquery-ui.js"></script>
    <script src="{{ asset('backend') }}/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="{{ asset('backend') }}/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    @stack('page-js')
    {{-- <script src="{{ asset('backend') }}/theme_assets/js/main.js"></script> --}}
    <script src="{{ asset('backend/theme_assets/js/sheraweb.js') }}"></script>
    <!-- endinject-->
</body>

</html>
