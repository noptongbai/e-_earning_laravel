@extends('admin.layouts.template')
@section('stylesheet')
    <style>
	div.well { 
	cursor: pointer;
    cursor: hand;
 	}
 	div.well:hover{
 		background-color :#0066FF;
 		color :white;
 	}
</style>
@stop
@section('content')
<form action="{{url('/admin/user/action')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">User Management</h1>
		</div>
		<div class="col-sm-6 text-right padding-top-20">
	
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
			<div class="panel panel-default">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            	 <a  href="{{url('admin/student')}}"style="text-decoration:none"><div class="well well-lg"><h3>Student Management</h3></div></a>
  								 <a  href="{{url('admin/teacher')}}"style="text-decoration:none"><div class="well well-lg"><h3>Teacher Management</h3></div></a>
  								 <a  href="{{url('admin/admin')}}"style="text-decoration:none"><div class="well well-lg"><h3>Admin Management</h3></div></a>
							</tbody>
						</table>
					</div>
				</div>
			</div>
</form>
@stop
@section('scripts')
   
@stop
