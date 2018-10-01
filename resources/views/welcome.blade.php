<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/flexslider.min.css" rel="stylesheet" type="text/css">
        <style>
            .navbar-item img{
                max-height: 2.75rem;
            }
            .slides{
                height:350px;
                overflow-y:hidden;
            }
        </style>
    </head>
    <body>
        <nav class="navbar is-transparent">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <img src="{{ asset('assets/logo/review-kurir-logo.png') }}">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </div>

        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="{{ url('#home') }}">
                Home
            </a>
            <a class="navbar-item" href="{{ url('#about') }}">
                About
            </a>
            <a class="navbar-item" href="{{ url('#founder') }}">
                Founder
            </a>
            <a class="navbar-item" href="{{ url('#contact') }}">
                Contact
            </a>
            <a class="navbar-item" href="{{ route('ongkir.create') }}">
                Hitung Ongkir
            </a>
            </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                @auth
                <p class="control">
                    <a class="button is-primary" href="{{ route('home') }}">
                    <span class="icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Home</span>
                    </a>
                </p>
                @else
                <p class="control">
                    <a class="button is-primary" href="{{ route('login') }}">
                        Login
                    </a>
                </p>   
                <p>
                    <a class="button is-primary" href="{{ route('register') }}">
                        Register
                    </a>
                </p> 
                @endif
                </div>
            </div>
            </div>
        </div>
        </nav>
        <section class="section" id="home">
            <div class="container">
           <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                <ul class="slides">
                    <li>
                    <img src="{{ asset('assets/banner/1.jpg') }}" />
                    </li>
                    <li>
                    <img src="{{ asset('assets/banner/2.jpg') }}" />
                    </li>
                    <li>
                    <img src="{{ asset('assets/banner/3.png') }}" />
                    </li>
                </ul>
                </div>
            </div>
        </section>
        <section class="section" id="about">
            <div class="container">
            <h1 class="title">About</h1>
            <h2 class="subtitle">
                Review Kurir adalah portal review dan komentar dari semua orang yang ingin melayangkan komentar, review, atau pesan kepada layanan kurir tertentu dengan harapan dapat membantu proses percepatan dan status pengiriman barang yang di pesan oleh masyarakat. 
portal ini tidak berafiliasi dengan kurir manapun, sehingga semua yang review, komentar, dan pesan yang ada di dalam portal ini bersifat general, dan murni dari masyarakat untuk para kurir yang di tuju.
            </h2>
            </div>
        </section>
        <section class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                <h1 class="title">
                    ReviewKurir.Com
                </h1>
                <h2 class="subtitle">
                    We Built Only For <strong>FUN</strong>
                </h2>
                </div>
            </div>
        </section>
        <section class="section" id="founder">
            <div class="container">
            <h1 class="title">Founder</h1>
                <div class="columns">
                    <div class="column is-three-fifths">
                        <img src="{{ asset('assets/user/founder.jpg') }}" width="400">
                    </div>
                    <div class="column">
                        <h1 class="title">Bill Tanthowi Jauhari</h1>
                        <h2 class="subtitle"> Software Engineer at @TechnologueID, X Freelancer, Backend Entusiast, Laravel Addict, Technology Fans</h2>
                        <h2 class="subtitle"><span class="fa fa-map"></span> Malang</h2>
                        <h2 class="subtitle"><span class="fa fa-envelope"></span> info@reviewkurir.com</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="section" id="contact">
            <div class="container">
            <h1 class="title">Contact</h1>
                <div class="columns">
                    <div class="column is-three-fifths">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input">
                            </div>
                            </div>

                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" placeholder="Username" value="">
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                    <i class="fas fa-check"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input" type="email" placeholder="Email input" value="">
                                        <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    </div>
                            </div>

                            <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Textarea"></textarea>
                            </div>
                            </div>

                            <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                <input type="checkbox">
                                I agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            </div>

                            <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">Submit</button>
                            </div>
                            <div class="control">
                                <button class="button is-text">Cancel</button>
                            </div>
                            </div>
                    </div>
                    <div class="column">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=Malang,Indonesia&zoom=14&size=600x500&key=AIzaSyCpo8T_wKnYiJibrJDGb0bedpdo7-E-uo0">
                    </div>
                </div>
            </div>
        </section>
        <section class="hero is-warning">
            <div class="hero-body">
                <div class="container">
                <h1 class="title">
                    Shout your voice <span class="fa fa-volume-up"></span>
                </h1>
                <h2 class="subtitle">
                    lament your complaints here
                </h2>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                <p>
                    <strong>ReviewKurir</strong> by <a href="https://billxcode.github.io">Bill Tanthowi Jauhari</a> Copyright &copy {{ Date('Y') }}
                </p>
                </div>
            </div>
        </footer>
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script>
        <script>
            // Can also be used with $(document).ready()
                $(window).on('load', function() {
                    $('.flexslider').flexslider({
                        animation: "slide"
                    });
                });
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96322661-7"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-96322661-7');
        </script>

    </body>
</html>
