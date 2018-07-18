@extends('admin.layouts.master')
@section('title')
    Social links
@endsection
@section('modals')
    @foreach($links as $link)
        <div class="modal fade" id="edit_step{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit social link</h5>
                    </div>
                    <form action="{{route('admin.social.edit',['id' => $link->id])}}" method="post" onsubmit="return false;">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="form-group col-sm-6">
                                <label >Link title in arabic</label>
                                <input type="text" class="form-control" name="ar_title" value="{{$link->arabic()->title}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label >Link title in english</label>
                                <input type="text" class="form-control" name="en_title" value="{{$link->english()->title}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" value="{{$link->link}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label >Icon</label>
                                <input type="text" class="form-control" name="icon" value="{{$link->icon}}">
                                <span class="text-danger">Please go to this link to get your icon : <a href="https://fontawesome.com/icons?d=gallery" target="_blank">Click here</a></span>
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
                <h2>Social links</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Social links</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.social')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}


                            <div class="form-group col-sm-6">
                                <label >Link title in arabic</label>
                                <input type="text" class="form-control" name="ar_title" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label >Link title in english</label>
                                <input type="text" class="form-control" name="en_title" >
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label >Icon</label>
                                <input type="text" class="form-control" name="icon">
                                <span class="text-danger">Please go to this link to get your icon : <a href="https://fontawesome.com/icons?d=gallery" target="_blank">Click here</a></span>
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

                                <th>Icon</th>
                                <th>Arabic Title</th>
                                <th>English Title</th>
                                <th>Link</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)

                                <tr class="ticket-tr">
                                    <td>
                                        <i class="{{$link->icon}}"></i>
                                    </td>
                                    <td>{{$link->arabic()->title}}</td>
                                    <td>{{$link->english()->title}}</td>
                                    <td>{{$link->link}}</td>
                                    <td>{{$link->created_at->diffForHumans()}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#edit_step{{$link->id}}" class="btn btn-primary" title="Edit"> <i class="fa fa-edit"> </i></button>
                                        <a data-url="{{route('admin.social.delete',['id' => $link->id])}}" class="btn btn-danger btndelet btn">Delete <i class="fa fa-trash-o"> </i></a>
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