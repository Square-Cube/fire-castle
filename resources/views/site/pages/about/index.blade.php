@extends('site.layouts.master')
@section('title')
    About us
@endsection
@section('content')
    <!--Start Page Heading
                ==========================================-->
    <div class="page-head ">
        <img src="{{asset('storage/uploads/banners/'.$banners[6]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="page-guid">
                            <li class="custom-scroll">
                                <a href="#message_form_ceo">a message form ceo<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="custom-scroll">
                                <a href="#company_profile">company profile<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="custom-scroll">
                                <a href="#mission_and_vision">mission and vision<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="custom-scroll">
                                <a href="#our_value">our value<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="custom-scroll">
                                <a href="#Integrated_Management_System_Policy">
                                    Integrated Management System Policy<i class="fa fa-angle-down"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting about-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 " id="message_form_ceo">
                        <div class="big-head">{{$message->translated()->title}}</div>
                        @foreach(explode("\n" , $message->translated()->description) as $description)
                            <div class="info-text">
                                {{$description}}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4 ">
                        <div class="chirman">
                            <img src="{{asset('storage/uploads/messages/'.$message->image)}}">
                            <span>{{$message->translated()->name}}</span>
                            <span>{{$message->translated()->job}}</span>
                        </div>
                    </div>
                    <div class="col-md-12 " id="company_profile">
                        <div class="big-head">Company Profile</div>
                        <div class="spacer-15"></div>
                        <div class="company-profile">
                            <div class="company-profile-info">
                                {{$profile->translated()->title}}
                            </div>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12 ">
                        @foreach(explode("\n" , $profile->translated()->description) as $description)
                            <div class="info-text">
                                {{$description}}
                            </div>
                        @endforeach
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12 " id="mission_and_vision">
                        <div class="big-head">Mission and Vision</div>
                        <div class="about-bc">
                            <div class="head-title">Mission</div>
                            <div class="info-text">
                                {{$about->translated()->mission}}
                            </div>
                            <div class="head-title">Vision</div>
                            <div class="info-text">
                                {{$about->translated()->vision}}
                            </div>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12 " id="our_value">
                        <div class="big-head">Our Values</div>
                        <ul class="value-lists">
                            @foreach($ourValues as $ourValue)
                                <li class="col-md-3 col-sm-6 value-item">
                                    <img src="{{asset('storage/uploads/ourValue/'.$ourValue->image)}}">
                                    <div class="head-title">{{$ourValue->translated()->title}}</div>
                                    <div class="info-text">
                                        {{$ourValue->translated()->description}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12 " id="Integrated_Management_System_Policy">
                        <div class="big-head">Integrated Management System Policy</div>
                        <div class="about-bc">
                            @foreach(explode("\n" , $about->translated()->policy) as $description)
                                <div class="info-text">
                                    {{$description}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection