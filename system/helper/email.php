<?php
	
	# @Author: Enver Abbasov | https://www.facebook.com/enverabbasov435
	# @Date:   2017-07-31 15:02:45
	# @Email:  abbasovenver1999@gmail.com
	# @Last Modified time: 2017-10-10 15:19:33

	function validateEmail($email) 
	{
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function sendEmail($smtp, $email, $title, $content) 
	{
	    global $config;
	    
	    if($smtp == 'no-reply')
	    {
	    	$smtp_setting  = array(
				'host'   => $config['emailHost'],
				'port'   => $config['emailPort'],
				'secure' => $config['emailSecure'],
				'email'  => $config['emailNoReply'],
				'pass'   => $config['emailPass']
			);
	    }

	    $mail = new PHPMailer();
		$mail->IsSMTP();                              
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = $smtp_setting['secure'];                
		$mail->Host       = $smtp_setting['host'];      
		$mail->Port       = $smtp_setting['port'];                   
		$mail->Username   = $smtp_setting['email'];
		$mail->Password   = $smtp_setting['pass'];
		$mail->SetFrom($mail->Username, $config['emailSiteName']);
		$mail->Subject    = $title;
		$mail->MsgHTML($content);
		$mail->AddAddress($email, $config['emailSiteName']);
		$mail->CharSet    = 'UTF-8';
		if(!$mail->Send()) 
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		   	return true;
		}

    }

    function sendEmailBulk($smtp, $emails, $title, $content) 
	{
	    global $config;
	    
	    if($smtp == 'no-reply')
	    {
	    	$smtp_setting  = array(
				'host'   => $config['emailHost'],
				'port'   => $config['emailPort'],
				'secure' => $config['emailSecure'],
				'email'  => $config['emailNoReply'],
				'pass'   => $config['emailPass']
			);
	    }

	    $mail = new PHPMailer();
		$mail->IsSMTP();                              
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = $smtp_setting['secure'];                
		$mail->Host       = $smtp_setting['host'];      
		$mail->Port       = $smtp_setting['port'];                   
		$mail->Username   = $smtp_setting['email'];
		$mail->Password   = $smtp_setting['pass'];
		$mail->SetFrom($mail->Username, $config['emailSiteName']);
		$mail->Subject    = $title;
		$mail->MsgHTML($content);
		
		foreach ($emails as $email) 
		{
			$mail->AddBCC($email);
		}

		$mail->AddAddress($config['emailNoReply']);

		$mail->CharSet = 'UTF-8';
		if(!$mail->Send()) 
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		   	return true;
		}

    }

?>
