<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-11 11:20:13
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 13:27:50
	
	if(session('login'))
	{
		$userInfo = $User->userInfo(session('userId'));

		if(issetPost('save'))
		{
			$empty  = true;
			$update = false;

			if($userInfo['user_status'] == 1)
			{
				$name       = post('name');
				$surname    = post('surname');
				$email      = post('email');
				$pass       = post('pass');
				$phone      = post('phone');
				$phone_work = post('phone_work');
				$phone_more = post('phone_more');

				if($name != '' AND $surname != '' AND $email != '' AND $phone != '')
				{
					$phoneReplace     = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone));
					$phoneReplaceWork = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone_work));
					$phoneReplaceMore = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone_more));

					$phoneLock = true;

					if($phoneReplaceMore != '' AND $phoneReplaceWork != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08' AND substr($phoneReplaceWork, 0, 2) == '02' OR substr($phoneReplaceWork, 0, 2) == '03' OR substr($phoneReplaceWork, 0, 2) == '05' OR substr($phoneReplaceWork, 0, 2) == '08')
						{
							if(substr($phoneReplaceMore, 0, 2) == '02' OR substr($phoneReplaceMore, 0, 2) == '03' OR substr($phoneReplaceMore, 0, 2) == '05' OR substr($phoneReplaceMore, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}
					
					if($phoneReplaceWork != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
						{
							if(substr($phoneReplaceWork, 0, 2) == '02' OR substr($phoneReplaceWork, 0, 2) == '03' OR substr($phoneReplaceWork, 0, 2) == '05' OR substr($phoneReplaceWork, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}
					
					if($phoneReplaceMore != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
						{
							if(substr($phoneReplaceMore, 0, 2) == '02' OR substr($phoneReplaceMore, 0, 2) == '03' OR substr($phoneReplaceMore, 0, 2) == '05' OR substr($phoneReplaceMore, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}

					if($phoneLock === false)
					{
						if($email != $userInfo['email'])
						{
							if($User->userInfo($email) === false)
							{
								$update = true;
							}
							else
							{
								$messageType = 'error';
								$message     = 'Bu E-Posta artık kullanılıyor. Lütfen başka bir E-Posta deneyiniz';
							}
						}
						else
						{
							$update = true;
						}

						if($pass != '')
						{
							if(strlen($pass) < 6)
							{
								$messageType = 'error';
								$message     = 'Şifreniz en az 6 rakam veya harfden ibaret olmalıdır';

								$update = false;
							}
							else
							{
								$update = true;

								$pass = md5($pass);
							}
						}
						else
						{
							$update = true;

							$pass = $userInfo['pass'];
						}

						if($update === true)
						{
							$updateUser = $User->update(session('userId'),
								array(
									'name'       => $name,
									'surname'    => $surname,
									'email'      => $email,
									'pass'       => $pass,
									'phone'      => $phone,
									'city'       => $city,
									'county'     => $counties,
									'address'    => $address,
									'phone_work' => $phone_work,
									'phone_more' => $phone_more,
									'seflink'    => permalink($name . ' ' . $surname)
								)
							);

							if($updateUser === true)
							{
								$messageType = 'success';
								$message     = 'Üyelik bilgileriniz başarıyla güncellendi';
							}
							else
							{
								$messageType = 'error';
								$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
							}
						}
					}
					else
					{
						$messageType = 'error';
						$message     = 'Telefon formatı yanlış';
					}
				}
				else
				{
					$messageType = 'error';
					$message     = 'Lütfen satırları boş bırakmayınız';
				}
			}
			elseif($userInfo['user_status'] == 2)
			{
				$name             = post('name');
				$surname          = post('surname');
				$email            = post('email');
				$phone   	      = post('phone');
				//$activity_area    = post('activity_area');
				$business_type    = post('business_type');
				$commercial_title = post('commercial_title');
				$city             = post('city');
				$counties         = post('counties');
				$address          = post('address');
				$tax              = post('taxs');
				$taxNo            = post('tax_no');
				$phone_work       = post('phone_work');
				$phone_more       = post('phone_more');
				$pass             = post('pass');

				if($name != '' AND $surname != '' AND $email != '' AND $phone != '' AND /*$activity_area != '' AND*/ $business_type != '' AND $city != '' AND $counties != '' AND $address != '' AND $tax != '' AND $taxNo != '')
				{
					if($business_type == 2)
					{
						if($commercial_title != '')
						{
							$empty = false;
						}
					}
					else
					{
						$empty = false;
					}
				}
				
				if($empty === false)
				{
					$phoneReplace     = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone));
					$phoneReplaceWork = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone_work));
					$phoneReplaceMore = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone_more));

					$phoneLock = true;

					if($phoneReplaceMore != '' AND $phoneReplaceWork != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08' AND substr($phoneReplaceWork, 0, 2) == '02' OR substr($phoneReplaceWork, 0, 2) == '03' OR substr($phoneReplaceWork, 0, 2) == '05' OR substr($phoneReplaceWork, 0, 2) == '08')
						{
							if(substr($phoneReplaceMore, 0, 2) == '02' OR substr($phoneReplaceMore, 0, 2) == '03' OR substr($phoneReplaceMore, 0, 2) == '05' OR substr($phoneReplaceMore, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}
					
					if($phoneReplaceWork != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
						{
							if(substr($phoneReplaceWork, 0, 2) == '02' OR substr($phoneReplaceWork, 0, 2) == '03' OR substr($phoneReplaceWork, 0, 2) == '05' OR substr($phoneReplaceWork, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}
					
					if($phoneReplaceMore != '')
					{
						if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
						{
							if(substr($phoneReplaceMore, 0, 2) == '02' OR substr($phoneReplaceMore, 0, 2) == '03' OR substr($phoneReplaceMore, 0, 2) == '05' OR substr($phoneReplaceMore, 0, 2) == '08')
							{
								$phoneLock = false;
							}
						}
					}

					if($phoneLock === false)
					{
						if($email != $userInfo['email'])
						{
							if($User->userInfo($email) === false)
							{
								$update = true;
							}
							else
							{
								$messageType = 'error';
								$message     = 'Bu E-Posta artık kullanılıyor. Lütfen başka bir E-Posta deneyiniz';
							}
						}
						else
						{
							$update = true;
						}

						if($pass != '')
						{
							if(strlen($pass) < 6)
							{
								$messageType = 'error';
								$message     = 'Şifreniz en az 6 rakam veya harfden ibaret olmalıdır';

								$update = false;
							}
							else
							{
								$update = true;

								$pass = md5($pass);
							}
						}
						else
						{
							$update = true;

							$pass = $userInfo['pass'];
						}
						
						if($update === true)
						{
							$updateUser = $User->update(session('userId'),
								array(
									'name'             => $name,
									'surname'          => $surname,
									'email'            => $email,
									'pass'             => $pass,
									'phone'            => $phone,
									//'activity_area'    => $activity_area,
									'business_type'    => $business_type,
									'commercial_title' => $commercial_title,
									'city'             => $city,
									'county'           => $counties,
									'address'          => $address,
									'tax'              => $tax,
									'tax_no' 		   => $taxNo,
									'phone_work'       => $phone_work,
									'phone_more'       => $phone_more,
									'seflink'          => permalink($name . ' ' . $surname)
								)
							);

							if($updateUser === true)
							{
								$messageType = 'success';
								$message     = 'Üyelik bilgileriniz başarıyla güncellendi';
							}
							else
							{
								$messageType = 'error';
								$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
							}
						}
					}
					else
					{
						$messageType = 'error';
						$message     = 'Telefon formatı yanlış';
					}
				}
				else
				{
					$messageType = 'error';
					$message     = 'Lütfen satırları boş bırakmayınız';
				}
			}

			$returnArray['messageType'] = $messageType;
			$returnArray['message']     = $message;
		}

		$userInfo = $User->userInfo(session('userId'));

		$returnArray['userInfo'] = $userInfo;
		$returnArray['cities']   = $Other->cities();

		$smarty->assign('return', $returnArray);
		$smarty->display('my-info.tpl');
	}
	else
	{
		redirect('login');
	}

?>