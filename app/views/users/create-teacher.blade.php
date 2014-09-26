<section class="errors">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</section>

{{ Form::open(array('url'=>'users/create-teacher', 'class'=>'form-signup')) }}
<h2 class="form-signup-heading">Create Teacher</h2>


{{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
{{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Teacher Name')) }}
{{ Form::select('role', array('teacher' => 'Teahcer', 'admin' => 'Admin')); }}
{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
{{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}

{{ Form::submit('Sign Up', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}