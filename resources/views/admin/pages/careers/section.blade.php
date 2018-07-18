@extends('admin.layouts.master')
@section('title')
    Career sections
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Career sections</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Career sections</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.career.section')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}

                            <div class="form-group col-sm-6">
                                <label>English title</label>
                                <input type="text" class="form-control" name="en_title" value="{{$section->english()->title}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Arabic title</label>
                                <input type="text" class="form-control" name="ar_title" value="{{$section->arabic()->title}}">
                            </div>

                            
                            <div class="form-group col-sm-6">
                                <label>English description</label>
                                <textarea class="form-control" name="en_description">{{$section->english()->description}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Arabic description</label>
                                <textarea class="form-control" name="ar_description">{{$section->arabic()->description}}</textarea>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->

@endsection