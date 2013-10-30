<!doctype html>
<html lang="en-gb">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title')</title>

		<!-- Stylesheets -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/font-awesome.css') }}
		{{ HTML::style('css/theme-mobile.css') }}
	</head>

	<body>
		<div class="header navbar navbar-inverse" role="banner">
			<div class="container">
				<div class="navbar-header">
				    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				    <a href="{{ URL::to('/') }}" class="navbar-brand">Opinion-Booth</a>
			    </div>
			    <div class="collapse navbar-collapse navbar-ex1-collapse" role="navigation">
				    <ul class="nav navbar-nav">
					    <li><a href="{{ URL::to('/') }}">Home</a></li>
					    <li><a href="{{ URL::to('/how-it-works') }}">How it works</a></li>
					    <li><a href="{{ URL::to('/about') }}">About Us</a></li>
					    <li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
				    </ul>
			   </div>
			</div>
		</div>

		<div class="content container">
			@yield('content')
		</div>

		<div class="footer">
			<div class="container">
				<div class="social-share">
					<h4>Share the survey with friends</h4>
					<a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('/') }}')">
						<i class="icon icon-facebook"></i>
					</a>
					<a href="https://twitter.com/intent/tweet?text=Participate in this survey to win a samsung galaxy tab. {{ URL::to('/') }}'">
						<i class="icon icon-twitter"></i>
					</a>
				</div>

				<div class="footer-links">
					<a href="{{ URL::to('privacy') }}">Privacy Policy</a>
					<a href="{{ URL::to('tos') }}">Terms Of Service</a>
				</div>

				<div class="copyright">
					<p>&copy; Opinion-Booth 2013.</p>
				</div>
			</div>
		</div>

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="{{ URL::to("js/libs/jquery.js") }}">\x3C/script>')</script>
		{{ HTML::script('js/bootstrap.min.js') }}
		@yield('scripts')
	</body>
</html>