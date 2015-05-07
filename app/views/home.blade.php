<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Freelancer.com take home exam | Username suggest</title>
	{{ HTML::style('packages/tw-bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('packages/tw-bootstrap/css/main.css') }}
	{{ HTML::style('http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css') }}
	<style type="text/css">
		.username-suggest {
			padding: 20px 0;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="col-md-12 username-suggest">
			<div id="username-suggest"></div>
			<div class="row">
				{{ Form::open(array('url' => URL::route('check'), 'class' => 'navbar-form navbar-left' )) }}
					<div class="form-group">
						<input type="text" class="form-control" name="username" id="username" placeholder="Username">
					</div>
					<button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>

{{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}
{{ HTML::script('packages/tw-bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('packages/tw-bootstrap/js/ajax.js') }}
</body>
</html>
