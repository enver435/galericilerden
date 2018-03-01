<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-14 10:49:57
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-11 09:52:07
	
	if(!session('login'))
	{
		$returnArray = array();

		if(issetPost('login'))
		{
			$email = post('email');
			$pass  = post('pass');

			if($email != '' AND $pass != '')
			{
				$login = $User->login($email, md5($pass));

				if($login['login'] === true)
				{
					redirect('my');
				}
				else
				{
					$messageType = 'error';
					$message     = 'Kullanıcı bulunamadı';
				}
			}
			else
			{
				$messageType = 'error';
				$message     = 'Lütfen satırları boş bırakmayınız';
			}

			$returnArray['messageType'] = $messageType;
			$returnArray['message']     = $message;
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('login.tpl');
	}
	else
	{
		redirect();
	}

?>