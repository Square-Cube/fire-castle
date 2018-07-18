@extends('site.layouts.master')
@section('title')
    Projects
@endsection
@section('content')
    @foreach($projects as $index => $project)
        <div class="modal fade" id="quick-view{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-body quick-view">
                        <div class="col-sm-6 product-img">
                            <div id="product-img-slider" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach($project->images as $index => $image)
                                        <div class="item @if($index == 0){{'active'}}@endif">
                                            <img src="{{asset('storage/uploads/projects/'.$image->image)}}">
                                        </div>
                                    @endforeach
                                </div>
                                <ol class="carousel-indicators">
                                    @foreach($project->images as $index => $image)
                                        <li data-target="#product-img-slider" data-slide-to="{{$index}}" class="@if($index == 0){{'active'}}@endif"></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div><!-- End Product img-->
                        <div class="col-sm-6 product-details">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <a class="title">{{$project->translated()->name}}</a>
                            @foreach(explode("\n" ,$project->translated()->description) as $description)
                                <p>
                                    {{$description}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="page-head ">
        <img src="{{asset('storage/uploads/banners/'.$banners[4]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb row over-vis">
                            <h3 class="col-sm-5">Prestigious Projects</h3>
                            <div class="col-sm-7">
                                <div class="project-filter">
                                    <div class="dropdown local-wrap">
                                        <button class="custom-btn local-btn dropdown-toggle" type="button" id="local" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            choose location <i class="fa fa-angle-down"></i>
                                        </button>
                                        <div class="dropdown-menu local-menu" aria-labelledby="local">
                                            <a class="filter" data-filter="all">all locations</a>
                                            @foreach($locations as $location)
                                                <a class="filter" data-filter=".{{$location->translated()->name}}">{{$location->translated()->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting fire-ext projects-fliter-items">
            <div class="container">
                <div class="row text-center">
                    @foreach($projects as $index => $project)
                        <div class="col-md-3 col-sm-6 mix {{$project->location->translated()->name}}">
                            <div class="proj-item">
                                <div class="proj-img">
                                    <img src="{{asset('storage/uploads/projects/'.$project->image)}}">
                                    <div class="proj-hover">
                                        <div class="proj-title">{{$project->translated()->name}}</div>
                                        <button class="custom-btn"data-toggle="modal" data-target="#quick-view{{$index}}">more details</button>
                                    </div>
                                </div>
                                <a href="#" class="project-title">{{$project->translated()->name}}</a>
                            </div>
                        </div>
                    @endforeach
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>
    </div>
    
@endsection