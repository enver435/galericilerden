<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-03 13:44:10
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-16 09:52:51
	
	Class Favorites
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function adsFavorites($adsId)
		{
			$this->query = $this->db->from('ads_favorites')
				->where('adsId', $adsId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function favoritesAdsUser($userId, $start, $limit)
		{
			if($start !== null AND $limit !== null)
			{
				$this->query = $this->db->from('ads_favorites')
					->where('userId', $userId)
					->limit($start, $limit)
					->orderby('time', 'DESC')
					->run();
			}
			else
			{
				$this->query = $this->db->from('ads_favorites')
					->select('id')
					->where('userId', $userId)
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function checkFavorite($adsId)
		{
			$this->query = $this->db->from('ads_favorites')
				->where('userId', session('userId'))
				->where('adsId', $adsId)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function addFavorite($set)
		{
			$this->query = $this->db->insert('ads_favorites')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteFavorite($favoriteId)
		{
			$this->query = $this->db->delete('ads_favorites')
				->where('userId', session('userId'))
				->where('id', $favoriteId)
				->done();

			return true;
		}

		public function countFavoriteMonthly($userId)
		{
			$count      = 0;
			$startMonth = strtotime('01.' . date('m') . '.' . date('Y') . ' 00:00');
			$endMonth   = strtotime('+30 day', $startMonth);

			$this->query = $this->db->from('ads_favorites')
				->select('id')
				->where('time', $startMonth, '>=')
				->where('time', $endMonth, '<=')
				->where('adsUser', $userId)
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