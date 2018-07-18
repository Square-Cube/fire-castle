@extends('admin.layouts.master')
@section('title')
    projects
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>projects</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">projects</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.projects.edit' ,['id' => $project->id])}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">project logo</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('storage/uploads/projects/'.$project->image)}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 363 *310</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-sm-6">
                                <label>project name in english</label>
                                <input type="text" class="form-control" name="en_name" value="{{$project->english()->name}}">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>project name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" value="{{$project->arabic()->name}}">
                            </div>


                            <div class="form-group col-sm-6">
                                <label>project description in english</label>
                                <textarea class="form-control" name="en_description" >{{$project->english()->description}}</textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>project description in arabic</label>
                                <textarea class="form-control" name="ar_description" >{{$project->arabic()->description}}</textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>project location</label>
                                <select class="form-control" name="location_id">
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}" @if($project->id == $location->id){{'selected'}}@endif>{{$location->english()->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Content-->
@endsection