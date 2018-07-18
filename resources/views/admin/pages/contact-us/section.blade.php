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
                        <form action="{{route('admin.settings.map')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            <div class="form-group col-sm-6">
                                <label>Map url</label>
                                <input type="text" class="form-control" name="link" value="{{$map->link}}">
                            </div>

                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form action="{{route('admin.contact.section')}}" method="post" enctype="multipart/form-data" onsubmit="return false;">
                            {!! csrf_field() !!}
                            
                            <div class="form-group col-sm-6">
                                <label>Branch name in english</label>
                                <input class="form-control" name="en_branch">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Branch name in arabic</label>
                                <input class="form-control" name="ar_branch">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Address in english</label>
                                <input class="form-control" name="en_address">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Address in arabic</label>
                                <input class="form-control" name="ar_address">
                            </div>
                            
                            <div class="clearfix"></div>

                            <div class="form-group col-sm-6">
                                <label>Phone number</label>
                                <input class="form-control" name="phone">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Mobile</label>
                                <input class="form-control" name="mobile">
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Website</label>
                                <input class="form-control" name="website">
                            </div>
                            
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn addBTN" type="submit">add new address</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX"  class="table table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                            <thead>
                              <tr class="ticket-tr">
                                  <th>Branch in english</th>
                                  <th>Branch in arabic</th>
                                  <th>Created at</th>
                                  <th>Operations</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $index => $section)
                                <tr class="ticket-tr">
                                    <td>
                                        {{$section->english()->branch}}
                                    </td>
                                    <td>
                                        {{$section->arabic()->branch}}
                                    </td>
                                    <td>
                                        {{$section->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.contact.section.edit',['id' => $section->id])}}" class="icon-btn green-bc" title="Edit"> <i class="fa fa-edit"> </i></a>
                                        <a data-url="{{route('admin.contact.section.delete',['id' => $section->id])}}" class="icon-btn red-bc btndelet" title="Delete"><i class="fas fa-trash-alt"> </i></a>
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
