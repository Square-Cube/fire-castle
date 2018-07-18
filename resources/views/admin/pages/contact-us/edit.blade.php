@extends('admin.layouts.master')
@section('title')
    Contact us sections
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Contact us sections</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Contact us sections</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.contact.section.edit',['id' => $section->id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            
                            <div class="form-group col-sm-6">
                                <label>Branch name in english</label>
                                <input class="form-control" name="en_branch" value="{{$section->english()->branch}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Branch name in arabic</label>
                                <input class="form-control" name="ar_branch" value="{{$section->arabic()->branch}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Address in english</label>
                                <input class="form-control" name="en_address" value="{{$section->english()->address}}">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Address in arabic</label>
                                <input class="form-control" name="ar_address" value="{{$section->arabic()->address}}">
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <div class="form-group col-sm-6">
                                <label>Phone number</label>
                                <input class="form-control" name="phone" value="{{$section->phone}}">
                            </div>
                             <div class="form-group col-sm-6">
                                <label>Mobile</label>
                                <input class="form-control" name="mobile" value="{{$section->mobile}}">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email" value="{{$section->email}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Website</label>
                                <input class="form-control" name="website" value="{{$section->website}}">
                            </div>
                            
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->

@endsection
