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
$gmatregnumber = strip_tags( trim( $_POST['gmatregnumber'] ) );
$gmatdate = strip_tags( trim( $_POST['gmatdate'] ) );
$gmatverbalscore = strip_tags( trim( $_POST['gmatverbalscore'] ) );
$gmatquantscore = strip_tags( trim( $_POST['gmatquantscore'] ) );
$gmattotalscore = strip_tags( trim( $_POST['gmattotalscore'] ) );
$gmatverbalpercentile = strip_tags( trim( $_POST['gmatverbalpercentile'] ) );
$gmatquantpercentile = strip_tags( trim( $_POST['gmatquantpercentile'] ) );
$gmattotalpercentile = strip_tags( trim( $_POST['gmattotalpercentile'] ) );
$gmatawaawaited = strip_tags( trim( $_POST['gmatawaawaited'] ) );
$gmatawascore = strip_tags( trim( $_POST['gmatawascore'] ) );
$gmatawapercentile = strip_tags( trim( $_POST['gmatawapercentile'] ) );
$gmatintegratedpercentile = strip_tags( trim( $_POST['gmatintegratedpercentile'] ) );
$gmatintegratedscore = strip_tags( trim( $_POST['gmatintegratedscore'] ) );



$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalgmatregnumber = htmlspecialchars( $gmatregnumber, ENT_QUOTES, 'UTF-8' );
$finalgmatdate = htmlspecialchars( $gmatdate, ENT_QUOTES, 'UTF-8' );
$finalgmatverbalscore = htmlspecialchars( $gmatverbalscore, ENT_QUOTES, 'UTF-8' );
$finalgmatquantscore = htmlspecialchars( $gmatquantscore, ENT_QUOTES, 'UTF-8' );
$finalgmattotalscore = htmlspecialchars( $gmattotalscore, ENT_QUOTES, 'UTF-8' );
$finalgmatverbalpercentile = htmlspecialchars( $gmatverbalpercentile, ENT_QUOTES, 'UTF-8' );
$finalgmatquantpercentile = htmlspecialchars( $gmatquantpercentile, ENT_QUOTES, 'UTF-8' );
$finalgmattotalpercentile = htmlspecialchars( $gmattotalpercentile, ENT_QUOTES, 'UTF-8' );
$finalgmatawaawaited = htmlspecialchars( $gmatawaawaited, ENT_QUOTES, 'UTF-8' );
$finalgmatawascore = htmlspecialchars( $gmatawascore, ENT_QUOTES, 'UTF-8' );
$finalgmatawapercentile = htmlspecialchars( $gmatawapercentile, ENT_QUOTES, 'UTF-8' );
$finalgmatintegratedpercentile = htmlspecialchars( $gmatintegratedpercentile, ENT_QUOTES, 'UTF-8' );
$finalgmatintegratedscore = htmlspecialchars( $gmatintegratedscore, ENT_QUOTES, 'UTF-8' );




if ( $mysql == true ) {
	$sqltestgmat = "INSERT INTO `vedica_admission`.`users_gmat_score_details` (`application_id`, `gmat_registration_number`, `gmat_exam_date`, `gmat_verbal_score`, `gmat_quant_score`, `gmat_total_score`, `gmat_verbal_percentile`, `gmat_quant_percentile`, `gmat_total_percentile`, `gmat_awa_awaited`, `gmat_awa_score`, `gmat_awa_percentile`, `gmat_integrated_reasoning_percentile`, `gmat_integrated_reasoning_score`) VALUES (
			'".mysql_real_escape_string( $finalapplicationid )."',
			'".mysql_real_escape_string( $finalgmatregnumber )."',
			'".mysql_real_escape_string( $finalgmatdate )."',
			'".mysql_real_escape_string( $finalgmatverbalscore )."',
			'".mysql_real_escape_string( $finalgmatquantscore )."',
			'".mysql_real_escape_string( $finalgmattotalscore )."',
			'".mysql_real_escape_string( $finalgmatverbalpercentile )."',
			'".mysql_real_escape_string( $finalgmatquantpercentile )."',
			'".mysql_real_escape_string( $finalgmattotalpercentile )."',
			'".mysql_real_escape_string( $finalgmatawaawaited )."',
			'".mysql_real_escape_string( $finalgmatawascore )."',
			'".mysql_real_escape_string( $finalgmatawapercentile )."',
			'".mysql_real_escape_string( $finalgmatintegratedpercentile )."',
			'".mysql_real_escape_string( $finalgmatintegratedscore )."'

			)
		ON DUPLICATE KEY
		UPDATE
		gmat_registration_number = VALUES(gmat_registration_number),
		gmat_exam_date = VALUES(gmat_exam_date),
		gmat_verbal_score = VALUES(gmat_verbal_score),
		gmat_quant_score = VALUES(gmat_quant_score),
		gmat_total_score = VALUES(gmat_total_score),
		gmat_verbal_percentile = VALUES(gmat_verbal_percentile),
		gmat_quant_percentile = VALUES(gmat_quant_percentile),
		gmat_total_percentile = VALUES(gmat_total_percentile),
		gmat_awa_awaited = VALUES(gmat_awa_awaited),
		gmat_awa_score = VALUES(gmat_awa_score),
		gmat_awa_percentile = VALUES(gmat_awa_percentile),
		gmat_integrated_reasoning_percentile = VALUES(gmat_integrated_reasoning_percentile),
		gmat_integrated_reasoning_score = VALUES(gmat_integrated_reasoning_score)
		;";

	$inserttestgmat = mysql_query( $sqltestgmat );

	if ( ! $inserttestgmat ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	echo "success";

} else {

}

?>
