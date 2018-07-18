@extends('admin.layouts.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Add category</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Add category</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.categories')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Category image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 255*170</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Banner image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="banner">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 1920*500</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>category name in english</label>
                                <input type="text" class="form-control" name="en_name" >
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>category name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" >
                            </div>

                            <div class="form-group col-sm-6">
                                <label>category description in english</label>
                                <textarea class="form-control" name="en_description" ></textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>category description in arabic</label>
                                <textarea class="form-control" name="ar_description" ></textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Main category</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Main category</option>
                                    @foreach($categories as $category)
                                        @if($category->parent_id == 0)
                                            <option value="{{$category->id}}">{{$category->english()->name}}</option>
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

        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatable"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                <th>NO</th>
                                <th>category name in arabic</th>
                                <th>category name in english</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $index => $category)
                                
                                <tr class="ticket-tr">
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        {{$category->arabic()->name}}
                                    </td>
                                    <td>
                                        {{$category->english()->name}}
                                    </td>
                                    <td>
                                        @if($category->parent_id == 0)
                                            Main category
                                            @else
                                            Sub Category
                                        @endif
                                    </td>
                                    <td>
                                        {{$category->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        @if($category->parent_id != 0)
                                            <a href="{{route('admin.products',['id' => $category->id])}}" class="icon-btn" title="products"> <i class="fa fa-list"> </i></a>
                                        @endif
                                        <a href="{{route('admin.categories.edit',['id' => $category->id])}}" class="icon-btn green-bc" title="Edit"> <i class="fa fa-edit"> </i></a>
                                        <a data-url="{{route('admin.categories.delete',['id' => $category->id])}}" class="icon-btn red-bc btndelet" title="Delete"><i class="fas fa-trash-alt"> </i></a>
                                        <div class="text-danger">Please note that if the category is deleted then all products within it will be too</div>
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