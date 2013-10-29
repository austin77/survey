<?php
	
	class Respondent extends Eloquent
	{

		public static $timestamps = true;

		public function answers()
		{
			return $this->has_many('Answer');
		}
	}