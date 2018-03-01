<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-22 11:26:12
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-28 10:50:06
	
	Class AdsAdmin 
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function ads($type)
		{
			if($type == 'pending')
			{
				$this->query = $this->db->from('ads')
					->where('status', 2)
					->run();
			}
			elseif($type == 'approved')
			{
				$this->query = $this->db->from('ads')
					->where('status', 1)
					->run();
			}
			elseif($type == 'expired')
			{
				$this->query = $this->db->from('ads')
					->where('public_end_date', time(), '<')
					->where('status', 1)
					->run();
			}
			elseif($type == 'all')
			{
				$this->query = $this->db->from('ads')
					->run();
			}
			elseif($type == 'active')
			{
				$this->query = $this->db->from('ads')
					->where('public_end_date', time(), '>')
					->where('status', 1)
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function userAds($userId)
		{
			$this->query = $this->db->from('ads')
				->where('user_id', $userId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function categoryAds($categoryId)
		{
			$this->query = $this->db->from('ads')
				->where('category1', $categoryId)
				->or_where('category2', $categoryId)
				->or_where('category3', $categoryId)
				->or_where('category4', $categoryId)
				->or_where('category5', $categoryId)
				->or_where('category6', $categoryId)
				->or_where('category7', $categoryId)
				->or_where('category8', $categoryId)
				->or_where('category9', $categoryId)
				->or_where('category10', $categoryId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adInfo($id)
		{
			$this->query = $this->db->from('ads')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adImages($adId)
		{
			$this->query = $this->db->from('ads_images')
				->where('ads_id', $adId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function update($adId, $set)
		{
			$this->query = $this->db->update('ads')
				->where('id', $adId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function updateAdUser($userId, $set)
		{
			$this->query = $this->db->update('ads')
				->where('user_id', $userId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function delete($adId)
		{
			$this->query = $this->db->delete('ads')
				->where('id', $adId)
				->done();

			return true;
		}

		public function deleteAdFeatures($adId)
		{
			$this->query = $this->db->delete('ads_features')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function deleteAdImages($adId)
		{
			$this->query = $this->db->delete('ads_images')
				->where('ads_id', $adId)
				->done();

			return true;
		}

		public function deleteAdItemValues($adId)
		{
			$this->query = $this->db->delete('ads_items_values')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function checkLimit($userId)
		{
			$startYear = strtotime('01.01.' . date('Y'));
			$endYear   = strtotime('31.12.' . date('Y'));
			$limit     = 0;

			$this->query = $this->db->from('ads')
				->select('update_count')
				->where('user_id', $userId)
				->where('create_time', $startYear, '>=')
				->where('create_time', $endYear, '<=')
				->run();

			foreach ($this->query as $value) 
			{
				$limit += $value['update_count'];
			}

			return $limit;
		}

	}

?>