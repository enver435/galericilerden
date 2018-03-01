<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-02 09:51:43
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-02 10:30:33
	
	if(!session('login'))
	{
		if(issetPost('check'))
		{
			$email = post('email');

			if($email != '')
			{
				$userInfo = $User->userInfo($email);

				if($userInfo !== false)
				{
					$token = randomString('alnum', 25);
					setSession('token', $token);
					setSession('email', $email);

					$content = '
						<h3>Şifremi Unuttum</h3>
						<a href="' . siteUrl('forgot') . '&token=' . session('token') . '">Tıklayın</a>
					';

					//echo '<a href="' . siteUrl('forgot') . '&token=' . session('token') . '">Tıklayın</a>';

					$sendEmail = sendEmail('no-reply', $email, 'Şifremi Unuttum', $content);

					if($sendEmail === true)
					{
						$messageType = 'success';
						$message     = 'E-postanıza bir mail gönderildi';
					}
					else
					{
						$messageType = 'error';
						$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
					}
				}
				else
				{
					$messageType = 'error';
					$message     = 'Bu E-postaya ait kullanıcı bulunamadı';
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

		if(issetGet('token'))
		{
			if(get('token') == session('token'))
			{
				if(issetPost('change'))
				{
					$pass   = post('pass');
					$passRe = post('pass_re');

					if($pass != '' AND $passRe != '')
					{
						if(strlen($pass) < 6 || strlen($passRe) < 6)
						{
							$messageType = 'error';
							$message     = 'Lütfen geçerli bir şifre giriniz';
						}
						else
						{
							if($pass != $passRe)
							{
								$messageType = 'error';
								$message     = 'Şifre ile tekrar şifre aynı olmalıdır';
							}
							else
							{
								$userInfo = $User->userInfo(session('email'));

								if($userInfo !== false)
								{
									$update = $User->update($userInfo['id'], array('pass' => md5($pass)));

									if($update === true)
									{
										$messageType = 'success';
										$message     = 'Şifreniz başarıyla değiştirilmiştir';

										removeSession('email');
										removeSession('token');
									}
									else
									{
										$messageType = 'error';
										$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
									}
								}
								else
								{
									redirect();
								}
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
			}
			else
			{
				redirect();
			}
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('forgot.tpl');
	}
	else
	{
		redirect();
	}

?>