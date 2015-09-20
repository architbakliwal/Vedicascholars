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
$isworkex = strip_tags( trim( $_POST['isworkex'] ) );
$organizationname = strip_tags( trim( $_POST['organizationname'] ) );
$organizationtype = strip_tags( trim( $_POST['organizationtype'] ) );
$organizationtypeother = strip_tags( trim( $_POST['organizationtypeother'] ) );
$industrytype = strip_tags( trim( $_POST['industrytype'] ) );
$workstarted = strip_tags( trim( $_POST['workstarted'] ) );
$workcompleted = strip_tags( trim( $_POST['workcompleted'] ) );
$comapnyjoinedas = strip_tags( trim( $_POST['comapnyjoinedas'] ) );
$currentdesignation = strip_tags( trim( $_POST['currentdesignation'] ) );
$annualrenumeration = strip_tags( trim( $_POST['annualrenumeration'] ) );
$rolesandresponsibility = strip_tags( trim( $_POST['rolesandresponsibility'] ) );
$extraworkexcount = strip_tags( trim( $_POST['extraworkexcount'] ) );
$totalworkex = strip_tags( trim( $_POST['totalworkex'] ) );



$finalapplicationid = htmlspecialchars( $applicationid, ENT_QUOTES, 'UTF-8' );
$finalisworkex = htmlspecialchars( $isworkex, ENT_QUOTES, 'UTF-8' );
$finalorganizationname = htmlspecialchars( $organizationname, ENT_QUOTES, 'UTF-8' );
$finalorganizationtype = htmlspecialchars( $organizationtype, ENT_QUOTES, 'UTF-8' );
$finalorganizationtypeother = htmlspecialchars( $organizationtypeother, ENT_QUOTES, 'UTF-8' );
$finalindustrytype = htmlspecialchars( $industrytype, ENT_QUOTES, 'UTF-8' );
$finalworkstarted = htmlspecialchars( $workstarted, ENT_QUOTES, 'UTF-8' );
$finalworkcompleted = htmlspecialchars( $workcompleted, ENT_QUOTES, 'UTF-8' );
$finalcomapnyjoinedas = htmlspecialchars( $comapnyjoinedas, ENT_QUOTES, 'UTF-8' );
$finalcurrentdesignation = htmlspecialchars( $currentdesignation, ENT_QUOTES, 'UTF-8' );
$finalannualrenumeration = htmlspecialchars( $annualrenumeration, ENT_QUOTES, 'UTF-8' );
$finalrolesandresponsibility = htmlspecialchars( $rolesandresponsibility, ENT_QUOTES, 'UTF-8' );
$finalextraworkexcount = htmlspecialchars( $extraworkexcount, ENT_QUOTES, 'UTF-8' );
$finaltotalworkex = htmlspecialchars( $totalworkex, ENT_QUOTES, 'UTF-8' );



