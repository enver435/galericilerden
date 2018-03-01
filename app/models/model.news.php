<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-10-11 15:20:27
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-12 13:44:07
	
	Class News 
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function news($start = 0, $limit = 6, $count = false)
		{
			if($count === false)
			{
				$this->query = $this->db->from('news')
					->limit($start, $limit)
					->orderby('id', 'DESC')
					->run();
			}
			else
			{
				$this->query = $this->db->from('news')
					->select('id')
					->run();
			}

			return $this->query;
		}

		public function newsPagination($pageLimit)
		{
			$pagination = $this->db->pagination(count($this->news(null, null, true)), $pageLimit, 'page');

			$this->query = $this->news($pagination['start'], $pagination['limit']);

			return array(
				'news'       => $this->query,
				'pagination' => $this->db->showPagination(SITE_URL . '/news?page=[page]')
			);
		}

		public function newsInfo($seflink)
		{
			$this->query = $this->db->from('news')
				->where('news_seflink', $seflink)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

	}

?>