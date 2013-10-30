<?php
	
	class Pages_Controller extends Base_Controller
	{
		/*
			Displays Home Page
		*/
		public function action_index()
		{
			$this->layout->nest('content', $this->view_path('pages.home'));
		}

		/*
			Displays About Page
		*/

		public function action_about()
		{
			$this->layout->nest('content', $this->view_path('pages.about'));
		}

		/*
			Displays Contact Page
		*/
		public function action_contact()
		{
			$data['message'] = Session::get('message');
			$this->layout->nest('content', $this->view_path('pages.contact'), $data);
		}

		public function action_send_message()
		{
			//Input
			$attributes = Input::all();
			//Validation rules
			$rules = array(
				"name" => "required",
				"email" => "required|email",
				"message" => "required"
			);
			//Validation message
			$messages = array(
				"name_required" => "Please enter a name",
				"email_required" => "Please enter an e-mail address",
				"email_email" => "Please enter a valid email address",
				"message_required" => "Please enter your message"
			);
			//validator
			$validator = Validator::make($attributes, $rules, $messages);

			if($validator->fails())
			{
				Input::flash();
				return Redirect::to('contact')->with_errors($validator);
			}
			else
			{
				$recipient = "info@opinion-booth.com";
				Message::send(function($message)
				{
				    $message->to("info@opinion-booth.com");
				    $message->from(Input::get('email'), Input::get('name'));

				    $message->subject(Input::get('subject', "Mail from site"));
				    $message->body('view: emails.message');

				    // You can add View data by simply setting the value
				    // to the message.
				    $message->body->name = Input::get('name');
				    $message->body->message = Input::get('message');

				    $message->html(true);
				});

				Session::flash('message','Your message was sent successfully, we get in touch with you as soon as possible');
				return Redirect::to('contact');
			}
		}
		/*
			Displays How it works Page
		*/
		public function action_features()
		{
			$this->layout->nest('content', $this->view_path('pages.howitworks'));
		}

		public function action_privacy()
		{
			$this->layout->nest('content', $this->view_path('pages.privacy'));
		}

		public function action_tos()
		{
			$this->layout->nest('content', $this->view_path('pages.tos'));
		}

		/*
			Displays Survey Page
		*/
		public function action_survey()
		{
			$questions = Question::with('options')->order_by('id','asc')->get();

			$data['questions'] = $questions;
			$data['email'] = (Session::get('email')) ? Session::get('email') : Input::old('email');
			//render
			$this->layout->nest('content', $this->view_path('pages.survey'), $data);
		}
	}