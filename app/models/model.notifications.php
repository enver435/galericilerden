<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-12 10:14:42
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-30 16:26:03
	
	Class Notifications
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('notifications')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function notifications($viewCount = false, $start, $limit)
		{
			if($viewCount === false)
			{
				if($start !== null AND $limit !== null)
				{
					$this->query = $this->db->from('notifications')
						->where('userId', session('userId'))
						->limit($start, $limit)
						->orderby('create_time', 'DESC')
						->run();
				}	
				else
				{
					$this->query = $this->db->from('notifications')
						->select('id')
						->where('userId', session('userId'))
						->run();
				}
			}
			else
			{
				$this->query = $this->db->from('notifications')
					->select('id')
					->where('userId', session('userId'))
					->where('view', 0)
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function notificationInfo($id)
		{
			$this->query = $this->db->from('notifications')
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
			$this->query = $this->db->update('notifications')
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
			$this->query = $this->db->delete('notifications')
				->where('id', $id)
				->done();

			return true;
		}

	}

?>