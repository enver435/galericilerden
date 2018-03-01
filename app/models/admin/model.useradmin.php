<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-23 17:38:47
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 13:18:58
	
	Class UserAdmin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function users()
		{
			$this->query = $this->db->from('users')
				->run();

			return $this->query;
		}

		public function corporateRequestUsers()
		{
			$this->query = $this->db->from('users')
				->where('corporateRequest', 1)
				->run();

			return $this->query;
		}

		public function userInfo($id)
		{
			$this->query = $this->db->from('users')
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
			$this->query = $this->db->update('users')
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
			$this->query = $this->db->delete('users')
				->where('id', $id)
				->done();

			return true;
		}

	}

?>