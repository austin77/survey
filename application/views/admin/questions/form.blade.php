@section('title')
{{ ucwords($action) }} Question - Admin
@endsection

@section('scripts')
{{ HTML::script('js/libs/underscore.js') }}
{{ HTML::script('js/admin/question-form.js') }}
<script type="text/javascript">questionForm.init();</script>
@endsection

@section('content')
<script type="text/template" id="option-template">
<li class="option">
	<a href=""><%= value %></a>
	<div class="actions">
		<a href="#" class="remove-option" data-value="<%= value %>"><i class="icon icon-close"></i> Remove</a>
	</div>
</li>
</script>
<div class="page" id="question-form-page">
	<div class="page-header clearfix">
		<div class="pull-left title">
			<h2>{{ ucwords($action) }} Question</h2>
		</div>

	</div>

	<div class="page-content">
	@if($action == "add")
	{{ Form::open('admin/questions/add', 'POST', array("class"=>"form-horizontal")) }}
	@elseif($action == "edit")
	{{ Form::open('admin/questions/update/'.$id, 'POST', array("class"=>"form-horizontal","id"=>"question-form")) }}
	@endif

	@if($message)
	<div class="alert alert-info">
		{{ $message }}
	</div>
	@endif

	<div class="form-group clearfix">
		<div class="btn-group pull-right">
			<button class="btn btn-lg btn-success" type="submit">Save</button>
			<a href="{{ URL::to('admin/questions') }}" class="btn btn-lg btn-danger">Cancel</a>
		</div>
	</div>

	<div class="form-group">
		<label for="title">Question Title</label>
		@if($question)
		<input class="form-control" type="text" name="title" id="title" value="{{ $question->title }}">
		@else
		<input class="form-control" type="text" name="title" id="title" >
		@endif
	</div>

	<div class="form-group">
		<label for="required">Required</label>
		{{ Form::select('required', array(0=> "No" , 1=> "Yes"), ($question) ? $question->required : 0, array("class"=>"form-control")) }}
	</div>

	<div class="form-group">
		<button class="btn btn-default" type="button" id="add-option-btn"><i class="icon icon-plus-sign"></i> Add Option</button>
		<div id="option-form">
			<input type="text" class="form-control" id="option-value" placeholder="Enter option value">
			<button class="btn btn-default" type="button" id="option-add-btn"><i class="icon icon-plus-sign"></i></button>
		</div>
	</div>

	<div class="form-group options">
		<h3>Question Options</h3>
		<ul id="option-list">
		@foreach($question->options as $option)
		<li class="option">
			<a href="">{{ $option->value }}</a>
			<div class="actions">
				<a href="#" class="remove-option" data-value="{{ $option->value }}"><i class="icon icon-close"></i> Remove</a>
			</div>
		</li>

		<input type="hidden" name="option[]" value="{{ $option->value }}">
		@endforeach
		</ul>
	</div>

	<div class="form-actions">
	</div>
	{{ Form::close() }}
	</div>
</div>
@endsection