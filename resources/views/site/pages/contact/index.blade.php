@extends('site.layouts.master')
@section('title')
    Contact us
@endsection
@section('content')
    <div class="page-head">
        <img src="{{asset('storage/uploads/banners/'.$banners[0]->image)}}">
    </div>
    <div class="clearfix"></div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('site.index')}}">Home</a></li>
                            <li class="active">contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-setting career">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                          <div class="big-head">Contacts us</div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12">
                        <iframe src="{{$map->link}}" width="100%" height="350px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-6">
                        <div class="career-form">

                            <div class="alert alert-success hidden headLogActionSuccess" ></div>
                            <div class="alert alert-danger hidden headLogActionError" ></div>

                            <form class="contact-form" action="{{route('site.contact.index')}}" method="post" enctype="multipart/form-data">

                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>Name :</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    <input class="form-control" type="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label>Phone Number :</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>

                                <div class="form-group">
                                    <label>Message :</label>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>

                                <div class="form-group text-right">
                                    <button class="custom-btn" type="submit">send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 contact-info">
                        @foreach($sections as $section)
                        <div class="contact-info-wrap">
                            <div class="info-text cor">{{$section->translated()->branch}}</div>
                            <div class="info-text"><i class="fa fa-map-marker"></i>Address : {{$section->translated()->address}}</div>
                            <div class="info-text"><i class="fa fa-phone"></i>Phone : {{$section->phone}}</div>
                            @if($section->mobile != null)
                                <div class="info-text"><i class="fa fa-phone"></i>Mobile : {{$section->mobile}}</div>
                            @endif
                            <div class="info-text"><i class="fa fa-envelope"></i>Email : {{$section->email}}</div>
                            @if($section->website != null)
                                <div class="info-text"><i class="fa fa-phone"></i>Website : {{$section->website}}</div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div> <!--End Row-->
            </div><!--End Container-->
        </section>

    </div>
@endsection
