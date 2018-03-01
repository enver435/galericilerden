<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-21 19:40:46
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-08-22 19:03:10
	
	Class Admin
	{

		private $db, $query;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function adminLogin($user, $pass)
		{
			$this->query = $this->db->from('admin')
				->where('user', $user)
				->where('pass', md5($pass))
				->first();

			if(!empty($this->query))
			{
				setSession('adminLogin', true);

				return true;
			}
			return false;
		}

		public function _exit()
		{
			removeSession('adminLogin');
		}

	}

?>