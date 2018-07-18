@extends('site.layouts.master')
@section('title')
    Events
@endsection
@section('content')
    <!--Start Page Heading
                ==========================================-->
    <div class="page-head ">
        <img src="{{asset('storage/uploads/banners/'.$banners[2]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">events</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting news">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12 ">
                        <div class="big-head">events</div>
                    </div>
                    @foreach($events as $event)
                        <div class="col-sm-4 ">
                            <div class="news-item">
                                <div class="news-item-title">
                                    {{$event->translated()->name}}
                                </div>
                                <div class="news-item-info">
                                    {{str_limit($event->translated()->description ,150)}}
                                </div>
                                <img src="{{asset('storage/uploads/events/'.$event->image)}}">
                                <div class="news-item-action">
                                    <a href="{{route('site.events.single' ,['slug' => $event->slug])}}" class="custom-btn">read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection
