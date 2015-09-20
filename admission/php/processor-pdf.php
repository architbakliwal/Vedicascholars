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

	$userInfo = "SELECT * FROM `pdf_export` WHERE pdf_generated = 'N'";

	$userQuery = mysql_query($userInfo);

	if(! $userQuery )
	{
	  die('Could not enter data: ' . mysql_error());
	}

	$num_rows = mysql_num_rows($userQuery);

	if($num_rows > 0) {
		echo 'Previous batch is still running. Please wait for another ' . (($num_rows * 2) + 5) . ' minutes.';
		die();
	}


	if(isset($_FILES['pdfsheet'])) {
	    $errors     = array();
	    $maxsize    = 1000000;
	    $allowed_extensions = array('.xls');
	    $allowed_name = array('bulk-pdf-export-sheet');
	    

	    if(($_FILES['pdfsheet']['size'] >= $maxsize) || ($_FILES["pdfsheet"]["size"] == 0)) {
	        $errors[] = 'File too large. File must be less than 1 Mb.';
	    }

	    if(count($errors) === 0) {
	    	$file_basename1 = substr($_FILES["pdfsheet"]["name"], 0, strripos($_FILES["pdfsheet"]["name"], '.'));
		    $file_extension1 = substr($_FILES["pdfsheet"]["name"], strripos($_FILES["pdfsheet"]["name"], '.'));

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
			// move_uploaded_file($_FILES['pdfsheet']['tmp_name'], '/var/www/vhosts/jbims.edu/public_html/admission/pdfsheet/' .$finalname1);
			move_uploaded_file($_FILES['pdfsheet']['tmp_name'], '../pdfsheet/' .$finalname1);
	    } else {
	        foreach($errors as $error) {
	            echo $error;
	        }

	        die(); //Ensure no more processing is done
	    }


	    // $data = new Spreadsheet_Excel_Reader("../pdfsheet/bulk-pdf-export-sheet.xls",false);
	    $data = new Spreadsheet_Excel_Reader("../pdfsheet/bulk-pdf-export-sheet.xls",false);

	    $array = getDataInArray($data);
	    $count = count($array);
	    $minutes = ($count * 2) + 5;
	    // echo count($array);
	    // echo " | ";
	    // echo ($array[0]);
	    // echo " | ";
	    // die();



		if ($mysql == true){

			$sqldelete = "DELETE FROM `pdf_export`";

			$deletequery = mysql_query($sqldelete);

			if(! $deletequery )
			{
			  die('Error deleting record: ' . mysql_error());
			}

			foreach ($array as $value) {

				// echo $value;
				// echo " | ";
				$applicationid = trim($value);

				$sqlinsert = "INSERT INTO `pdf_export` (`application_id`, `pdf_generated`) VALUES (
					'".mysql_real_escape_string($applicationid)."',
					'".mysql_real_escape_string('N')."'			
					)";

				$insertquery = mysql_query($sqlinsert);
			}

			echo 'Uploaded!! PDF generation process initiated. Total estimated time - ' . $minutes . ' minutes';

			
		} else {

		}
	}


	function getDataInArray($data) {
		$irow = 0;
		$icol = 0;
	    for ($row = 2; $row <= $data->rowcount(); $row++) {
	    	$out[$irow] = $data->val($row, 1);
	        $irow ++;
	    }
	    return $out;
	}	
		
?>