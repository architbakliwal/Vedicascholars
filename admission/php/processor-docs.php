<?php

include dirname( __FILE__ ).'/csrf_protection/csrf-token.php';
include dirname( __FILE__ ).'/csrf_protection/csrf-class.php';

if ( !isset( $_SESSION ) ) {
	$some_name = session_name( "JBIMSAdmission" );
	session_start();
}

include dirname( __FILE__ ).'/config/config.php';
include dirname( __FILE__ ).'/config/functions.php';

$language = array( 'en' => 'en', 'pt' => 'pt' );

if ( isset( $_GET['lang'] ) and array_key_exists( $_GET['lang'], $language ) ) {
	include dirname( __FILE__ ).'/language/'.$language[$_GET['lang']].'.php';
} else {
	include dirname( __FILE__ ).'/language/en.php';
}

if ( !$_SESSION['userLogin'] && !$_SESSION['userName'] && !isset( $_SESSION['userName'] ) ) {

	timeout();

} else {
	$time = time();

	if ( $time > $_SESSION['expire'] ) {
		session_destroy();
		timeout();
		exit( 0 );
	}
}

$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + ( 60*60 );

if ( strlen( trim( $_SESSION['userName'] ) ) == 0 ) {
	session_destroy();
	timeout();
	die();
}



$applicationid = strip_tags( trim( $_SESSION['userName'] ) );
$hearaboutjbims = strip_tags( trim( $_POST['hearaboutjbims'] ) );
$appliedbefore = strip_tags( trim( $_POST['appliedbefore'] ) );
$appliedyear = strip_tags( trim( $_POST['appliedyear'] ) );
$supportinfo = strip_tags( trim( $_POST['supportinfo'] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalhearaboutjbims = htmlspecialchars( $hearaboutjbims, ENT_QUOTES, 'UTF-8' );
$finalappliedbefore = htmlspecialchars( $appliedbefore, ENT_QUOTES, 'UTF-8' );
$finalappliedyear = htmlspecialchars( $appliedyear, ENT_QUOTES, 'UTF-8' );
$finalsupportinfo = htmlspecialchars( $supportinfo, ENT_QUOTES, 'UTF-8' );

if ( $mysql == true ) {

	$doc_response = array();

	$sqldoc = "SELECT * FROM  `users_documents_uploads` WHERE application_id ='" . $finalapplicationid ."'";

	$selectdoc = mysql_query( $sqldoc );

	if ( ! $selectdoc ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	while ( $row = mysql_fetch_array( $selectdoc, MYSQL_ASSOC ) ) {
		$finalname0 = $row['passport_photo'];
	}

	if ( isset( $_FILES['passportphoto'] ) ) {
		$errors     = array();
		$maxsize    = 409600;
		$acceptable = array(
			'image/jpeg',
			'image/jpg',
			'image/gif',
			'image/png'
		);

		if ( ( $_FILES['passportphoto']['size'] >= $maxsize ) || ( $_FILES["passportphoto"]["size"] == 0 ) ) {
			$errors[] = 'File too large. File must be less than 400 Kb.';
		}

		if ( !( in_array( $_FILES['passportphoto']['type'], $acceptable ) ) && ( !empty( $_FILES["passportphoto"]["type"] ) ) ) {
			$errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
		}

		if ( count( $errors ) === 0 ) {
			$file_basename1 = substr( $_FILES["passportphoto"]["name"], 0, strripos( $_FILES["passportphoto"]["name"], '.' ) );
			$file_extension1 = substr( $_FILES["passportphoto"]["name"], strripos( $_FILES["passportphoto"]["name"], '.' ) );

			$finalname0 = $file_basename1.$file_extension1;

			// Add a name to Random Files ID
			$finalname1 = $finalapplicationid.$file_extension1;

			// Move upload files to Folder Directory
			move_uploaded_file( $_FILES['passportphoto']['tmp_name'], '/var/www/vhosts/jbims.edu/public_html/admission/uploads/' .$finalname1 );
			// move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
		} else {
			$doc_response['status'] = 'F';
			$doc_response['msg'] = $errors;
			/*foreach ( $errors as $error ) {
				echo $error;
			}*/
			echo json_encode($doc_response);

			die(); //Ensure no more processing is done
		}
	}


	$sqltestgmat = "INSERT INTO `vedica_admission`.`users_documents_uploads` (`application_id`, `passport_photo`, `how_did_you_hear_of_jbims`, `applied_to_jbims_before`, `applied_to_jbims_before_year`, `other_support_information`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalname0 )."',
			'".mysql_real_escape_string( $finalhearaboutjbims )."',
			'".mysql_real_escape_string( $finalappliedbefore )."',
			'".mysql_real_escape_string( $finalappliedyear )."',
			'".mysql_real_escape_string( $finalsupportinfo )."'
			)
		ON DUPLICATE KEY
		UPDATE
		passport_photo = VALUES(passport_photo),
		how_did_you_hear_of_jbims = VALUES(how_did_you_hear_of_jbims),
		applied_to_jbims_before = VALUES(applied_to_jbims_before),
		applied_to_jbims_before_year = VALUES(applied_to_jbims_before_year),
		other_support_information = VALUES(other_support_information)
		;";

	$inserttestgmat = mysql_query( $sqltestgmat );

	if ( ! $inserttestgmat ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	$doc_response['status'] = 'P';
	$doc_response['msg'] = $baseurl;
	echo json_encode($doc_response);

} else {

}

?>
