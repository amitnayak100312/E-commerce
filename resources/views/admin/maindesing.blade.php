<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="admin/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong
                                class="text-primary">Admin</strong><strong>Dashboard</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item"><a href="#" class="search-open nav-link"><i
                                class="icon-magnifying-glass-browser"></i></a></div>
                    <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            class="nav-link messages-toggle"><i class="icon-email"></i><span
                                class="badge dashbg-1">5</span></a>

                    </div>

                    <!-- Log out               -->
                    <div class="list-inline-item logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img
                        src="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4394.jpg"
                        alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">Admin Dashboard</h1>
                    <p>Web Designer</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active"><a href="{{ 'dashboard' }}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="#category" aria-expanded="false" data-toggle="collapse"> <i
                            class="icon-windows"></i>Category</a>
                    <ul id="category" class="collapse list-unstyled ">
                        <li><a href="{{route('admin.addcategory') }}">Add Category</a></li>
                        <li><a href="{{route('admin.viewcategory') }}">View Category</a></li>

                    </ul>
                </li>
                <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i
                            class="icon-windows"></i>Product</a>
                    <ul id="product" class="collapse list-unstyled ">
                        <li><a href="{{route('admin.addproduct') }}">Add Product</a></li>
                        <li><a href="{{route('admin.viewproduct')}}">View Product</a></li>
                        <li><a href="{{ route('admin.vieworder') }}">View Order</a></li>
                    </ul>
                </li>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                @yield('dashbosrd')
                @yield('addcategory')
                @yield('categoryupdate')
                @yield('viewcategory')
                @yield('addproduct')
                @yield('viewproduct')
                @yield('updateproduct')
                @yield('vieworder')



            </section>

            <!-- end of section -->

            <footer class="footer">
                <div class="container text-center">
                    <p>
                        © <span id="displayYear"></span> All Rights Reserved By
                        <a href="#" style="color: var(--nav-blue);">AmitWithCoder</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
</body>

</html>