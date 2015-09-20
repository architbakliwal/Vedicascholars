<?php
$some_name = session_name( "JBIMSAdmission" );
session_start();

include '../php/csrf_protection/csrf-token.php';
include '../php/csrf_protection/csrf-class.php';

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

$_SESSION['start'] = time();
$_SESSION['expire'] = $_SESSION['start'] + ( 60*60 );

if ( strlen( trim( $_SESSION['userName'] ) ) == 0 ) {
	session_destroy();
	redirect( $baseurl.'login.php?lang='.$_GET['lang'].'' );
	die();
}

$finalpaymentstatus = '';

if ( $mysql == true ) {
	$applicationid = $_SESSION['userName'];
	$applicantName = '';
	$applicationfees = 0;
	$applicantemailid = '';
	$fname = '';
	$lname = '';
	$sqlpayment = "SELECT dd_reference_number, payment_amount, payment_status FROM  `users_payment_details` WHERE application_id ='" . $applicationid ."'";

	$selectpayment = mysql_query( $sqlpayment );

	if ( ! $selectpayment ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	while ( $row = mysql_fetch_array( $selectpayment, MYSQL_ASSOC ) ) {
		$finalpaymentid = $row['dd_reference_number'];
		$finalpaymentamount = $row['payment_amount'];
		$finalpaymentstatus = $row['payment_status'];
	}

	$sqlcontact = "SELECT * FROM  `admission_users` WHERE application_id ='" . $applicationid ."'";

	$selectcontact = mysql_query( $sqlcontact );

	if ( ! $selectcontact ) {
		die( 'Could not enter data: ' . mysql_error() );
	}

	while ( $row = mysql_fetch_array( $selectcontact, MYSQL_ASSOC ) ) {
		$applicantemailid = $row['email_id'];
		$fname = $row['f_name'];
		$lname = $row['l_name'];
	}

} else {
	redirect( $baseurl );
}


if ( $finalpaymentstatus == "Complete" ) {
	$responsemsg = '<font color="green">CONGRATULATIONS! Your payment was successful. Please check your mail for transaction id.</font>';
} else {
	$responsemsg = '<font color="red">Your payment was not successful, please try again or contact support. Please check your mail for transaction id.</font>';
}

include '../php/phpmailer/PHPMailerAutoload.php';
include '../php/messages/autopaymentemail.php';

$automail = new PHPMailer();
$automail->IsSMTP();
$automail->SMTPAuth = true;
$automail->SMTPSecure = $protocol;
$automail->Host = $host;
$automail->Port = $port;
$automail->Username = $smtpusername;
$automail->Password = $smtppassword;
$automail->From = $youremail;
$automail->FromName = $yourname;
$automail->isHTML( true );
$automail->CharSet = "UTF-8";
$automail->Encoding = "base64";
$automail->Timeout = 200;
$automail->SMTPDebug = 0; // 0 = off (for production use) // 1 = client messages // 2 = client and server messages
$automail->ContentType = "text/html";
$automail->AddAddress( $applicantemailid );
$automail->Subject = "JBIMS Application Payment";
$automail->Body = $autopaymentemail;
$automail->AltBody = "To view this message, please use an HTML compatible email";

if ( $automail->Send() ) {
} else {
}


?>
<!doctype html>
<html>
    <head>

        <?php include '../header.php'; ?>

    </head>

    <body>

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
                    <div class="column-twelve" style="text-align: left;">
						<?php echo $lang['application_id'];?><?php echo $_SESSION['userName'];?>
					</div>

				</div>
			</div>
			<div class="section">
				<div class="grid-container">
					<div class="form">
						<div class="section inner_section">
							<form method="post" action="<?php echo $baseurl;?>php/processor-submit.php?lang=<?php echo $_GET['lang'];?>" id="section_submit">
								<fieldset>
									<div class="grid-container">
										<div class="column-twelve">
										    <div class="box">
												<div class="box-section center">
													<div class="column-twelve" style="margin:30px;">
														<h3 style="text-align: center;"><?php echo $responsemsg;?></h3>
													</div>
													<?php if ( $finalpaymentstatus == "Complete" ) { ?>
													<div class="column-twelve" style="margin:30px;">
														<div class="input-group-right irequire">
															<div class="radio-group">
																<label for="iagree" class="group space-right">
																	<input type="radio" name="iagree" class="" value="Yes" id="Yes">
																	<span class="label space-right">I hereby declare that the information given in this application form is complete, true and correct to best of my knowledge. If admitted, I agree to comply with the rules of the institute.</span>
																</label>
															</div>
														</div>
													</div>
													<div class="column-twelve" style="margin:30px;">
														<div class="column-two">
															<button type="button" id="submit-final" class="button button-large button-orange">Submit</button>
														</div>
														<!-- <div class="column-two" style="display:none;">
															<button type="button" id="preview-final" class="button button-large button-blue">Preview</button>
														</div> -->
													</div>
													<div class="column-twelve" style="margin:30px;">
														<p style="text-align: center;">If short-listed you will be informed via an email to your registered user id. For all MH-CET candidates: You will be contacted to update your registration details in January. By submitting this application you are agreeing to the terms and conditions of the organisation. You are also accepting that you are aware of the policies and requirements of the institution.</p>
													</div>
													<div class="column-twelve">
														<div class="terms">
															<p><a href="<?php echo $baseurl;?>terms.php" target="_blank" style="padding:0px;">Terms & Conditions</a></p>
														</div>
													</div>
													<?php } ?>
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
