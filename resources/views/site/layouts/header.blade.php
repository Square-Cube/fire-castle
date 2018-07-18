<!--Header
            ==========================================-->
<header class="header">
    <div class="container-fluid">
        <a href="{{route('site.index')}}" class="logo">
            <img src="{{asset('assets/site/images/logo.png')}}">
        </a>
        <button class="btn btn-responsive-nav" data-toggle="collapse" data-target=".nav-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
    </div><!--End Logo-->
    <div class="navbar-collapse nav-main-collapse collapse">
        <div class="container-fluid">
            <nav class="nav-main">
                <ul class="nav navbar-nav">
                    <li class="@if(Request::route()->getName() == 'site.index'){{'active'}}@endif"><a href="{{route('site.index')}}">home</a></li>
                    <li class="@if(Request::route()->getName() == 'site.about'){{'active'}}@endif"><a href="{{route('site.about')}}">About </a></li>
                    <li class="dropdown @if(Request::route()->getName() == 'site.products' || Request::route()->getName() == 'site.products.single' || Request::route()->getName() == 'site.category'){{'active'}}@endif">
                        <a href="#" data-toggle="dropdown">products</a>
                        <ul class="dropdown-menu full-width">
                            <div class="mega-menu-content">
                                <div class="row">
                                    @foreach($categories as $category)
                                        @if($category->parent_id == 0 )
                                            <div class="col-md-4">
                                                <a href="{{route('site.category',['id' => $category->slug])}}" class="mega-menu-item">
                                                    <img src="{{asset('storage/uploads/categories/'.$category->image)}}">
                                                    <div class="head-title">{{$category->translated()->name}}</div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="@if(Request::route()->getName() == 'site.projects'){{'active'}}@endif"><a href="{{route('site.projects')}}">our clients </a></li>
                    <li class="@if(Request::route()->getName() == 'site.news' || Request::route()->getName() == 'site.news.single'){{'active'}}@endif"><a href="{{route('site.news')}}">News </a></li>
                    <li class="@if(Request::route()->getName() == 'site.events' || Request::route()->getName() == 'site.events.single'){{'active'}}@endif"><a href="{{route('site.events')}}">Events </a></li>
                    <li class="@if(Request::route()->getName() == 'site.careers'){{'active'}}@endif"><a href="{{route('site.careers')}}">Career </a></li>
                    <li class="@if(Request::route()->getName() == 'site.contact'){{'active'}}@endif"><a href="{{route('site.contact')}}"> Contact us</a></li>
                </ul><!--End .nav navbar-nav -->
            </nav>
        </div><!--End Container-->
    </div><!--End navbar-collapse-->
</header><!--End Header-->
