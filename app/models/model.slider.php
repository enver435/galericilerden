<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 13:12:36
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 13:56:52
	
	Class Slider
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function sliders()
		{
			$this->query = $this->db->from('sliders')
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>