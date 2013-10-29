<?php
	
	class Pages_Controller extends Base_Controller
	{

		public $layout = "layouts.master";

		/*
			Displays Home Page
		*/
		public function action_index()
		{
			$this->layout->nest('content', 'pages.home');
		}

		public function action_survey()
		{
			$questions = Question::with('options')->order_by('id','asc')->get();

			$data['questions'] = $questions;
			$data['email'] = Session::get('email');
			//render
			$this->layout->nest('content', 'pages.survey', $data);
		}
	}