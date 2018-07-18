@extends('admin.layouts.master')
@section('title')
    CEO message
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>CEO message</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">CEO message</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.ceo-message')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="col-md-8">
                                <div class="form-group col-sm-6">
                                    <label>English title</label>
                                    <input type="text" class="form-control" name="en_title" value="{{$message->english()->title}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Arabic title</label>
                                    <input type="text" class="form-control" name="ar_title" value="{{$message->arabic()->title}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>English CEO name</label>
                                    <input type="text" class="form-control" name="en_name" value="{{$message->english()->name}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Arabic CEO name</label>
                                    <input type="text" class="form-control" name="ar_name" value="{{$message->arabic()->name}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>English CEO job title</label>
                                    <input type="text" class="form-control" name="en_job" value="{{$message->english()->job}}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Arabic CEO job title</label>
                                    <input type="text" class="form-control" name="ar_job" value="{{$message->arabic()->job}}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label  for="display-name">CEO image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/messages/'.$message->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 210 *264</div>
                            </div>
                            <div class="spacer-15"></div>
                            <div class="form-group col-sm-6">
                                <label>English Message</label>
                                <textarea class="form-control" name="en_description">{{$message->english()->description}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Arabic Message</label>
                                <textarea class="form-control" name="ar_description">{{$message->arabic()->description}}</textarea>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->
@endsection