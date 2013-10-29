<?php
	
	class Option extends Eloquent
	{
		public static $timestamps = true;

		public function question()
		{
			return $this->belongs_to('Question');
		}
	}