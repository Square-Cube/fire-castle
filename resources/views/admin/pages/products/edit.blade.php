@extends('admin.layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Products</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Products</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.products.edit' ,['id' => $product->id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">product banner</label>
                                @if($product->banner == null)
                                    <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer; width: 128px;" title="Pick an image">
                                @else
                                    <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/products/'.$product->banner)}}" style="cursor:pointer; height: 250px;" title="Pick an image">
                                @endif
                                <input type="file" style="display:none;" name="banner">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 1920*500</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-12">
                                <label  for="display-name">product logo</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/products/'.$product->image)}}" style="cursor:pointer; width: 214px;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 555*459</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>product name in english</label>
                                <input type="text" class="form-control" name="en_name" value="{{$product->english()->name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" value="{{$product->arabic()->name}}">
                            </div>
                            
                            <div class="spacer-15"></div>
                            
                            <div class="form-group col-sm-6">
                                <label>product description in english</label>
                                <textarea class="form-control" name="en_description" >{{$product->english()->description}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product description in arabic</label>
                                <textarea class="form-control" name="ar_description" >{{$product->arabic()->description}}</textarea>
                            </div>


                            <div class="form-group col-sm-6">
                                <label>product specification in english</label>
                                <textarea class="form-control tiny-editor">{{$product->english()->specifications}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product specification in arabic</label>
                                <textarea class="form-control tiny-editor">{{$product->arabic()->specifications}}</textarea>
                            </div>


                            <div class="form-group col-sm-6">
                                <label>product features in english</label>
                                <textarea class="form-control tiny-editor">{{$product->english()->features}}</textarea>
                            </div>
                            
                            
                            <div class="form-group col-sm-6">
                                <label>product features in arabic</label>
                                <textarea class="form-control tiny-editor">{{$product->arabic()->features}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Show in home</label>
                                <select class="form-control" name="in_home">
                                    <option value="1" @if($product->in_home == 1){{'selected'}}@endif>Yes</option>
                                    <option value="0" @if($product->in_home == 0){{'selected'}}@endif>No</option>
                                </select>
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