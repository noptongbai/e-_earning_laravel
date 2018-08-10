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
	td:nth-of-type(3):before { content: "Username"; }
	td:nth-of-type(4):before { content: "Name"; }
	td:nth-of-type(5):before { content: "Email"; }
	td:nth-of-type(6):before { content: "Tel"; }
	td:nth-of-type(7):before { content: "Subject"; }
	td:nth-of-type(8):before { content: "Active"; }
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
<input type="hidden" id="club-id" value="abc" />  
<form action="{{url('/admin/student/action')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">Student</h1>
		</div>

		<div class="col-sm-6 text-right padding-top-20">
			 <a id="add-category-123" href="#" data-toggle="modal" data-target="#category_modal"  class="btn btn-success  new_category2">New Multiple users</a>
			<a class="btn btn-success" href="{{url('admin/student/form')}}" title="Add new User"><i class="fa fa-plus-square" ></i> New</a>
			<button class="btn btn-success del" type="submit" name = "addcourse" title="Add Course Multiple Users"><i class="fa fa-plus-square" ></i> Add Course</button>
			<button class="btn btn-danger del" type="submit" name = "delete" title="Delete Multiple Users"><i class="fa fa-trash-o" ></i> Delete</button>
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
                                    <th><input type="checkbox" onClick="toggle(this)" id="checkAll"/></th>
									<th>Username</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Telephone No.</th>
                                    <th>Enrolled Subjects</th>
                                     <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							@if($user)
								@foreach($user as $u)
								<tr>
									<td class="text-center">{{$u->id}}</td>
									<td class="text-left"><input name="id[]" type="checkbox" id="id" value="{{$u->id}}" class="checkboxAll" /></td>
									<td class="text-center">{{$u->username}}</td>
									<td class="text-center">{{$u->name}}</td>
									<td class="text-center">{{$u->email}}</td>
									<td class="text-center">{{$u->tel}}</td>
									<td class="text-center"> @foreach(App\Models\Users::find($u->id)->subjects as $sj)
										{{$sj->name}}<a href="{{url('admin/delete/'.$sj->id.'/'.$u->id)}}" title="" class="del"><i class="glyphicon glyphicon-remove"></i></a> <br> 

										@endforeach           </th>
									<td class="text-center"><i class="fa {{$u->active == 'Y' ? 'fa-check-circle color-green ':'fa-times-circle color-red'}}"></i></td>
									<td class="text-left">
										<a href="{{url('admin/student/form/'.$u->id)}}" title="" class="edit"><i class="fa fa-edit"></i></a>
										<a href="{{url('admin/student/delete/'.$u->id)}}" title="" class="del"><i class="glyphicon glyphicon-remove"></i></a>
									</td>
								</tr>
								@endforeach
							@endif
							</tbody>
						</table>
					</div>
				</div>
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
                    <h4 class="modal-title">New Mutiple users</h4>
                </div>
                <div class="modal-body">
                    <form id="category_form" method="post">
                        <div class="form-group ">
                            <label for="category_name">Number of users:</label>
                            <input type="number" id="category_name" name="number" min="2" class="form-control">
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
        <script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('id[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
  <script src="{{asset('/assets/js/app.js')}}"></script>
@stop
