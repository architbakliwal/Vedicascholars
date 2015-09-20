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


	if(isset($_FILES['ddsheet'])) {
	    $errors     = array();
	    $maxsize    = 409600;
	    $allowed_extensions = array('.xls');
	    $allowed_name = array('ddreferences-sheet');
	    

	    if(($_FILES['ddsheet']['size'] >= $maxsize) || ($_FILES["ddsheet"]["size"] == 0)) {
	        $errors[] = 'File too large. File must be less than 400 Kb.';
	    }

	    if(count($errors) === 0) {
	    	$file_basename1 = substr($_FILES["ddsheet"]["name"], 0, strripos($_FILES["ddsheet"]["name"], '.'));
		    $file_extension1 = substr($_FILES["ddsheet"]["name"], strripos($_FILES["ddsheet"]["name"], '.'));

		    if(!in_array($file_extension1, $allowed_extensions)) {
		    	echo 'Invalid file type. Only XLS is accepted.';
		    	die();
		    }

		    if(!in_array($file_extension1, $allowed_extensions)) {
		    	echo 'Invalid file type. Only XLS is accepted.';
		    	die();
		    }

		    if(!in_array($file_basename1, $allowed_name)) {
		    	echo 'Invalid file name.';
		    	die();
		    }
	             
			$finalname1 = $file_basename1.$file_extension1;
			$finalname1 = strtolower($finalname1);

			// Move upload files to Folder Directory
			move_uploaded_file($_FILES['ddsheet']['tmp_name'], '/var/www/vhosts/jbims.edu/public_html/admission/ddsheet/' .$finalname1);
	    } else {
	        foreach($errors as $error) {
	            echo $error;
	        }

	        die(); //Ensure no more processing is done
	    }


	    $data = new Spreadsheet_Excel_Reader("../ddsheet/ddreferences-sheet.xls",false);

	    $array = getDataInArray($data);
	    // echo count($array);
	    // echo " | ";
	    // echo ($array[0][0]);
	    // echo " | ";

		if ($mysql == true){
			$i = 0;
			foreach ($array as $value) {

				// echo count($value?);
				// echo " | ";
				// echo ($value[$i]);
				// echo " | ";
				$applicationid = trim($value[$i]);
				$i++;
				$referencenumber = trim($value[$i]);
				$i++;

				$sqlpayment = "SELECT payment_mode FROM  `users_payment_details` WHERE application_id ='" . $applicationid ."'";

				$selectpayment = mysql_query($sqlpayment);

				if(! $selectpayment )
				{
				  die('Could not enter data: ' . mysql_error());
				}

				while ($row = mysql_fetch_array($selectpayment, MYSQL_ASSOC)) {
					$paymentmode = $row['payment_mode'];
				}

				if($paymentmode == "ddbanktransfer") {

					$sqlchangestatus = "UPDATE users_payment_details SET `payment_status` = 'Complete', `notified_user` = 'N', `dd_reference_number` =  '" . $referencenumber . "' WHERE application_id ='" . $applicationid ."'";

					$updatestatus = mysql_query($sqlchangestatus);

					if(! $updatestatus )
					{
					  die('Could not enter data: ' . mysql_error());
					}
				}	

			}

			echo 'Success';

			
		} else {

		}
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