@extends('admin.layouts.master')
@section('title')
    Subscribers
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
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $subscriber)
                                        <tr class="ticket-tr">
                                            <td>{{$subscriber->email}}</td>
                                            <td>{{$subscriber->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a data-url="{{route('admin.subscribtions.delete',['id' => $subscriber->id])}}" class="icon-btn red-bc btndelet"><i class="fas fa-trash-alt"> </i></a>
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