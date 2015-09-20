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
$firstname = strip_tags( trim( $_POST["firstname"] ) );
$middlename = strip_tags( trim( $_POST["middlename"] ) );
$lastname = strip_tags( trim( $_POST["lastname"] ) );
$dob = strip_tags( trim( $_POST["dob"] ) );
$gender = strip_tags( trim( $_POST["gender"] ) );
$panssn = strip_tags( trim( $_POST["panssn"] ) );
$passportnumber = strip_tags( trim( $_POST["passportnumber"] ) );
$passportissued = strip_tags( trim( $_POST["passportissued"] ) );
$passportexipry = strip_tags( trim( $_POST["passportexipry"] ) );
$differentailyabled = strip_tags( trim( $_POST["differentailyabled"] ) );
$category = strip_tags( trim( $_POST["category"] ) );
$categoryothers = strip_tags( trim( $_POST["categoryothers"] ) );
$universitygraduated = strip_tags( trim( $_POST["universitygraduated"] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalfirstname = htmlspecialchars( $firstname, ENT_QUOTES, 'UTF-8' );
$finalmiddlename = htmlspecialchars( $middlename, ENT_QUOTES, 'UTF-8' );
$finallastname = htmlspecialchars( $lastname, ENT_QUOTES, 'UTF-8' );
$finaldob = htmlspecialchars( $dob, ENT_QUOTES, 'UTF-8' );
$finalgender = htmlspecialchars( $gender, ENT_QUOTES, 'UTF-8' );
$finalpanssn = htmlspecialchars( $panssn, ENT_QUOTES, 'UTF-8' );
$finalpassportnumber = htmlspecialchars( $passportnumber, ENT_QUOTES, 'UTF-8' );
$finalpassportissued = htmlspecialchars( $passportissued, ENT_QUOTES, 'UTF-8' );
$finalpassportexipry = htmlspecialchars( $passportexipry, ENT_QUOTES, 'UTF-8' );
$finaldifferentailyabled = htmlspecialchars( $differentailyabled, ENT_QUOTES, 'UTF-8' );
$finalcategory = htmlspecialchars( $category, ENT_QUOTES, 'UTF-8' );
$finalcategoryothers = htmlspecialchars( $categoryothers, ENT_QUOTES, 'UTF-8' );
$finaluniversitygraduated = htmlspecialchars( $universitygraduated, ENT_QUOTES, 'UTF-8' );

if ( $finaldob ) {
	$c= date( 'Y' );
	$y= date( 'Y', strtotime( $finaldob ) );
	$finalage = $c-$y;
} else {
	$finalage = '';
}



if ( $mysql == true ) {
	$sqlpersonal = "INSERT INTO `vedica_admission`.`users_personal_details` (`application_id`, `f_name`, `m_name`, `l_name`,`user_dob`, `age`, `gender`, `pan_ssn`, `passport_number`, `passport_issued_by`, `passport_expiry_date`, `differently_abled`, `category`, `category_other`, `university_of_graduation`) VALUES ('".mysql_real_escape_string( $finalapplicationid )."','".mysql_real_escape_string( $finalfirstname )."','".mysql_real_escape_string( $finalmiddlename )."','".mysql_real_escape_string( $finallastname )."','".mysql_real_escape_string( $finaldob )."','".mysql_real_escape_string( $finalage )."','".mysql_real_escape_string( $finalgender )."','".mysql_real_escape_string( $finalpanssn )."','".mysql_real_escape_string( $finalpassportnumber )."','".mysql_real_escape_string( $finalpassportissued )."','".mysql_real_escape_string( $finalpassportexipry )."','".mysql_real_escape_string( $finaldifferentailyabled )."','".mysql_real_escape_string( $finalcategory )."','".mysql_real_escape_string( $finalcategoryothers )."','".mysql_real_escape_string( $finaluniversitygraduated )."')
		ON DUPLICATE KEY
		UPDATE
		f_name = VALUES(f_name),
		m_name = VALUES(m_name),
		l_name = VALUES(l_name),
		user_dob = VALUES(user_dob),
		age = VALUES(age),
		gender = VALUES(gender),
		pan_ssn = VALUES(pan_ssn),
		passport_number = VALUES(passport_number),
		passport_issued_by = VALUES(passport_issued_by),
		passport_expiry_date = VALUES(passport_expiry_date),
		differently_abled = VALUES(differently_abled),
		category = VALUES(category),
		category_other = VALUES(category_other),
		university_of_graduation = VALUES(university_of_graduation)
		;";

	$insertpersonal = mysql_query( $sqlpersonal );

	if ( ! $insertpersonal ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

} else {

}

?>
