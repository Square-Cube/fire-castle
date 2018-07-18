@extends('admin.layouts.master')
@section('title')
    Locations
@endsection
@section('modals')
    @foreach($locations as $location)
        <div class="modal fade" id="edit_step{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit Banner</h5>
                    </div>
                    <form action="{{route('admin.locations.edit',['id' => $location->id])}}" method="post" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="col-sm-6 form-group">
                                <label>English name</label>
                                <input type="text" class="form-control" name="en_name" value="{{$location->english()->name}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Arabic name</label>
                                <input type="text" class="form-control" name="ar_name" value="{{$location->arabic()->name}}">
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
                <h2>Locations</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Locations</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.locations')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            
                            <div class="col-sm-6 form-group">
                                <label>English name</label>
                                <input type="text" class="form-control" name="en_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Arabic name</label>
                                <input type="text" class="form-control" name="ar_name">
                            </div>
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">add</button>
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
                        <table  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                <th>English name</th>
                                <th>Arabic name</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $location)

                                <tr class="ticket-tr">
                                    <td>{{$location->english()->name}}</td>
                                    <td>
                                        {{$location->arabic()->name}}
                                    </td>
                                    <td>{{$location->created_at->diffForHumans()}}</td>
                                    <td>

                                        <button data-toggle="modal" data-target="#edit_step{{$location->id}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></button>
                                        <a data-url="{{route('admin.locations.delete',['id' => $location->id])}}" class="icon-btn red-bc btndelet" title="Delete"> <i class="fas fa-trash-alt"> </i></a>
                                        <div class="text-danger">Please note that if the location is deleted then all projects within it will be too</div>
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