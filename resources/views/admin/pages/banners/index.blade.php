@extends('admin.layouts.master')
@section('title')
Banners
@endsection
@section('modals')
    @foreach($banners as $banner)
        <div class="modal fade" id="edit_step{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit Banner</h5>
                    </div>
                    <form action="{{route('admin.banners')}}" method="post" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{$banner->id}}">
                        <div class="modal-body">
                            <div class="form-group col-sm-6">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/banners/'.$banner->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 1920*500</div>
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
                <h2>Banners</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Banners</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">

                                <th>Banner</th>
                                <th>Page name</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr class="ticket-tr">
                                    <td>
                                        <img src="{{asset('storage/uploads/banners/'.$banner->image)}}"  style="height: 150px;"   class="img-responsive">
                                    </td>
                                    <td>
                                        {{$banner->flag}}
                                    </td>

                                    <td>
                                        <button data-toggle="modal" data-target="#edit_step{{$banner->id}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></button>
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