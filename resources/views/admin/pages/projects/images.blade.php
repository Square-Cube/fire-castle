@extends('admin.layouts.master')
@section('title')
    Gallery
@endsection
@section('modals')
    @foreach($images as $image)
        <div class="modal fade" id="edit_step{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit image</h5>
                    </div>
                    <form action="{{route('admin.projects.images.edit',['id' => $image->id])}}" method="post" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/projects/'.$image->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 465 * 320</div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="custom-btn green-bc addBTN">save</button>
                            <button type="button" class="custom-btn" data-dismiss="modal">close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Gallery</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Gallery</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget" >
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.projects.images',['id' => $id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 465 * 320</div>
                            </div>
                            <div class="col-sm-12 form-group text-center">
                                <button class="custom-btn addBTN" type="submit">Add image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget" >
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr class="ticket-tr">
                                        <td>
                                            <img class="table-img "  alt="user-image" src="{{asset('storage/uploads/projects/'.$image->image)}}" >
                                        </td>
                                        <td>{{$image->created_at->diffForHumans()}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit_step{{$image->id}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></button>
                                            <a data-url="{{route('admin.projects.images.delete',['id' => $image->id])}}" class="btn btn-danger btndelet btn"> <i class="fas fa-trash-alt"> </i></a>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Content-->

@endsection