<?php

class Base_Controller extends Controller {

	public $isMobile = false;
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct() 
	{
		$this->set_layout();
		parent::__construct();

	}

	public function view_path($path)
	{
		//explose path string
		$path_parts = explode(".", $path);

		if(Holmes::is_mobile())
		{
			$view_path = $path_parts[0].".mobile.".$path_parts[1];
		}
		else
		{
			$view_path = $path_parts[0].".desktop.".$path_parts[1];
		}

		return (string) $view_path;
	}

	private function set_layout()
	{
		if(Holmes::is_mobile())
		{
			$this->layout = "layouts.mobile";
		}
		else
		{
			$this->layout = "layouts.master";
		}
	}
}