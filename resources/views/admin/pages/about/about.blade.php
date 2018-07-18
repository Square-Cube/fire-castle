@extends('admin.layouts.master')
@section('title')
    Vision ,Mission & Policy
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Vision ,Mission & Policy</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Vision ,Mission & Policy</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.about')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-6">
                                <label>English vision</label>
                                <textarea class="form-control" name="en_vision">{{$about->english()->vision}}</textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Arabic vision</label>
                                <textarea class="form-control" name="ar_vision">{{$about->arabic()->vision}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>English mission</label>
                                <textarea class="form-control" name="en_mission">{{$about->english()->mission}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Arabic mission</label>
                                <textarea class="form-control" name="ar_mission">{{$about->arabic()->mission}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>English policy</label>
                                <textarea class="form-control" name="en_policy">{{$about->english()->policy}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Arabic policy</label>
                                <textarea class="form-control" name="ar_policy">{{$about->arabic()->policy}}</textarea>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->
@endsection