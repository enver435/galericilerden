<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 21:51:41
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-12-11 20:21:28
	
	Class Category
	{

		private $db, $query, $category, $catNames;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function categoryFirst()
		{
			$this->query = $this->db->from('category')
				->where('ustkategoriId', 0)
				->run();

			return $this->query;
		}

		public function getStoreCategorys($categoryId, $userId, $sub = false)
		{
			$categorys = array();
			$Ads       = new Ads($this->db);

			if($sub === true)
			{
				if($this->categoryInfo($categoryId) !== false)
				{
					$getSubCategory = $this->getSubCategory($categoryId);

					if(!empty($getSubCategory))
					{
						foreach ($getSubCategory as $category) 
						{
							if($Ads->categoryStoreAds($category['Id'], $userId, null, null, null, null) !== false)
							{
								$categorys[] = $category;
							}
						}
					}

					return $categorys;
				}
			}
			else
			{
				foreach ($this->categoryFirst() as $category) 
				{
					if($Ads->categoryStoreAds($category['Id'], $userId, null, null, null, null) !== false)
					{
						$categorys[] = $category;
					}
				}

				return $categorys;
			}
			return false;
		}

		public function getSubCategory($categoryId)
		{
			$this->query = $this->db->from('category')
				->where('ustkategoriId', $categoryId)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function getAllTopCategory($categoryId, $breadcrumb = false, $sidebarCat = false)
		{
			$lock = false;

			if($lock === false)
			{
				$this->query = $this->db->from('category')
					->select('Id, seflink, kategori_adi, ustkategoriId')
					->where('Id', $categoryId)
					->first();

				if(!empty($this->query))
				{
					$this->category[] = $this->query;

					$this->getAllTopCategory($this->query['ustkategoriId'], $breadcrumb, $sidebarCat);
				}
				else
				{
					$lock = true;
				}
			}
			
			if($lock === true AND !empty($this->category))
			{
				krsort($this->category);

				if($breadcrumb === false AND $sidebarCat === false)
				{
					/* DELETE DUBLICATE ARRAYS */
					foreach($this->category as $k => $v) 
					{
					    foreach($this->category as $key => $value) 
					    {
					        if($k != $key && $v['Id'] == $value['Id'])
					        {
					            unset($this->category[$k]);
					        }
					    }
					}
				}

				foreach ($this->category as $key => $value) {
					
					if($breadcrumb === false AND $sidebarCat === true)
					{
						$this->catNames .= '<li class="topCategory"><a href="' . SITE_URL . '/cat-' . $value['Id'] . '/' . $value['seflink'] . '">' . $value['kategori_adi'] . '</a></li>';
					}
					elseif($breadcrumb === false AND $sidebarCat === false)
					{
						$this->catNames .= $value['kategori_adi'] . ' -> ';
					}
					elseif($breadcrumb === true AND $sidebarCat === false)
					{
						$this->catNames .= '<li><h6 style="display: inline-block;margin-top: 0;margin-bottom: 0;"><a href="' . SITE_URL . '/cat-' . $value['Id'] . '/' . $value['seflink'] . '">' . $value['kategori_adi'] . '</a></h6></li>';
					}

				}

				if($breadcrumb === false AND $sidebarCat === false)
				{
					$this->catNames = rtrim($this->catNames, ' -> ');
				}

				echo $this->catNames;

				$this->catNames = '';
			}
		}

		public function categoryInfo($categoryId)
		{
			$this->query = $this->db->from('category')
				->where('Id', $categoryId)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>