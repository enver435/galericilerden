<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-12 10:11:13
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-12 10:30:46
	
	Class NotificationsAdmin 
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

		public function update($id, $column, $set)
		{
			$this->query = $this->db->update('notifications')
				->where($column, $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function checkNotification($id, $column)
		{
			$this->query = $this->db->from('notifications')
				->where($column, $id)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

	}

?>