<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2018-01-18 20:30:56
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 00:49:50

	Class FavoritesSearch
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('favorites_search')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function edit($favoriteId, $set)
		{
			$this->query = $this->db->update('favorites_search')
				->where('id', $favoriteId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function delete($favoriteId)
		{
			$this->db->delete('favorites_search')
				->where('id', $favoriteId)
				->done();

			return true;
		}

		public function deleteItems($favoriteId)
		{
			$this->db->delete('favorites_search_item_values')
				->where('favorite_id', $favoriteId)
				->done();

			return true;
		}

		public function addItems($set)
		{
			$this->query = $this->db->insert('favorites_search_item_values')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function favoriteSearch($userId, $start, $limit)
		{
			if($start !== null AND $limit !== null)
			{
				$this->query = $this->db->from('favorites_search')
					->where('user_id', $userId)
					->limit($start, $limit)
					->orderby('id', 'DESC')
					->run();
			}
			else
			{
				$this->query = $this->db->from('favorites_search')
					->where('user_id', $userId)
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function favoriteSearchItems($favoriteId)
		{
			$this->query = $this->db->from('favorites_search_item_values')
				->where('favorite_id', $favoriteId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>