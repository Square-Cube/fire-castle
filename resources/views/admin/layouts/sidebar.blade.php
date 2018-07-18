<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('storage/uploads/logo/'.$settings->site_logo)}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.dashboard')}}">dashbord</a>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.social'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.social')}}">Social links</a>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.banners'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.banners')}}">banners</a>
            </li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.sections' || Request::route()->getName() == 'admin.partners'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer"href="javascript:void(0);">
                    Home page
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.sections')}}">Sections</a>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.partners')}}">Partners</a>
                </ul>
            </li>

            <li class="sub-menu @if(Request::route()->getName() == 'admin.ceo-message'
            || Request::route()->getName() == 'admin.company-profile'
            || Request::route()->getName() == 'admin.about'
            || Request::route()->getName() == 'admin.our-values'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer"href="javascript:void(0);">
                    About us
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.ceo-message')}}">CEO messages</a>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.company-profile')}}">Company profile</a>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.about')}}">About static data</a>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.our-values')}}">Our values</a>
                </ul>
            </li>
            
            <li class="@if(Request::route()->getName() == 'admin.categories'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.categories')}}">Products</a>
            </li>


            
            <li class="sub-menu @if(Request::route()->getName() == 'admin.projects' || Request::route()->getName() == 'admin.locations'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer"href="javascript:void(0);">
                    Projects
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.locations'){{'active'}}@endif">
                        <a rel="nofollow" rel="noreferrer" href="{{route('admin.locations')}}">Location</a>
                    </li>
                    <li class="@if(Request::route()->getName() == 'admin.projects'){{'active'}}@endif">
                        <a rel="nofollow" rel="noreferrer" href="{{route('admin.projects')}}">Projects</a>
                    </li>
                </ul>
            </li>

            <li class="@if(Request::route()->getName() == 'admin.news'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.news')}}">News</a>
            </li>

            <li class="@if(Request::route()->getName() == 'admin.events'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.events')}}">Events</a>
            </li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.careers' || Request::route()->getName() == 'admin.career.section'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer"href="javascript:void(0);">
                    Careers
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.careers')}}">messages</a>
                    <a rel="nofollow" rel="noreferrer" href="{{route('admin.career.section')}}">Section</a>
                </ul>
            </li>

            <li class="@if(Request::route()->getName() == 'admin.contact.section'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.contact.section')}}">Contact us</a>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.subscribtions.index'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.subscribtions.index')}}">Subscribers</a>
            </li>

        </ul>
    </aside>
</div>