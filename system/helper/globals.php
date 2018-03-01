<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-07-31 15:06:02

	function setSession($name, $value) 
	{
		$_SESSION[$name] = $value;
	}

	function session($name) 
	{
		if(isset($_SESSION[$name])) 
		{
			return $_SESSION[$name];
		}
		return false;
	}

	function removeSession($name) 
	{
		if(isset($_SESSION[$name])) 
		{
			unset($_SESSION[$name]);
			return true;
		}
		return false;
	}

	function set_cookie($name, $value, $time) 
	{
		setcookie($name, $value, time() + $time, '/');
	}

	function cookie($name) 
	{
		if(isset($_COOKIE[$name])) 
		{
			return $_COOKIE[$name];
		}
		return false;
	}

	function removeCookie($name) 
	{
		if(isset($_COOKIE[$name])) 
		{
			unset($_COOKIE[$name]);
			setcookie($name, null, -1, '/');
			return true;
		}
		return false;
	}

	function setGlobal($name, $value) 
	{
		$GLOBALS[$name] = $value;
	}

	function getGlobal($name) 
	{
		if(isset($GLOBALS[$name])) 
		{
			return $GLOBALS[$name];
		}
		return false;
	}

	function removeGlobal($name) 
	{
		if(isset($GLOBALS[$name])) 
		{
			unset($GLOBALS[$name]);
			return true;
		}
		return false;
	}

?>
