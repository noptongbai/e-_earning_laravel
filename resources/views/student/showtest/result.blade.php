@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

<form action="{{url('/student/upload/action')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Result <a class="btn btn-default pull-right" href="{{url('/student/'.$name.'/showtest')}}" title="Back" style="background-color: transparent;">Back</a></h1>
        </div>
     
      
           
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
                
                  <div class="panel">
<center><h1 class="title" style="color:#660033">Test Name : {{$test->name}}</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
                   <tr style="color:#66CCFF"><td>Total Articles</td><td>{{$test->quantity}}</td></tr>
                   @if($test->type==3)
       <tr style="color:#99cc32"><td>Successfully submitted &nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td></td></tr> 
      <tr style="color:red"><td></td><td></td></tr>
      
                  @else
                          <tr style="color:#99cc32"><td>Correct &nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>{{$score}}</td></tr> 
      <tr style="color:red"><td>Incorrect&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>{{($test->quantity)-($score)}}</td></tr>
      <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>{{$score}}</td></tr>

                  @endif

                </div>
 
            </div>
        </div>
    </div>
</form>
@stop
@section('scripts')
     @section('scripts')
        <script type="text/javascript" src="{{asset('/assets/js/lightbox.js') }}"></script>
@stop
