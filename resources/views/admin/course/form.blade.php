@extends('admin.layouts.template')

@section('content')
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">{{$id != null ? 'Update' : 'Add New'}} Course</h1>
		</div>
		<div class="col-sm-6 text-right padding-top-20">
			<a class="btn btn-default" href="{{url('admin/course/index')}}" title="Back"><i class="fa fa-arrow-left" ></i> Back</a>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/course/form') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $id }}">

				

				<div class="form-group">
					<label class="col-md-4 control-label">Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ $subject ? $subject->name : old('subject') }}">
						{!!$errors->first('name', '<span class="control-label color-red" for="name">*:message</span>')!!}
					</div>
				</div>
				
				
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-save"></i>
							{{$id == 0 ? 'Register':'Update'}}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop
