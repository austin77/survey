@section('title')
Opinion-Booth / Survey Questions
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	var email = "{{ $email }}";
	console.log(email);
	if(email == "")
	{
		$('#modal-form').modal({
			backdrop: "static",
			keyboard: false
		});
	}
	else
	{
		$('input[name="email"]').val(email);
		console.log($('input[name="email"]'));
	}

	$('#email').blur(function (event) {
		if(!$(this).val())
		{
			$(this).parent('div').addClass('error');
			$(this).parent('div').find('span').remove();
			$(this).parent('div').append('<span class="help-block">Please enter an email address</span>');
		}
		else
		{
			var email = $(this).val();
			var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
			if(pattern.test(email))
			{
				$(this).parent('div').removeClass('error');
				$(this).parent('div').find('span').remove();
			}
			else
			{
				$(this).parent('div').addClass('error');
				$(this).parent('div').find('span').remove();
				$(this).parent('div').append('<span class="help-block">Please enter a valid email address</span>');
			}
		}
	});

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
			<h3>Please answer the questions as sincerly as you can to ensure accuracy</h3>

			@if($errors->all())
			<div class="alert alert-danger">
				Please check that you have anwsered the questions marked asterisks
			</div>
			@endif

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
				<button class="btn btn-lg btn-success">Done</button>
			</div>

			<div class="modal fade" id="modal-form">
				<div class="modal-dialog">
				    <div class="modal-content">
					    <div class="modal-header">
					        <h4 class="modal-title">Please fill the form below to continue</h4>
					    </div>
				      	<div class="modal-body">
				        	<div class="form-group">
				        		<label for="email">Email Address</label>
				        		<input type="text" name="email" id="email" class="form-control">
				        	</div>

				        	<div class="form-group">
				        		<label for="mobile">Mobile Number</label>
				        		<input type="text" name="mobile" id="mobile" class="form-control">
				   				<span class="help-block"><i class="glyphicon glyphicon-exclamation-sign"></i> 
				   					Your email and mobile number are strictly for the purpose of contacting the winner of the draw, and will not
				   					be used in any form illegal activity. We have a strict no spam policy.</span>
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