<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 13:41:07
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-22 11:55:59
	
	Class User
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

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function userInfo($value, $column = null)
		{
			if(is_numeric($value))
			{
				$this->query = $this->db->from('users')
					->where('id', $value)
					->first();
			}
			else
			{
				$this->query = $this->db->from('users')
					->where('email', $value)
					->first();
			}

			if(!empty($this->query))
			{
				return ($column === null) ? $this->query : $this->query[$column];
			}
			return false;
		}

		public function login($email, $pass)
		{
			$this->query = $this->db->from('users')
				->where('email', $email)
				->where('pass', $pass)
				->where('status', 1)
				->first();

			if(!empty($this->query))
			{
				setSession('login', true);
				setSession('userId', $this->query['id']);

				return array(
					'login' => true,
					'info'  => $this->query
				);
			}
			return false;
		}

		public function register($set)
		{
			$this->query = $this->db->insert('users')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function update($userId, $set)
		{
			$this->query = $this->db->update('users')
				->where('id', $userId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function delete($userId)
		{
			$this->query = $this->db->delete('users')
				->where('id', $userId)
				->done();

			return true;
		}

		public function _exit()
		{
			removeSession('login');
			removeSession('userId');
			return true;
		}

	}

?>