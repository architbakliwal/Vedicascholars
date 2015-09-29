<?php

include dirname( __FILE__ ).'/php/csrf_protection/csrf-token.php';
include dirname( __FILE__ ).'/php/csrf_protection/csrf-class.php';

if ( !isset( $_SESSION ) ) {
	$some_name = session_name( "VedicaAdmission" );
	session_start();
}

include dirname( __FILE__ ).'/php/config/config.php';
include dirname( __FILE__ ).'/php/config/functions.php';

$language = array( 'en' => 'en', 'pt' => 'pt' );

if ( isset( $_GET['lang'] ) and array_key_exists( $_GET['lang'], $language ) ) {
	include dirname( __FILE__ ).'/php/language/'.$language[$_GET['lang']].'.php';
} else {
	include dirname( __FILE__ ).'/php/language/en.php';
}

?>
<!doctype html>
<html>
    <head>

        <?php include dirname( __FILE__ ).'/header.php'; ?>

    </head>

    <body>

		<div class="wrapper">
		    <div class="form-bar">
				<div class="top-bar bar-orange"></div>
			</div>
	        <div class="header dashboard_header">
			    <div class="grid-container">
			    	<div class="column-twelve">
						<img src="images/logo.JPG"/>
					</div>
			    	<div class="column-twelve">
						<h4><?php echo $lang['dashboard_title'];?></h4>
					</div>
				</div>
			</div>
			<div class="section">
				<div class="grid-container">
					<div class="form">
						<div class="section inner_section">
							<form method="post" id="ddreference" action="<?php echo $baseurl;?>php/processor-dd.php?lang=<?php echo $_GET['lang'];?>">
								<fieldset>
									<div class="grid-container">
										<div class="column-twelve">
										    <div class="box">
											    <div class="box-header" style="text-align: left;">
												    <h3>DD References</h3>
												</div>
												<div class="box-section center" style="text-align: left;">
													<div class="column-twelve" style="margin: 10px 0px;">
														<div class="file-group irequire">
															<label for="ddsheet" class="group label-file">
																<span class="button-upload blue">Choose</span>
																<input type="file" id="ddsheet" name="ddsheet" class="file" onchange="document.getElementById('ddsheet1').value = this.value;" accept="application/vnd.ms-excel">
																<input type="text" id="ddsheet1" class="input" placeholder="No file selected">
															</label>
														</div>
													</div>
													<div class="column-two">
														<button type="button" id="submit-button-dd" class="button button-large button-green">Submit</button>
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

    </body>
</html>
