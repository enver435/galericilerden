<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-24 16:14:48
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-24 19:11:42
	
	Class CategoryAdmin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		private function categoryList($start = 0, $limit = 15, $limitt = false, $search = false)
		{
			if($limitt === false)
			{
				if($search === false)
				{
					$this->query = $this->db->from('category')
						->run();
				}
				else
				{
					$this->query = $this->db->from('category')
						->like('kategori_adi', $_GET['s'])
						->run();
				}
			}
			else
			{
				if($search === false)
				{
					$this->query = $this->db->from('category')
						->limit($start, $limit)
						->run();
				}
				else
				{
					$this->query = $this->db->from('category')
						->like('kategori_adi', $_GET['s'])
						->limit($start, $limit)
						->run();
				}
			}

			return $this->query;
		}

		private function countCategory($start = 0, $limit = 15, $search = false)
		{
			return count($this->categoryList($start, $limit, false, $search));
		}

		public function category($start = 0, $limit = 15, $search = false)
		{
			$pagination   = $this->db->pagination($this->countCategory($start, $limit, $search), $limit, 'page');
			$categoryList = $this->categoryList($pagination['start'], $pagination['limit'], true, $search); 

			if($_GET['s'] != '')
			{
				$paginationUrl = SITE_URL . '/' . SITE_ADMIN . '/category?page=[page]&s=' . $_GET['s'];
			}
			else
			{
				$paginationUrl = SITE_URL . '/' . SITE_ADMIN . '/category?page=[page]';
			}

			return array(
				'categoryList' => $categoryList,
				'pagination'   => $this->db->showPagination($paginationUrl, 'active')
			);
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

		public function addCategory($set)
		{
			$this->query = $this->db->insert('category')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function updateCategory($categoryId, $set)
		{
			$this->query = $this->db->update('category')
				->where('Id', $categoryId)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function mainCategory()
		{
			$this->query = $this->db->from('category')
				->where('ustkategoriId', 0)
				->run();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>