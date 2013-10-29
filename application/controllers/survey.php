<?php
	
	class Survey_Controller extends Base_Controller 
	{
		public $layout = "layouts.master";

		public function action_answer()
		{
			//Validate questions
			$questions = Question::with('options')->get();
			$validation_rules = array();

			foreach($questions as $question)
			{
				if((bool) $question->required)
				{
					$fieldname = "question_".$question->id."_option";
					$validation_rules[$fieldname] = "required";
				}
			}

			$validator = Validator::make(Input::all(), $validation_rules);

			if($validator->fails())
			{
				return Redirect::to('survey')->with_errors($validator);
			}
			else
			{
				//create respondent
				$respondent = new Respondent;
				$respondent->email = Input::get('email');
				$respondent->mobile = Input::get('mobile', NULL);

				$respondent->save();

				foreach($questions as $question)
				{
					$fieldname = "question_".$question->id."_option";
					//create answer model
					$answer = new Answer;

					$answer->question_id = $question->id;
					$answer->respondent_id = $respondent->id;
					$answer->option_id = Input::get($fieldname, NULL);

					$answer->save();
				}

				Session::put('email', Input::get('email'));
				return Redirect::to('survey/complete');
			}
		}

		public function action_complete()
		{
			$data['email'] = Session::get('email', 'john.doe@xyx.com');
			//Clear session
			Session::forget('email');
			//Render view
			$this->layout->nest('content', 'pages.surveycomplete', $data);
		}
	}