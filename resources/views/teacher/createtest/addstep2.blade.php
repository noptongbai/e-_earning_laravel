@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

@if($type==1)
<form action="{{url('/teacher/'.$name.'/createtest/savedetail')}}" method="post" >
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$type}}">
<input type="hidden" name="total" value="{{$total}}">
<input type="hidden" name="time" value="{{$time}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Create Test</h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
 <div class="col-md-3"></div><div class="col-md-6"><fieldset>

 
 @for ($i = 1; $i <= $total; $i++)
 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}" class="form-control" placeholder="Write question number {{ $i }} here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}1"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}1" name="{{ $i }}1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}2"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}2" name="{{ $i }}2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}3"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}3" name="{{ $i }}3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}4"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}4" name="{{ $i }}4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i }}" name="ans{{ $i }}" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question {{$i}}</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br /> 
 
@endfor

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>

@elseif ($type==2)

<form action="{{url('/teacher/'.$name.'/createtest/savedetail')}}" method="post" >
<input type="hidden" name="step" value="2">
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$type}}">
<input type="hidden" name="time" value="{{$time}}">
<input type="hidden" name="total" value="{{$total}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Create Test</h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><fieldset>

 
 @for ($i = 1; $i <= $total; $i++)
 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}" class="form-control" placeholder="Write question number {{ $i }} here..."></textarea>  
  </div>
</div>



<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i }}" name="ans{{ $i }}" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question {{$i}}</option>
  <option value="a"> True</option>
  <option value="b"> False</option>
  </select><br /><br /> 
 
@endfor

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>

@elseif ($type==3)

<form action="{{url('/teacher/'.$name.'/createtest/savedetail')}}" method="post" >
<input type="hidden" name="step" value="2">
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$type}}">
<input type="hidden" name="time" value="{{$time}}">
<input type="hidden" name="total" value="{{$total}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Create Test</h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
 <div class="col-md-3"></div><div class="col-md-6"><fieldset>

 
 @for ($i = 1; $i <= $total; $i++)
 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}" class="form-control" placeholder="Write question number {{ $i }} here..."></textarea>  
  </div>
</div>

 
@endfor

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>
@endif
                    
                
                </div>
 
            </div>
        </div>
    </div>
</form>


@stop
@section('scripts')
     @section('scripts')
@stop
