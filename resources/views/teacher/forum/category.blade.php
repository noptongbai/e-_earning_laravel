@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<br>  
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                        <div class="alert alert alert-danger">{{Session::get('fail')}}</div>
                    @endif          
<input type="hidden" id="club-id" value="{{$name}}" />  
<form action="{{url('/teacher/upload/action')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br>
   <ol class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="{{url('/teacher/'.$name.'/forum')}}" style="background-color:#f5f5f5; "><font color=blue>Forum</font></a></li>
  <li class="active">{{$category->title}}</li>
</ol>
   <br>
    <div class="row page-header">
        <div class="col-sm-12">

            <h1 class="">Forum {{$category->title}}</h1>
        
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="clearfix">
                    <h3 class="panel-title pull-left">{{$category->title}}</h3>
                    <a id="{{$category->id}}" href="#" data-toggle="modal" data-target="#category_delete" class="btb btn-danger btn-xs pull-right delete_category">Delete</a>
                    <a href="{{url('teacher/'.$name.'/forum/thread/'.$category->id.'/new')}}" class="btn btn-success btn-xs pull-right">Add Thread</a>
                </div>
            </div>

            
            <div class="panel-body panel-list-group">
                 <div class="list-group">
                @foreach($threads as $thread)
                  <a href="{{url('teacher/'.$name.'/forum/thread/'.$thread->id)}}" class="list-group-item">{{$thread->title}}</a>
                @endforeach
                </div>
            </div>

        </div>
        
      
    </div>
   
</form>

     <div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Delete Category</h4>
                </div>
                <div class="modal-body">
                     <h3>Are you sure to delete this category</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <a href="#" type="button" class="btn btn-primary" id="btn_delete_category">Delete</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
     @section('scripts')
       <script src="{{asset('/assets/js/app.js')}}"></script>
     
@stop
