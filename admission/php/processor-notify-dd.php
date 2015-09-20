<?php
    
	include dirname(__FILE__).'/config/config.php';
	include dirname(__FILE__).'/config/functions.php';
	
	$language = array('en' => 'en','pt' => 'pt');

	if (isset($_GET['lang']) AND array_key_exists($_GET['lang'], $language)){
		include dirname(__FILE__).'/language/'.$language[$_GET['lang']].'.php';
	} else {
		include dirname(__FILE__).'/language/en.php';
	}

	if ($mysql == true){
		
		$sqlpayment = "SELECT * FROM `users_payment_details` WHERE `payment_mode` = 'ddbanktransfer' AND `payment_status` = 'Complete' AND `notified_user` = 'N'";

		$selectpayment = mysql_query($sqlpayment);

		if(! $selectpayment )
		{
		  die('Could not enter data: ' . mysql_error());
		}

		while ($row = mysql_fetch_array($selectpayment, MYSQL_ASSOC)) {
			$applicationid = $row['application_id'];
		}

		if(strlen(trim($applicationid)) == 0) {
			echo "No Un-notified";
			die();
		}

		$sqlcontact = "SELECT * FROM  `admission_users` WHERE application_id ='" . $applicationid ."'";

		$selectcontact = mysql_query($sqlcontact);

		if(! $selectcontact )
		{
		  die('Could not enter data: ' . mysql_error());
		}

		while ($row = mysql_fetch_array($selectcontact, MYSQL_ASSOC)) {
			$applicantemailid = $row['email_id'];
		}

		include dirname(__FILE__).'/phpmailer/PHPMailerAutoload.php';							
		include dirname(__FILE__).'/messages/automessagesubmit.php';

		$imessage = $automessagesubmit;
								
		$automail = new PHPMailer();
		$automail->IsSMTP();
		$automail->SMTPAuth = true;
		$automail->SMTPSecure = $protocol;
		$automail->Host = $host;
		$automail->Port = $port;
		$automail->Username = $smtpusername;
		$automail->Password = $smtppassword;
		$automail->From = $youremail;
		$automail->FromName = $yourname;
		$automail->isHTML(true);
		$automail->CharSet = "UTF-8";
		$automail->Encoding = "base64";
		$automail->Timeout = 200;
		$automail->SMTPDebug = 0; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
		$automail->ContentType = "text/html";
		$automail->AddAddress($applicantemailid);
		$automail->Subject = "Application successfully submitted";
		$automail->Body = $imessage;
		$automail->AltBody = "To view this message, please use an HTML compatible email";
							
		if ($automail->Send()) {

			$sqlchangestatus = "UPDATE users_payment_details SET `notified_user` = 'Y' WHERE application_id ='" . $applicationid ."'";

			$updatestatus = mysql_query($sqlchangestatus);

			if(! $updatestatus )
			{
			  die('Could not enter data: ' . mysql_error());
			}

			echo 'success';
		} else {
			echo 'error';						
		}

	} else {

	}
		
?>