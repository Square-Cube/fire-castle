@extends('site.layouts.master')
@section('title')
    News
@endsection
@section('content')
    <div class="page-head ">
        <img src="{{asset('storage/uploads/banners/'.$banners[3]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">news</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting news">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12 ">
                        <div class="big-head">news</div>
                    </div>
                    @foreach($news as $news)
                        <div class="col-sm-4 ">
                            <div class="news-item">
                                <div class="news-item-title">
                                    {{$news->translated()->name}}
                                </div>
                                <div class="news-item-info">
                                    {{str_limit($news->translated()->description ,150)}}
                                </div>
                                <img src="{{asset('storage/uploads/news/'.$news->image)}}">
                                <div class="news-item-action">
                                    <a href="{{route('site.news.single',['slug' => $news->slug])}}" class="custom-btn">read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection
