@extends('teacher.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

<form action="{{url('/student/showtest')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Result</h1>
        </div>
        
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
               <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    @if(App\Test::find($test_id)->type!=3)
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th></th> 
                                    @else
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Answer</th>
                                    <th></th> 
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                          @foreach(App\Whotest::where('test_id','=',$test_id)->get() as $u)
                                <tr>

                                    @if(App\Test::find($test_id)->type!=3)
                                    <td>{{$i}}</td>
                                    <td>{{App\Models\Users::find($u->student_id)->name}}</td>
                                     <td>{{$u->score}}</td>
                                    <td><a href="{{url('teacher/'.$name.'/result/delete/'.$u->id)}}">Delete</a> 
                                    </td>
                                     @else
                                     @if($u->checked=='Y')
                                    <td>{{$i}}</td>
                                    <td>{{App\Models\Users::find($u->student_id)->name}}</td>
                                      <td>{{$u->score}}</td>
                                    <td><a href="{{url('teacher/'.$name.'/result/delete/'.$u->id)}}">Delete</a> 
                                    </td>
                                    @endif
                                   @endif
                                </tr>
                                <?php $i++ ?>
                             @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

@if($test->type==3)
     <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">Waiting List</h1>
        </div>
        
        
        <!-- /.col-lg-12 -->
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
               <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    @if(App\Test::find($test_id)->type!=3)
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Score</th>
                                    <th></th> 
                                    @else
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Answer</th>
                                    <th></th> 
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                          @foreach(App\Whotest::where('test_id','=',$test_id)->get() as $u)
                                <tr>
                                    @if($u->checked=='N')
                                    <td>{{$i}}</td>
                                    <td>{{App\Models\Users::find($u->student_id)->name}}</td>
                                     <td><a href="{{url('teacher/'.$name.'/result/data/'.$u->id)}}">Answer</a> </td>
                                    <td><a href="{{url('teacher/'.$name.'/result/delete/'.$u->id)}}">Delete</a> 
                                    </td>
                                     @endif

                                     
                                </tr>
                                <?php $i++ ?>
                             @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

    @endif
</form>
@stop
@section('scripts')
     @section('scripts')
@stop
