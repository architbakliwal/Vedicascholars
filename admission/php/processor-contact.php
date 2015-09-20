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
$email = strip_tags( trim( $_POST["email"] ) );
$mobilenumber = strip_tags( trim( $_POST["mobilenumber"] ) );
$phonenumber = strip_tags( trim( $_POST["phonenumber"] ) );
$currentaddress1 = strip_tags( trim( $_POST["currentaddress1"] ) );
$currentaddress2 = strip_tags( trim( $_POST["currentaddress2"] ) );
$currentaddress3 = strip_tags( trim( $_POST["currentaddress3"] ) );
$currentcity = strip_tags( trim( $_POST["currentcity"] ) );
$currentcountry = strip_tags( trim( $_POST["currentcountry"] ) );
$currentstate = strip_tags( trim( $_POST["currentstate"] ) );
$currentstateother = strip_tags( trim( $_POST["currentstateother"] ) );
$currentzip = strip_tags( trim( $_POST["currentzip"] ) );
$permanentsameascurrent = strip_tags( trim( $_POST["permanentsameascurrent"] ) );
$permanentaddress1 = strip_tags( trim( $_POST["permanentaddress1"] ) );
$permanentaddress2 = strip_tags( trim( $_POST["permanentaddress2"] ) );
$permanentaddress3 = strip_tags( trim( $_POST["permanentaddress3"] ) );
$permanentcity = strip_tags( trim( $_POST["permanentcity"] ) );
$permanentcountry = strip_tags( trim( $_POST["permanentcountry"] ) );
$permanentstate = strip_tags( trim( $_POST["permanentstate"] ) );
$permanentstateother = strip_tags( trim( $_POST["permanentstateother"] ) );
$permanentzip = strip_tags( trim( $_POST["permanentzip"] ) );
$emergencyname = strip_tags( trim( $_POST["emergencyname"] ) );
$emergencymobile = strip_tags( trim( $_POST["emergencymobile"] ) );
$emergencyrelation = strip_tags( trim( $_POST["emergencyrelation"] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalemail = htmlspecialchars( $email, ENT_QUOTES, 'UTF-8' );
$finalmobilenumber = htmlspecialchars( $mobilenumber, ENT_QUOTES, 'UTF-8' );
$finalphonenumber = htmlspecialchars( $phonenumber, ENT_QUOTES, 'UTF-8' );
$finalcurrentaddress1 = htmlspecialchars( $currentaddress1, ENT_QUOTES, 'UTF-8' );
$finalcurrentaddress2 = htmlspecialchars( $currentaddress2, ENT_QUOTES, 'UTF-8' );
$finalcurrentaddress3 = htmlspecialchars( $currentaddress3, ENT_QUOTES, 'UTF-8' );
$finalcurrentcity = htmlspecialchars( $currentcity, ENT_QUOTES, 'UTF-8' );
$finalcurrentcountry = htmlspecialchars( $currentcountry, ENT_QUOTES, 'UTF-8' );
$finalcurrentstate = htmlspecialchars( $currentstate, ENT_QUOTES, 'UTF-8' );
$finalcurrentstateother = htmlspecialchars( $currentstateother, ENT_QUOTES, 'UTF-8' );
$finalcurrentzip = htmlspecialchars( $currentzip, ENT_QUOTES, 'UTF-8' );
$finalpermanentsameascurrent = htmlspecialchars( $permanentsameascurrent, ENT_QUOTES, 'UTF-8' );
$finalpermanentaddress1 = htmlspecialchars( $permanentaddress1, ENT_QUOTES, 'UTF-8' );
$finalpermanentaddress2 = htmlspecialchars( $permanentaddress2, ENT_QUOTES, 'UTF-8' );
$finalpermanentaddress3 = htmlspecialchars( $permanentaddress3, ENT_QUOTES, 'UTF-8' );
$finalpermanentcity = htmlspecialchars( $permanentcity, ENT_QUOTES, 'UTF-8' );
$finalpermanentcountry = htmlspecialchars( $permanentcountry, ENT_QUOTES, 'UTF-8' );
$finalpermanentstate = htmlspecialchars( $permanentstate, ENT_QUOTES, 'UTF-8' );
$finalpermanentstateother = htmlspecialchars( $permanentstateother, ENT_QUOTES, 'UTF-8' );
$finalpermanentzip = htmlspecialchars( $permanentzip, ENT_QUOTES, 'UTF-8' );
$finalemergencyname = htmlspecialchars( $emergencyname, ENT_QUOTES, 'UTF-8' );
$finalemergencymobile = htmlspecialchars( $emergencymobile, ENT_QUOTES, 'UTF-8' );
$finalemergencyrelation = htmlspecialchars( $emergencyrelation, ENT_QUOTES, 'UTF-8' );


if ( $mysql == true ) {
	$sqlcontact = "INSERT INTO `vedica_admission`.`users_contact_details` (`application_id`, `email_id`, `mobile_number`, `phone_number`, `current_address_line1`, `current_address_line2`, `current_address_line3`, `current_address_city`, `current_address_state`, `current_address_state_other`, `current_address_country`, `current_address_pin`, `permanent_same_as_current_address`, `permanent_address_line1`, `permanent_address_line2`, `permanent_address_line3`, `permanent_address_city`, `permanent_address_state`, `permanent_address_state_other`, `permanent_address_country`, `permanent_address_pin`, `emergency_contact_name`, `emergency_contact_number`, `emergency_contact_relation`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalemail )."',
			'".mysql_real_escape_string( $finalmobilenumber )."',
			'".mysql_real_escape_string( $finalphonenumber )."',
			'".mysql_real_escape_string( $finalcurrentaddress1 )."',
			'".mysql_real_escape_string( $finalcurrentaddress2 )."',
			'".mysql_real_escape_string( $finalcurrentaddress3 )."',
			'".mysql_real_escape_string( $finalcurrentcity )."',
			'".mysql_real_escape_string( $finalcurrentstate )."',
			'".mysql_real_escape_string( $finalcurrentstateother )."',
			'".mysql_real_escape_string( $finalcurrentcountry )."',
			'".mysql_real_escape_string( $finalcurrentzip )."',
			'".mysql_real_escape_string( $finalpermanentsameascurrent )."',
			'".mysql_real_escape_string( $finalpermanentaddress1 )."',
			'".mysql_real_escape_string( $finalpermanentaddress2 )."',
			'".mysql_real_escape_string( $finalpermanentaddress3 )."',
			'".mysql_real_escape_string( $finalpermanentcity )."',
			'".mysql_real_escape_string( $finalpermanentstate )."',
			'".mysql_real_escape_string( $finalpermanentstateother )."',
			'".mysql_real_escape_string( $finalpermanentcountry )."',
			'".mysql_real_escape_string( $finalpermanentzip )."',
			'".mysql_real_escape_string( $finalemergencyname )."',
			'".mysql_real_escape_string( $finalemergencymobile )."',
			'".mysql_real_escape_string( $finalemergencyrelation )."'
			)
		ON DUPLICATE KEY
		UPDATE
		email_id = VALUES(email_id),
		mobile_number = VALUES(mobile_number),
		phone_number = VALUES(phone_number),
		current_address_line1 = VALUES(current_address_line1),
		current_address_line2 = VALUES(current_address_line2),
		current_address_line3 = VALUES(current_address_line3),
		current_address_city = VALUES(current_address_city),
		current_address_state = VALUES(current_address_state),
		current_address_state_other = VALUES(current_address_state_other),
		current_address_country = VALUES(current_address_country),
		current_address_pin = VALUES(current_address_pin),
		permanent_same_as_current_address = VALUES(permanent_same_as_current_address),
		permanent_address_line1 = VALUES(permanent_address_line1),
		permanent_address_line2 = VALUES(permanent_address_line2),
		permanent_address_line3 = VALUES(permanent_address_line3),
		permanent_address_city = VALUES(permanent_address_city),
		permanent_address_state = VALUES(permanent_address_state),
		permanent_address_state_other = VALUES(permanent_address_state_other),
		permanent_address_country = VALUES(permanent_address_country),
		permanent_address_pin = VALUES(permanent_address_pin),
		emergency_contact_name = VALUES(emergency_contact_name),
		emergency_contact_number = VALUES(emergency_contact_number),
		emergency_contact_relation = VALUES(emergency_contact_relation)
		;";

	$insertcontact = mysql_query( $sqlcontact );

	if ( ! $insertcontact ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

} else {

}

?>
