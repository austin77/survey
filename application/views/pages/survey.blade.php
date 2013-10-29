@section('title')
Survey / Questions
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	var email = "{{ $email }}";
	if(email == "")
	{
		$('#modal-form').modal({
			backdrop: "static",
			keyboard: false
		});
	}

	$("#proceed-btn").click(function (event) {
		$('#modal-form').modal('hide');
		event.preventDefault();
	});
});
</script>
@endsection

@section('content')
<div class="row" id="survey-page">
	<div class="col-md-12">
		<div class="inner">
			{{ Form::open('survey/answer', 'POST') }}
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
								<input type="radio" value="{{ $option->id }}" name="question_{{ $question->id }}_option">
								{{ $option->value }}
							</label>
						</div>
					@endforeach
					</div>
				</li>
			@endforeach
			</ul>

			<div class="survey-actions">
				<button class="btn btn-lg btn-success">Done</button>
			</div>

			<div class="modal fade" id="modal-form">
				<div class="modal-dialog">
				    <div class="modal-content">
					    <div class="modal-header">
					        <h4 class="modal-title">Please fill the form below</h4>
					    </div>
				      	<div class="modal-body">
				        	<div class="form-group">
				        		<label for="email">Email Address</label>
				        		<input type="text" name="email" id="email" class="form-control">
				        	</div>

				        	<div class="form-group">
				        		<label for="mobile">Mobile Number</label>
				        		<input type="text" name="mobile" id="mobile" class="form-control">
				        	</div>
				      	</div>
				     	<div class="modal-footer">
					        <button type="button" class="btn btn-primary" id="proceed-btn">Proceed</button>
				      	</div>
				    </div><!-- /.modal-content -->
				 </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection