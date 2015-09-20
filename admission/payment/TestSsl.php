<?php

if ( !isset( $_SESSION ) ) {
	$some_name = session_name( "JBIMSAdmission" );
	session_start();
}

include '../php/config/config.php';


if ( !$_SESSION['userLogin'] && !$_SESSION['userName'] && !isset( $_SESSION['userName'] ) ) {

	redirect( $baseurl.'login.php?lang='.$_GET['lang'].'' );

} else {
	$time = time();

	if ( $time > $_SESSION['expire'] ) {
		session_destroy();
		redirect( $baseurl.'login.php?lang='.$_GET['lang'].'' );
		exit( 0 );
	}
}



if ( $mysql == true ) {
	$applicationid = $_SESSION['userName'];
	$applicantName = '';
	$applicationfees = 1200;
	$applicantemailid = '';

	$sqlpersonal = "SELECT * FROM  `users_personal_details` WHERE application_id ='" . $applicationid ."'";

	$selectpersonal = mysql_query( $sqlpersonal );

	if ( ! $selectpersonal ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	while ( $row = mysql_fetch_array( $selectpersonal, MYSQL_ASSOC ) ) {
		$fname = $row['f_name'];
		$lanme = $row['l_name'];
		$category = $row['category'];
		$differently_abled = $row['differently_abled'];
	}

	$sqlcontact = "SELECT * FROM  `admission_users` WHERE application_id ='" . $applicationid ."'";

	$selectcontact = mysql_query( $sqlcontact );

	if ( ! $selectcontact ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	while ( $row = mysql_fetch_array( $selectcontact, MYSQL_ASSOC ) ) {
		$applicantemailid = $row['email_id'];
		$programselected = $row['program_enrolled'];
	}

	$programselectedcount = 1;
	if ( strpos( $programselected, 'MMS' ) > -1 && strpos( $programselected, 'MSc' ) > -1 ) {
		$programselectedcount = 2;
	}

	$applicantName = $fname . ' ' . $lanme;
	if ( $category == 'General' || $category == 'NRI' || $category == 'PIOs' || $category == 'Foreign Nationals' || $category == 'Other' ) {
		$applicationfees = 1200;
		// $applicationfees = 10;
	} else {
		$applicationfees = 950;
		// $applicationfees = 5;
	}

	if ( $differently_abled == 'Y' ) {
		$applicationfees = 950;
		// $applicationfees = 5;
	}

	$applicationfees = $applicationfees + ( $applicationfees * ( 0.95506/100 ) );

	$applicationfees = $applicationfees * $programselectedcount;

	$applicationfees = round( $applicationfees, 2 );


} else {
	redirect( $baseurl );
}


include "Sfa/BillToAddress.php";
include "Sfa/CardInfo.php";
include "Sfa/Merchant.php";
include "Sfa/MPIData.php";
include "Sfa/ShipToAddress.php";
include "Sfa/PGResponse.php";
include "Sfa/PostLibPHP.php";
include "Sfa/PGReserveData.php";

$oMPI                 =         new         MPIData();

$oCI                =        new        CardInfo();

$oPostLibphp        =        new        PostLibPHP();

$oMerchant        =        new        Merchant();

$oBTA                =        new        BillToAddress();

$oSTA                =        new        ShipToAddress();

$oPGResp        =        new        PGResponse();

$oPGReserveData = new PGReserveData();



$oMerchant->setMerchantDetails( "00012849", "00012849", "00012849", "193.545.34.33", rand()."", "Ord123", $baseurl."payment/SFAResponse.php", "POST", "INR", "INV123", "req.Sale", $applicationfees, "", "Ext1", "true", "Ext3", "Ext4", "Ext5" );

$oBTA->setAddressDetails ( "CID", "Tester", "JBIMS", "Mumbai", "Maharashtra", "Test", "Test", "Test", "IND", "web@jbims.edu" );

$oSTA->setAddressDetails ( "Add1", "Add2", "Add3", "City", "State", "443543", "IND", "tester@soft.com" );

$INRapplicationfees = "INR".$applicationfees;
$applicationfeespaisa = $applicationfees * 100;

$oMPI->setMPIRequestDetails( $applicationfeespaisa, $INRapplicationfees, "356", "2", "JBIMS Admission", "", "", "", "0", "", "image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-powerpoint, application/vnd.ms-excel, application/msword, application/x-shockwave-flash, */*", "Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0)" );

$oPGReserveData->setReserveObj( $applicationid, $applicantName, $applicantemailid, $applicationfees, "5", "6", "7", "8", "9", "10" );

$oPGResp=$oPostLibphp->postSSL( $oBTA, $oSTA, $oMerchant, $oMPI, $oPGReserveData );


if ( $oPGResp->getRespCode() == '000' ) {

	$url        =$oPGResp->getRedirectionUrl();
	//$url =~ s/http/https/;
	//print "Location: ".$url."\n\n";
	//header("Location: ".$url);
	redirect( $url );



}else {

	print "Error Occured.<br>";
	print "Error Code:".$oPGResp->getRespCode()."<br>";
	print "Error Message:".$oPGResp->getRespMessage()."<br>";

}


// This will remove all white space
//$oResp =~ s/\s*//g;

// $oPGResp->getResponse($oResp);

//print $oPGResp->getRespCode()."<br>";

//print $oPGResp->getRespMessage()."<br>";

//print $oPGResp->getTxnId()."<br>";


//print $oPGResp->getEpgTxnId()."<br>";




function redirect( $url ) {

	if ( headers_sent() ) {

?>
         <html><head>
         <script language="javascript" type="text/javascript">

          window.self.location='<?php print( $url );?>';

         </script>
         </head></html>
         <?php
		exit;

	} else {

		header( "Location: ".$url );
		exit;

	}

}







?>
