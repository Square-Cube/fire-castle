@extends('admin.layouts.master')
@section('title')
    Partners
@endsection
@section('modals')
    @foreach($partners as $partner)
        <div class="modal fade" id="edit_step{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit partner</h5>
                    </div>
                    <form action="{{route('admin.partners.edit',['id' => $partner->id])}}" method="post" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/partners/'.$partner->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 156*118</div>
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
                <h2>Partners</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Partners</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.partners')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 156*118</div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Save image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer-15"></div>
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
                                @foreach($partners as $partner)
                                    <tr class="ticket-tr">
                                        <td>
                                            <img src="{{asset('storage/uploads/partners/'.$partner->image)}}"  style="height: 150px;"   class="img-responsive">
                                        </td>
                                        <td>
                                            {{$partner->created_at->diffForHumans()}}
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit_step{{$partner->id}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></button>
                                            <a data-url="{{route('admin.partners.delete',['id' => $partner->id])}}" class="icon-btn red-bc btndelet" title="Delete"> <i class="fas fa-trash-alt"> </i></a>
                                        </td>
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