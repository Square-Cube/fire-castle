@extends('admin.layouts.master')
@section('title')
    Company profile
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Company profile</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Company profile</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.company-profile')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">banner</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/site/images/company-profile.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 952 *247</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>English title</label>
                                <input type="text" class="form-control" name="en_title" value="{{$profile->english()->title}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Arabic title</label>
                                <input type="text" class="form-control" name="ar_title" value="{{$profile->arabic()->title}}">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>English description</label>
                                <textarea class="form-control" name="en_description">{{$profile->english()->description}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                
                                <label>Arabic description</label>
                                <textarea class="form-control" name="ar_description">{{$profile->arabic()->description}}</textarea>
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