<?php

include dirname( __FILE__ ).'/csrf_protection/csrf-token.php';
include dirname( __FILE__ ).'/csrf_protection/csrf-class.php';

if ( !isset( $_SESSION ) ) {
	$some_name = session_name( "VedicaAdmission" );
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

$testappearing = '';

if ( !empty( $_POST['testappearing'] ) ) {
	foreach ( $_POST['testappearing'] as $check ) {
		$testappearing = $testappearing . ', ' . $check;
	}
}

$applicationid = strip_tags( trim( $_SESSION['userName'] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finaltestappearing = htmlspecialchars( $testappearing, ENT_QUOTES, 'UTF-8' );



if ( $mysql == true ) {
	$sqltest = "INSERT INTO `vedica_admission`.`users_test_score_details` (`application_id`, `test_apprearing`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finaltestappearing )."'
			)
		ON DUPLICATE KEY
		UPDATE
		test_apprearing = VALUES(test_apprearing)
		;";

	$inserttest = mysql_query( $sqltest );

	if ( ! $inserttest ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	echo "success";

} else {

}

?>
