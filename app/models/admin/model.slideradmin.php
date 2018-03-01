<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 13:10:44
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 13:46:27
	
	Class SliderAdmin
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

		public function addSlider($image)
		{
			$this->query = $this->db->insert('sliders')
				->set(array('image' => $image));	

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function sliderDelete($id)
		{
			$this->query = $this->db->delete('sliders')
				->where('id', $id)
				->done();

			return true;
		}

	}

?>