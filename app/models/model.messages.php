<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-14 10:14:03
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 10:10:38
	
	Class Messages 
	{

		private $db, $query, $result;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function messages($viewCount = false, $start, $limit)
		{
			if($viewCount === false)
			{
				if($start !== null AND $limit !== null)
				{
					$this->query = $this->db->query('SELECT * FROM messages WHERE userId = ' . session('userId') . ' AND (sendUser = ' . session('userId') . ' OR toUser = ' . session('userId') . ') AND deleted = 0 ORDER BY time DESC LIMIT ' . $start . ',' . $limit);
				}	
				else
				{
					$this->query = $this->db->query('SELECT id FROM messages WHERE userId = ' . session('userId') . ' AND (sendUser = ' . session('userId') . ' OR toUser = ' . session('userId') . ') AND deleted = 0');
				}
			}
			else
			{
				$this->query = $this->db->query('SELECT id FROM messages WHERE userId = ' . session('userId') . ' AND (sendUser = ' . session('userId') . ' OR toUser = ' . session('userId') . ') AND deleted = 0 AND view = 0');
			}

			$this->query->execute();
			$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($this->result))
			{
				return $this->result;
			}
			return false;
		}

		public function messageInfo($messageId)
		{
			$this->query = $this->db->from('messages')
				->where('userId', session('userId'))
				->where('id', $messageId)
				->where('deleted', 0)
				->first();	

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function messageInfoMessageId($messageId, $toUser, $sendUser)
		{
			$this->query = $this->db->from('messages')
				->where('id', $messageId, '!=')
				->where('sendUser', $sendUser)
				->where('toUser', $toUser)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function messageInfoAds($adsId, $userId, $sendUser, $toUser)
		{
			$this->query = $this->db->from('messages')
				->where('adsId', $adsId)
				->where('userId', $userId)
				->where('sendUser', $sendUser)
				->where('toUser', $toUser)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function messagesContent($messageId)
		{
			$this->query = $this->db->from('messages_content')
				->where('messagesId', $messageId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function updateMessage($id, $set)
		{
			$this->query = $this->db->update('messages')
				->where('id', $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function addMessage($set)
		{
			$this->query = $this->db->insert('messages')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function addMessageContent($set)
		{
			$this->query = $this->db->insert('messages_content')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteMessage($messageId)
		{
			$this->query = $this->db->update('messages')
				->where('id', $messageId)
				->where('userId', session('userId'))
				->set(array('deleted' => 1));

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteFullMessages($messageId)
		{
			$this->query = $this->db->delete('messages')
				->where('id', $messageId)
				->done();

			$this->query = $this->db->delete('messages_content')
				->where('messagesId', $messageId)
				->done();

			return true;
		}

		public function checkMessage($adsId, $userId, $sendUser, $toUser)
		{
			$this->query = $this->db->from('messages')
				->where('adsId', $adsId)
				->where('userId', $userId)
				->where('sendUser', $sendUser)
				->where('toUser', $toUser)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function countMessageMonthly($userId)
		{
			$count      = 0;
			$startMonth = strtotime('01.' . date('m') . '.' . date('Y') . ' 00:00');
			$endMonth   = strtotime('+30 day', $startMonth);

			$this->query = $this->db->from('messages')
				->select('id')
				->where('create_time', $startMonth, '>=')
				->where('create_time', $endMonth, '<=')
				->where('toUser', $userId)
				->groupby('create_time')
				->run();

			if(!empty($this->query))
			{
				foreach ($this->query as $value) 
				{
					$count++;
				}
			}

			return $count;
		}

	}	

?>