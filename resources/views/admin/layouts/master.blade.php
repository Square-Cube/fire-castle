<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title Name
        ================================-->
        <title> {{$settings->site_name}} | @yield('title')</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/fav-icon.png')}}">

        <!-- Google Web Fonts
        ===========================-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/datepicker/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/animation/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/theme/default-theme.css')}}">
        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @yield('modals')
        <div id="wrapper">
            <div class="main">
                @include('admin.layouts.sidebar')
                <div class="page-content">
                    @include('admin.layouts.header')
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="loading">
            <div class="loading-content">
                <img src="{{asset('storage/uploads/logo/'.$settings->site_logo)}}">
                <p>loading please wait ...</p>
                <i class="fa fa-cog fa-spin"></i>
            </div>
        </div>

        @yield('templates')

        <!-- common edit modal with ajax for all project -->
        <div id="common-modal" class="modal fade" role="dialog">
            <!-- modal -->
        </div>

        <!-- delete with ajax for all project -->
        <div id="delete-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
            </div>
        </div>
        <script id="template-modal" type="text/html" >
            <div class = "modal-content" >
                <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                <div class = "modal-header" >
                    <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                    <h4 class = "modal-title bold" >Delete element</h4>
                </div>
                <div class = "modal-body" >
                    <p >Are you sure ?</p>
                </div>
                <div class = "modal-footer" >
                    <a
                            href = "{url}"
                            id = "delete" class = "btn btn-danger" >
                        <li class = "fa fa-trash" > </li> delete
                    </a>

                    <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                        <li class = "fa fa-times" > </li> cancel</button >
                </div>
            </div>
        </script>



        @include('admin.templates.alerts')
        @include('admin.templates.delete-modal')

        <form action="#" id="csrf">{!! csrf_field() !!}</form>

        <!-- JS Base And Vendor
        ===================================-->
        <script src="{{asset('assets/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <script src="{{asset('assets/admin/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/count-to/jquery.countTo.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

        <!--JS Main
        ====================================-->
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/process.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/sweetalert.min.js')}}" type="text/javascript"></script>
    </body>
</html>