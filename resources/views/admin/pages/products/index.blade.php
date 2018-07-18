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
                        <form action="{{route('admin.products' ,['id' => $id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">product banner</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer; height: 250px;" title="Pick an image">
                                <input type="file" style="display:none;" name="banner">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 1920*500</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-12">
                                <label  for="display-name">product logo</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer; width: 128px;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 555*459</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>product name in english</label>
                                <input type="text" class="form-control" name="en_name" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" >
                            </div>
                            
                            <div class="spacer-15"></div>

                            <div class="form-group col-sm-6">
                                <label>product description in english</label>
                                <textarea class="form-control" name="en_description" ></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product description in arabic</label>
                                <textarea class="form-control" name="ar_description" ></textarea>
                            </div>


                            <div class="form-group col-sm-6">
                                <label>product specification in english</label>
                                <textarea class="form-control tiny-editor"></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>product specification in arabic</label>
                                <textarea class="form-control tiny-editor"></textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>product features in english</label>
                                <textarea class="form-control tiny-editor"></textarea>
                            </div>
                            
                            
                            <div class="form-group col-sm-6">
                                <label>product features in arabic</label>
                                <textarea class="form-control tiny-editor"></textarea>
                            </div>


                            <div class="form-group col-sm-6">
                                <label>Show in home</label>
                                <select class="form-control" name="in_home">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                
                                <th>product name in english</th>
                                <th>product name in arabic</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="ticket-tr">
                                    <td>
                                        {{$product->english()->name}}
                                    </td>
                                    <td>
                                        {{$product->arabic()->name}}
                                    </td>
                                    
                                    <td>
                                        {{$product->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.products.edit',['id' => $product->id])}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></a>
                                        <a data-url="{{route('admin.products.delete',['id' => $product->id])}}" class="btn btn-danger btndelet btn" title="Delete"><i class="fa fa-trash-o"> </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->
@endsection