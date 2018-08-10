@extends('teacher.layouts.template')
@section('content')

<div class="row">
</body>
   <div class="col-md-4">
        </div>
  	 <div class="col-md-8">
             <div class="panel-body">
             <div class="well well-lg">
            <h1>{{$ads->title}}</h1>
            <hr>
            <p><?php echo nl2br(BBCode::parse($ads->body)) ?></p>
            </div>    
        </div>
    </div>
 

            
	</div>
	<!-- /.col-lg-12 -->
</div>
@stop