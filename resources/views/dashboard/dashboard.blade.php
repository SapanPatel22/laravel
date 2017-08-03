@extends('master')

@section('usersProfile')
 <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
 <a class="navbar-brand" href="{{ route('users_profile') }}">Users profile</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div>
				<h3>All Users</h3>
				<table class="table table-bordered table-striped">
					<tr>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Email Address</th>
					</tr>
					<tr>
						<td>{{ $user->first_name}}</td>
						<td>{{ $user->middle_name}}</td>
						<td>{{ $user->last_name}}</td>
						<td>{{ $user->email}}</td>
					<tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection