<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$this->e($title)?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

     <!-- Favicon -->
     <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">
    
    <!-- CSS
	============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/css/icon-font.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/css/plugins.css">
    
    <!-- Helper CSS -->
    <link rel="stylesheet" href="/assets/css/helper.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Sweet Alert 2 CSS -->
    <link rel="stylesheet" href="/assets/css/sweetalert2.min.css">

    <!-- Owl Carousel 2 CSS -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    
    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>



    <?=$this->section("page_specific_css")?>
</head>

<body>
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-md-2 mt-15 mb-15">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="/">
                            <img src="/images/logo.png" alt="Jadusona">
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col-md-8">
                    <div class="main-menu">
                        <nav>
                            <ul id="menu">
                                <li class="<?php if($first_part=="" || $first_part=="home")  echo"active"?>"><a href="/">Home</a></li>
                                <li class="<?php if($first_part=="coffeeshops")  echo"active"?>"><a href="/coffeeshops">All shops</a></li>
                                <?php if ( \App\SessionGuard::isUserLoggedIn() && \App\SessionGuard::user()->role == "admin") : ?>
                                <li class="<?php if($first_part=="create_shop")  echo"active"?>"><a href="/create_shop">Create New Shop</a></li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    </div>
                    <div style="margin-top: 30px;">
                        <div class="search">
                            <form class="d-flex" type="get" action="/search">
                                <input class="form-control me-2" name="search" type="search" style="margin-left:50px;" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
 
                <div class="col-md-2  text-center">
                    <?php if (! \App\SessionGuard::isUserLoggedIn()) : ?>
                        <div class="header-login">
                            <a href="login" class="float-start"><p>Login</p></a>
                            <a href="register" class="float-end"> <p>Register</p></a>
                        </div>
                    <?php else : ?>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" style="margin-top: 10px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$this->e(\App\SessionGuard::user()->username)?>
                            </button>
                            <ul class="dropdown-menu cus-dropdown" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="/logout" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <?=$this->section("page")?>

   <!-- Footer Bottom Section Start -->
   <div class="footer-bottom-section section bg-theme-two pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="footer-copyright">Coffee Shops in CanTho © 2022 <i class="fa fa-heart heart-icon"></i> by PT</p>
                </div>
            </div>
        </div>
    </div><!-- Footer Bottom Section End --> 


    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Migrate JS -->
    <script src="/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="/assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>
    <!-- Sweet Alert JS -->
    <script src="/assets/js/sweetalert2.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="/assets/js/owl.carousel.min.js"></script>


    <?=$this->section("page_specific_js")?>
</body>

</html>