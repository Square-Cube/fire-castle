@extends('admin.layouts.master')
@section('title')
    Events
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Events</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Events</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.events')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">Image</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 445*295</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>Event name in english</label>
                                <input type="text" class="form-control" name="en_name" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Event name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" >
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Event description in english</label>
                                <textarea class="form-control" name="en_description" ></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Event description in arabic</label>
                                <textarea class="form-control" name="ar_description" ></textarea>
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
                        <table id="datatableX"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                <th>No.</th>
                                <th>events name in english</th>
                                <th>events name in arabic</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $index => $event)
                                <tr class="ticket-tr">
                                    <td>
                                        {{$index+1}}
                                    </td>
                                    <td>
                                        {{$event->english()->name}}
                                    </td>
                                    <td>
                                        {{$event->arabic()->name}}
                                    </td>
                                    <td>
                                        {{$event->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.events.edit',['id' => $event->id])}}" class="icon-btn green-bc" title="Edit"> <i class="fa fa-edit"> </i></a>
                                        <a data-url="{{route('admin.events.delete',['id' => $event->id])}}" class="icon-btn red-bc btndelet" title="Delete"><i class="fas fa-trash-alt"> </i></a>
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