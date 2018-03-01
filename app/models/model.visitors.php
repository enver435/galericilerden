<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-28 11:02:21
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-28 14:03:03
	
	Class Visitors
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function dailyVisitors()
		{
			$date = strtotime(date('d.m.Y') . '00:00');

			$this->query = $this->db->from('visitors')
				->where('date', $date)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function checkIp($ip, $date)
		{
			$this->query = $this->db->from('visitors')
				->where('ip', $ip)
				->where('date', $date)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('visitors')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

	}

?>