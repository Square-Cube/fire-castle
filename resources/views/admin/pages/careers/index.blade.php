@extends('admin.layouts.master')
@section('title')
    Careers messages
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Messages</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Messages</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX" class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                <th>No.</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Position</th>
                                <th>Resume</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($careers as $index => $career)
                                <tr class="ticket-tr">
                                    <td>{{$index+1}}</td>
                                    <td>{{$career->f_name}}</td>
                                    <td>{{$career->l_name}}</td>
                                    <td>{{$career->email}}</td>
                                    <td>{{$career->phone}}</td>
                                    <td>{{$career->position}}</td>
                                    <td><a href="{{asset('storage/uploads/resume/'.$career->resume)}}" download>Resume</a> </td>
                                    <td>{{$career->created_at}}</td>
                                    <td>
                                        <a data-url="{{route('admin.careers.delete',['id' => $career->id])}}" class="icon-btn red-bc btndelet">
                                            <i class="fas fa-trash-alt"> </i></a>
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
@endsection