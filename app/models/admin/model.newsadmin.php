<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-10-11 15:20:41
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-11 16:55:54
	
	Class NewsAdmin 
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
				'pagination' => $this->db->showPagination(SITE_URL . '/' . SITE_ADMIN . '/news?page=[page]')
			);
		}

		public function newsInfo($id)
		{
			$this->query = $this->db->from('news')
				->where('id', $id)
				->first();

			if(!empty($this->query))
			{
				return $this->query;
			}
			return false;
		}

		public function add($set)
		{
			$this->query = $this->db->insert('news')
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function update($id, $set)
		{
			$this->query = $this->db->update('news')
				->where('id', $id)
				->set($set);

			if($this->query === true)
			{
				return true;
			}
			return false;
		}

		public function delete($id)
		{
			$this->query = $this->db->delete('news')
				->where('id', $id)
				->done();

			return true;
		}

	}

?>