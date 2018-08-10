@extends('student.layouts.template')
@section('stylesheet')
    <link href="{{asset('assets/css/admin-upload.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')

<form action="{{url('/student/showtest')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row page-header">
        <div class="col-sm-12">
            <h1 class="">{{$name}}'s Examinations</h1>
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

                            <?php $b = true ?>
                             @foreach(App\Whotest::where('test_id','=',$u->id)->get() as $a )
                                    @if($a->student_id==Auth::user()->id)
                                        <?php $b = false ?> 
                                        @break 
                                    @endif
                             @endforeach                                
                               

                               @if($b)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$u->name}}</td>
                                     <td>@if($u->type==1)
                                                 4 Choices
                                         @elseif($u->type==2)
                                                True or False
                                         @else
                                                Subjective
                                         @endif   
                                     </td>
                                     <td>{{$u->quantity}}</td>
                                     <td>{{$u->time}}  minutes</td>
                                    <td><a href="{{url('student/'.$name.'/showtest/'.$u->id)}}">Go Exam</a> </td>
                               </tr>
                              @endif
                                 <?php $i++ ?>
                             @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
   


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
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Total Articles</th>
                                    <th>Time</th>
                                    <th>score</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                      
                                    <?php $i=1 ?>
@foreach(App\Test::where('subject_id','=',$subject_id)->get() as $u)

                           
    @foreach(App\Whotest::where('test_id','=',$u->id)->get() as $a )
    @if($a->student_id==Auth::user()->id&&$a->checked=='Y')    
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$u->name}}</td>
                                     <td>@if($u->type==1)
                                                 4 Choices
                                         @elseif($u->type==2)
                                                True or False
                                         @else
                                                Subjective
                                         @endif   
                                     </td>
                                     <td>{{$u->quantity}}</td>
                                     <td>{{$u->time}}  minute</td>
                                    <td>{{$a->score}}</td>
                               </tr>

                                 @endif
                               @endforeach        
                            
                                 <?php $i++ ?>
                             @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

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
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Total Articles</th>
                                    <th>Time</th>
                                    <th>score</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php $i=1 ?>
                          @foreach(App\Test::where('subject_id','=',$subject_id)->get() as $u)

                           
                             @foreach(App\Whotest::where('test_id','=',$u->id)->get() as $a )
                                    @if($a->student_id==Auth::user()->id&&$a->checked=='N')
                                       
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$u->name}}</td>
                                     <td>@if($u->type==1)
                                                4 Choices
                                         @elseif($u->type==2)
                                               True or False
                                         @else
                                                Subjective
                                         @endif   
                                     </td>
                                     <td>{{$u->quantity}}</td>
                                     <td>{{$u->time}}  minute</td>
                                    <td>{{$a->score}}</td>
                               </tr>

                                 @endif
                               @endforeach        
                            
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
