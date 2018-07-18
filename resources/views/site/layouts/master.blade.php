<!DOCTYPE html>
<html>

    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta NAME="keywords" CONTENT="" />
        <meta NAME="copyright" CONTENT="" />

        <!-- Title Name
        ================================-->
        <title>Fire Castle | @yield('title')</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/fav-icon.png')}}">

        <!-- Google Web Fonts
        ===========================-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/animation/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl.carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl.carousel/owl.theme.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!--Start Wrap
        ==========================================-->
        <div class="wrapper">
            @include('site.layouts.header')
            <div class="main">
                @yield('content')
                @include('site.layouts.footer')
            </div>
        </div>

        <!-- JS Base And Vendor
               ==========================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('assets/site/vendor/popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/mixitup/jquery.mixitup.js')}}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="{{asset('assets/site/vendor/animation/wow.min.js')}}"></script>
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 200,
                    callback: function(box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();
        </script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script src="{{asset('assets/site/js/site.js')}}"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-99643272-10"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-99643272-10');
        </script>


    </body>

</html>