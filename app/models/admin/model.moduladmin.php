<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-24 10:34:36
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 20:07:08
	
	Class ModulAdmin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function modulList()
		{
			$this->query = $this->db->from('moduls')
				->run();

			return $this->query;
		}

		public function addModul($set)
		{
			$this->query = $this->db->insert('moduls')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteModul($id)
		{
			$this->query = $this->db->delete('moduls')
				->where('Id', $id)
				->done();

			/* DELETE ITEMS */
			$modulItem = $this->modulItems($id);

			if($modulItems !== false)
			{
				foreach ($this->modulItems($id) as $item) 
				{
					$this->deleteModulItemsSelect($item['Id']);
					$this->deleteItemsAds($item['Id']);
				}
			}

			$this->deleteModulItems($id);

			/* DELETE FEATURES */
			$modulFeatures = $this->modulFeatures($id);

			if($modulFeatures !== false)
			{
				foreach ($this->modulFeatures($id) as $featureGroup) 
				{
					$this->deleteFeatureListGroup($featureGroup['Id']);
					$this->deleteFeatureListGroupAds($featureGroup['Id']);
				}
			}

			$this->deleteFeatureGroupModul($id);
		}

		public function modulItems($modulId)
		{
			$this->query = $this->db->from('modulitems')
				->where('modulsId', $modulId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulFeatures($modulId)
		{
			$this->query = $this->db->from('features_groups')
				->where('modulId', $modulId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulFeaturesList($groupId)
		{
			$this->query = $this->db->from('features_groups_list')
				->where('groupId', $groupId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function getModulFeaturesList($modulId)
		{
			$this->query = $this->db->from('features_groups_list')
				->where('modulId', $modulId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulFeatureGroupInfo($id)
		{
			$this->query = $this->db->from('features_groups')
				->where('Id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulItemInfo($id)
		{
			$this->query = $this->db->from('modulitems')
				->where('Id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function modulItemsSelect($itemId)
		{
			$this->query = $this->db->from('modulItemsselect')
				->where('itemId', $itemId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function addModulItemSelect($itemId, $value)
		{
			$this->query = $this->db->insert('modulitemsselect')
				->set(array('itemId' => $itemId, 'name' => $value));

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function addModulItem($set)
		{
			$this->query = $this->db->insert('modulitems')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function updateModulItem($itemId, $set)
		{
			$this->query = $this->db->update('modulitems')
				->where('Id', $itemId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteModulItems($modulId)
		{
			$this->query = $this->db->delete('modulitems')
				->where('modulsId', $modulId)
				->done();

			return true;
		}

		public function deleteItem($id)
		{
			$this->query = $this->db->delete('modulitems')
				->where('Id', $id)
				->done();

			return true;
		}

		public function deleteSelect($id)
		{
			$this->query = $this->db->delete('modulitemsselect')
				->where('Id', $id)
				->done();

			return true;
		}

		public function deleteSelectAds($id)
		{
			$this->query = $this->db->delete('ads_items_values')
				->where('itemSelect', $id)
				->done();

			return true;
		}

		public function deleteItemsAds($itemId)
		{
			$this->query = $this->db->delete('ads_items_values')
				->where('itemId', $itemId)
				->done();

			return true;
		}

		public function deleteModulItemsSelect($itemId)
		{
			$this->query = $this->db->delete('modulitemsselect')
				->where('itemId', $itemId)
				->done();

			return true;
		}

		public function addModulFeatureGroup($set)
		{
			$this->query = $this->db->insert('features_groups')
				->set($set);

			if($this->query === true)
			{
				return $this->db->lastId();
			}
			return false;
		}

		public function updateFeatureGroup($id, $set)
		{
			$this->query = $this->db->update('features_groups')
				->where('Id', $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function addModulFeatureList($set)
		{
			$this->query = $this->db->insert('features_groups_list')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function deleteFeatureList($id)
		{
			$this->query = $this->db->delete('features_groups_list')
				->where('Id', $id)
				->done();

			return true;
		}

		public function deleteFeatureListAds($featureId)
		{
			$this->query = $this->db->delete('ads_features')
				->where('featureId', $featureId)
				->done();

			return true;
		}

		public function deleteFeatureGroup($groupId)
		{
			$this->query = $this->db->delete('features_groups')
				->where('Id', $groupId)
				->done();

			return true;
		}

		public function deleteFeatureGroupModul($modulId)
		{
			$this->query = $this->db->delete('features_groups')
				->where('modulId', $modulId)
				->done();

			return true;
		}

		public function deleteFeatureListGroup($groupId)
		{
			$this->query = $this->db->delete('features_groups_list')
				->where('groupId', $groupId)
				->done();

			return true;
		}

		public function deleteFeatureListGroupAds($groupId)
		{
			$this->query = $this->db->delete('ads_features')
				->where('groupId', $groupId)
				->done();

			return true;
		}

	}

?>