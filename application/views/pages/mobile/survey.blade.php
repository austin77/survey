@section('title')
Opinion-Booth / Survey Questions
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	var email = "{{ $email }}";
	if(email == "") {
	}
	else {
		$('input[name="email"]').val(email);
	}
});
</script>
@endsection

@section('content')
<div class="page" id="survey-page">
	
	<h3 class="disclaimer">Please answer the questions as sincerly as you can to ensure accuracy</h3>
	@if($errors->all())
	<div class="alert alert-danger">
		Please check that you have anwsered the questions marked asterisks
	</div>
	@endif

	{{ Form::open('survey/answer', 'POST') }}
	<div class="user-contact-data-form">
		<div class="form-group">
			<label for="email">Email Address</label>
			<input type="text" name="email" id="email" class="form-control" value="{{ (Input::old('email')) ? Input::old('email') : '' }}">
		</div>

		<div class="form-group">
			<label for="mobile">Mobile Number</label>
			<input type="text" name="mobile" id="mobile" class="form-control" value="{{ (Input::old('mobile')) ? Input::old('mobile') : '' }}">
			<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i> 
			Your email and mobile number are strictly for the purpose of contacting the winner of the draw, and will not
			be used in any form illegal activity. We have a strict no spam policy.</span>
		</div>
	</div>
	<ul class="questions">
		@foreach($questions as $question)
			<?php $field = "question_".$question->id."_option"; ?>
			<li class="question {{ $errors->has($field) ? 'error' : '' }}">
				@if($errors->has($field))
				<div class="alert alert-danger">This question is required, please select an option</div>
				@endif

				<div class="title">{{ $question->title }}{{ ((bool) $question->required) ? "*": "" }}</div>
				<div class="options form-group">
				@foreach($question->options as $option)
						<div class="radio">
							<label>
							<?php $name = "question_".$question->id."_option"; ?>
							@if(Input::old($name))
							<input type="radio" value="{{ $option->id }}" name="question_{{ $question->id }}_option" checked>
							{{ $option->value }}
							@else
							<input type="radio" value="{{ $option->id }}" name="question_{{ $question->id }}_option">
							{{ $option->value }}
							@endif
						</label>
					</div>
				@endforeach
				</div>
			</li>
		@endforeach
	</ul>

	<div class="survey-actions">
		<input type="submit" class="btn btn-lg btn-success">
	</div>
	{{ Form::close() }}
</div>
@endsection