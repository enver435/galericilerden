<?php

    # @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-09-12 12:03:52
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-09-21 08:03:18
	
	function pagination($items_per_page, $page_count, $page, $actualLink)
	{
		$pagination       = '';
		$mobilePagination = '';
		$i2               = 0;
		for ($i = $page - 5; $i < (($page * $items_per_page) - $items_per_page) + 5 + 1; $i++) 
		{
			$actualLink = str_replace(array('&page=' . get('page'), '?page=' . get('page')), array('', ''), $actualLink);

			if($page_count > 1)
			{
				if ($i > 0 && $i <= $page_count) 
				{
				    if ($i === $page) 
				    {
				        $pagination .= '<li class="active"><a href="javascript:;">' . $i . '</a></li>';
				    } 
				    else 
				    {
				        if(getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search')
				        {
				        	$pagination .= '<li><a href="' . $actualLink . '&page=' . $i . '">' . $i . '</a></li>';
				        }
				        else
				        {
				        	$pagination .= '<li><a href="' . $actualLink . '?page=' . $i . '">' . $i . '</a></li>';
				        }
				    }
				}
			}

			$i2++;
		}

		if($page_count > 1)
		{
			if(get('page') > 1)
			{
				$mobilePagination .= '<a href="' . $actualLink . ((getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search') ? '&' : '?') . 'page=' . (get('page') - 1) . '" class="block block-content btn-page left"><i class="material-icons">keyboard_arrow_left</i></a>';
			}

			$mobilePagination .= '<span class="currentPage"> Sayfa ' . (!get('page') ? 1 : get('page')) . '</span> / <span class="totalPage">' . $page_count . '</span>';
			
			if(get('page') != $page_count)
			{
				$mobilePagination .= '<a href="' . $actualLink . ((getUrl(0) == 'category' || getUrl(0) == 'category-special' || getUrl(0) == 'user' || getUrl(0) == 'search') ? '&' : '?') . 'page=' . (!get('page') ? 2 : get('page') + 1) . '" class="block block-content btn-page right"><i class="material-icons">keyboard_arrow_right</i></a>';
			}
			else
			{
				$mobilePagination .= '<a href="javascript:;" class="block block-content btn-page right"><i class="material-icons">keyboard_arrow_right</i></a>';
			}
		}

		if($i2 <= 1)
		{
			$pagination       = '';
			$mobilePagination = '';
		}

		return array(
			'desktopPagination' => $pagination,
			'mobilePagination'  => $mobilePagination
		);
	}

	function paginationStore($items_per_page, $page_count, $page, $actualLink)
	{
		if(!get('orderby') AND !get('catId') AND !get('pageSize'))
		{
			$actualLink = str_replace('?page=' . get('page'), '', $actualLink);
		}
		else
		{
			$actualLink = str_replace('&page=' . get('page'), '', $actualLink);
		}

		$pagination       = '';
		$mobilePagination = '';
		$i2               = 0;
		for ($i = $page - 5; $i < (($page * $items_per_page) - $items_per_page) + 5 + 1; $i++) 
		{
			if ($i > 0 && $i <= $page_count) 
			{
				if($page_count > 1)
				{
					if ($i === $page) 
				    {
				        $pagination .= '<li class="active"><a href="javascript:;">' . $i . '</a></li>';
				    } 
				    else 
				    {
				    	if(!get('orderby') AND !get('catId') AND !get('pageSize'))
				    	{
				    		$pagination .= '<li><a href="' . $actualLink . '?page=' . $i . '">' . $i . '</a></li>';
				    	}
				    	else
				    	{
				    		$pagination .= '<li><a href="' . $actualLink . '&page=' . $i . '">' . $i . '</a></li>';
				    	}
				    }
				}
			}

			$i2++;
		}

		if($page_count > 1)
		{
			if(get('page') > 1)
			{
				$mobilePagination .= '<a href="' . $actualLink . ((!get('orderby') AND !get('catId') AND !get('pageSize')) ? '?' : '&') . 'page=' . (get('page') - 1) . '" class="block block-content btn-page left"><i class="material-icons">keyboard_arrow_left</i></a>';
			}

			$mobilePagination .= '<span class="currentPage"> Sayfa ' . (!get('page') ? 1 : get('page')) . '</span> / <span class="totalPage">' . $page_count . '</span>';
			
			if(get('page') != $page_count)
			{
				$mobilePagination .= '<a href="' . $actualLink . ((!get('orderby') AND !get('catId') AND !get('pageSize')) ? '?' : '&') . 'page=' . (!get('page') ? 2 : get('page') + 1) . '" class="block block-content btn-page right"><i class="material-icons">keyboard_arrow_right</i></a>';
			}
			else
			{
				$mobilePagination .= '<a href="javascript:;" class="block block-content btn-page right"><i class="material-icons">keyboard_arrow_right</i></a>';
			}
		}

		if($i2 <= 1)
		{
			$pagination       = '';
			$mobilePagination = '';
		}

		return array(
			'desktopPagination' => $pagination,
			'mobilePagination'  => $mobilePagination
		);
	}

?>