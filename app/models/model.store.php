<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-20 15:51:20
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 20:16:51
	
	Class Store 
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function stores($select = '*', $limit = null)
		{
			if($limit === null)
			{
				$this->query = $this->db->from('stores')
					->select($select)
					->run();
			}
			else
			{
				$this->query = $this->db->from('stores')
					->select($select)
					->where('status', 1)
					->where('end_time', time(), '>')
					->limit(0, $limit)
					->orderby('id', 'DESC')
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function getStoreDomainInfo($domainName)
		{
			$this->query = $this->db->from('stores')
				->where('store_domain', $domainName)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function getUserStore($userId = null)
		{
			if($userId === null)
			{
				$this->query = $this->db->from('stores')
					->where('user_id', session('userId'))
					->first();
			}
			else
			{
				$this->query = $this->db->from('stores')
					->where('user_id', $userId)
					->first();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function createStore($set)
		{
			$this->query = $this->db->insert('stores')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function updateStore($userId, $set)
		{
			$this->query = $this->db->update('stores')
				->where('user_id', $userId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function checkStoreDomainName($domainName)
		{
			$this->query = $this->db->from('stores')
				->where('store_domain', $domainName)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function storeInfo($storeId, $column = null)
		{
			$this->query = $this->db->from('store_types')
				->where('id', $storeId)
				->first();

			if(!empty($this->query))
			{
				return ($column === null) ? $this->query : $this->query[$column];
			}
			return false;
		}

		public function storeList()
		{
			$this->query = $this->db->from('store_types')
				->run();

			return $this->query;
		}

	}

?>