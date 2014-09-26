@if(!Auth::check())
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Sign In</h2>

	{{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
	{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

	{{ Form::submit('Sign In', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
@else
{{ Redirect::to('/studies')}}

@endif