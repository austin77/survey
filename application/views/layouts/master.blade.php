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
		{{ HTML::style('css/font-awesome.css') }}
		{{ HTML::style('css/theme.css') }}
	</head>

	<body>
		<div class="header container">
			<div class="title pull-left">Opinion-Booth</div>
			<div class="nav pull-right">
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a></li>
					<li><a href="{{ URL::to('how-it-works') }}">How it works</a></li>
					<li><a href="{{ URL::to('about') }}">About Us</a></li>
					<li><a href="{{ URL::to('contact') }}">Contact Us</a></li>
				</ul>
			</div>
		</div>

		<div class="content container">
		@yield('content')
		</div>

		<div class="footer container">
			<div class="row">
				<div class="col-md-12 clearfix">
					<div class="social-share">
						<h4>Share the survey with friends</h4>
						<a href="javascript:window.open(encodeURI('https://www.facebook.com/sharer/sharer.php?u={{ URL::to('/') }}'), '_blank', 'width=400,height=500');void(0);">
							<i class="icon icon-facebook"></i>
						</a>
						<a href="javascript:window.open(encodeURI('https://twitter.com/intent/tweet?text=Participate in this survey to win a samsung galaxy tab. {{ URL::to("/") }}'), '_blank', 'width=400,height=500');void(0);">
							<i class="icon icon-twitter"></i>
						</a>
					</div>

					<div class="footer-links pull-left">
						<a href="{{ URL::to('about') }}">About Us</a>
						<a href="{{ URL::to('how-it-works') }}">How it works</a>
						<a href="{{ URL::to('privacy') }}">Privacy Policy</a>
						<a href="{{ URL::to('tos') }}">Terms Of Service</a>
						<div class="copyright">
							<p>&copy; Opinion-Booth 2013.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="{{ URL::to("js/libs/jquery.js") }}">\x3C/script>')</script>
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