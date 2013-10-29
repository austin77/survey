<!doctype html>
<html lang="en-gb">
	<head>
		<meta charset="UTF-8">
		<title>@yield('title')</title>

		<!-- Le Stylesheets -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/font-awesome.css') }}
		{{ HTML::style('css/admin.css') }}
	</head>

	<body>
		<div class="viewport">
			<div class="sidebar">
				<div class="logo">
					<h2>Survey</h2>
					<h3>Administration</h3>
				</div>

				<nav class="menu">
					<ul>
						<li>{{ HTML::link('admin', 'Dashboard') }}</li>
						<li>{{ HTML::link('admin/questions', 'Questions') }}</li>
						<li>{{ HTML::link('admin/questions/add', 'Add Question') }}</li>
						<li>{{ HTML::link('admin/analyse', 'Analyse Data') }}</li>
						<li>{{ HTML::link('admin/analyse/trends', 'Data Trends') }}</li>
					</ul>
				</nav>
			</div>

			<div class="main">
			@yield('content')
			</div>
		</div>
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ URL::to("js/libs/jquery.js") }}">\x3C/script>')</script>
	<script type="text/javascript">
	$(document).ready(function() {

		$('nav.menu ul li a').each(function() {
			var href = $(this).attr('href');
			if(href == window.location.href)
				$(this).parent('li').addClass('active');
		});
	});
	</script>
	@yield('scripts')
	</body>
</html>