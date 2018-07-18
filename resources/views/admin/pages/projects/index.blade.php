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
                        <form action="{{route('admin.projects')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-12">
                                <label  for="display-name">project logo</label>
                                <img class="img-responsive mr-bot-15 btn-product-image"  alt="user-image" src="{{asset('assets/admin/default.png')}}" style="cursor:pointer;" title="Pick an image">
                                <input type="file" style="display:none;" name="image">
                                <div class="text-danger text-center">Please click on image to change it - Please note that image size should be : 363 *310</div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group col-sm-6">
                                <label>project name in english</label>
                                <input type="text" class="form-control" name="en_name" >
                            </div>
                            <div class="form-group col-sm-6">
                                <label>project name in arabic</label>
                                <input type="text" class="form-control" name="ar_name" >
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>project description in english</label>
                                <textarea class="form-control" name="en_description" ></textarea>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>project description in arabic</label>
                                <textarea class="form-control" name="ar_description" ></textarea>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>project location</label>
                                <select class="form-control" name="location_id">
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->english()->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">Add project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="ticket-tr">
                                
                                <th>project name in english</th>
                                <th>project name in arabic</th>
                                <th>Created at</th>
                                <th>Operations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr class="ticket-tr">
                                    <td>
                                        {{$project->english()->name}}
                                    </td>
                                    
                                    <td>
                                        {{$project->arabic()->name}}
                                    </td>
                                    
                                    <td>
                                        {{$project->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.projects.images',['id' => $project->id])}}" class="icon-btn" title="gallery"> <i class="fa fa-image"> </i></a>
                                        <a href="{{route('admin.projects.edit',['id' => $project->id])}}" class="icon-btn green-bc" title="Edit"> <i class="fa fa-edit"> </i></a>
                                        <a data-url="{{route('admin.projects.delete',['id' => $project->id])}}" class="icon-btn red-bc btndelet" title="Delete"><i class="fas fa-trash-alt"> </i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div><!--End Content-->
@endsection