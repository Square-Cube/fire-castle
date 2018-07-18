@extends('site.layouts.master')
@section('title')
    Single product
@endsection
@section('content')
    <div class="page-head">
        <img src="{{asset('storage/uploads/products/'.$product->banner)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li><a href="">{{$product->category->translated()->name}}</a></li>
                            <li class="active">{{$product->translated()->name}}</li>
                            <div class="clearfix"></div>
                            <h3>{{$product->translated()->name}}</h3>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting fire-ext">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-5">
                        <div class="big-head">
                            {{$product->translated()->name}}
                        </div>
                        <div class="product-img">
                            <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                        </div>
                    </div>
                    <div class="col-md-7 text-left tab-wrapper">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">
                                    DESCRIPTION
                                </a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab">
                                    SPECIFICATION
                                </a>
                            </li>
                            <li>
                                <a href="#tab3" data-toggle="tab">
                                    FEATURES
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                @foreach(explode("\n" ,$product->translated()->description) as $description)
                                    <div class="info-text">
                                        {{$description}}
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade in" id="tab2">
                                <div class="table-responsive scrollbar">
                                    {!! $product->translated()->specifications !!}
                                </div>
                            </div>
                            <div class="tab-pane fade in" id="tab3">
                                {!! $product->translated()->features !!}
                            </div>
                        </div>
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection