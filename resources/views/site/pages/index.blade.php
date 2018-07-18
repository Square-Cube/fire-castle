@extends('site.layouts.master')
@section('title')
    Home page
@endsection
@section('content')
    <!--Start Welcome-home
                ==========================================-->
    <section id="welcome-home" class="wel">
         
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="heading">
                        <div class="head-title">{{$section->translated()->title1}}</div>
                        <div class="big-head">{{$section->translated()->title2}}</div>
                        <a href="{{asset('storage/uploads/logo/'.$section->profile)}}" download>
                            download profile <img src="{{asset('assets/site/images/arrow-down.png')}}">
                        </a>
                    </div>
                    <ul class="quick-guid">
                        @foreach($categories as $index => $category)
                            @if($category->parent_id == 0)
                                <li class="col-md-4 col-sm-4 quick-guid-item">
                                    <a href="{{route('site.category',['id' => $category->slug])}}" class="block-item">
                                        <div class="head-title">{{$category->translated()->name}}</div>
                                        <div class="info-text">
                                            {{str_limit($category->translated()->description,150)}}
                                        </div>
                                        <img src="{{asset('assets/site/images/arrow-left.png')}}">
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div> <!--End Row-->
        </div><!--End Container-->
    </section><!--End Section-->
    <div class="page-content">
        <section class="section-setting about">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="head-title wow fadeInUp">{{$section->translated()->title3}}</div>
                        <div class="info-text wow fadeInUp">
                            {{$section->translated()->description}}
                        </div>
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
        <div class="clearfix"></div>
        <section class="section-setting hint">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-6 hint-bc">
                        <div class="hose">
                            <div class="head-title wow fadeIn">{{$section->translated()->title4}}</div>
                            <div class="call wow fadeInUp">
                                <div class="info-text">
                                    <i  class="fa fa-phone-volume"></i>
                                    {{$section->translated()->title5}}
                                </div>
                                {{$section->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 blocks">
                        @foreach($products as $product)
                            <a href="{{route('site.products.single' ,['id' => $product->slug])}}" class="col-sm-4 block-item wow fadeIn">
                                <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                                <div class="block-item-cont">
                                    <div class="head-title">{{$product->translated()->name}}</div>
                                    <div class="info-text">
                                        {{str_limit($product->translated()->description ,30)}}
                                    </div>
                                </div>
                                <img class="icon-link" src="{{asset('assets/site/images/arrow-left.png')}}">
                            </a>
                        @endforeach
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section><!--End Section-->
        <div class="clearfix"></div>
        <!-- brands
        ===================================-->
        <section class="section-setting">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme text-center logos-list">
                            @foreach($partners as $partner)
                                <div class="carousel-item"><img src="{{asset('storage/uploads/partners/'.$partner->image)}}"></div>
                            @endforeach
                        </div>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
        </section><!--End section-->
    </div><!--End Page Content-->
@endsection