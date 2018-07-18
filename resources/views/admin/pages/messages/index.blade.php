@extends('admin.layouts.master')
@section('title')
    Contact us messages
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">

                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="datatableX" class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="ticket-tr">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Created at</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $index => $message)
                                        <tr class="ticket-tr">
                                            <td>{{$index+1}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->phone}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>{{$message->created_at}}</td>
                                            <td>
                                                <a data-url="{{route('admin.messages.delete',['id' => $message->id])}}" class="btn btn-danger btndelet btn">Delete <i class="fa fa-trash-o"> </i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection