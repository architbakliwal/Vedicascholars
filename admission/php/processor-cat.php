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

$applicationid = strip_tags( trim( $_SESSION['userName'] ) );
$catapplicationid = strip_tags( trim( $_POST["catapplicationid"] ) );
$catexamdate = strip_tags( trim( $_POST["catexamdate"] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalcatapplicationid = htmlspecialchars( $catapplicationid, ENT_QUOTES, 'UTF-8' );
$finalcatexamdate = htmlspecialchars( $catexamdate, ENT_QUOTES, 'UTF-8' );



if ( $mysql == true ) {
	$sqltestcat = "INSERT INTO `vedica_admission`.`users_cat_score_details` (`application_id`, `cat_application_id`, `cat_exam_date`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalcatapplicationid )."',
			'".mysql_real_escape_string( $finalcatexamdate )."'
			)
		ON DUPLICATE KEY
		UPDATE
		cat_application_id = VALUES(cat_application_id),
		cat_exam_date = VALUES(cat_exam_date)
		;";

	$inserttestcat = mysql_query( $sqltestcat );

	if ( ! $inserttestcat ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	echo "success";

} else {

}

?>
