<!doctype html>
<html lang="en-gb">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Stylesheets -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/theme.css') }}
	</head>

	<body>
		<div class="header container">
			<div class="title pull-left">Survey</div>
			<div class="nav pull-right">
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a></li>
					<li><a href="">How it works</a></li>
					<li><a href="">About Us</a></li>
					<li><a href="">Contact Us</a></li>
				</ul>
			</div>
		</div>

		<div class="content container">
		@yield('content')
		</div>

		<div class="footer container">
		</div>

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery.js">\x3C/script>')</script>
		{{ HTML::script('js/bootstrap.min.js') }}
		<script type="text/javascript">
		$(document).ready(function() {
			$('.nav ul li a').each(function() {
				var href = $(this).attr('href');
				if(href == window.location.href)
					$(this).parent('li').addClass('active');
			});
		});
		</script>
		@yield('scripts')
	</body>
</html>