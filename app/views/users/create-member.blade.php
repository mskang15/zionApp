<section class="errors">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</section>

{{ Form::open(array('url'=>'users/create-member', 'class'=>'form-signup')) }}
<h2 class="form-signup-heading">Create Member</h2>



{{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Member Name')) }}
{{ Form::text('branch', null, array('class'=>'input-block-level', 'placeholder'=>'Branch Name')) }}
{{ Form::text('baptism_date', null, array('class'=>'input-block-level', 'placeholder'=>'Baptism Date')) }}

{{ Form::submit('Sign Up', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}