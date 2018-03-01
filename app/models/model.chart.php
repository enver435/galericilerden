<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-13 13:05:52
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-14 17:59:01
	
	Class Chart
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function getChart($userId)
		{
			$this->query = $this->db->from('chart')
				->where('userId', $userId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function countAdsMonthly($userId)
		{
			$view       = 0;
			$startMonth = strtotime('01.' . date('m') . '.' . date('Y') . ' 00:00');
			$endMonth   = strtotime('+30 day', $startMonth);

			$this->query = $this->db->from('chart')
				->select('userId, countAdView')
				->where('time', $startMonth, '>=')
				->where('time', $endMonth, '<=')
				->where('userId', $userId)
				->run();

			if(!empty($this->query))
			{
				foreach ($this->query as $value) 
				{
					$view += $value['countAdView'];
				}
			}

			return $view;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('chart')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

	}

?>