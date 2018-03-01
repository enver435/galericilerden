<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-23 16:55:53
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-23 16:59:18
	
	Class DopingAdmin
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

		public function dopingInfo($id)
		{
			$this->query = $this->db->from('ads_doping')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function update($id, $set)
		{
			$this->query = $this->db->update('ads_doping')
				->where('id', $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

	}

?>