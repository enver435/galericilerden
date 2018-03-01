<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-28 11:26:54
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-16 19:46:36
	
	$pageArray = array('about' => null, 'media-images' => null, 'human-resources' => null, 'contact' => null, 'doping' => null, 'advertisement' => null, 'mobile' => null, 'safe-shopping-system' => null, 'safe-shopping-tips' => null, 'terms-of-use' => null, 'membership-agreement' => null, 'privacy-policy' => null, 'help-and-processing-guide' => null);

	if(array_key_exists(getUrl(1), $pageArray))
	{
		$page_param = 1;

		if(issetPost('send'))
		{
			if(getUrl(1) == 'human-resources')
			{
				$name_surname = post('name_surname');
				$email        = post('email');
				$phone        = post('phone');
				$message      = post('message');

				if($name_surname != '' AND $email != '' AND $phone != '' AND $message != '')
				{
					$content = '
						Ad, Soyad: <b>' . $name_surname . '</b><br>
						Eposta: <b>' . $email . '</b><br>
						Telefon: <b>' . $phone . '</b><br><br>
						Mesaj: <b>' . $message . '</b>
					';

					$sendEmail = sendEmail('no-reply', 'human@galericilerden.com', 'İnsan Kaynakları', $content);

					if($sendEmail === true)
					{
						$messageType = 'success';
						$message     = 'Mesajınız başarıyla gönderildi';
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
					$message     = 'Lütfen satırları boş bırakmayınız';
				}
			}
			elseif(getUrl(1) == 'contact')
			{
				$name_surname = post('name_surname');
				$email        = post('email');
				$phone        = post('phone');
				$title        = post('title');
				$message      = post('message');

				if($name_surname != '' AND $email != '' AND $phone != '' AND $message != '' AND $title != '')
				{
					$content = '
						Ad, Soyad: <b>' . $name_surname . '</b><br>
						Eposta: <b>' . $email . '</b><br>
						Telefon: <b>' . $phone . '</b><br>
						Konu: <b>' . $title . '</b><br><br>
						Mesaj: <b>' . $message . '</b>
					';

					$sendEmail = sendEmail('no-reply', 'destek@galericilerden.com', 'İletişim', $content);

					if($sendEmail === true)
					{
						$messageType = 'success';
						$message     = 'Mesajınız başarıyla gönderildi';
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
					$message     = 'Lütfen satırları boş bırakmayınız';
				}
			}
			elseif(getUrl(1) == 'advertisement')
			{
				$name_surname = post('name_surname');
				$email        = post('email');
				$phone        = post('phone');
				$message      = post('message');

				if($name_surname != '' AND $email != '' AND $phone != '' AND $message != '')
				{
					$content = '
						Ad, Soyad: <b>' . $name_surname . '</b><br>
						Eposta: <b>' . $email . '</b><br>
						Telefon: <b>' . $phone . '</b><br><br>
						Mesaj: <b>' . $message . '</b>
					';

					$sendEmail = sendEmail('no-reply', 'destek@galericilerden.com', 'Reklam', $content);

					if($sendEmail === true)
					{
						$messageType = 'success';
						$message     = 'Mesajınız başarıyla gönderildi';
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
					$message     = 'Lütfen satırları boş bırakmayınız';
				}
			}

			$returnArray['messageType'] = $messageType;
			$returnArray['message']     = $message;
		}

		if(getUrl(1) == 'doping')
		{
			$returnArray['dopingList'] = $Doping->dopingList();
		}
	}
	else
	{
		redirect();
	}

	$smarty->assign('return', $returnArray);
	$smarty->display('page.tpl');

?>