@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
    span#countdown {
   font-size: 80px;
}
    </style>

@stop
@section('content')



@if ($test->type==1)
<span id="countdown" class="timer"></span>
<form id="frm" action="{{url('/student/'.$name.'/showtest/'.$test->id.'/result')}}" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="testid" value="{{$test->id}}">
<input type="hidden" name="userid" value="{{Auth::user()->id}}">


    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Test </h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Exam</b></span><br /><br />
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

<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}1"></label>  
  <div class="col-md-12">
<input type="radio" name="ans{{$i}}" value="a">a.{{$data["answer1".$i]->answer}}<br /><br />
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}2"></label>  
  <div class="col-md-12">
  <input type="radio" name="ans{{$i}}" value="b">b.{{$data["answer2".$i]->answer}}<br /><br />
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}3"></label>  
  <div class="col-md-12">
<input type="radio" name="ans{{$i}}" value="c">c.{{$data["answer3".$i]->answer}}<br /><br />
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}4"></label>  
  <div class="col-md-12">
  <input type="radio" name="ans{{$i}}" value="d">d.{{$data["answer4".$i]->answer}}<br /><br />
    
  </div>
</div>
<?php $i++; ?>
@endforeach

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>

                    
                
                </div>
 
            </div>
        </div>
    </div>
</form>
@stop
@section('scripts')
     @section('scripts')
        <script>



var upgradeTime = {{($test->time)*60}};
var seconds = upgradeTime;
function timer() {
    
    var hoursLeft   = Math.floor((seconds));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML =  hours + ":" + minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById("frm1").submit();
    } else {
        seconds--;
    }
}
var countdownTimer = setInterval('timer()', 1000);

</script>

@stop
@elseif ($test->type==2)
<span id="countdown" class="timer"></span>
<form id="frm1" action="{{url('/student/'.$name.'/showtest/'.$test->id.'/result')}}" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="testid" value="{{$test->id}}">
<input type="hidden" name="userid" value="{{Auth::user()->id}}">
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Test </h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Exam</b></span><br /><br />
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

<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}1"></label>  
  <div class="col-md-12">
<input type="radio" name="ans{{$i}}" value="a">a.right<br /><br />
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="{{ $i }}2"></label>  
  <div class="col-md-12">
  <input type="radio" name="ans{{$i}}" value="b">b.wrong<br /><br />
    
  </div>
</div>
<!-- Text input-->

<?php $i++; ?>
@endforeach

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>

                    
                
                </div>
 
            </div>
        </div>
    </div>
</form>
@stop
@section('scripts')
     @section('scripts')
        <script>



var upgradeTime = {{($test->time)*60}};
var seconds = upgradeTime;
function timer() {
    
    var hoursLeft   = Math.floor((seconds));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML =  hours + ":" + minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById("frm").submit();
    } else {
        seconds--;
    }
}
var countdownTimer = setInterval('timer()', 1000);

</script>

@stop
@else


    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Test </h1>
        </div>
     
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
    <span class="title1" style="margin-left:40%;font-size:30px;"><b>Exam</b></span><br /><br />
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

                          
                             @if($u->user_id==Auth::user()->id)
                             <div class="form-group">
                            <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
                            <div class="col-md-12">
                                    <a href="{{url($u->file_path)}}">{{$u->file_name}}</a>  <a  href="{{url('/student/delete/subjective/'.$u->id)}}" class="btb btn-danger btn-xs pull-right delete_category">Delete</a>
                            </div>
                            </div>
                            @endif    
@endforeach


  <form action="{{url('/student/upload/subjective/'.$qns->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-sm-6 text-right padding-top-20">
      <input type="file" name="uploader{{$qns->id}}" id="uploader{{$qns->id}}" />
    </div>
    <div class="col-sm-6 text-right padding-top-20">
      <button class="btn btn-success" type="submit" name = "btn-upload" title="Upload image"><i class="fa fa-upload" ></i> Upload</button>
    </div>
  </form>

<?php $i++; ?>
@endforeach

<?php $i=1; ?>

 @foreach($question as $qns)

<div class="form-group">
  <label class="col-md-12 control-label" for="qns{{ $i }} "></label>  
  <div class="col-md-12">
   <input type="hidden" name="qns{{$i}}" value="{{$qns->id}}">
  <b>Question number&nbsp;{{ $i }}&nbsp;:{{$qns->question}}</><br />
  </div>
</div>

<form  action="{{url('/student/'.$name.'/showtest/'.$test->id.'/result')}}" method="post" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="testid" value="{{$test->id}}">

<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="4" cols="4" name="desc{{$i}}" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>

<?php $i++; ?>
@endforeach

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit"   style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form>








                    
                
                </div>
 
            </div>
        </div>
    </div>
</form>
@stop
@section('scripts')
     @section('scripts')
        <script type="text/javascript">
        var i = <?php echo $i-1 ?>;
          submitForms = function(){
    for (j = 1; j <=i ; j++) {
    document.forms["form"+i].submit();
    }
      }
        </script>
@stop

@endif