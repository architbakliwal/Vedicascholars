<?php

include '../php/csrf_protection/csrf-token.php';
include '../php/csrf_protection/csrf-class.php';

if ( !isset( $_SESSION ) ) {
	$some_name = session_name( "VedicaAdmission" );
	session_start();
}

include '../php/config/config.php';
include '../php/config/functions.php';

$language = array( 'en' => 'en', 'pt' => 'pt' );

if ( isset( $_GET['lang'] ) and array_key_exists( $_GET['lang'], $language ) ) {
	include '../php/language/'.$language[$_GET['lang']].'.php';
} else {
	include '../php/language/en.php';
}

if ( !$_SESSION['userLogin'] && !$_SESSION['userName'] && !isset( $_SESSION['userName'] ) ) {

	redirect( $baseurl.'login.php?lang='.$_GET['lang'].'' );

} else {
	$time = time();

	if ( $time > $_SESSION['expire'] ) {
		session_destroy();
		timeout();
		exit( 0 );
	}
}

?>
<!doctype html>
<html>
    <head>

        <?php include '../header.php'; ?>

    </head>

    <body>

    	<?php

$userInfo = mysql_query( "SELECT login_system_registrations_user_id,application_status FROM ".$admission_users." WHERE login_system_registrations_user_id = '".mysql_real_escape_string( $_SESSION['userLogin'] )."'" );
$userQuery = mysql_num_rows( $userInfo );

$user = mysql_fetch_array( $userInfo );

if ( $user["application_status"] != 'Completed' ) {
	redirect( $baseurl.'admin/dashboard.php?lang='.$_GET['lang'].'' );
	die();
}

?>

	    <?php if ( $_SESSION['userLogin'] && $_SESSION['userName'] ) { ?>
		<div class="wrapper">
		    <div class="form-bar">
				<div class="top-bar bar-orange"></div>
			</div>
	        <div class="header dashboard_header">
			    <div class="grid-container">
			    	<div class="column-twelve">
						<h4><?php echo $lang['dashboard_title'];?></h4>
					</div>
					<div class="column-twelve" style="color: red; font-weight: bold;">
						<p><marquee scrollamount="6">Online Registrations are closed for MMS/MSc 2015-2017 batch.</marquee></p>
					</div>
                    <div class="column-eleven" style="text-align: left;">
						<?php echo $lang['application_id'];?><?php echo $_SESSION['userName'];?>
					</div>
					<div class="column-one">
						<a href="<?php echo $baseurl;?>logout.php?user=<?php echo $user["login_system_registrations_user_id"];?>&lang=<?php echo $_GET['lang'];?>" class="logout"><?php echo $lang['dashboard_form_logout'];?></a>
					</div>
				</div>
			</div>
			<div class="section">
				<div class="grid-container">
					<div class="form">
						<div class="section inner_section" id="academic-clone">
							<form method="post" id="section_done">
								<fieldset>
									<div class="grid-container">
										<div class="column-twelve">
										    <div class="box">
												<div class="box-section center">
													<div class="column-twelve" style="margin:30px;">
														<h3 style="text-align: center;">Congratulations! Your application has been successfully submitted for the batch of 2015-2017 at Jamnalal Bajaj Institute of Management Studies, Mumbai.</h3>
													</div>
													<div class="column-twelve" style="margin:0px; font-size: 20px;font-weight: bold;">
														<a href="<?php echo $baseurl;?>secure/application/document/go/document.php" style="color: blue; text-decoration: underline;">Download Application Form</a>
													</div>
											    </div>
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="grid-container">
					<div class="column-twelve">
						<p><?php echo $lang['dashboard_copyright_info'];?></p>
					</div>
				</div>
            </div>
		</div>

		<?php } else { ?>

		<?php
	redirect( $baseurl.'login.php?lang='.$_GET['lang'].'' );
} ?>

    </body>
</html>
