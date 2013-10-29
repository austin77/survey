<?php
	
	class Question extends Eloquent
	{	
		public static $timestamps = true;

		public function options() 
		{
			return $this->has_many('Option');
		}

		public function answers()
		{
			return $this->has_many('Answer');
		}
	}