<?php
	
	class Admin_Home_Controller extends Admin_Controller
	{
		public $layout = "layouts.admin";

		public function action_index()
		{	
			$data = array();

			$this->layout->nest('content', 'admin.dashboard', $data);
		}
	}