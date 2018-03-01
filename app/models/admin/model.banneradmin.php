<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 14:07:52
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 15:21:27
	
	Class BannerAdmin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function getBannerInfo($bannerLocation)
		{
			$this->query = $this->db->from('banner')
				->where('banner_location', $bannerLocation)
				->first();

			return $this->query;
		}

		public function updateBanner($bannerLocation, $set)
		{
			$this->query = $this->db->update('banner')
				->where('banner_location', $bannerLocation)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

	}

?>