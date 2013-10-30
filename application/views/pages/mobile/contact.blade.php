@section('title')
Opinion-Booth / Get in touch
@endsection

@section('content')
<div class="page" id="contact-page">
	<div class="top">
		<h3>Get in touch with us today</h3>

		<p><i class="icon icon-envelope-alt"></i> info@opinion-booth.com</p>
		<p><i class="icon icon-mobile-phone"></i> 07068181972</p>
		<p><i class="icon icon-mobile-phone"></i> 07081897916</p>
	</div>

	<div class="bottom">
		@if($message)
		<div class="alert alert-info">
			{{ $message }}
		</div>
		@endif

		{{ Form::open('contact', 'POST') }}
		<h3>Send us a message</h3>
		<div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
			<label for="name">Name*</label>
			<input type="text" id="name" name="name" class="form-control">
			@if($errors->has('name'))
					<span class="help-block">{{ $errors->first('name') }}</span>
					@endif
		</div>

		<div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
			<label for="email">Email Address*</label>
			<input type="text" id="email" name="email"  class="form-control">
			@if($errors->get('email'))
			@foreach($errors->get('email') as $error_message)
			<span class="help-block">{{ $error_message }}</span>
			@endforeach
			@endif
		</div>

		<div class="form-group">
			<label for="subject">Subject</label>
			<input type="text" id="subject" name="subject"  class="form-control">
		</div>

		<div class="form-group {{ $errors->has('message') ? 'error' : '' }}">
			<label for="message">Message*</label>
			<textarea name="message" id="message" rows="3"  class="form-control"></textarea>
			@if($errors->has('message'))
			<span class="help-block">{{ $errors->first('message') }}</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-block btn-success">Send Message</button>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection