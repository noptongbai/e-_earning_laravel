@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/dropzone.min.css')}}" rel="stylesheet" type="text/css">    
    <style type="text/css">
    #gallery-images img{
        width: 240px;
        height: 160px;
        border: 2px solid black;
        margin-bottom: 10px;
    }
    #gallery-images ul{
        margin: 0;
        padding: 0;
    }
    #gallery-images li{
        margin: 0;
        padding: 0;
        list-style: none;
        float: left;
        padding-left: 10px;

    }
    div.col-md-12 {
    margin-top: 20px;
    margin-bottom: 50px;
    
    }
    .responsive-video {
max-width: 100%;
height: auto;
}

    </style>

@stop
@section('content')
        <?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
        <input type="hidden" id="refreshed" value="no">
         <div class="row">
            <div class="col-md-12">
                    <h1>Update {{$gallery->name}} <a class="btn btn-default pull-right" href="{{url('/teacher/'.$name.'/updocs/list')}}" title="Back" style="background-color: transparent;">Back</a></h1>  
            </div>
        </div>
        <form class="form" method="post" class="dropzone" id="addImages" action="{{url('/teacher/'.$name.'/updocs/update/'.$gallery->id)}}">
        <div class="row">
            <div class="col-md-9">
                <div id="gallery-images">
                    <ul>
                        @if(isset($gallery))

                        @if($gallery->content->file_mime=="application/octet-stream")
                        <h3  value="{{$gallery->id}}" name="video" id="img"><a href="{{url($gallery->content->file_path)}}"><object width="600" height="300" data="{{asset('images/zip.png')}}"></object></h3></a>
                        @elseif($gallery->content->file_mime=="application/vnd.openxmlformats-officedocument.spre")
                        <h3  value="{{$gallery->id}}" name="video" id="img"><a href="{{url($gallery->content->file_path)}}"><object width="600" height="300" data="{{asset('images/exel.png')}}"></object></h3></a>
                        @elseif($gallery->content->file_mime=="application/vnd.openxmlformats-officedocument.pres")
                        <h3  value="{{$gallery->id}}" name="video" id="img"><a href="{{url($gallery->content->file_path)}}"><object width="600" height="300" data="{{asset('images/ppt.png')}}"></object></h3></a>
                        @elseif($gallery->content->file_mime=="application/vnd.openxmlformats-officedocument.word")
                        <h3  value="{{$gallery->id}}" name="video" id="img"><a href="{{url($gallery->content->file_path)}}"><object width="600" height="300" data="{{asset('images/word.png')}}"></object></h3></a>
                        @else
                        <h3  value="{{$gallery->id}}" name="video" id="img"><object width="600" height="300" data="{{url($gallery->content->file_path)}}"></object></h3>
                        @endif

                        <h1></h1>
                        <h2><input type="hidden" name="oldimage" value="{{$gallery->content->id}}"></h2>
                        @endif
                    </ul>
                </div>
            </div>
           <div class="col-md-3 pull-right">
                     @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="text" name="gallery_name" id="gallery_name" class="form-control"
                        value="{{$gallery->name}}"/>
                    </div>
                    <button class="btn btn-primary">Save</button>
            </div>
         </div>
        </form>
        <div class="row">
            <div class="col-md-12">
            <form action="{{url('teacher/docs/do-upload')}}" class="dropzone" id="addImages">



                <div class="dz-message" data-dz-message><span>Click here to browse or Drop your files here</span></div>
                {{csrf_field()}}
            </form>
        </div>
    </div>

        

               
@stop
@section('scripts')
     @section('scripts')
         <script type="text/javascript" src="{{asset('/assets/js/dropzone.min.js')}}"></script>
         <script> var base_url = "{{url('/')}}/";</script>
         <script> var zip_url = "{{url('/blog/public/images/zip.png')}}/";</script>
           <script> var exel_url = "{{url('/blog/public/images/exel.png')}}/";</script>
            <script> var word_url = "{{url('/blog/public/images/word.png')}}/";</script>
             <script> var ppt_url = "{{url('/blog/public/images/ppt.png')}}/";</script>
         <script type="text/javascript">
        onload=function(){
        var e=document.getElementById("refreshed");
         if(e.value=="no")e.value="yes";
        else{e.value="no";location.reload();}
        }
        </script>
         <script src="{{asset('/assets/js/updocsdropzone.js')}}"></script>

@stop
