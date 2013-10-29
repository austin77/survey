<?php
	
	class Admin_Questions_Controller extends Base_Controller
	{

		public $layout = "layouts.admin";
		public $viewdata = array();

		public function action_index()
		{
			$questions = Question::with('options')
								 ->order_by('updated_at', 'desc')
								 ->get();

			//view data
			$this->viewdata['questions'] = $questions;
			$this->viewdata['message'] = Session::get('message');

			$this->layout->nest('content', 'admin.questions.index', $this->viewdata);
		}

		public function action_showForm($id = null)
		{
			$this->viewdata['message'] = Session::get('message');

			if(is_null($id))
			{
				$this->viewdata['action'] = "add";
				$this->viewdata['question'] = array();
			}
			else
			{
				$this->viewdata['id'] = $id;
				$this->viewdata['action'] = "edit";
				$this->viewdata['question'] = Question::find((int) $id);
			}

			$this->layout->nest('content', 'admin.questions.form', $this->viewdata);
		}

		public function action_add()
		{
			//Form attributes
			$input = Input::all();
			//Validation rules
			$rules = array(
				"title" => "required|unique:questions,title"
			);
			//Make Validation
			$validation = Validator::make($input, $rules);
			//run validation
			if($validation->fails())
			{
				return Redirect::to('admin/questions/add')->with_errors($validation);
			}
			else
			{
				//Create question model
				$question = Question::create(array(
					"title" => Input::get('title'),
					"required" => Input::get('required')
				));

				if($question)
				{
					//add question options
					$options = Input::get('option');
					//options are available, add them
					if(count($options) > 0)
					{
						foreach($options as $key => $option) {
							$opt = Option::create(array("question_id" => $question->id, "value" => $option));
						}
						//Flash notification message
						Session::flash('message', 'Questions successfully added!');
						//redirect to form
						return Redirect::to('admin/questions/add');
					}
				}
			}
		}

		public function action_update($id) 
		{

		}

		public function action_delete($id)
		{
			$question = Question::find((int) $id);
			$options = Option::where('question_id','=', $id)->get();

			foreach($options as $option):
				$option->delete();
			endforeach;

			$question->delete();

			Session::flash('message', 'Questions successfully removed!');

			return Redirect::to('admin/questions');
		}
	}