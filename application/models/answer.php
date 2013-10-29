<?php
	
	class Answer extends Eloquent
	{
		public static $timestamps = true;

		public function question()
		{
			return $this->belongs_to('Question');
		}

		public function respondent()
		{

			return $this->belongs_to('Respondent');
		}
	}