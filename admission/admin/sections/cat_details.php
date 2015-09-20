		<div class="modal modal-cat" style="display: none;">
			<div class="container">
				<div class="form-bar">
					<div class="top-bar bar-orange"></div>
				</div>
				<div class="form">
					<div class="header">
						<div class="grid-container">
							<div class="column-eleven">
								<h4>CAT Details</h4>
							</div>
							<div class="column-one">
								<div class="close"><i class="icon-close"></i></div>
							</div>
						</div>
					</div>
					<div class="section">
						<form method="post" action="<?php echo $baseurl;?>php/processor-cat.php?lang=<?php echo $_GET['lang'];?>" id="window_cat">					   
							<fieldset>
								<div class="grid-container">
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="catapplicationid" class="group label-input">
												<input type="text" id="catapplicationid" name="catapplicationid" class="input-right" placeholder="CAT Application Id">
											</label>
										</div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="catexamdate" class="group label-input">
												<i class="icon-calendar"></i>
                                    			<input type="text" id="catexamdate" name="catexamdate" class="input-right" placeholder="Exam Date">
											</label>
										</div>
									</div>
									<div class="column-six">
										<button type="button" id="cat-save-button" class="button button-large button-blue space">Save</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>	
				</div>
			</div>
		</div>