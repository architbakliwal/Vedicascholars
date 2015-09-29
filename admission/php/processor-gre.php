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
$greregnumber = strip_tags( trim( $_POST['greregnumber'] ) );
$gredate = strip_tags( trim( $_POST['gredate'] ) );
$greverbalscore = strip_tags( trim( $_POST['greverbalscore'] ) );
$grequantscore = strip_tags( trim( $_POST['grequantscore'] ) );
$gretotalscore = strip_tags( trim( $_POST['gretotalscore'] ) );
$greverbalpercentile = strip_tags( trim( $_POST['greverbalpercentile'] ) );
$grequantpercentile = strip_tags( trim( $_POST['grequantpercentile'] ) );
$gretotalpercentile = strip_tags( trim( $_POST['gretotalpercentile'] ) );
$greawaawaited = strip_tags( trim( $_POST['greawaawaited'] ) );
$greawascore = strip_tags( trim( $_POST['greawascore'] ) );
$greawapercentile = strip_tags( trim( $_POST['greawapercentile'] ) );



$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalgreregnumber = htmlspecialchars( $greregnumber, ENT_QUOTES, 'UTF-8' );
$finalgredate = htmlspecialchars( $gredate, ENT_QUOTES, 'UTF-8' );
$finalgreverbalscore = htmlspecialchars( $greverbalscore, ENT_QUOTES, 'UTF-8' );
$finalgrequantscore = htmlspecialchars( $grequantscore, ENT_QUOTES, 'UTF-8' );
$finalgretotalscore = htmlspecialchars( $gretotalscore, ENT_QUOTES, 'UTF-8' );
$finalgreverbalpercentile = htmlspecialchars( $greverbalpercentile, ENT_QUOTES, 'UTF-8' );
$finalgrequantpercentile = htmlspecialchars( $grequantpercentile, ENT_QUOTES, 'UTF-8' );
$finalgretotalpercentile = htmlspecialchars( $gretotalpercentile, ENT_QUOTES, 'UTF-8' );
$finalgreawaawaited = htmlspecialchars( $greawaawaited, ENT_QUOTES, 'UTF-8' );
$finalgreawascore = htmlspecialchars( $greawascore, ENT_QUOTES, 'UTF-8' );
$finalgreawapercentile = htmlspecialchars( $greawapercentile, ENT_QUOTES, 'UTF-8' );




if ( $mysql == true ) {
	$sqltestgre = "INSERT INTO `vedica_admission`.`users_gre_score_details` (`application_id`, `gre_registration_number`, `gre_exam_date`, `gre_verbal_score`, `gre_quant_score`, `gre_total_score`, `gre_verbal_percentile`, `gre_quant_percentile`, `gre_total_percentile`, `gre_awa_awaited`, `gre_awa_score`, `gre_awa_percentile`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalgreregnumber )."',
			'".mysql_real_escape_string( $finalgredate )."',
			'".mysql_real_escape_string( $finalgreverbalscore )."',
			'".mysql_real_escape_string( $finalgrequantscore )."',
			'".mysql_real_escape_string( $finalgretotalscore )."',
			'".mysql_real_escape_string( $finalgreverbalpercentile )."',
			'".mysql_real_escape_string( $finalgrequantpercentile )."',
			'".mysql_real_escape_string( $finalgretotalpercentile )."',
			'".mysql_real_escape_string( $finalgreawaawaited )."',
			'".mysql_real_escape_string( $finalgreawascore )."',
			'".mysql_real_escape_string( $finalgreawapercentile )."'

			)
		ON DUPLICATE KEY
		UPDATE
		gre_registration_number = VALUES(gre_registration_number),
		gre_exam_date = VALUES(gre_exam_date),
		gre_verbal_score = VALUES(gre_verbal_score),
		gre_quant_score = VALUES(gre_quant_score),
		gre_total_score = VALUES(gre_total_score),
		gre_verbal_percentile = VALUES(gre_verbal_percentile),
		gre_quant_percentile = VALUES(gre_quant_percentile),
		gre_total_percentile = VALUES(gre_total_percentile),
		gre_awa_awaited = VALUES(gre_awa_awaited),
		gre_awa_score = VALUES(gre_awa_score),
		gre_awa_percentile = VALUES(gre_awa_percentile)
		;";

	$inserttestgre = mysql_query( $sqltestgre );

	if ( ! $inserttestgre ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	echo "success";

} else {

}

?>
