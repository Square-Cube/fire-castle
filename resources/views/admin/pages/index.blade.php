@extends('admin.layouts.master')
@section('title')
    Home page
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Category::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Categories</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Product::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Products</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Partner::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Partners</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Subscriber::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Subscribers</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Project::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Projects</div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\News::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> News</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Events::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Events</div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Career::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Career</div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="" class="counter">
                            <h3 class="timer" data-to="{{\App\Message::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Messages</div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=1835748769&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=1585388928&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=1965659867&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=858217276&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=1156884379&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=417498636&amp;format=interactive"></iframe>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQlzgQEMcAAppRJHZfreChptQgzdPumJYGYJqr7mTOy_oOB4L4tZCAuAxbhcp4_VKcxqTx3ggBmB6Gm/pubchart?oid=253031183&amp;format=interactive"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
