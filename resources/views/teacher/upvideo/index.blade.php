@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
                
           
                <div class="row">
                        <div class="col-md-12">
                            <h1>{{$name}}'s Videos<a class="btn btn-default pull-right" href="{{url('/teacher/'.$name.'/upvideo/add')}}" style="background-color: transparent;">Add new video</a></h1> 
                        </div>
                </div>
                <div class="row">
                 <div class="col-md-8">
                        @if($galleries->count()>0)
                            <table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Video</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                        <tbody>
                          @foreach($galleries as $gallery)
                           @if($gallery->id!=0&&$gallery->subject_id==$subject_id)
                           <tr>
                                <td>{{$gallery->name}}
                                    <span class="pull-right">
                                           
                                    </span>
                                </td>
                                  <th><a href="{{url('teacher/'.$name.'/upvideo/view/'.$gallery->id)}}">View</a>
                                   / <a href="{{url('teacher/video/upvideo/delete/'.$gallery->id)}}">Delete</a></th>
                            </tr>
                            @endif
                          @endforeach
                        </tbody>
                    </table>
                        @endif
                </div>

           
        </div>
@stop
@section('scripts')
     @section('scripts')
       
@stop
