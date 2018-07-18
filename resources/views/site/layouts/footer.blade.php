<!--Start Footer
                ==========================================-->
<footer class="section-setting footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <div class="widget-title">Products</div>
                    <div class="widget-content">
                        <ul class="useful-link">
                            @foreach($allProducts as $product)
                                <li class="col-md-12 col-sm-6"><a href="{{route('site.products.single' ,['id' => $product->slug])}}">{{$product->translated()->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <div class="widget-title">follow us</div>
                    <div class="widget-content">
                        <ul class="useful-link">
                            @foreach($links as $link)
                                <li><a href="{{$link->link}}" target="_blank"><i class="{{$link->icon}}"></i>{{$link->translated()->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-title">Newsletter</div>
                    <div class="widget-content">
                        <div class="subscribe-form">
                            <div class="alert alert-success hidden " id="headLogActionSuccess"></div>
                            <div class="alert alert-danger hidden " id="headLogActionError"></div>
                            <form class="subscribe-form" action="{{route('site.subscribe')}}" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email">
                                    <button class="icon-btn" type="submit">
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="widget-title">Location</div>
                    <div class="widget-content">
                        <div class="map">
                            <iframe src={{$map->link}}" width="100%" height="150px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>