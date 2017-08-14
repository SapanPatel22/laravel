@extends('master')

@section('include_css_file')
		<link rel="stylesheet" href="css/signup.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
@if($user->fk_roles_id >= 3)
<a class="navbar-brand" href="{{ route('cms_page') }}">Create pages</a>
@endif
<a class="navbar-brand" href="{{ route('view_page_list') }}">View Pages</a>
@endsection

@section('form')
<div class="card card-inverse card-primary mb-3 text-center">
  <div class="card-block">
    <blockquote class="card-blockquote">
      <p>{{$content}}</p>
      <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>
@endsection