@section('title')
Analytics - Admin
@endsection

@section('scripts')
{{ HTML::script('js/libs/Chart.min.js') }}
{{ HTML::script('js/admin/data-summary.js') }}
<script type="text/javascript">dataSummary.init();</script>
@endsection

@section('content')
<div class="page" id="analytics-index-page">
	<div class="page-header clearfix">
		<div class="pull-left title">
			<h2>Data Summary</h2>
		</div>

		<div class="pull-right actions" style="padding-top: 10px;">
			<a href="{{ URL::to('admin/analyse/trends') }}" class="btn btn-lg btn-info">
				<i class="icon icon-bar-chart"></i>
				Data Trends</a>
		</div>
	</div>	

	<div class="page-content">
	@foreach($questions as $question)
		<div class="question-summary">
			<canvas class="question-chart" id="question-{{ $question->id }}"  width="650" height="300"></canvas>
			<input id="question-{{ $question->id }}" type="hidden" value="{{ $question->labels }}">
		</div>
	@endforeach
	</div>
</div>
@endsection