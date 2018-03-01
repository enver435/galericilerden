<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 17:24:47
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-28 10:38:44
	
	Class StoreAdmin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function stores($type)
		{
			if($type == 'pending')
			{
				$this->query = $this->db->from('stores')
					->where('status', 0)
					->run();
			}
			elseif($type == 'approved')
			{
				$this->query = $this->db->from('stores')
					->where('status', 1)
					->run();
			}
			elseif($type == 'expired')
			{
				$this->query = $this->db->from('stores')
					->where('end_time', time(), '<')
					->where('end_time', 0, '!=')
					->run();
			}
			elseif($type == 'not-expired')
			{
				$this->query = $this->db->from('stores')
					->where('end_time', time(), '>')
					->where('end_time', 0, '!=')
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function update($id, $set)
		{
			$this->query = $this->db->update('stores')
				->where('id', $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function delete($id)
		{
			$this->query = $this->db->delete('stores')
				->where('id', $id)
				->done();

			return true;
		}

		public function storeInfo($id)
		{
			$this->query = $this->db->from('stores')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function deleteUserStore($userId)
		{
			$this->query = $this->db->delete('stores')
				->where('user_id', $userId)
				->done();

			return true;
		}

		public function storeTypeInfo($id, $column = null)
		{
			$this->query = $this->db->from('store_types')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return ($column === null) ? $this->query : $this->query[$column];
			}
			return false;
		}

		public function storeTypeList()
		{
			$this->query = $this->db->from('store_types')
				->run();

			return $this->query;
		}

		public function storeTypeUpdate($id, $set)
		{
			$this->query = $this->db->update('store_types')
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