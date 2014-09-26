<!DOCTYPE html>
<html lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>Zion App</title>

        <!-- Latest compiled and minified CSS -->


        <!-- Latest compiled and minified JavaScript -->
    	{{ HTML::style('css/main.css')}}
        {{ HTML::style('css/bootstrap.min.css')}}
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

  	</head>

  	<body>

	    <div class="container container-box">

	  		<div class="container">
	  			<h3>Zion App</h3>
	  		</div>

	    	@if(Session::has('message'))
				<p class="alert">{{ Session::get('message') }}</p>
			@endif

	    	{{ $content }}
	    </div>

        <div class="navbar-inner" data-role="navbar" >
            <div class="container">
                <ul class="nav">
                    <li>{{ HTML::link('/', 'Home') }}</li>
                    @if(!Auth::check())
                    <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                    @else
                    <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                    <li>{{ HTML::link('users/create-member', 'Add Member') }}</li>
                    @if(Auth::user()->role == "admin")
                    <li>{{ HTML::link('users/create-teacher', 'Add Teacher') }}</li>
                    @endif
                    @endif
                </ul>
            </div>
        </div>

    </body>
</html>