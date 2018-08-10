@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
    textarea {
    white-space: normal;
    text-align: justify;
    -moz-text-align-last: left; /* Firefox 12+ */
    text-align-last: left;
    }
    </style>
@stop
@section('content')

@if($test->type==1)
<form action="{{url('/teacher/'.$name.'/edit/savedetail/'.$test->id)}}" method="post" >
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$test->type}}">
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

 

<?php $i=1; ?>
 @foreach($question as $qns)

 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
  
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "> <a  href="{{url('/teacher/'.$name.'/delete/'.$qns->id)}}" class="btb btn-danger btn-xs pull-right delete_category">Delete</a></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}"  class="form-control" class="form-control" placeholder="Write question number {{ $i + $question->count() }} here...">{{$qns->question}}
  </textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}1"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}1" value="{{$data["answer1".$i]->answer}}" name="{{ $i }}1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}2"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}2" value="{{$data["answer2".$i]->answer}}" name="{{ $i }}2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}3"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}3" value="{{$data["answer3".$i]->answer}}" name="{{ $i }}3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}4"></label>  
  <div class="col-md-12">
  <input id="{{ $i }}4" value="{{$data["answer4".$i]->answer}}" name="{{ $i }}4" placeholder="Enter option d" class="form-control input-md" type="text">
  
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i }}" name="ans{{ $i }}" placeholder="Choose correct answer " class="form-control input-md" >
  @if($qns->answer=="a")
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br /> 
  @elseif($qns->answer=="b")
 
  <option value="b">option b</option>
  <option value="a">option a</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br /> 
  @elseif($qns->answer=="c")
  <option value="c">option c</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="d">option d</option> </select><br /><br /> 
  @else
  <option value="d">option d</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option> </select><br /><br /> 
  @endif
  <?php $i++; ?>
  @endforeach
  @for ($i = 1; $i<= $total; $i++)
  <b>Question number&nbsp;{{ $i + $question->count() }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i + $question->count()}}" class="form-control" placeholder="Write question number {{ $i + $question->count() }} here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i + $question->count() }}1"></label>  
  <div class="col-md-12">
  <input id="{{ $i + $question->count() }}1" name="{{ $i + $question->count() }}1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i + $question->count() }}2"></label>  
  <div class="col-md-12">
  <input id="{{ $i  + $question->count()}}2" name="{{ $i + $question->count() }}2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i + $question->count() }}3"></label>  
  <div class="col-md-12">
  <input id="{{ $i  + $question->count()}}3" name="{{ $i  + $question->count()}}3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i + $question->count() }}4"></label>  
  <div class="col-md-12">
  <input id="{{ $i + $question->count() }}4" name="{{ $i + $question->count() }}4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i + $question->count()}}" name="ans{{ $i + $question->count() }}" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question {{$i+$question->count()}}</option>
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

@elseif ($test->type==2)

<form action="{{url('/teacher/'.$name.'/edit/savedetail/'.$test->id)}}" method="post" >
<input type="hidden" name="step" value="2">
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$test->type}}">
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

 


 <?php $i=1; ?>
 @foreach($question as $qns)

 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "> <a  href="{{url('/teacher/'.$name.'/delete/'.$qns->id)}}" class="btb btn-danger btn-xs pull-right delete_category">Delete</a></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}"  class="form-control" class="form-control" placeholder="Write question number {{ $i + $question->count() }} here...">{{$qns->question}}
  </textarea>  
  </div>
</div>
<!-- Text input-->
<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i }}" name="ans{{ $i }}" placeholder="Choose correct answer " class="form-control input-md" >
  @if($qns->answer=="a")
  <option value="a"> True</option>
   <option value="b">False</option>
  @else
  <option value="b"> False</option>
  <option value="a"> True</option>
  @endif
  </select><br /><br /> 
  <?php $i++; ?>
  @endforeach




 @for ($i = 1; $i <= $total; $i++)
 <b>Question number&nbsp;{{ $i+ $question->count() }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i+ $question->count() }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i+ $question->count() }}" class="form-control" placeholder="Write question number {{ $i+ $question->count() }} here..."></textarea>  
  </div>
</div>

<br />
<b>Correct answer</b>:<br />
<select id="ans{{ $i + $question->count()}}" name="ans{{ $i + $question->count()}}" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question {{$i}}</option>
  <option value="a"> Right</option>
  <option value="b"> Wrong</option>
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

@elseif ($test->type==3)

<form action="{{url('/teacher/'.$name.'/edit/savedetail/'.$test->id)}}" method="post" >
<input type="hidden" name="step" value="2">
<input type="hidden" name="testname" value="{{$testname}}">
<input type="hidden" name="type" value="{{$test->type}}">
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


 

 <?php $i=1;?>
 @foreach($question as $qns)

 <b>Question number&nbsp;{{ $i }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "> <a  href="{{url('/teacher/'.$name.'/delete/'.$qns->id)}}" class="btb btn-danger btn-xs pull-right delete_category">Delete</a></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i }}"  class="form-control" class="form-control" placeholder="Write question number {{ $i + $question->count() }} here...">{{$qns->question}}
  </textarea>  
  </div>
</div>
<!-- Text input-->
  <?php $i++; ?>
  @endforeach




 @for ($i = 1; $i <= $total; $i++)
 <b>Question number&nbsp;{{ $i+ $question->count() }}&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i+ $question->count() }} "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns{{ $i+ $question->count() }}" class="form-control" placeholder="Write question number {{ $i+ $question->count() }} here..."></textarea>  
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
                    
                
              


@stop
@section('scripts')
     @section('scripts')
@stop
