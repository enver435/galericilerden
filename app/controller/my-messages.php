<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-11 11:19:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-15 11:00:56
	
	if(session('login'))
	{
		$page = $_url[1];

		if($page != '')
		{
			if($page == 'view')
			{
				$messageId = $_url[2];

				if($messageId != '')
				{
					$page_param = 2;

					$messageInfo = $Messages->messageInfo($messageId);

					if($messageInfo !== false)
					{
						if(issetPost('send_message'))
						{
							$message = post('message');

							if($message != '')
							{
								if(session('userId') != $messageInfo['sendUser'])
								{
									$messageToUser = $messageInfo['sendUser'];
								}

								if(session('userId') != $messageInfo['toUser'])
								{
									$messageToUser = $messageInfo['toUser'];
								}

								$messageInfoMessageId = $Messages->messageInfoMessageId($messageId, $messageInfo['toUser'], $messageInfo['sendUser']);

								if($messageInfoMessageId['deleted'] == 1)
								{
									$Messages->updateMessage($messageInfoMessageId['id'],
										array(
											'deleted' => 0,
											'time'    => time(),
											'view'    => 0
										)
									);
								}
								else
								{
									$Messages->updateMessage($messageInfoMessageId['id'], 
										array(
											'view' => 0, 
											'time' => time()
										)
									);
								}

								$addMessageContentSend = $Messages->addMessageContent(
									array(
										'messagesId' => $messageId,
										'sendUser'   => session('userId'),
										'toUser'     => $messageToUser,
										'message'    => $message,
										'time'       => time()
									)
								);

								$addMessageContentTo = $Messages->addMessageContent(
									array(
										'messagesId' => $messageInfoMessageId['id'],
										'sendUser'   => session('userId'),
										'toUser'     => $messageToUser,
										'message'    => $message,
										'time'       => time()
									)
								);

								if($addMessageContentSend === false AND $addMessageContentTo === false)
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
						else
						{
							$Messages->updateMessage($messageId, array('view' => 1));
						}

						$returnArray['messageInfo']     = $messageInfo;
						$returnArray['messagesContent'] = $Messages->messagesContent($messageId);
						$returnArray['adInfo']          = $Ads->adInfo($messageInfo['adsId']);
					}
					else
					{
						redirect('my-messages');
					}
				}
				else
				{
					redirect('my-messages');
				}
			}
			elseif($page == 'delete')
			{
				$messageId = $_url[2];

				if($messageId != '')
				{
					$page_param = 2;

					$messageInfo = $Messages->messageInfo($messageId);

					if($messageInfo !== false)
					{
						$Messages->deleteMessage($messageId);
					}
				}

				redirect('my-messages');
			}
		}
		else
		{
			/* ACTUAL LINK */
			$actualLink = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

			/* PAGINATION SETTINGS */
			$page = 1;
			if(get('page') != '') 
			{
			    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
			    if(false === $page) 
			    {
			        $page = 1;
			    }
			}

			$items_per_page = 10;
			$offset         = ($page - 1) * $items_per_page;
			$page_count     = 0;

			/* ROWS */
			$messages      = $Messages->messages(false, $offset, $items_per_page);
			$messagesCount = count($Messages->messages(false, null, null));

			/* ROWS PAGINATION */
			if (0 !== $messagesCount) 
			{  
			    $page_count = (int)ceil($messagesCount / $items_per_page);
			   	if($page > $page_count) 
			   	{
			       $page = 1;
			   	}
			}

			$pagination = pagination($items_per_page, $page_count, $page, $actualLink);

			$returnArray['messages']   = $messages;
			$returnArray['pagination'] = $pagination;
		}

		$returnArray['Ads'] = $Ads;

		$smarty->assign('return', $returnArray);
		$smarty->display('my-messages.tpl');
	}
	else
	{
		redirect('login');
	}

?>