if ( $mysql == true ) {
	$sqlworkex = "INSERT INTO `vedica_admission`.`users_work_experience_details` (`application_id`, `work_experience`, `name_of_organization`, `organization_type`, `organization_type_other`, `industry_type`, `started_work_date`, `completed_work_date`, `joined_as`, `current_designation`, `annual_renumeration`, `roles_and_responsibilty`, `extra_workex_count`, `total_work_experience`) VALUES (
				'".mysql_real_escape_string( $finalapplicationid )."',
				'".mysql_real_escape_string( $finalisworkex )."',
				'".mysql_real_escape_string( $finalorganizationname )."',
				'".mysql_real_escape_string( $finalorganizationtype )."',
				'".mysql_real_escape_string( $finalorganizationtypeother )."',
				'".mysql_real_escape_string( $finalindustrytype )."',
				'".mysql_real_escape_string( $finalworkstarted )."',
				'".mysql_real_escape_string( $finalworkcompleted )."',
				'".mysql_real_escape_string( $finalcomapnyjoinedas )."',
				'".mysql_real_escape_string( $finalcurrentdesignation )."',
				'".mysql_real_escape_string( $finalannualrenumeration )."',
				'".mysql_real_escape_string( $finalrolesandresponsibility )."',
				'".mysql_real_escape_string( $finalextraworkexcount )."',
				'".mysql_real_escape_string( $finaltotalworkex )."'
			)
			ON DUPLICATE KEY
			UPDATE
			work_experience = VALUES(work_experience),
			name_of_organization = VALUES(name_of_organization),
			organization_type = VALUES(organization_type),
			organization_type_other = VALUES(organization_type_other),
			industry_type = VALUES(industry_type),
			started_work_date = VALUES(started_work_date),
			completed_work_date = VALUES(completed_work_date),
			joined_as = VALUES(joined_as),
			current_designation = VALUES(current_designation),
			annual_renumeration = VALUES(annual_renumeration),
			roles_and_responsibilty = VALUES(roles_and_responsibilty),
			extra_workex_count = VALUES(extra_workex_count),
			total_work_experience = VALUES(total_work_experience)
			;";

	$insertworkex = mysql_query( $sqlworkex );

	if ( ! $insertworkex ) {
		die( 'Could not enter data: ' . mysql_error() );
	}


	$sqlworkexextradelete = "DELETE FROM added_work_experience_details WHERE application_id ='" . $finalapplicationid ."'";

	$deleteworkexextra = mysql_query( $sqlworkexextradelete );
	if ( ! $deleteworkexextra ) {
		die( 'Could not enter data: ' . mysql_error() );
	}


	for ( $x=1; $x<=$finalextraworkexcount; $x++ ) {


		$iisworkex = "isworkex{$x}";
		$iorganizationname = "organizationname{$x}";
		$iorganizationtype = "organizationtype{$x}";
		$iorganizationtypeother = "organizationtypeother{$x}";
		$iindustrytype = "industrytype{$x}";
		$iworkstarted = "workstarted{$x}";
		$iworkcompleted = "workcompleted{$x}";
		$icomapnyjoinedas = "comapnyjoinedas{$x}";
		$icurrentdesignation = "currentdesignation{$x}";
		$iannualrenumeration = "annualrenumeration{$x}";
		$irolesandresponsibility = "rolesandresponsibility{$x}";
		$iextraworkexcount = "extraworkexcount{$x}";
		$itotalworkex = "totalworkex{$x}";


		${'isworkex' . $x} = strip_tags( trim( $_POST[$iisworkex] ) );
		${'organizationname' . $x} = strip_tags( trim( $_POST[$iorganizationname] ) );
		${'organizationtype' . $x} = strip_tags( trim( $_POST[$iorganizationtype] ) );
		${'organizationtypeother' . $x} = strip_tags( trim( $_POST[$iorganizationtypeother] ) );
		${'industrytype' . $x} = strip_tags( trim( $_POST[$iindustrytype] ) );
		${'workstarted' . $x} = strip_tags( trim( $_POST[$iworkstarted] ) );
		${'workcompleted' . $x} = strip_tags( trim( $_POST[$iworkcompleted] ) );
		${'comapnyjoinedas' . $x} = strip_tags( trim( $_POST[$icomapnyjoinedas] ) );
		${'currentdesignation' . $x} = strip_tags( trim( $_POST[$icurrentdesignation] ) );
		${'annualrenumeration' . $x} = strip_tags( trim( $_POST[$iannualrenumeration] ) );
		${'rolesandresponsibility' . $x} = strip_tags( trim( $_POST[$irolesandresponsibility] ) );
		${'extraworkexcount' . $x} = strip_tags( trim( $_POST[$iextraworkexcount] ) );
		${'totalworkex' . $x} = strip_tags( trim( $_POST[$itotalworkex] ) );

		${'finalisworkex' . $x} = htmlspecialchars( ${'isworkex' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalorganizationname' . $x} = htmlspecialchars( ${'organizationname' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalorganizationtype' . $x} = htmlspecialchars( ${'organizationtype' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalorganizationtypeother' . $x} = htmlspecialchars( ${'organizationtypeother' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalindustrytype' . $x} = htmlspecialchars( ${'industrytype' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalworkstarted' . $x} = htmlspecialchars( ${'workstarted' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalworkcompleted' . $x} = htmlspecialchars( ${'workcompleted' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalcomapnyjoinedas' . $x} = htmlspecialchars( ${'comapnyjoinedas' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalcurrentdesignation' . $x} = htmlspecialchars( ${'currentdesignation' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalannualrenumeration' . $x} = htmlspecialchars( ${'annualrenumeration' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalrolesandresponsibility' . $x} = htmlspecialchars( ${'rolesandresponsibility' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finalextraworkexcount' . $x} = htmlspecialchars( ${'extraworkexcount' . $x}, ENT_QUOTES, 'UTF-8' );
		${'finaltotalworkex' . $x} = htmlspecialchars( ${'totalworkex' . $x}, ENT_QUOTES, 'UTF-8' );


		$sqlworkexextra = "INSERT INTO `vedica_admission`.`added_work_experience_details` (`application_id`, `work_experience`, `name_of_organization`, `organization_type`, `organization_type_other`, `industry_type`, `started_work_date`, `completed_work_date`, `joined_as`, `current_designation`, `annual_renumeration`, `roles_and_responsibilty`) VALUES (
				'".mysql_real_escape_string( $finalapplicationid )."',
				'".mysql_real_escape_string( ${'finalisworkex' . $x} )."',
				'".mysql_real_escape_string( ${'finalorganizationname' . $x} )."',
				'".mysql_real_escape_string( ${'finalorganizationtype' . $x} )."',
				'".mysql_real_escape_string( ${'finalorganizationtypeother' . $x} )."',
				'".mysql_real_escape_string( ${'finalindustrytype' . $x} )."',
				'".mysql_real_escape_string( ${'finalworkstarted' . $x} )."',
				'".mysql_real_escape_string( ${'finalworkcompleted' . $x} )."',
				'".mysql_real_escape_string( ${'finalcomapnyjoinedas' . $x} )."',
				'".mysql_real_escape_string( ${'finalcurrentdesignation' . $x} )."',
				'".mysql_real_escape_string( ${'finalannualrenumeration' . $x} )."',
				'".mysql_real_escape_string( ${'finalrolesandresponsibility' . $x} )."'
				);";


		$insertworkexextra = mysql_query( $sqlworkexextra );
		if ( ! $insertworkexextra ) {
			die( 'Could not enter data: ' . mysql_error() );
		}
		echo 'success';

	}

} else {

}

?>
