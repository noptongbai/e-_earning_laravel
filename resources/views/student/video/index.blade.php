@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/lightgallery.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
            .demo-gallery > ul {
              margin-bottom: 0;
            }
            .demo-gallery > ul > li {
                float: left;
                margin-bottom: 15px;
                margin-right: 20px;
                width: 200px;
            }
            .demo-gallery > ul > li a {
              border: 3px solid #FFF;
              border-radius: 3px;
              display: block;
              overflow: hidden;
              position: relative;
              float: left;
            }
            .demo-gallery > ul > li a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery > ul > li a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery > ul > li a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery > ul > li a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery > ul > li a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .justified-gallery > a > img {
              -webkit-transition: -webkit-transform 0.15s ease 0s;
              -moz-transition: -moz-transform 0.15s ease 0s;
              -o-transition: -o-transform 0.15s ease 0s;
              transition: transform 0.15s ease 0s;
              -webkit-transform: scale3d(1, 1, 1);
              transform: scale3d(1, 1, 1);
              height: 100%;
              width: 100%;
            }
            .demo-gallery .justified-gallery > a:hover > img {
              -webkit-transform: scale3d(1.1, 1.1, 1.1);
              transform: scale3d(1.1, 1.1, 1.1);
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
              opacity: 1;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.1);
              bottom: 0;
              left: 0;
              position: absolute;
              right: 0;
              top: 0;
              -webkit-transition: background-color 0.15s ease 0s;
              -o-transition: background-color 0.15s ease 0s;
              transition: background-color 0.15s ease 0s;
            }
            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
              left: 50%;
              margin-left: -10px;
              margin-top: -10px;
              opacity: 0;
              position: absolute;
              top: 50%;
              -webkit-transition: opacity 0.3s ease 0s;
              -o-transition: opacity 0.3s ease 0s;
              transition: opacity 0.3s ease 0s;
            }
            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
              background-color: rgba(0, 0, 0, 0.5);
            }
            .demo-gallery .video .demo-gallery-poster img {
              height: 48px;
              margin-left: -24px;
              margin-top: -24px;
              opacity: 0.10;
              width: 80px;
            }
            .demo-gallery.dark > ul > li a {
              border: 3px solid #04070a;
            }
            .home .demo-gallery {
              padding-bottom: 80px;
            }
        </style>
@stop
@section('content')


  <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">{{$name}}'s Videos</h1>
        </div>
        
        
        <!-- /.col-lg-12 -->
    </div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
              <?php $i=1 ?>
                @foreach(App\Gallery::where('subject_id','=',$subject_id)->get() as $gallery)
                <li data-poster="{{asset('/assets/images/5.png') }}" data-sub-html="{{$gallery->name}}" data-html="#video{{$i}}">
                    <a href="">
                        <img class="img-responsive" src="{{asset('/assets/images/5.png') }}">
                                             <h6>{{$gallery->name}}</h6>
                    </a>
                </li>
                <?php $i++ ?>
              @endforeach
            </ul>
        </div>
            <?php $i=1 ?>
              @foreach(App\Gallery::where('subject_id','=',$subject_id)->get() as $gallery)
            <div style="display:none;" id="video{{$i}}">
                <video class="lg-video-object lg-html5" controls preload="none">
                    <source src="{{url($gallery->images->file_path)}}" type="video/mp4">
                     Your browser does not support HTML5 video.
                 </video>
            </div>
               <?php $i++ ?>
              @endforeach


@stop
     @section('scripts')
        <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
            $('#html5-videos').lightGallery();
            $('#video-thumbnails').lightGallery({
            loadYoutubeThumbnail: true,
            youtubeThumbSize: 'default',
            loadVimeoThumbnail: true,
            vimeoThumbSize: 'thumbnail_medium',
        });  
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="{{asset('/assets/js/lightgallery.js') }}"></script>
        <script src="{{asset('/assets/js/lg-fullscreen.js') }}"></script>
        <script src="{{asset('/assets/js/lg-thumbnail.js') }}"></script>
        <script src="{{asset('/assets/js/lg-video.js') }}"></script>
        <script src="{{asset('/assets/js/lg-hash.js') }}"></script>
        <script src="{{asset('/assets/js/lg-pager.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
@stop
