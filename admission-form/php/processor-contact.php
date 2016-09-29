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

$applicationid = strip_tags( trim_awesome( $_SESSION['userName'] ) );
$email = strip_tags( trim_awesome( $_POST["email"] ) );
$mobilenumber = strip_tags( trim_awesome( $_POST["mobilenumber"] ) );
$phonenumber = strip_tags( trim_awesome( $_POST["phonenumber"] ) );
$currentaddress1 = strip_tags( trim_awesome( $_POST["currentaddress1"] ) );
$currentaddress2 = strip_tags( trim_awesome( $_POST["currentaddress2"] ) );
$currentaddress3 = strip_tags( trim_awesome( $_POST["currentaddress3"] ) );
$currentcity = strip_tags( trim_awesome( $_POST["currentcity"] ) );
$currentcountry = strip_tags( trim_awesome( $_POST["currentcountry"] ) );
$currentstate = strip_tags( trim_awesome( $_POST["currentstate"] ) );
$currentstateother = strip_tags( trim_awesome( $_POST["currentstateother"] ) );
$currentzip = strip_tags( trim_awesome( $_POST["currentzip"] ) );
$permanentsameascurrent = strip_tags( trim_awesome( $_POST["permanentsameascurrent"] ) );
$permanentaddress1 = strip_tags( trim_awesome( $_POST["permanentaddress1"] ) );
$permanentaddress2 = strip_tags( trim_awesome( $_POST["permanentaddress2"] ) );
$permanentaddress3 = strip_tags( trim_awesome( $_POST["permanentaddress3"] ) );
$permanentcity = strip_tags( trim_awesome( $_POST["permanentcity"] ) );
$permanentcountry = strip_tags( trim_awesome( $_POST["permanentcountry"] ) );
$permanentstate = strip_tags( trim_awesome( $_POST["permanentstate"] ) );
$permanentstateother = strip_tags( trim_awesome( $_POST["permanentstateother"] ) );
$permanentzip = strip_tags( trim_awesome( $_POST["permanentzip"] ) );
$parentname = strip_tags( trim_awesome( $_POST["parentname"] ) );
$parentmobile = strip_tags( trim_awesome( $_POST["parentmobile"] ) );
$parentrelation = strip_tags( trim_awesome( $_POST["parentrelation"] ) );
$parentorganisation = strip_tags( trim_awesome( $_POST["parentorganisation"] ) );
$parentdesignation = strip_tags( trim_awesome( $_POST["parentdesignation"] ) );
$parentqualification = strip_tags( trim_awesome( $_POST["parentqualification"] ) );


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
$finalparentname = htmlspecialchars( $parentname, ENT_QUOTES, 'UTF-8' );
$finalparentmobile = htmlspecialchars( $parentmobile, ENT_QUOTES, 'UTF-8' );
$finalparentrelation = htmlspecialchars( $parentrelation, ENT_QUOTES, 'UTF-8' );
$finalparentorganisation = htmlspecialchars( $parentorganisation, ENT_QUOTES, 'UTF-8' );
$finalparentdesignation = htmlspecialchars( $parentdesignation, ENT_QUOTES, 'UTF-8' );
$finalparentqualification = htmlspecialchars( $parentqualification, ENT_QUOTES, 'UTF-8' );


if ( $mysql == true ) {
	$sqlcontact = "INSERT INTO `vedica_admn_2017`.`users_contact_details` (`application_id`, `email_id`, `mobile_number`, `phone_number`, `current_address_line1`, `current_address_line2`, `current_address_line3`, `current_address_city`, `current_address_state`, `current_address_state_other`, `current_address_country`, `current_address_pin`, `permanent_same_as_current_address`, `permanent_address_line1`, `permanent_address_line2`, `permanent_address_line3`, `permanent_address_city`, `permanent_address_state`, `permanent_address_state_other`, `permanent_address_country`, `permanent_address_pin`, `parent_name`, `parent_mobile`, `parent_relation`, `parent_organisation`, `parent_designation`, `parent_qualification`) VALUES (
			".mysql_real_escape_string_awesome( $finalapplicationid ).",
			".mysql_real_escape_string_awesome( $finalemail ).",
			".mysql_real_escape_string_awesome( $finalmobilenumber ).",
			".mysql_real_escape_string_awesome( $finalphonenumber ).",
			".mysql_real_escape_string_awesome( $finalcurrentaddress1 ).",
			".mysql_real_escape_string_awesome( $finalcurrentaddress2 ).",
			".mysql_real_escape_string_awesome( $finalcurrentaddress3 ).",
			".mysql_real_escape_string_awesome( $finalcurrentcity ).",
			".mysql_real_escape_string_awesome( $finalcurrentstate ).",
			".mysql_real_escape_string_awesome( $finalcurrentstateother ).",
			".mysql_real_escape_string_awesome( $finalcurrentcountry ).",
			".mysql_real_escape_string_awesome( $finalcurrentzip ).",
			".mysql_real_escape_string_awesome( $finalpermanentsameascurrent ).",
			".mysql_real_escape_string_awesome( $finalpermanentaddress1 ).",
			".mysql_real_escape_string_awesome( $finalpermanentaddress2 ).",
			".mysql_real_escape_string_awesome( $finalpermanentaddress3 ).",
			".mysql_real_escape_string_awesome( $finalpermanentcity ).",
			".mysql_real_escape_string_awesome( $finalpermanentstate ).",
			".mysql_real_escape_string_awesome( $finalpermanentstateother ).",
			".mysql_real_escape_string_awesome( $finalpermanentcountry ).",
			".mysql_real_escape_string_awesome( $finalpermanentzip ).",
			".mysql_real_escape_string_awesome( $finalparentname ).",
			".mysql_real_escape_string_awesome( $finalparentmobile ).",
			".mysql_real_escape_string_awesome( $finalparentrelation ).",
			".mysql_real_escape_string_awesome( $finalparentorganisation ).",
			".mysql_real_escape_string_awesome( $finalparentdesignation ).",
			".mysql_real_escape_string_awesome( $finalparentqualification )."
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
		parent_name = VALUES(parent_name),
		parent_mobile = VALUES(parent_mobile),
		parent_relation = VALUES(parent_relation),
		parent_organisation = VALUES(parent_organisation),
		parent_designation = VALUES(parent_designation),
		parent_qualification = VALUES(parent_qualification)
		;";

	$insertcontact = mysql_query( $sqlcontact );

	if ( ! $insertcontact ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

} else {

}

?>
