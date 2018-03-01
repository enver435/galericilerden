<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-10-10 13:52:36
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-14 19:00:15
	
	if(session('adminLogin'))
	{
		$returnArray = array();

		if(issetPost('sendMail'))
		{
			$title       = post('title');
			$contentHtml = post('content', false);

			if($title != '' AND $contentHtml != '')
			{
				ob_start();
				require_once ROOT . '/app/email/send-mail-all-user.php';
				$content = ob_get_clean();

				$users = $UserAdmin->users();

				$sendEmails = array();
				foreach ($users as $user) 
				{
					$sendEmails[] = $user['email'];
				}

				$sendEmail = sendEmailBulk('no-reply', $sendEmails, $title, $content);

				if($sendEmail === true)
				{
					$messageType = 'success';
					$message     = 'Toplu Mail Gönderimi Başarılı';
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
				$message     = 'Lütfen tüm alanları doldurup tekrar deneyiniz';
			}

			$returnArray['messageType'] = $messageType;
			$returnArray['message']     = $message;
		}

		$smarty->assign('return', $returnArray);
		$smarty->display('admin/send-all-mail.tpl');
	}
	else
	{
		redirect(SITE_ADMIN);
	}
	
?>