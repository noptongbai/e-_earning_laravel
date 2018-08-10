@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/dropzone.min.css')}}" rel="stylesheet" type="text/css">    
@stop
@section('content')


<input type="hidden" id="refreshed" value="no">
        <div class="row">
            <div class="col-md-12">

                    <h1>Add Docs <a class="btn btn-default pull-right" href="{{url('/teacher/'.$name.'/updocs/list')}}" title="Back" style="background-color: transparent;">Back</a></h1> 
            </div>
        </div>
        <form class="form" method="post" class="dropzone" id="addImages" action="{{url('/teacher/'.$name.'/updocs/save')}}">
        <div class="row">
            <div class="col-md-9">
                <div id="gallery-images">
                    <ul>
                         
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
                        <input type="text" name="gallery_name" id="gallery_name" placeholder="Name of Docs"
                        class="form-control"
                        value="{{old('gallery_name')}}"/>
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
                  @if(isset($gallery))
                <input type="hidden" name="gallery_id" value="{{$gallery->id}}" id="addimages">
                  @endif
            </form>
        </div>
    </div>


@stop
@section('scripts')
   <script type="text/javascript" src="{{asset('/assets/js/dropzone.min.js')}}"></script>
         <script> var base_url = "{{url('/')}}/";</script>
          <script> var zip_url = "{{url('/blog/public/images/zip.png')}}/";</script>
           <script> var exel_url = "{{url('/blog/public/images/exel.png')}}/";</script>
            <script> var word_url = "{{url('/blog/public/images/word.png')}}/";</script>
             <script> var ppt_url = "{{url('/blog/public/images/ppt.png')}}/";</script>
         <script src="{{asset('/assets/js/updocsdropzone.js')}}"></script>

    
@stop