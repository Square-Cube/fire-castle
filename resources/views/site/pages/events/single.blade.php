@extends('site.layouts.master')
@section('title')
    Single event
@endsection
@section('content')
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
                            <li><a href="{{route('site.events')}}">events</a></li>
                            <li class="active">{{$event->translated()->name}}</li>
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
                    <div class="col-sm-12 ">
                        <div class="news-item">
                            <div class="news-item-title">
                                {{$event->translated()->name}}
                            </div>
                            <div class="news-item-info date">{{$event->created_at->format('d,M Y')}}</div>
                            <div class="spacer-15"></div>
                            <div class="col-sm-5">
                                <img src="{{asset('storage/uploads/events/'.$event->image)}}">
                            </div>
                            <div class="col-sm-7 news-item-info only-news-info">
                                @foreach(explode("\n" ,$event->translated()->description) as $description)
                                    {{$description}}
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection
