@extends('admin.layouts.master')
@section('title')
    Home sections
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Home sections</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Home sections</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.sections')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-6">
                                <label  for="display-name">Banner</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/site/images/bc.jpg')}}" style="cursor:pointer; width: 214px;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger">Please click on image to change it - Please note that image size should be : 1920*530</div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label  for="display-name">Profile PDF</label>
                                <input type="file" name="profile">
                                <div class="text-danger">Please upload only .pdf files</div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="form-group col-sm-6">
                                <label>Banner first title in english</label>
                                <input type="text" class="form-control" name="en_title1" value="{{$section->english()->title1}}">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Banner first title in arabic</label>
                                <input type="text" class="form-control" name="ar_title1" value="{{$section->arabic()->title1}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Banner second title in english</label>
                                <input type="text" class="form-control" name="en_title2" value="{{$section->english()->title2}}">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Banner second title in arabic</label>
                                <input type="text" class="form-control" name="ar_title2" value="{{$section->arabic()->title2}}">
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="form-group col-sm-6">
                                <label>Second section title in english</label>
                                <input type="text" class="form-control" name="en_title3" value="{{$section->english()->title3}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Second section title in arabic</label>
                                <input type="text" class="form-control" name="ar_title3" value="{{$section->arabic()->title3}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Second section description in english</label>
                                <textarea class="form-control" name="en_description">{{$section->english()->description}}</textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Second section description in arabic</label>
                                <textarea class="form-control" name="ar_description">{{$section->arabic()->description}}</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="form-group col-sm-6">
                                <label>Third section title in arabic</label>
                                <input type="text" class="form-control" name="ar_title4" value="{{$section->arabic()->title4}}">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Third section title in english</label>
                                <input type="text" class="form-control" name="en_title4" value="{{$section->english()->title4}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Call now in arabic</label>
                                <input type="text" class="form-control" name="ar_title5" value="{{$section->arabic()->title5}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Call now in english</label>
                                <input type="text" class="form-control" name="en_title5" value="{{$section->english()->title5}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Phone number</label>
                                <input type="text" class="form-control" name="phone" value="{{$section->phone}}">
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