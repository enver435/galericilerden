<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-19 10:10:05
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-20 10:49:31
	
	Class Doping
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function dopingList()
		{
			$this->query = $this->db->from('ads_doping')
				->run();

			return $this->query;
		}

		public function dopingInfo($dopingId)
		{
			$this->query = $this->db->from('ads_doping')
				->where('id', $dopingId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>