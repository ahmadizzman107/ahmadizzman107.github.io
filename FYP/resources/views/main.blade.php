<!DOCTYPE html>
<html lang="en">
{{-- Main Homepage --}}

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FSKTM Technovations</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/techno.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizPage - v2.0.0
    * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <!-- Modal Scripts -->

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- ================================================
    * Link: https://dev.to/kingsconsult/how-to-create-modal-in-laravel-8-and-laravel-6-7-with-ajax-m25
    * Author: Kingsconsult
    ===================================================== -->

    <style>
        #p1 {
            background-color: rgba(255, 255, 255, 0.1);
        }

    </style>
</head>

<body>
    <!-- Back to Top -->

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container-fluid">

            <div id="logo" class="pull-left">
                <img src="/assets/img/techno.png" width="92" height="99">
                <!-- Uncomment below if you prefer to use an image logo -->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#intro">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Events</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- End Header -->

    @include('front.intro')

    <main id="main">

        @include('front.about')
        <!-- About Us -->

        @include('front.services')
        <!-- Services -->

        @include('front.facts')
        <!-- Stories -->

        @include('front.portfolio')
        <!-- Events -->

        @include('front.clients')
        <!-- Clients -->

        @include('front.team')
        <!-- Team -->

        @include('events.modal')
        <!-- Modal -->

        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    @include('inc.visit')
                    <!-- Company Address -->

                    @include('inc.link')
                    <!-- Useful Links -->

                    @include('inc.contacts')
                    <!-- Contact Info -->

                    @include('inc.feedback')
                    <!-- Feedback Form -->

                </div>
                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
                -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
    </footer><!-- End Footer -->

    <!-- Uncomment below i you want to use a preloader -->

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/wow/wow.min.js"></script>
    <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counterup/counterup.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/superfish/superfish.min.js"></script>
    <script src="/assets/vendor/hoverIntent/hoverIntent.js"></script>
    <script src="/assets/vendor/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
