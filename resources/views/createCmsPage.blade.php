@extends('master')

@section('title')
	<title>CreateCmsPage</title>
@endsection

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
@if ($user->fk_roles_id >= 3)
<a class="navbar-brand" href="{{ route('cms_page') }}">Create pages</a>
@endif
<a class="navbar-brand" href="{{ route('view_page_list') }}">View Pages</a>
@endsection

@section('form')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-12">    
				<h1 class="entry-title"><span>Create Page</span> </h1>
				<hr>

				<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has('alert-' . $msg))
						<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
					@endif
				@endforeach
				</div>

				{!! Form::open(['action' => 'CreateCmsPageController@create', 'id' => 'myform' ,'class' => 'form-horizontal','autocomplete' => 'on']) !!}


			<div class="form-group">
				{!!  Html::decode(Form::label('url', 'Url<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-9">
					<div class="input-group col-md-12">
						{!! Form::text('url', $getPageDetails->url ?? '', ['class'=>'form-control', 'placeholder'=>'Url']) !!}
					</div>
					<span class="text-danger">{{ $errors->first('url') }}</span>
				</div>
			</div>
			
			<div class="form-group">
			{!!  Html::decode(Form::label('content', 'Content<span class="text-danger">*</span>', ['class' => 'control-label col-sm-3 '])) !!}
				<div class="col-md-8 col-sm-8">
					<div class="input-group col-md-12">
						{{ Form::textarea('content', $getPageDetails->content ?? '', ['size' => '30x5', 'class' => 'form-control']) }}
					</div>
					<span class="text-danger">{{ $errors->first('content') }}</span>
				</div>
			</div>

			<div class="form-group">
					<div class="col-xs-offset-3 col-xs-10 col-md-8">
					{!! Form::submit('Create Page', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
					</div>
			</div> 
				{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection