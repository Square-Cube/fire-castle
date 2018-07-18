@extends('site.layouts.master')
@section('title')
    Career
@endsection
@section('content')
    <div class="page-head">
        <img src="{{asset('storage/uploads/banners/'.$banners[1]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">home</a></li>
                            <li class="active">career</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting career">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="career-form-wrap">
                            <div class="big-head">Career Submission Form</div>
                            <div class="info-text">
                                Please complete and submit the form below to apply for a position at Fire Castle
                            </div>

                            <div class="alert alert-success hidden headLogActionSuccess" ></div>
                            <div class="alert alert-danger hidden headLogActionError" ></div>

                            <form class="career-form" action="{{route('site.careers.index')}}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>first name :</label>
                                    <input class="form-control" type="text" name="f_name">
                                </div>
                                <div class="form-group">
                                    <label>last name :</label>
                                    <input class="form-control" type="text" name="l_name">
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Phone number :</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>position applying :</label>
                                    <input class="form-control" type="text" name="position">
                                </div>
                                <div class="form-group">
                                    <label>resume :</label>
                                    <div class="upload-block">
                                        <label for="file-upload" class="custom-btn custom-file-upload">
                                            choose file
                                        </label>
                                        <input id="file-upload" type="file" name="resume">
                                        <div class="clearfix"></div>
                                        <span> Valid file formats: jpg, png, pdf, doc, docx</span>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="custom-btn" type="submit">send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="head-title">{{$section->translated()->title}}</div>
                        @foreach(explode("\n" ,$section->translated()->description) as $description)
                            <div class="info-text">
                                {{$description}}
                            </div>
                        @endforeach
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection