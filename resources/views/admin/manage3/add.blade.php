@extends('admin.layouts.template')

@section('content')
<form action="{{url('/admin/teacher/action')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">Teacher</h1>
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
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th><input type="checkbox" onClick="toggle(this)" id="checkAll"/></th>
									<th>Username</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>	
								@for ($i = 1; $i <=$data["number"]; $i++)
								<tr>
									<td>{{$data["user".$i]->id}}</td>
									<td class="text-center"><input name="user[]" type="checkbox" id="user" value="{{$data["user".$i]->id}}" class="checkboxAll" /></td>
									<td>{{$data["user".$i]->username}}</td>
									<td>{{$data["user".$i]->name}}</td>
								</tr>
								@endfor
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">Subject</h1>
		</div>
		<div class="col-sm-6 text-right padding-top-20">
			
		
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
                                    <th><input type="checkbox" onClick="toggle2(this)" id="checkAll"/></th>
                                    <th>Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>	
						
								@foreach($subject as $u)
								<tr>
									<td>{{$u->id}}</td>
									<td class="text-center"><input name="id[]" type="checkbox" id="id" value="{{$u->id}}" class="checkboxAll" /></td>
									
									<td>{{$u->name}}</td>
									
									
								</tr>
								@endforeach
					
							</tbody>
						</table>
					</div>
					<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button class="btn btn-success del" type="submit" name = "addcourse2" title="Add Course Multiple Users"><i class="fa fa-plus-square" ></i> Add Course</button>
					</div>
				</div>
				</div>
			</div>

</form>
@stop
@section('scripts')
     @section('scripts')
        <script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('user[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
  function toggle2(source) {
  checkboxes = document.getElementsByName('id[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
@stop
