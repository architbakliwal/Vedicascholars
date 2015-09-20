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
$personalstatus = strip_tags( trim( $_POST["personalstatus"] ) );
$contactstatus = strip_tags( trim( $_POST["contactstatus"] ) );
$academicestatus = strip_tags( trim( $_POST["academicestatus"] ) );
$workexstatus = strip_tags( trim( $_POST["workexstatus"] ) );
$refreestatus = strip_tags( trim( $_POST["refreestatus"] ) );
$scorestatus = strip_tags( trim( $_POST["scorestatus"] ) );
$docstatus = strip_tags( trim( $_POST["docstatus"] ) );

if ( $mysql == true ) {
	$sqlstatus = "INSERT INTO `vedica_admission`.`admission_section_status` (`application_id`, `personal_details_status`, `contact_details_status`, `academic_details_status`, `work_ex_details_status`, `reference_details_status`, `score_details_status`, `document_details_status`) VALUES (
			'".$applicationid."',
			'".$personalstatus."',
			'".$contactstatus."',
			'".$academicestatus."',
			'".$workexstatus."',
			'".$refreestatus."',
			'".$scorestatus."',
			'".$docstatus."'
			)
		ON DUPLICATE KEY
		UPDATE
		personal_details_status = VALUES(personal_details_status),
		contact_details_status = VALUES(contact_details_status),
		academic_details_status = VALUES(academic_details_status),
		work_ex_details_status = VALUES(work_ex_details_status),
		reference_details_status = VALUES(reference_details_status),
		score_details_status = VALUES(score_details_status),
		document_details_status = VALUES(document_details_status)
		;";

	$insertstatus = mysql_query( $sqlstatus );

	if ( ! $insertstatus ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

} else {

}

?>
