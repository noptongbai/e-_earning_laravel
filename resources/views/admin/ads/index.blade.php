@extends('admin.layouts.template')
@section('stylesheet')
 <link href="{{asset('assets/css/summernote.css')}}" rel="stylesheet" type="text/css">   
@stop
@section('content')

   @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                        <div class="alert alert-success">{{Session::get('fail')}}</div>
                    @endif

<form action="{{url('/admin/ads/create/')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Notices</h1>
        </div>
    </div>
    <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$ads->title}}">
    </div>    

    <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" name="body" id="body">
                <?php echo nl2br(BBCode::parse($ads->body)) ?>
            </textarea>
    </div>   



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