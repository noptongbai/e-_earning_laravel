@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<br>
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                        <div class="alert alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
<input type="hidden" id="club-id" value="{{$name}}" />                  
<form action="{{url('/teacher/upload/action')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   <br><br>
    
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Forum</h1>
        </div>
       @foreach(App\Models\ForumGroup::where('subject_id','=',$subject_id)->get() as $group)
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="clearfix">

                <h3 class="panel-title pull-left">{{$group->title}}</h3>
                <a id="add-category-{{$group->id}}" href="#" data-toggle="modal" data-target="#category_modal"  class="btn btn-success btn-xs pull-right new_category">New Category</a>
                </div>
            </div>
            <div class="panel-body panel-list-group">
                 <div class="list-group">
                @foreach($categories as $category)
                  @if($category->group_id==$group->id)

                  <a href="{{url('teacher/'.$name.'/forum/category/'.$category->id)}}" class="list-group-item">{{$category->title}}</a>
                    @endif
                @endforeach
                </div>
            </div>

        </div>
        @endforeach
      
    </div>
    
</form>

 

    <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">NewCategory</h4>
                </div>
                <div class="modal-body">
                    <form id="category_form" method="post">
                        <div class="form-group {{($errors->has('category_name')) ? 'has-error' :  '' }}">
                            <label for="category_name">Category Name:</label>
                            <input type="text" id="category_name" name="category_name" class="form-control">
                            @if($errors->has('category_name'))
                                <p>{{$errors->first('category_name')}}</p>
                            @endif
                        </div>
                        {{Form::token()}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" data-dismiss="modal" id="category_submit">Save</button>
                </div>
            </div>
        </div>
    </div>


    

@stop

@section('scripts')
     @section('scripts')
       <script src="{{asset('/assets/js/app.js')}}"></script>
       @if(Session::has('modal'))
        <script type="text/javascript" >
       $("{{Session::get('modal')}}").modal('show');
       </script>
       @endif

          @if(Session::has('category-modal') && Session::has('group-id')  && Session::has('name'))
        <script type="text/javascript">
         $("#category_form").prop('action',"/blog/public/teacher/{{Session::get('name')}}/forum/category/{{Session::get('group-id')}}/new");
         $("{{Session::get('category-modal')}}").modal('show');
        </script>
       @endif
@stop
