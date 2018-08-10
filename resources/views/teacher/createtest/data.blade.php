@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<form action="{{url('/teacher/'.$name.'/result/data/save/'.$id)}}" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">


      <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Test Result </h1>
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
 <!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
   <input type="hidden" name="qns{{$i}}" value="{{$qns->id}}">
  <b>Question number&nbsp;{{ $i }}&nbsp;:{{$qns->question}}</><br />
  </div>
</div>
<!-- Text input-->
@foreach(App\Subjective::where('question_id','=',$qns->id)->get() as $u)

                          
                             @if($u->user_id==$user)
                             <div class="form-group">
                            <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
                            <div class="col-md-12">
                                    <a href="{{url($u->file_path)}}">{{$u->file_name}}</a> 
                            </div>
                            </div>
                            @endif    
@endforeach


   
  

<?php $i++; ?>
@endforeach
<br>
</br>

<?php $i=1; ?>

 @foreach($question as $qns)


<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
   <input type="hidden" name="qns{{$i}}" value="{{$qns->id}}">
  <b>Question number&nbsp;{{ $i }}&nbsp;:{{$qns->question}}</><br />
  </div>
</div>

@foreach(App\Subjective2::where('question_id','=',$qns->id)->get() as $u)

  @if($u->user_id==$user)
<div class="form-group">
  <label class="col-md-10 control-label" for="desc"></label>  
  <div class="col-md-10">
  <textarea rows="6" cols="6" name="desc{{$i}}" class="form-control" readonly>{{$u->text}}</textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="score"></label>  
  <div class="col-md-4">
  <input value="" type="number" name="score{{$i}}" class="form-control" >
  </div>
</div>

@endif
@endforeach

<?php $i++; ?>
@endforeach




<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>





                    
                
                </div>
 
            </div>
        </div>
    </div>
</form>

@stop
@section('scripts')
     @section('scripts')
@stop
