<?php
    
    include dirname(__FILE__).'/csrf_protection/csrf-token.php';
	include dirname(__FILE__).'/csrf_protection/csrf-class.php';

    
	include dirname(__FILE__).'/config/config.php';
	include dirname(__FILE__).'/config/functions.php';

	require_once 'phpexcel/excel_reader2.php';
	
	$language = array('en' => 'en','pt' => 'pt');

	if (isset($_GET['lang']) AND array_key_exists($_GET['lang'], $language)){
		include dirname(__FILE__).'/language/'.$language[$_GET['lang']].'.php';
	} else {
		include dirname(__FILE__).'/language/en.php';
	}

    $data = new Spreadsheet_Excel_Reader("../querysheet/payment_query_sheet.xls",false);

    $array = getDataInArray($data);
    // echo count($array);
    // echo " | ";
    // echo ($array[0][1]);
    // echo " | ";

    // die();

	if ($mysql == true){
		$i = 0;
		foreach ($array as $value) {

			// echo count($value?);
			// echo " | ";
			// echo ($value[$i]);
			// echo " | ";
			$applicationid = trim($value[$i]);
			// echo " | ";
			// echo ($applicationid);
			// echo " | ";
			$i++;
			$transactionid = trim($value[$i]);
			// echo " | ";
			// echo ($transactionid);
			// echo " | ";
			$i++;

			$sqluser = "SELECT * FROM  `admission_users` WHERE application_id ='" . $applicationid ."'";

			$selectuser = mysql_query($sqluser);

			if(! $selectuser )
			{
			  die('Could not select data: ' . mysql_error());
			}

			$num_rows = mysql_num_rows($selectuser);

			if($num_rows != 1) {
				continue;
			}

			while ($row = mysql_fetch_array($selectuser, MYSQL_ASSOC)) {
				$emailid = $row['email_id'];
			}

			// echo $num_rows;
			// echo " | ";

			$sqlcompleted = "UPDATE admission_users SET `application_status` = 'Completed' WHERE application_id ='" . $applicationid ."'";

			$updatecompleted = mysql_query($sqlcompleted);

			if(! $updatecompleted )
			{
			  die('Could not change data: ' . mysql_error());
			}



			// $sqlchangestatus = "UPDATE users_payment_details SET `payment_status` = 'Complete', `dd_reference_number` =  '" . $transactionid . "' WHERE application_id ='" . $applicationid ."'";

			$sqlchangestatus = "UPDATE users_payment_details SET `payment_status` = 'Complete' WHERE application_id ='" . $applicationid ."'";

			$updatestatus = mysql_query($sqlchangestatus);

			if(! $updatestatus )
			{
			  die('Could not change data: ' . mysql_error());
			}
		}

		echo 'Success';

		
	} else {

	}

	function getDataInArray($data) {
		$irow = 0;
		$icol = 0;
		// echo ($data->rowcount());
		// echo " | ";
	    for ($row = 2; $row <= $data->rowcount(); $row++) {
	        for ($col = 1; $col <= 2; $col++) {
	            $out[$irow][$icol] = $data->val($row, $col);
	            $icol ++;
	        }
	        $irow ++;
	    }
	    return $out;
	}	
		
?>