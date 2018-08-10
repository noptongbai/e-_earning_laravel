@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

<form action="{{url('/student/showtest')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">{{$name}}'s Examinations<a class="btn btn-default pull-right" href="{{url('/teacher/'.$name.'/createtest')}}" style="background-color: transparent;">Add new examinations</a></h1>
        </div>
        
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
               <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Total Articles</th>
                                    <th>Time</th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                          @foreach(App\Test::where('subject_id','=',$subject_id)->get() as $u)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$u->name}}</td>
                                     <td>@if($u->type==1)
                                                Choice
                                         @elseif($u->type==2)
                                                True or False
                                         @else
                                                Subjective
                                         @endif   
                                     </td>
                                     <td>{{$u->quantity}}</td>
                                     <td>{{$u->time}}  minutes</td>
                                    <td><a href="{{url('teacher/'.$name.'/edit/'.$u->id)}}">Edit</a> / <a href="{{url('teacher/'.$name.'/result/'.$u->id)}}">Result</a>   / <a href="{{url('teacher/test/delete/'.$u->id)}}">Delete</a> 
                                    </td>
                                </tr>
                                <?php $i++ ?>
                             @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</form>
@stop
@section('scripts')
     @section('scripts')
@stop
