<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-19 17:11:44
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-11-01 12:36:50
	
	Class Ads 
	{

		private $db, $query, $result;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function adsMail()
		{
			$this->query = $this->db->query('SELECT id, user_id FROM ads WHERE (status = 1 || status = 4) AND sendMail = 0 AND public_end_date < ' . time());
			$this->query->execute();
			$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($this->result))
			{
				return $this->result;
			}
			return false;
		}

		public function ads($type, $start, $limit)
		{
			if($type == 'active')
			{
				// ancaq aktiv ve vaxti bitmeyen elanlar

				if($start === null AND $limit === null)
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 1)
						->where('public_end_date', time(), '>')
						->run();
				}
				else
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 1)
						->where('public_end_date', time(), '>')
						->limit($start, $limit)
						->orderby('id', 'DESC')
						->run();
				}
			}
			elseif($type == 'passive')
			{
				// ancaq passiv elanlar

				if($start === null AND $limit === null)
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 4)
						->run();
				}
				else
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 4)
						->limit($start, $limit)
						->orderby('id', 'DESC')
						->run();
				}
			}
			elseif($type == 'finished')
			{
				// ancaq aktiv ve passif elanlar (vaxti bitmisler)

				if($start === null AND $limit === null)
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 3, '!=')
						->where('status', 2, '!=')
						->where('public_end_date', time(), '<')
						->run();
				}
				else
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 3, '!=')
						->where('status', 2, '!=')
						->where('public_end_date', time(), '<')
						->limit($start, $limit)
						->orderby('id', 'DESC')
						->run();
				}
			}
			elseif($type == 'pending')
			{
				// ancaq onay bekleyen elanlar

				if($start === null AND $limit === null)
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 2)
						->run();
				}
				else
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 2)
						->limit($start, $limit)
						->orderby('id', 'DESC')
						->run();
				}
			}
			elseif($type == 'unconfirmed')
			{
				// ancaq onaylanmayan elanlar

				if($start === null AND $limit === null)
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 3)
						->run();
				}
				else
				{
					$this->query = $this->db->from('ads')
						->where('user_id', session('userId'))
						->where('status', 3)
						->limit($start, $limit)
						->orderby('id', 'DESC')
						->run();
				}
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function userAds($userId, $orderBy = 'id', $orderByDescAsc = 'DESC', $start = null, $limit = null)
		{
			if($start === null AND $limit === null)
			{
				$this->query = $this->db->from('ads')
					->where('user_id', $userId)
					->where('status', 1)
					->where('public_end_date', time(), '>')
					->run();
			}
			else
			{
				$this->query = $this->db->from('ads')
					->where('user_id', $userId)
					->where('status', 1)
					->where('public_end_date', time(), '>')
					->limit($start, $limit)
					->orderby($orderBy, $orderByDescAsc)
					->run();
			}

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adInfo($id, $column = null)
		{
			$this->query = $this->db->from('ads')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return ($column === null) ? $this->query : $this->query[$column];
			}
			return false;
		}

		public function adGetLastCategory($id)
		{
			$this->query = $this->db->from('ads')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				$lock = false;

				for($i = 10; $i >= 0; $i--)
				{
					if($lock === false)
					{
						if($this->query['category' . $i] != 0)
						{
							$this->result = $this->query['category' . $i];

							$lock = true;
						}
					}
				}

				return $this->result;
			}
			return false;
		}

		public function adImages($id)
		{
			$this->query = $this->db->from('ads_images')
				->where('ads_id', $id)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adImageCheck($adId, $image)
		{
			$this->query = $this->db->from('ads_images')
				->where('ads_id', $adId)
				->where('image', $image)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function adItems($id)
		{
			$this->query = $this->db->from('ads_items_values')
				->where('adsId', $id)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function itemInfo($itemId)
		{
			$this->query = $this->db->from('modulitems')
				->where('Id', $itemId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function itemSelectInfo($selectId)
		{
			$this->query = $this->db->from('modulitemsselect')
				->where('Id', $selectId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adItemInfo($adId, $itemId)
		{
			$this->query = $this->db->from('ads_items_values')
				->where('adsId', $adId)
				->where('itemId', $itemId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adItemSelectInfo($adId, $itemId, $itemSelect)
		{
			$this->query = $this->db->from('ads_items_values')
				->where('adsId', $adId)
				->where('itemId', $itemId)
				->where('itemSelect', $itemSelect)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function adsFeatureCheck($id, $featureId)
		{
			$this->query = $this->db->from('ads_features')
				->where('adsId', $id)
				->where('featureId', $featureId)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function adItemCheck($adId, $itemId)
		{
			$this->query = $this->db->from('ads_items_values')
				->where('adsId', $adId)
				->where('itemId', $itemId)
				->first();

			if(!empty($this->query))
			{
				return true;
			}
			return false;
		}

		public function categoryStoreAds($categoryId, $userId, $orderby, $orderByDescAsc, $start, $limit)
		{
			$orderBySql = '';
			$limitSql   = '';
			
			if($orderby !== null AND $orderByDescAsc !== null)
			{
				$orderBySql = ' ORDER BY ' . $orderby . ' ' . $orderByDescAsc;
			}

			if($start !== null AND $limit !== null)
			{
				$limitSql = ' LIMIT ' . $start . ',' . $limit;
			}

			$this->query = $this->db->query('SELECT * FROM ads WHERE (category1 = ' . $categoryId . ' OR category2 = ' . $categoryId . ' OR category3 = ' . $categoryId . ' OR category4 = ' . $categoryId . ' OR category5 = ' . $categoryId . ' OR category6 = ' . $categoryId . ' OR category7 = ' . $categoryId . ' OR category8 = ' . $categoryId . ' OR category9 = ' . $categoryId . ' OR category10 = ' . $categoryId . ') AND (public_end_date > ' . time() . ') AND user_id = ' . $userId . ' AND status = 1 ' . $orderBySql . ' ' . $limitSql);
			$this->query->execute();
			$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

			if(!empty($this->result))
			{
				return $this->result;
			}
			return false;
		}

		public function categoryAdsCount($categoryId)
		{
			$this->query = $this->db->query('SELECT id, user_id FROM ads WHERE (category1 = ' . $categoryId . ' OR category2 = ' . $categoryId . ' OR category3 = ' . $categoryId . ' OR category4 = ' . $categoryId . ' OR category5 = ' . $categoryId . ' OR category6 = ' . $categoryId . ' OR category7 = ' . $categoryId . ' OR category8 = ' . $categoryId . ' OR category9 = ' . $categoryId . ' OR category10 = ' . $categoryId . ') AND (public_end_date > ' . time() . ') AND status = 1');
			$this->query->execute();
			$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

			$fullAds = array();
			$Store   = new Store($this->db);
			foreach ($this->result as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAds[] = $ads;
					}
				}
				else
				{
					$fullAds[] = $ads;
				}
			}

			return count($fullAds);
		}

		public function specialCategoryAdsCount($catType)
		{
			$this->query = $this->db->from('ads')
				->select('id, user_id')
				->where('public_end_date', time(), '>')
				->where('status', 1)
				->where($catType, 1)
				->run();

			$fullAds = array();
			$Store   = new Store($this->db);
			foreach ($this->query as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAds[] = $ads;
					}
				}
				else
				{
					$fullAds[] = $ads;
				}
			}

			return count($fullAds);
		}

		public function checkTypeAds($catId, $catType, $type)
		{
			$Store = new Store($this->db);

			if($catType == 'ilk-sahibinden')
			{
				$catTypeQuery = ' AND ads.doping_sahibinden = 1';
			}
			elseif($catType == 'yeni-gibi')
			{
				$catTypeQuery = ' AND ads.doping_yenigibi = 1';
			}
			elseif($catType == 'ekspertizli')
			{
				$catTypeQuery = ' AND ads.doping_ekspertizli = 1';
			}
			elseif($catType == 'acil')
			{
				$catTypeQuery = ' AND ads.doping_acil = 1';
			}
			elseif($catType == 'fiyati-dusenler')
			{
				$catTypeQuery = ' AND ads.doping_fiyatidusenler = 1';
			}
			else
			{
				$catTypeQuery = null;
			}

			if($catId !== null AND $catTypeQuery === null)
			{
				$this->query = $this->db->query('SELECT user_id FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE users.activity_area = ' . $type . ' AND (ads.category1 = ' . $catId . ' OR ads.category2 = ' . $catId . ' OR ads.category3 = ' . $catId . ' OR ads.category4 = ' . $catId . ' OR ads.category5 = ' . $catId . ' OR ads.category6 = ' . $catId . ' OR ads.category7 = ' . $catId . ' OR ads.category8 = ' . $catId . ' OR ads.category9 = ' . $catId . ' OR ads.category10 = ' . $catId . ') AND (ads.public_end_date > ' . time() . ') AND ads.status = 1');
			}
			elseif($catId === null AND $catType !== null)
			{
				$this->query = $this->db->query('SELECT user_id FROM ads LEFT JOIN users ON users.id = ads.user_id WHERE users.activity_area = ' . $type . ' AND (ads.public_end_date > ' . time() . ') AND ads.status = 1' . $catTypeQuery);
			}

			$this->query->execute();
			$this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

			$fullAdsAll = array();
			foreach ($this->result as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAdsAll[] = $ads;
					}
				}
				else
				{
					$fullAdsAll[] = $ads;
				}
			}

			if(!empty($fullAdsAll))
			{
				return true;
			}
			return false;
		}

		public function showCaseHomeAds()
		{
			$this->query = $this->db->from('ads')
				->where('doping_home', 1)
				->where('public_end_date', time(), '>')
				->where('status', 1)
				->limit(0, 24)
				->orderby('public_start_date', 'DESC')
				->run();

			$fullAds = array();
			$Store   = new Store($this->db);
			foreach ($this->query as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAds[] = $ads;
					}
				}
				else
				{
					$fullAds[] = $ads;
				}
			}

			if(!empty($fullAds))
			{
				return $fullAds;
			}
			return false;
		}

		public function showCaseAcil()
		{
			$this->query = $this->db->from('ads')
				->where('doping_acil', 1)
				->where('public_end_date', time(), '>')
				->where('status', 1)
				->limit(0, 12)
				->orderby('public_start_date', 'DESC')
				->run();

			$fullAds = array();
			$Store   = new Store($this->db);
			foreach ($this->query as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAds[] = $ads;
					}
				}
				else
				{
					$fullAds[] = $ads;
				}
			}

			if(!empty($fullAds))
			{
				return $fullAds;
			}
			return false;
		}

		public function lastAds()
		{
			$this->query = $this->db->from('ads')
				->where('public_end_date', time(), '>')
				->where('status', 1)
				->limit(0, 30)
				->orderby('create_time', 'DESC')
				->run();

			$fullAds = array();
			$Store   = new Store($this->db);
			foreach ($this->query as $ads) 
			{
				$getUserStore = $Store->getUserStore($ads['user_id']);

				if($getUserStore !== false)
				{
					if($getUserStore['end_time'] > time() AND $getUserStore['status'] != 2)
					{
						$fullAds[] = $ads;
					}
				}
				else
				{
					$fullAds[] = $ads;
				}
			}

			if(!empty($fullAds))
			{
				return $fullAds;
			}
			return false;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('ads')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function updateAd($adId, $set)
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

		public function updateAdItem($adId, $itemId, $set)
		{
			$this->query = $this->db->update('ads_items_values')
				->where('adsId', $adId)
				->where('itemId', $itemId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function addAdsImages($set)
		{
			$this->query = $this->db->insert('ads_images')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteAd($adId)
		{
			$this->query = $this->db->delete('ads')
				->where('id', $adId)
				->done();

			return true;
		}

		public function deleteAdImage($adId, $image)
		{
			$this->query = $this->db->delete('ads_images')
				->where('ads_id', $adId)
				->where('image', $image)
				->done();

			return true;
		}

		public function deleteAdItem($adId, $itemId)
		{
			$this->query = $this->db->delete('ads_items_values')
				->where('adsId', $adId)
				->where('itemId', $itemId)
				->done();

			return true;
		}

		public function deleteAdFeature($adId, $featureId)
		{
			$this->query = $this->db->delete('ads_features')
				->where('adsId', $adId)
				->where('featureId', $featureId)
				->done();

			return true;
		}

		public function deleteAdAllImage($adId)
		{
			$this->query = $this->adImages($adId);

			foreach ($this->query as $image) 
			{
				unlink('../../uploads/ads/' . $image['image'] . '.jpg');
			}

			$this->db->delete('ads_images')
				->where('ads_id', $adId)
				->done();

			return true;
		}

		public function deleteAdAllItem($adId)
		{
			$this->query = $this->db->delete('ads_items_values')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function deleteAdAllFeatures($adId)
		{
			$this->query = $this->db->delete('ads_features')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function deleteAdFavorites($adId)
		{
			$this->query = $this->db->delete('ads_favorites')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function deleteAdMessages($adId)
		{
			$this->query = $this->db->from('messages')
				->where('adsId', $adId)
				->run();

			foreach ($this->query as $message) 
			{
				$this->db->delete('messages_content')
					->where('messagesId', $message['id'])
					->done();
			}

			$this->db->delete('messages')
				->where('adsId', $adId)
				->done();

			return true;
		}

		public function addAdsItem($set)
		{
			$this->query = $this->db->insert('ads_items_values')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function addAdsFeatures($set)
		{
			$this->query = $this->db->insert('ads_features')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function checkLimit()
		{
			$startYear = strtotime('01.01.' . date('Y'));
			$endYear   = strtotime('31.12.' . date('Y'));
			$limit     = 0;

			$this->query = $this->db->from('ads')
				->select('update_count')
				->where('user_id', session('userId'))
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