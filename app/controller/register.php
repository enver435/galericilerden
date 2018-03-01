<?php

	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-08-13 20:55:16
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-18 08:06:10
	
	if(!session('login'))
	{
		$regType = $_url[1];

		if($regType != '')
		{
			$page_param  = 1;
			$returnArray = array();

			if($regType == 'individual')
			{
				if(issetPost('reg'))
				{
					$name    = post('name');
					$surname = post('surname');
					$email   = post('email');
					$pass    = post('pass');
					$phone   = post('phone');
					$rule    = post('rule');

					setSession('phoneNumber', $phone);

					if($name != '' AND $surname != '' AND $email != '' AND $pass != '' AND $phone != '')
					{
						if(strlen($pass) < 6)
						{
							$messageType = 'error';
							$message     = 'Şifreniz en az 6 rakam veya harfden ibaret olmalıdır';
						}
						else
						{
							$phoneReplace = str_replace(array(' ', '(', ')'), array('', '', ''), trim($phone));

							if(substr($phoneReplace, 0, 2) == '02' OR substr($phoneReplace, 0, 2) == '03' OR substr($phoneReplace, 0, 2) == '05' OR substr($phoneReplace, 0, 2) == '08')
							{
								if($rule != '' AND $rule == 1)
								{
									if(empty($User->userInfo($email)))
									{
										$activationCode = randomString('numeric', 4);
										setSession('activationCode', $activationCode);

										$sendSms = sendSms($phoneReplace, 'Üyeliğinizi Aktifleştirmek İçin ' . $activationCode . ' Kodunu Lütfen Giriniz ... Galericilerden.com');

										if(strpos($sendSms, 'Gonderildi') !== false)
										{
											$register = $User->register(
												array(
													'name'        => $name,
													'surname'     => $surname,
													'email'       => $email,
													'pass'        => md5($pass),
													'phone'       => $phone,
													'user_status' => 1, // individual
													'seflink'     => permalink($name . ' ' . $surname)
												)
											);

											if(!empty($register))
											{
												setSession('phoneActivate', true);
												setSession('regUserId', $register);

												$messageType = 'success';
												$message     = 'Üyeliğiniz oluşturuldu. Telefonunuza doğrulama kodu gönderildi. Lütfen hesabınızı doğrulayın';
											}
											else
											{
												$messageType = 'error';
												$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
											}
										}
										else
										{
											$messageType = 'error';
											$message     = $sendSms;
										}
									}
									else
									{
										$messageType = 'error';
										$message     = 'Bu E-Posta artık kullanılıyor. Lütfen başka bir E-Posta deneyiniz';
									}
								}
								else
								{
									$messageType = 'error';
									$message     = 'Lütfen üyelik sözleşmesini onaylayın';
								}
							}
							else
							{
								$messageType = 'error';
								$message     = 'Cep telefon formatı yanlış';
							}
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

				if(issetPost('activate'))
				{
					$code = post('code');

					if($code != '')
					{
						if(strlen($code) == 4)
						{
							if($code == session('activationCode'))
							{
								$update = $User->update(session('regUserId'),
									array(
										'status' => 1
									)
								);

								if($update === true)
								{
									$userInfo = $User->userInfo(session('regUserId'));
									$login    = $User->login($userInfo['email'], $userInfo['pass']);

									if($login['login'] === true)
									{
										$messageType = 'success';
										$message     = 'Üyeliğiniz doğrulandı. Giriş yapılıyor...';

										refresh();
									}
									else
									{
										$messageType = 'error';
										$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
									}
								}
								else
								{
									$messageType = 'error';
									$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
								}
							}
							else
							{
								$messageType = 'error';
								$message     = 'Girdiğiniz doğrulama kodu yanlış';
							}
						}
						else
						{
							$messageType = 'error';
							$message     = 'Kod 4 haneli olmalıdır';
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
			}
			elseif($regType == 'corporate')
			{
				$empty = true;

				if(issetPost('reg'))
				{
					$name             = post('name');
					$surname          = post('surname');
					$email            = post('email');
					$pass             = post('pass');
					$phone   	      = post('phone');
					$activity_area    = post('activity_area');
					$business_type    = post('business_type');
					$commercial_title = post('commercial_title');
					$city             = post('city');
					$counties         = post('counties');
					$address          = post('address');
					$tax              = post('taxs');
					$taxNo            = post('tax_no');
					$phone_work       = post('phone_work');
					$phone_more       = post('phone_more');
					$rule             = post('rule');

					setSession('phoneNumber', $phone);

					if($name != '' AND $surname != '' AND $email != '' AND $pass != '' AND $phone != '' AND $activity_area != '' AND $business_type != '' AND $city != '' AND $counties != '' AND $address != '' AND $tax != '' AND $taxNo != '')
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
						if(strlen($pass) < 6)
						{
							$messageType = 'error';
							$message     = 'Şifreniz en az 6 rakam veya harfden ibaret olmalıdır';
						}
						else
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
								if($rule != '' AND $rule == 1)
								{
									if(empty($User->userInfo($email)))
									{
										$activationCode = randomString('numeric', 4);
										setSession('activationCode', $activationCode);

										$sendSms = sendSms($phone, 'Üyeliğinizi Aktifleştirmek İçin ' . $activationCode . ' Kodunu Lütfen Giriniz ... Galericilerden.com');

										if(strpos($sendSms, 'Gonderildi') !== false)
										{
											$register = $User->register(
												array(
													'name'             => $name,
													'surname'          => $surname,
													'email'            => $email,
													'pass'             => md5($pass),
													'phone'            => $phone,
													'activity_area'    => $activity_area,
													'business_type'    => $business_type,
													'commercial_title' => $commercial_title,
													'city'             => $city,
													'county'           => $counties,
													'address'          => $address,
													'tax'              => $tax,
													'tax_no' 		   => $taxNo,
													'phone_work'       => $phone_work,
													'phone_more'       => $phone_more,
													'user_status'      => 2, // corporate
													'seflink'          => permalink($name . ' ' . $surname)
												)
											);

											if(!empty($register))
											{
												setSession('phoneActivate', true);
												setSession('regUserId', $register);

												$messageType = 'success';
												$message     = 'Üyeliğiniz oluşturuldu. Telefonunuza doğrulama kodu gönderildi. Lütfen hesabınızı doğrulayın';
											}
											else
											{
												$messageType = 'error';
												$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
											}
										}
										else
										{
											$messageType = 'error';
											$message     = $sendSms;
										}
									}
									else
									{
										$messageType = 'error';
										$message     = 'Bu E-Posta artık kullanılıyor. Lütfen başka bir E-Posta deneyiniz';
									}
								}
								else
								{
									$messageType = 'error';
									$message     = 'Lütfen üyelik sözleşmesini onaylayın';
								}
							}
							else
							{
								$messageType = 'error';
								$message     = 'Telefon formatı yanlış';
							}
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

				if(issetPost('activate'))
				{
					$code = post('code');

					if($code != '')
					{
						if(strlen($code) == 4)
						{
							if($code == session('activationCode'))
							{
								$update = $User->update(session('regUserId'),
									array(
										'status' => 1
									)
								);

								if($update === true)
								{
									$userInfo = $User->userInfo(session('regUserId'));
									$login    = $User->login($userInfo['email'], $userInfo['pass']);

									if($login['login'] === true)
									{
										$messageType = 'success';
										$message     = 'Üyeliğiniz doğrulandı. Giriş yapılıyor...';

										refresh();
									}
									else
									{
										$messageType = 'error';
										$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
									}
								}
								else
								{
									$messageType = 'error';
									$message     = 'Bir hata oluştu. Lütfen bir az sonra tekrar deneyiniz';
								}
							}
							else
							{
								$messageType = 'error';
								$message     = 'Girdiğiniz doğrulama kodu yanlış';
							}
						}
						else
						{
							$messageType = 'error';
							$message     = 'Kod 4 haneli olmalıdır';
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

				$returnArray['cities'] = $Other->cities();
			}
			else
			{
				redirect('login');
			}
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('register.tpl');

		//echo session('activationCode');
	}
	else
	{
		redirect();
	}
	
?>