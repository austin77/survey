@section('title')
Opinion-Booth / Home
@endsection

@section('content')
<div class="row" id="home-page">
	<div class="col-md-7 promo">
	</div>

	<div class="col-md-5">
		<div class="inner" id="call-to-action">
			<p>Complete the survey and stand a chance to win a Samsung Galaxy Tab <br>
				<a href="{{ URL::to('survey') }}" class="btn btn-lg btn-success">Participate in the survey</a>
			</p>
		</div>
	</div>
</div>
@endsection