<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-13 16:50:19
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-14 17:38:37
	
	if(session('login'))
	{
		$adId = $_url[1];

		if($adId != '')
		{
			$page_param = 1;

			$adInfo = $Ads->adInfo($adId);

			if($adInfo !== false AND $adInfo['user_id'] != session('userId'))
			{
				$returnArray['adInfo'] = $adInfo;

				$my = $Messages->checkMessage($adInfo['id'], session('userId'), session('userId'), $adInfo['user_id']);
				$to = $Messages->checkMessage($adInfo['id'], $adInfo['user_id'], session('userId'), $adInfo['user_id']);

				if($my === false AND $to === false) // mende yoxdusa onda yoxdusa
				{
					if(issetPost('send_message'))
					{
						$message = post('message');

						if($message != '')
						{
							$addMessageSend = $Messages->addMessage(
								array(
									'adsId'       => $adInfo['id'],
									'userId'      => session('userId'),
									'sendUser'    => session('userId'),
									'toUser'      => $adInfo['user_id'],
									'create_time' => time(),
									'time'        => time(),
									'view'        => 1
								)
							);

							$addMessageTo = $Messages->addMessage(
								array(
									'adsId'       => $adInfo['id'],
									'userId'      => $adInfo['user_id'],
									'sendUser'    => session('userId'),
									'toUser'      => $adInfo['user_id'],
									'create_time' => time(),
									'time'        => time()
								)
							);

							if($addMessageSend != '' AND $addMessageTo != '')
							{
								$addMessageContentSend = $Messages->addMessageContent(
									array(
										'messagesId' => $addMessageSend,
										'sendUser'   => session('userId'),
										'toUser'     => $adInfo['user_id'],
										'message'    => $message,
										'time'       => time()
									)
								);

								$addMessageContentTo = $Messages->addMessageContent(
									array(
										'messagesId' => $addMessageTo,
										'sendUser'   => session('userId'),
										'toUser'     => $adInfo['user_id'],
										'message'    => $message,
										'time'       => time()
									)
								);

								if($addMessageContentSend === true AND $addMessageContentTo === true)
								{
									redirect('my-messages');
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
								$message     = 'Bir hata oluştu. Lütfen daha sonra tekrar deneyiniz';
							}
						}
						else
						{
							$messageType = 'error';
							$message     = 'Lütfen mesaj alanını boş bırakmayınız';
						}
					}

					$smarty->assign('return', $returnArray);
					$smarty->display('send-message.tpl');
				}
				elseif($my === true AND $to === false) // mende varsa onda yoxdusa
				{
					$messageInfoAds = $Messages->messageInfoAds($adInfo['id'], session('userId'), session('userId'), $adInfo['user_id']);

					if($messageInfoAds['deleted'] == 1)
					{
						$Messages->updateMessage($messageInfoAds['id'], array('deleted' => 0));
					}

					redirect('my-messages/view/' . $messageInfoAds['id']);
				}
				elseif($my === true AND $to === true) // mende varsa onda varsa
				{
					$messageInfoAds = $Messages->messageInfoAds($adInfo['id'], session('userId'), session('userId'), $adInfo['user_id']);

					if($messageInfoAds['deleted'] == 1)
					{
						$Messages->updateMessage($messageInfoAds['id'], array('deleted' => 0));
					}

					redirect('my-messages/view/' . $messageInfoAds['id']);
				}
			}
			else
			{
				redirect();
			}
		}
		else
		{
			redirect();
		}
	}
	else
	{
		redirect('login');
	}

?>