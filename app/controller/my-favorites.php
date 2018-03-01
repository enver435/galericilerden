<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-11 11:20:54
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2018-01-19 00:54:30
	
	if(session('login'))
	{
		$type = $_url[1];

		if($type != '')
		{
			$page_param = 1;

			if($type == 'ads')
			{
				$page = $_url[2];

				if($page != '')
				{	
					$page_param = 3;

					if($page == 'delete')
					{
						$id = $_url[3];

						if($id != '')
						{
							$Favorites->deleteFavorite($id);
						}

						redirect('my-favorites/ads');
					}
					elseif($page == 'add')
					{
						$id = $_url[3];

						$adInfo = $Ads->adInfo($id);

						if($id != '')
						{
							if(session('userId') != $adInfo['user_id'])
							{
								if($Favorites->checkFavorite($id) === false)
								{
									$Favorites->addFavorite(
										array(
											'adsId'   => $adInfo['id'],
											'adsUser' => $adInfo['user_id'],
											'userId'  => session('userId'),
											'time'    => time()
										)
									);
								}	
							}
						}

						redirect('my-favorites/ads');
					}
					else
					{
						redirect('my-favorites/ads');
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
					$favoritesAds      = $Favorites->favoritesAdsUser(session('userId'), $offset, $items_per_page);
					$favoritesAdsCount = count($Favorites->favoritesAdsUser(session('userId'), null, null));

					/* ROWS PAGINATION */
					if (0 !== $favoritesAdsCount) 
					{  
					    $page_count = (int)ceil($favoritesAdsCount / $items_per_page);
					   	if($page > $page_count) 
					   	{
					       $page = 1;
					   	}
					}

					$pagination = pagination($items_per_page, $page_count, $page, $actualLink);

					$returnArray['favorites']  = $favoritesAds;
					$returnArray['pagination'] = $pagination;
				}
			}
			elseif($type == 'search')
			{
				$page = $_url[2];

				if($page != '')
				{	
					$page_param = 3;

					if($page == 'delete')
					{
						$id = $_url[3];

						if($id != '')
						{
							$FavoritesSearch->delete($id);
							$FavoritesSearch->deleteItems($id);
						}

						redirect('my-favorites/search');
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
					$Favorites      = $FavoritesSearch->favoriteSearch(session('userId'), $offset, $items_per_page);
					$FavoritesCount = count($FavoritesSearch->favoriteSearch(session('userId'), null, null));

					/* ROWS PAGINATION */
					if (0 !== $FavoritesCount) 
					{  
					    $page_count = (int)ceil($FavoritesCount / $items_per_page);
					   	if($page > $page_count) 
					   	{
					       $page = 1;
					   	}
					}

					$pagination = pagination($items_per_page, $page_count, $page, $actualLink);

					$returnArray['favorites']  = $Favorites;
					$returnArray['pagination'] = $pagination;
				}
			}
		}

		$returnArray['Ads']             = $Ads;
		$returnArray['Store']           = $Store;
		$returnArray['FavoritesSearch'] = $FavoritesSearch;

		$smarty->assign('return', $returnArray);
		$smarty->display('my-favorites.tpl');
	}
	else
	{
		redirect('login');
	}

?>