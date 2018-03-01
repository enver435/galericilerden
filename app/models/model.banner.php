<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-15 14:08:36
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 16:07:03
	
	Class Banner
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

	}

?>