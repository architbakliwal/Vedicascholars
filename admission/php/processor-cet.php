<?php
    
    include dirname(__FILE__).'/csrf_protection/csrf-token.php';
	include dirname(__FILE__).'/csrf_protection/csrf-class.php';

	if(!isset($_SESSION)){
		$some_name = session_name( "JBIMSAdmission" );
    	session_start();
	}
    
	include dirname(__FILE__).'/config/config.php';
	include dirname(__FILE__).'/config/functions.php';
	
	$language = array('en' => 'en','pt' => 'pt');

	if (isset($_GET['lang']) AND array_key_exists($_GET['lang'], $language)){
		include dirname(__FILE__).'/language/'.$language[$_GET['lang']].'.php';
	} else {
		include dirname(__FILE__).'/language/en.php';
	}

	if(!$_SESSION['userLogin'] && !$_SESSION['userName'] && !isset($_SESSION['userName'])){
				
		timeout();
			
	} else {					
		$time = time();
								
		if($time > $_SESSION['expire']){
			session_destroy();
			timeout();
			exit(0);
		}		
	}
		
	$applicationid = strip_tags(trim($_SESSION['userName']));
	$cetrollnumber = strip_tags(trim($_POST["cetrollnumber"]));
	$cetmarks = strip_tags(trim($_POST["cetmarks"]));
	$cetpercentile = strip_tags(trim($_POST["cetpercentile"]));


	$finalapplicationid = htmlspecialchars($applicationid, ENT_QUOTES, 'UTF-8');
	$finalcetrollnumber = htmlspecialchars($cetrollnumber, ENT_QUOTES, 'UTF-8');
	$finalcetmarks = htmlspecialchars($cetmarks, ENT_QUOTES, 'UTF-8');
	$finalcetpercentile = htmlspecialchars($cetpercentile, ENT_QUOTES, 'UTF-8');

	

	if ($mysql == true){
		$sqltestcet = "INSERT INTO `vedica_admission`.`users_cet_score_details` (`application_id`, `cet_roll_number`, `cet_marks`, `cet_percentile`) VALUES (
			'".mysql_real_escape_string($finalapplicationid)."',
			'".mysql_real_escape_string($finalcetrollnumber)."',
			'".mysql_real_escape_string($finalcetmarks)."',
			'".mysql_real_escape_string($finalcetpercentile)."'
			) 
		ON DUPLICATE KEY 
		UPDATE 
		cet_roll_number = VALUES(cet_roll_number),
		cet_marks = VALUES(cet_marks),
		cet_percentile = VALUES(cet_percentile)
		;";

		$inserttestcet = mysql_query($sqltestcet);

		if(! $inserttestcet )
		{
		  die('Could not enter data: ' . mysql_error());
		}

		echo "success";

	} else {

	}
		
?>