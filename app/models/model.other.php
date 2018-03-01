<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 12:48:54
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-06 15:05:04
	
	Class Other
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function cities()
		{
			$this->query = $this->db->from('cities')
				->run();

			return $this->query;
		}

		public function cityInfo($cityId)
		{
			$this->query = $this->db->from('cities')
				->where('CityID', $cityId)
				->first();

			return $this->query;
		}

		public function counties($cityId)
		{
			$this->query = $this->db->from('counties')
				->where('CityID', $cityId)
				->run();

			return $this->query;
		}

		public function countyInfo($countyId)
		{
			$this->query = $this->db->from('counties')
				->where('CountyID', $countyId)
				->first();

			return $this->query;
		}

		public function area($countyId)
		{
			$this->query = $this->db->from('area')
				->where('CountyID', $countyId)
				->run();

			return $this->query;
		}

		public function neighborhood($areaId)
		{
			$this->query = $this->db->from('neighborhood')
				->where('AreaID', $areaId)
				->run();

			return $this->query;
		}

		public function neighborhoodInfo($id)
		{
			$this->query = $this->db->from('neighborhood')
				->where('NeighborhoodID', $id)
				->first();

			return $this->query;
		}

		public function taxs($plateNo)
		{
			$this->query = $this->db->from('taxs')
				->where('plaka', $plateNo)
				->run();

			return $this->query;
		}

		public function taxInfo($taxId)
		{
			$this->query = $this->db->from('taxs')
				->where('id', $taxId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function getSetting($column)
		{
			$this->query = $this->db->from('site_settings')
				->first();

			return $this->query[$column];
		}

		public function updateSetting($set)
		{
			$this->query = $this->db->update('site_settings')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

	}

?>