@extends('student.layouts.template')
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

<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br>
   <ol class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="{{url('/student/'.$name.'/forum')}}" style="background-color:#f5f5f5; "><font color=blue>Forum</font></a></li>
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
                    <a href="{{url('student/'.$name.'/forum/thread/'.$category->id.'/new')}}" class="btn btn-success btn-xs pull-right">Add Thread</a>
                </div>
            </div>

            
            <div class="panel-body panel-list-group">
                 <div class="list-group">
                @foreach($threads as $thread)
                  <a href="{{url('student/'.$name.'/forum/thread/'.$thread->id)}}" class="list-group-item">{{$thread->title}}</a>
                @endforeach
                </div>
            </div>

        </div>
        
      
    </div>
    


     

@stop

@section('scripts')
     @section('scripts')
     
     
@stop
