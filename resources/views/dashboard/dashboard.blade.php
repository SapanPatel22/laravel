@extends('master')

@section('usersProfile')
<a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
 @if( $user->fk_roles_id != 1 )
<a class="navbar-brand" href="{{ route('users_profile') }}">Users</a>
@endif
<a class="navbar-brand" href="{{ route('view_user_role') }}">Role</a>
@if( $user->fk_roles_id == 4 )
<a class="navbar-brand" href="{{ route('create_user') }}">Create</a>
@endif
@if( $user ->fk_roles_id >= 3)
<a class="navbar-brand" href="{{ route('cms_page') }}">Create pages</a>
@endif
<a class="navbar-brand" href="{{ route('view_page_list') }}">View Pages</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div>
			<h1>
			 
			 <div class="flash-message">
					@if(session('status'))
						<p class="alert alert-danger">{{ session('status') }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				</div>
    			
			 </h1>
			
				<h3>Welcome: 
					<span>{{ $user->first_name}}</span>
				</h3>
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Email Address</th>
						<th>Roles</th>
						<th>Image</th>
					</tr>
					<tr>
						<td>{{ $user->first_name}}</td>
						<td>{{ $user->middle_name}}</td>
						<td>{{ $user->last_name}}</td>
						<td>{{ $user->email}}</td>
						@if($user->fk_roles_id == 1)
						<td>Accountant</td>
						@endif
						@if($user->fk_roles_id == 2)
						<td>Trainner</td>
						@endif
						@if($user->fk_roles_id == 3)
						<td>ITAdmin</td>
						@endif
						@if($user->fk_roles_id == 4)
						<td>SuperAdmin</td>
						@endif
						<td>{{ Html::image('/images/'.$user->photo_path, 'alt', ['width' => 70, 'height' => 70 ]) }}</td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection