
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SIKAP-PENS</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Agency Template" name="keywords">
        <meta content="Bootstrap Agency Template" name="description">

        <!-- Favicon -->
        <link href="{{ asset ('agency/img/favicon.ico')}}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset ('agency/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{ asset ('agency/libs/slick/slick-theme.css')}}" rel="stylesheet">
        <link href="{{ asset ('agency/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset ('agency/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="brand">
                                <a href="">
                                    <img src="{{ asset ('agency/img/logo-pens.png')}}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="topbar">
                                <div class="topbar-col">
                                    <a href="https://api.whatsapp.com/send?phone=6281133305005"><i class="fa fa-phone-alt"></i>+62 811-3330-5005</a>
                                </div>
                                <div class="topbar-col">
                                    <a href="mailto:admin@sikap.pens.ac.id"><i class="fa fa-envelope"></i>admin@sikap.pens.ac.id</a>
                                </div>
                                <div class="topbar-col">
                                    <div class="topbar-social">
                                        <a href="https://twitter.com/penseepis"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.facebook.com/pens.eepis"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.youtube.com/channel/UCgCH04Vjy22hnfTZBTMDccQ"><i class="fab fa-youtube"></i></a>
                                        <a href="https://www.instagram.com/penseepis/"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <a href="#" class="navbar-brand">MENU</a>
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                                        <a href="#about" class="nav-item nav-link">About Us</a>
                                        <a href="#procedure" class="nav-item nav-link">Procedures</a>
                                        <a href="#team" class="nav-item nav-link">Team</a>
                                        <a href="#faq" class="nav-item nav-link">FAQ</a>
                                        <a href="#contact" class="nav-item nav-link">Contact Us</a>
                                        <a href="{{ route('login') }}"class="btn"><i class=""></i>Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
            @yield('content')
            <!-- Call to Action Start -->
            <div class="call-to-action">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2>BRIDGE TO THE FUTURE</h2>
                        </div>
                        <div class="col-md-3">
                            <a class="btn" href="">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to Action End -->


            <!-- Footer Start -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="footer-about">
                                <h2>SIKAP - PENS</h2>
                                <p>Web ini di khususkan untuk informasi seputar aturan akademis dan kehidupan kampus dari pens, silahkan kunjungi website https://www.pens.ac.id untuk mengakses website official pens</p>
                                <br>
                                <p><a href="https://goo.gl/maps/NbWni7tpzX32" target="_blank" rel="noopener"><i class="fa fa-map-marker-alt"></i> Raya ITS &#8211; Kampus PENS Sukolilo<br />Surabaya 60111, INDONESIA</a></p>
                                <p><a href="https://api.whatsapp.com/send?phone=6281133305005"><i class="fa fa-phone-alt"></i>+62 811-3330-5005</a></p>
                                <p><a href="mailto:admin@sikap.pens.ac.id"><i class="fa fa-envelope"></i>sikap.pens.ac.id</a></p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="footer-link">
                                        <h2>Useful Link</h2>
                                        <a href="">About Us</a>
                                        <a href="">Our Story</a>
                                        <a href="">Our Team</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="footer-link">
                                        <h2>Useful Link</h2>
                                        <a href="">Coutact Us</a>
                                        <a href="">FAQs</a>
                                        <a href="https://goo.gl/maps/NbWni7tpzX32">Site Map</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="">Copyright 2021</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Template By <a href="">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset ('agency/lib/slick/slick.min.js')}}"></script>
        <script src="{{asset ('agency/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset ('agency/lib/lightbox/js/lightbox.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset ('agency/js/main.js')}}"></script>
    </body>
</html>
