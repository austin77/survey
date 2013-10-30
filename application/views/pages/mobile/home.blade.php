@section('title')
Opinion-Booth / Home
@endsection

@section('content')
<div class="page" id="home-page">

	<div class="inner">
		<p>Complete the survey and stand a chance to win a Samsung Galaxy Tab <br>
				<a href="{{ URL::to('survey') }}" class="btn btn-lg btn-success">Participate in the survey</a>
			</p>
	</div>

	<div class="promo">
		{{ HTML::image('img/promo.png') }}
	</div>
</div>
@endsection