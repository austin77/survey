@section('title')
Questions - Admin
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	$('a.btn-collaspe').click(function (event) {
		
		var id = $(this).attr('data-id');
		var _box = '#options-box'+id;
		var box = $(_box);
			
			if(box.is(':visible'))
				box.hide();
			else
				box.show();

		event.preventDefault();
	});
});
</script>
@endsection

@section('content')
<div class="page" id="questions-page">
	<div class="page-header clearfix">
		<div class="pull-left title">
			<h2>Questions</h2>
		</div>

		<div class="pull-right actions" style="padding-top: 10px;">
			<a href="{{ URL::to('admin/questions/add') }}" class="btn btn-lg btn-info">Add Question</a>
		</div>
	</div>

	<div class="page-content">
	@if($message)
	<div class="alert alert-info">
		{{ $message }}
	</div>
	@endif

	@if($questions)
	<ul class="question-list">
		@foreach($questions as $question)
		<li class="question">
			<div class="clearfix" style="background: #C4C4C4;">
				<div class="title pull-left">
					<a href="" class="btn btn-default btn-collaspe" data-id="{{ $question->id }}"><i class="icon icon-plus-sign"></i></a> {{ $question->title }}
				</div>
				<div class="actions pull-right">
					<a href="{{ URL::to('admin/questions/edit/'.$question->id) }}" class="btn btn-default">Edit</a>
					<a href="{{ URL::to('admin/questions/delete/'.$question->id) }}" class="btn btn-default">Delete</a>
				</div>
			</div>

			<div class="clearfix" id="options-box{{ $question->id }}" style="display:none;">
				<ul class="options">
				@foreach($question->options as $option)
				<li>{{ $option->value }}</li>
				@endforeach
				</ul>
			</div>
		</li>
		@endforeach
	</ul>
	@else
		<div class="empty">
			<h2>No questions found on the database</h2>
			<a href="{{ URL::to('admin/questions/add') }}" class="btn btn-lg btn-info">Add Question</a>
		</div>
	@endif
	</div>
</div>
@endsection