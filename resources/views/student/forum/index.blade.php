@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
<br>
                    
                    
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
                </div>
            </div>
            <div class="panel-body panel-list-group">
                 <div class="list-group">
                @foreach($categories as $category)
                  @if($category->group_id==$group->id)

                  <a href="{{url('student/'.$name.'/forum/category/'.$category->id)}}" class="list-group-item">{{$category->title}}</a>
                    @endif
                @endforeach
                </div>
            </div>

        </div>
        @endforeach
      
    </div>
</form>

 
   



@stop

@section('scripts')
     @section('scripts')        
@stop
