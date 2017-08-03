@extends('master')

@section('include_css_file')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('usersProfile')
<a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
<a class="navbar-brand" href="{{ route('users_profile') }}">Users profile</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
			</div>
			<div>
				<h3></h3>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No.</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Email Address</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
					@foreach($allUser as $user)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<th>{{ $user->first_name }}</th>
						<th>{{ $user->middle_name }}</th>
						<th>{{ $user->last_name }}</th>
						<th>{{ $user->email }}</th>
						<th>
							<button type="button" class="btn btn-info" data-dismiss="modal">
								<a href="{{ route('edit_user', ['user_id' => $user->id]) }}">Edit</a>
							</button>
						</th>
						<th>{{ Form::button('Delete', array('class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#confirm-del'.$user->id)) }}</th>
					<tr>
					@endforeach
				</table>
			</div>
		</div>
			@foreach($allUser as $user)
				<div id="confirm-del{{$user->id}}" class="modal fade" role="dialog">
					 <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Please Confirm</h4>
							</div>
							<div class="modal-body">
							<p>Are you sure to delete the user details.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<a href="{{ route('delete_user', ['user_id' => $user->id]) }}">
									<button class="btn btn-Danger">confirm</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
	</div>
</div>
@endsection