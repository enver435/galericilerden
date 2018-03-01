<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-20 10:01:19

	function timeAgo($date, $format) 
	{
	    $timestamp = strtotime($date);
	    $currentDate = new DateTime('@' . $timestamp);
	    $nowDate = new DateTime('@' . time());
	    return $currentDate
	        ->diff($nowDate)
	        ->format($format); // %y %m %d %h %i %s
	}

	function time_elapsed_string($datetime, $full = false) 
	{
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'yıl',
	        'm' => 'ay',
	        'w' => 'hafta',
	        'd' => 'gün',
	        'h' => 'saat',
	        'i' => 'dakika',
	        's' => 'saniye',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v /*. ($diff->$k > 1 ? 's' : '')*/;
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) : 'şimdi';
	}

	function monthName($time = null)
	{
		$month = date('m', ($time == null) ? time() : $time);

		if($month == '01') 
		{ 
			$monthName = 'Ocak';
		}
		elseif($month == '02')
		{
			$monthName = 'Şubat';
		}
		elseif($month == '03')
		{
			$monthName = 'Mart';
		}
		elseif($month == '04')
		{
			$monthName = 'Nisan';
		}
		elseif($month == '05')
		{
			$monthName = 'Mayıs';
		}
		elseif($month == '06')
		{
			$monthName = 'Haziran';
		}
		elseif($month == '07')
		{
			$monthName = 'Temmuz';
		}
		elseif($month == '08')
		{
			$monthName = 'Ağustos';
		}
		elseif($month == '09')
		{
			$monthName = 'Eylül';
		}
		elseif($month == '10')
		{
			$monthName = 'Ekim';
		}
		elseif($month == '11')
		{
			$monthName = 'Kasım';
		}
		elseif($month == '12')
		{
			$monthName = 'Aralık';
		}

		return $monthName;
	}

?>
