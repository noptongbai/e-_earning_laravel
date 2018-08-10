@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
 
    <style type="text/css">
    .wrap {
      /* force the div to properly contain the floated images: */
      position:relative;
      float:left;
      clear:none;
      overflow:hidden;
    }
    .wrap img {
      position:relative;
      z-index:1;
    }
    .wrap .desc {
      display:block;
      position:absolute;
      width:100%;
      top:30%;
      left:0;
      z-index:2;
      text-align:bottom;
    }
</style>
@stop
@section('content')


  <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">{{$name}}'s Documents</h1>
        </div>
        
        
        <!-- /.col-lg-12 -->
    </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">    
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <div class="row">
              @foreach(App\Docs::where('subject_id','=',$subject_id)->get() as $doc)
        <div class="wrap">           
                <a href="{{url($doc->content->file_path)}}">
                <img class="img-responsive" vspace="5"  hspace="10" src="{{asset('images/images.png')}}"> {{$doc->name}}</img>
                 
            </a>
            </div>
              @endforeach
            </div>
        </div>
    </div>
</div>

@stop
@section('scripts')
     @section('scripts')
        <script type="text/javascript" src="{{asset('/assets/js/lightbox.js') }}"></script>
@stop
