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
$paymentmode = strip_tags( trim( $_POST["paymentmode"] ) );
$ddpaymentmode = strip_tags( trim( $_POST["ddpaymentmode"] ) );
$referencenumber = strip_tags( trim( $_POST["referencenumber"] ) );
$paymentemailid = strip_tags( trim( $_POST["paymentemailid"] ) );
$nameofbank = strip_tags( trim( $_POST["nameofbank"] ) );
$paymentdate = strip_tags( trim( $_POST["paymentdate"] ) );
$paymentamount = strip_tags( trim( $_POST["paymentamount"] ) );


$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalpaymentmode = htmlspecialchars( $paymentmode, ENT_QUOTES, 'UTF-8' );
$finalddpaymentmode = htmlspecialchars( $ddpaymentmode, ENT_QUOTES, 'UTF-8' );
$finalreferencenumber = htmlspecialchars( $referencenumber, ENT_QUOTES, 'UTF-8' );
$finalpaymentemailid = htmlspecialchars( $paymentemailid, ENT_QUOTES, 'UTF-8' );
$finalnameofbank = htmlspecialchars( $nameofbank, ENT_QUOTES, 'UTF-8' );
$finalpaymentdate = htmlspecialchars( $paymentdate, ENT_QUOTES, 'UTF-8' );
$finalpaymentamount = htmlspecialchars( $paymentamount, ENT_QUOTES, 'UTF-8' );




if ( $mysql == true ) {
	$sqlpayment = "INSERT INTO `vedica_admission`.`users_payment_details` (`application_id`, `payment_mode`, `dd_payment_mode`, `dd_reference_number`, `dd_email_address`, `dd_bank_name`, `dd_date`, `payment_amount`, `payment_status`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalpaymentmode )."',
			'".mysql_real_escape_string( $finalddpaymentmode )."',
			'".mysql_real_escape_string( $finalreferencenumber )."',
			'".mysql_real_escape_string( $finalpaymentemailid )."',
			'".mysql_real_escape_string( $finalnameofbank )."',
			'".mysql_real_escape_string( $finalpaymentdate )."',
			'".mysql_real_escape_string( $finalpaymentamount )."',
			'".mysql_real_escape_string( "Pending" )."'
			)
		ON DUPLICATE KEY
		UPDATE
		payment_mode = VALUES(payment_mode),
		dd_payment_mode = VALUES(dd_payment_mode),
		dd_reference_number = VALUES(dd_reference_number),
		dd_email_address = VALUES(dd_email_address),
		dd_bank_name = VALUES(dd_bank_name),
		dd_date = VALUES(dd_date),
		payment_amount = VALUES(payment_amount),
		payment_status = VALUES(payment_status)
		;";

	$insertpayment = mysql_query( $sqlpayment );

	if ( ! $insertpayment ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	echo $baseurl;

} else {

}

?>
