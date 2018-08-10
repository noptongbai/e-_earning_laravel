@extends('admin.layouts.template')
@section('stylesheet')
		<style type="text/css">
					@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 0px;
		width: 45%; 
		text-align: left;
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "No."; }
	td:nth-of-type(2):before { content: "Username"; }
	td:nth-of-type(3):before { content: "Name"; }
	td:nth-of-type(4):before { content: "Email"; }
	td:nth-of-type(5):before { content: "Tel"; }
}
}

		</style>
@stop
@section('content')

					@if(Session::has('success'))
						<br>
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @elseif(Session::has('fail'))
                    	<br>
                        <div class="alert alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

<form action="{{url('/admin/new/multiple/save')}}" method="post">
<input type="hidden" name="number" value="{{$number}}" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">Student</h1><td class="text-center">password <input type="password" class="form-control" name="password" ></td>
		</div>

		
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

			<div class="panel panel-default">
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
									<th>Username</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Tel</th>
                                </tr>
                            </thead>
                            <tbody>
							
								@for($i=1;$i<=$number;$i++)
								<tr>
									<td class="text-center">{{$i}}</td>
									<td class="text-center"><input type="text" class="form-control" name="username{{$i}}" ></td>
									<td class="text-center"><input type="text" class="form-control" name="name{{$i}}" ></td>
									<td class="text-center"><input type="text" class="form-control" name="email{{$i}}" ></td>
									<td class="text-center"><input type="tel" class="form-control" name="tel{{$i}}" ></td>
								</tr>
								@endfor
							
								
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button class="btn btn-success del" type="submit" name="submits" title="Add Multiple Users"><i class="fa fa-plus-square" ></i>Submits</button>
					</div>
				</div>
			
</form>
@stop
@section('scripts')
     @section('scripts')
       
@stop
