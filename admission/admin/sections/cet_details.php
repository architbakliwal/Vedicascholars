		<div class="modal modal-cet" style="display: none;">
			<div class="container">
				<div class="form-bar">
					<div class="top-bar bar-orange"></div>
				</div>
				<div class="form">
					<div class="header">
						<div class="grid-container">
							<div class="column-eleven">
								<h4>MH-CET Details</h4>
							</div>
							<div class="column-one">
								<div class="close"><i class="icon-close"></i></div>
							</div>
						</div>
					</div>
					<div class="section">
						<form method="post" action="<?php echo $baseurl;?>php/processor-cet.php?lang=<?php echo $_GET['lang'];?>" id="window_cet">					   
							<fieldset>
								<div class="grid-container">
									<?php if($inside_mh_cet_open == 'Y'){ ?>

									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="cetrollnumber" class="group label-input">
												<input type="text" id="cetrollnumber" name="cetrollnumber" class="input-right" placeholder="MH-CET Roll Number">
											</label>
										</div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="cetmarks" class="group label-input">
												<input type="text" id="cetmarks" name="cetmarks" class="input-right" placeholder="Overall marks scored">
											</label>
										</div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="cetpercentile" class="group label-input">
												<input type="text" id="cetpercentile" name="cetpercentile" class="input-right" placeholder="Overall Percentile">
											</label>
										</div>
									</div>
									<div class="column-six hiddencontainer">
										<div class="input-group-right">
											<label for="hiddencontainer" class="group label-input">
				                                <input type="hidden" id="isinsidecetopen" name="isinsidecetopen" class="input-right" value="true" placeholder="" title="">
											</label>
									    </div>
									</div>
									<div class="column-six">
										<button type="button" id="cet-save-button-inside" class="button button-large button-blue space">Save</button>
									</div>

									<?php }else { ?>
									<h3>If opted,you will be contacted on your registered email id for MH-CET registration details in January.</h3>
									<?php } ?>
								</div>
							</fieldset>
						</form>
					</div>	
				</div>
			</div>
		</div>