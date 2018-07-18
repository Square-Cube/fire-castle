@extends('admin.layouts.master')
@section('title')
    Site settings
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Site settings</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Site settings</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.settings')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-6">
                                <label  for="display-name">Logo</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/logo/'.$settings->site_logo)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="site_logo">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 158*85</div>
                            </div>
                            
                            <div class="spacer-15"></div>

                            <div class="form-group col-sm-6">
                                <label >Site name in english</label>
                                <input type="text" class="form-control" name="site_name" value="{{$settings->site_name}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label >Site name in arabic</label>
                                <input type="text" class="form-control" name="ar_site_name" value="{{$settings->ar_site_name}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label >Slogan in english</label>
                                <input type="text" class="form-control" name="slogan" value="{{$settings->slogan}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label >Slogan in arabic</label>
                                <input type="text" class="form-control" name="ar_slogan" value="{{$settings->ar_slogan}}">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$settings->email}}">
                            </div>
                            
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->

@endsection
