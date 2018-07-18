@extends('admin.layouts.master')
@section('title')
    news
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>News</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">News</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.news.edit' ,['id' => $news->id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/news/'.$news->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 445*295</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>news name in english</label>
                                <input type="text" class="form-control" name="en_name" value="{{$news->english()->name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>news name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" value="{{$news->arabic()->name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>news description in english</label>
                                <textarea class="form-control" name="en_description" >{{$news->english()->description}}</textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>news description in arabic</label>
                                <textarea class="form-control" name="ar_description" >{{$news->arabic()->description}}</textarea>
                            </div>


                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!--End Content-->
@endsection