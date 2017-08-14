@extends('master')

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('usersProfile')
<a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
@if($user->fk_roles_id != 1)
<a class="navbar-brand" href="{{ route('users_profile') }}">Users</a>
@endif
<a class="navbar-brand" href="{{ route('view_user_role') }}">Role</a>
@if($user->fk_roles_id == 4)
<a class="navbar-brand" href="{{ route('create_user') }}">Create</a>
@endif
@if ($user->fk_roles_id >= 3)
<a class="navbar-brand" href="{{ route('cms_page') }}">Create pages</a>
@endif
<a class="navbar-brand" href="{{ route('view_page_list') }}">View Pages</a>
@endsection

@section('form')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if (Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
			</div>
			<div>
				<h3>Pages Details</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Url</th>
							<th>View</th>
							@if($user->fk_roles_id != 1)
								<th>Edit</th>
							@endif
							@if($user->fk_roles_id == 3)
								<th>Delete</th>
							@endif
						</tr>
						@foreach($getAllPageList as $pageList)
						<tr>
							<th>{{ $loop->iteration }}</th>
							<th>{{ $pageList->url }}</th>
							<th>{{ $pageList->url }}</th>
							<th>
								<button type="button" class="btn btn-success" data-dismiss="modal">
									<a href="{{ route('view_cms_page',['pageList' => $pageList->url])}}">View</a>
								</button>
							</th>
							@if($user->fk_roles_id != 1)
							<th>
								<button type="button" class="btn btn-info" data-dismiss="modal">
									<a href="{{ route('view_edit_page', ['id' => $pageList->id]) }}">Edit</a>
								</button>
							</th>
							@endif
							@if($user->fk_roles_id == 3)
							<th>{{ Form::button('Delete', array('class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#confirm-del'.$pageList->id)) }}</th>
							@endif
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	<div>
	@foreach($getAllPageList as $pageList)
		<div id="confirm-del{{$pageList->id}}" class="modal fade" role="dialog">
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
						<a href="{{ route('delete_page', ['page_id' => $pageList->id]) }}">
							<button class="btn btn-Danger">confirm</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
@endsection