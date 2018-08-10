@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')


<form action="{{url('/teacher/'.$name.'/edit/detail/'.$test->id)}}" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Update Test</h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">

  <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"> 
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Name<input id="name" name="name" value="{{$test->name}}" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  Total Articles
  <input id="total" value="{{$test->quantity}}" placeholder="Enter total number of questions" class="form-control input-md" type="number" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  Add more articles
  <input id="total" name="total" value="0" placeholder="Enter total number of questions" class="form-control input-md" type="number" >
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
    @if($test->type==1)
 Type<input type="text" value="Type choice" class="form-control input-md" readonly>
    @elseif($test->type==2)
Type<input type="text" value="Type right wrong" class="form-control input-md" readonly>
    @else
Type<input type="text" value="Type fill answer" class="form-control input-md" readonly>
    @endif
</div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
   Time<input id="time" name="time" value="{{$test->time}}" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
  </div>
</div>





<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>







@stop
@section('scripts')
     @section('scripts')
@stop
