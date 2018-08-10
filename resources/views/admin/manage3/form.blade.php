@extends('admin.layouts.template')

@section('content')
	<div class="row page-header">
		<div class="col-sm-6">
			<h1 class="">{{$id != null ? 'Update' : 'Add New'}} User</h1>
		</div>
		<div class="col-sm-6 text-right padding-top-20">
			<a class="btn btn-default" href="{{url('admin/teacher/index')}}" title="Back"><i class="fa fa-arrow-left" ></i> Back</a>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/teacher/form') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{ $id }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Username</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="username" placeholder="Require more than 8 characters"  value="{{ $user ? $user->username : old('username') }}">
						{!!$errors->first('username', '<span class="control-label color-red" for="username">*:message</span>')!!}
					</div>
					<span class="control-label color-red" for="email"> Require*</span>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" placeholder="Require more than 8 characters" name="password">
						{!!$errors->first('password', '<span class="control-label color-red" for="password">*:message</span>')!!}
					</div>
					<span class="control-label color-red" for="email"> Require*</span>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Confirm Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" placeholder="Enter the same password" name="password_confirmation">
						{!!$errors->first('password_confirmation', '<span class="control-label color-red" for="password_confirmation">*:message</span>')!!}
					</div>
					<span class="control-label color-red" for="email"> Require*</span>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" placeholder="Your real name" value="{{ $user ? $user->name : old('name') }}">
						{!!$errors->first('name', '<span class="control-label color-red" for="name">*:message</span>')!!}
					</div>
					<span class="control-label color-red" for="email"> Require*</span>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">E-Mail Address</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" placeholder="Optional" value="{{ $user ? $user->email : old('email') }}">
						{!!$errors->first('email', '<span class="control-label color-red" for="email">*:message</span>')!!}
					</div>
					
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label">Telephone Number</label>
					<div class="col-md-6">
						<input type="text" class="form-control"  placeholder="Optional" name="tel" value="{{ $user ? $user->tel : old('tel') }}">
						
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label">Active</label>
					<div class="col-md-6">
						<input type="checkbox"  name="active" value="Y" {{ $user && $user->active == 'Y' ? 'checked' : ''}}>
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
