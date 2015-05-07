<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Freelancer.com take home exam | Username suggest</title>
	{{ HTML::style('packages/tw-bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('packages/tw-bootstrap/css/main.css') }}
	{{ HTML::style('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css') }}
</head>
<body>

	<div class="container">

		<div id="username-search" class="row">
			
			{{ Form::open(array('url' => 'checkExist', 'class' => 'navbar-form navbar-left')) }}
		    	
		    	{{-- error / success messages altered via ajax --}}
		    	<div id="message" class="hidden"></div>
		    	<div id="suggestions" class="hidden alert"></div>

				<div class="form-group">
					<input type="text" class="form-control" name="username" id="username" placeholder="Username">
				</div>

				<button type="submit" class="btn btn-default" id="submit">Submit</button>
			{{ Form::close() }}

		</div>

	</div>

{{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
{{ HTML::script('packages/tw-bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('packages/tw-bootstrap/js/main.js') }}
</body>
</html>
