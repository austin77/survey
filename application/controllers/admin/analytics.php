<?php
	
	class Admin_Analytics_Controller extends Admin_Controller
	{
		public $layout = "layouts.admin";

		public function action_index()
		{	
			$questions = Question::with(array('answers','options'))->order_by('id','asc')->get();
			
			foreach($questions as $question)
			{
				$labels = array();
				foreach($question->options as $option)
				{	
					$labels[] = $option->value;
				}
				$question->labels = implode(",", $labels);
			}

			//view data
			$data['questions'] = $questions;
			//render view
			$this->layout->nest('content', 'admin.analytics.index', $data);
		}
	}