@extends('teacher.layouts.template')
@section('stylesheet')
 <link href="{{asset('assets/css/summernote.css')}}" rel="stylesheet" type="text/css">   
@stop
@section('content')
<br>
 @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                        <div class="alert alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="clearfix">
                <ol class="breadcrumb" style="margin-bottom: 5px;">
                    <li><a href="{{url('/teacher/'.$name.'/forum')}}" style="background-color:#f5f5f5; "><font color=blue>Home</font></a></li>
                    <li><a href="{{url('/teacher/'.$name.'/forum/category/'.$thread->category->id)}}"  style="background-color:#f5f5f5"><font color=blue>{{$thread->category->title}}</font></a></li>
                    <li class="active">{{$thread->title}}</li>
                 </ol>
     <a  href="{{url('/teacher/'.$name.'/forum/thread/'.$thread->id.'/delete')}}" class="btn btn-danger  pull-right ">Delete</a>
 </div>


    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Thread</h1>
        </div>
    </div>


    <div class="well">
           
            <h1>{{$thread->title}}</h1>
            <h4>By :{{$author}} on {{$thread->created_at}}</h4>
            <hr>
            <p><?php echo nl2br(BBCode::parse($thread->body)) ?></p>
    </div>    

    @foreach($thread->comments()->get() as $comment )
             <div class="well">
            <h4>By :{{$comment->author->name}} on {{$comment->created_at}}</h4>
            <hr>
            <p><?php echo nl2br(BBCode::parse($comment->body)) ?></p>
             <a  href="{{url('/teacher/'.$name.'/forum/comment/'.$comment->id.'/delete')}}" class="btn btn-danger   ">Delete</a>
            </div>    
    @endforeach
    <form action="{{url('/teacher/'.$name.'/forum/comment/'.$thread->id.'/new')}}" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body" id="body"></textarea>
    </div>    

    {{Form::token()}}

    <div class="form-group">
            <input type="submit" value="Save Thread" class="btn btn-primary">
    </div> 
</form>
@stop
  @section('scripts')
  <script>
    $(document).ready(function() {
        $('#body').summernote();
    });
  </script>
  <script type="text/javascript" src="{{asset('/assets/js/summernote.js')}}"></script>
  
  <script type="text/javascript">
  /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
  </script>
@stop