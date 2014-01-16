@extends('layouts.default')

@section('title')
	Add User
@endsection

@section('content')
	<div id="login-content">
		<div class="row">
			<div class="large-12 columns">
				<h1>
					Registration
					<span>Northstar Solutions COC</span>
				</h1>
				<div class="separator"></div>
			</div>
		</div>
		{{ Form::open(array('url' => 'add_user', 'class' => 'custom')) }}
		<div class="row" style="margin-top: 30px">
			<div class="large-7 large-offset-1 columns">
				@if($errors->has('new_username'))
					{{ Form::label('new_username', 'Username:') }}
					{{ Form::text('new_username', Input::old('new_username'), array('placeholder' => 'Enter your username here')) }}
					<small class="error">{{ $errors->first('new_username') }}</small>
				@else
					{{ Form::label('new_username', 'Username:') }}
					{{ Form::text('new_username', Input::old('new_username'), array('placeholder' => 'Enter your username here')) }}
				@endif

				@if($errors->has('new_password'))
					{{ Form::label('new_password', 'Password:') }}
					{{ Form::password('new_password') }}
					<small class="error">{{ $errors->first('new_password') }}</small>
				@else
					{{ Form::label('new_password', 'Password:') }}
					{{ Form::password('new_password') }}
				@endif


				@if($errors->has('new_password_confirmation'))
					{{ Form::label('new_password_confirmation', 'Confirm Password:') }}
					{{ Form::password('new_password_confirmation') }}
					<small class="error">{{ $errors->first('new_password_confirmation') }}</small>
				@else
					{{ Form::label('new_password_confirmation', 'Confirm Password:') }}
					{{ Form::password('new_password_confirmation') }}
				@endif


				@if($errors->has('fname'))
					{{ Form::label('fname', 'First Name:') }}
					{{ Form::text('fname', Input::old('fname')) }}
					<small class="error">{{ $errors->first('fname') }}</small>
				@else
					{{ Form::label('fname', 'First Name:') }}
					{{ Form::password('fname') }}
				@endif


				@if($errors->has('lname'))
					{{ Form::label('lname', 'Last Name:') }}
					{{ Form::text('lname', Input::old('lname')) }}
					<small class="error">{{ $errors->first('lname') }}</small>
				@else
					{{ Form::label('lname', 'Last Name:') }}
					{{ Form::password('lname') }}
				@endif
				

				@if($errors->has('accounttype_id'))
					{{ Form::label('accounttype_id', 'Account Type:') }}
					{{ Form::select('accounttype_id', $type) }}
					<small class="error">{{ $errors->first('accounttype_id') }}</small>
				@else
					{{ Form::label('accounttype_id', 'Account Type:') }}
					{{ Form::select('accounttype_id', $type) }}
				@endif


				{{ Form::submit('Add User', array('class' => 'button radius')) }}
			</div>
		</div>
		{{ Form::close(); }}
	</div>
	</div>
@endsection

@section('scripts')
	
@endsection