@extends('site.layouts.master')
@section('title')
    Products
@endsection
@section('content')
    <div class="page-head ">
        <img src="{{asset('storage/uploads/banners/'.$banners[5]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">{{$category->translated()->name}}</li>
                            <div class="clearfix"></div>
                            <h3>{{$category->translated()->name}}</h3>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting fire-ext">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="big-head">
                            {{$category->translated()->name}}
                        </div>
                        @foreach(explode("\n" , $category->translated()->description) as $description)
                            <div class="info-text">
                                {{$description}}
                            </div>
                        @endforeach
                    </div>
                    <div class="spacer-15"></div>
                    @foreach($category->products as $product)
                        <div class="col-md-3 col-sm-6 ">
                            <a href="{{route('site.products.single' ,['id' => $product->slug])}}" class="prod-item">
                                <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                                <div class="head-title">{{$product->translated()->name}}</div>
                            </a>
                        </div>
                    @endforeach
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
@endsection
