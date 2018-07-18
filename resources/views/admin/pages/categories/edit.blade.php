@extends('admin.layouts.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Category</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Category</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.categories.edit',['id' => $category->id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Category banner</label>
                                @if($category->banner != null)
                                    <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/categories/'.$category->banner)}}" style="cursor:pointer;" title="Pick an image">
                                @else
                                    <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                @endif
                                <input type="file" style="display:none;" name="banner">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 1920*500</div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group col-sm-12">
                                <label  for="display-name">Category image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/categories/'.$category->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 255*170</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>category name in english</label>
                                <input type="text" class="form-control" name="en_name" value="{{$category->english()->name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>category name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" value="{{$category->arabic()->name}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>category description in english</label>
                                <textarea class="form-control" name="en_description" >{{$category->english()->description}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>category description in arabic</label>
                                <textarea class="form-control" name="ar_description" >{{$category->arabic()->description}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Main category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0" @if($category->parent_id == 0){{'selected'}}@endif>Main category</option>
                                    @foreach($categories as $singleCategory)
                                        @if($singleCategory->parent_id == 0)
                                            <option value="{{$singleCategory->id}}" @if($singleCategory->id == $category->parent_id){{'selected'}}@endif>{{$singleCategory->english()->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Content-->
@endsection