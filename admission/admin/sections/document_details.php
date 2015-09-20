	

	<div class="form">
		<div class="header inner_header">
			<div class="grid-container">
				<div class="column-twelve">
					<h4 style="margin-bottom:15px;"><?php echo $lang['section_docs'];?></h4>
				</div>							
			</div>
		</div>
		<div class="section inner_section">
			<form method="post" action="<?php echo $baseurl;?>php/processor-docs.php?lang=<?php echo $_GET['lang'];?>" id="section_docs">
				<fieldset>
					<div class="grid-container">
						<div class="column-twelve">
							<div class="input-group">
								<?php echo CSRF::make('section_docs-form')->protect();?>                                      
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box">
							    <div class="box-header" style="text-align:left">
								    <h3>Document Uploads</h3>
								</div>
								<div class="box-section center">
									<div class="column-two">
										<p title="Digital or scanned passport size photograph.<br>Dimension: 2 by 2 inches. Resolution: Min 600 x 600 pixels, Max 1200 x 1200 pixels. File Formats Supported: GIF, JPEG, JPG & PNG<br>Maximum file size : 400 Kb" id="tooltip-help"><b>Photo</b></p>
									</div>
									<div class="column-ten">
										<?php if($upload == true){ ?>
										<div class="file-group irequire">
											<label for="passportphoto" class="group label-file">
												<span class="button-upload blue">Choose</span>								
												<input type="file" id="passportphoto" name="passportphoto" class="file" onchange="document.getElementById('passportphotofake1').value = this.value.replace(/C:\\fakepath\\/i, '');" title="Digital or scanned passport size photograph.<br>Dimension: 2 by 2 inches. Resolution: Min 600 x 600 pixels, Max 1200 x 1200 pixels. File Formats Supported: GIF, JPEG, JPG & PNG<br>Maximum file size : 400 Kb" id="tooltip-help">
												<input type="text" id="passportphotofake1" name="passportphotofake1" class="input" placeholder="No file selected">
											</label>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box">
							    <div class="box-header" style="text-align:left">
								    <h3>Additional information</h3>
								</div>
								<div class="box-section center">
									<div class="column-four">
										<div class="select-group">
											<label for="hearaboutjbims" class="group custom-select">
												<select id="hearaboutjbims" name="hearaboutjbims" class="select">
												    <option value="">How did you hear of JBIMS?</option>
													<option value="Newspaper articles">Newspaper articles</option>
													<option value="Website">Website</option>
													<option value="Open house events">Open house events</option>
													<option value="legacy">It's a legacy!</option>
													<option value="alum">Through a JBIMS alum</option>
												</select>
											</label>
								        </div>
								    </div>
								    <div class="column-four">
								        <div class="select-group">
											<label for="appliedbefore" class="group custom-select">
												<select id="appliedbefore" name="appliedbefore" class="select">
												    <option value="">Have you applied to JBIMS before?</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</label>
								        </div>
								    </div>
								    <div class="column-four">
								    	<div class="select-group">
											<label for="appliedyear" class="group custom-select">
                                    			<?php
													$current_year = date("Y");
													$range = range($current_year, 1950);
													echo '<select id="appliedyear" name="appliedyear" class="select">';
													echo '<option value="">If yes, when?</option>';
													 
													//Now we use a foreach loop and build the option tags
													foreach($range as $r)
													{
													echo '<option value="'.$r.'">'.$r.'</option>';
													}
													 
													//Echo the closing select tag
													echo '</select>';
												?>
											</label>
										</div>
								    </div>
								    <div class="column-eight">
										<div class="textarea-group">
										    <label for="supportinfo" class="group label-textarea">
				                                <textarea rows="5" id="supportinfo" name="supportinfo" class="textarea no-resisable" placeholder="Would you like to tell us something apart from the information given to support your candidature? (Max 150 words)"></textarea>
											</label>
									    </div>
									</div>
									<div class="column-four hiddencontainer">
										<div class="input-group-right">
											<label for="hiddencontainer" class="group label-textarea">
												<textarea rows="5" id="hiddencontainer" name="hiddencontainer" class="textarea no-resisable" placeholder=""></textarea>
											</label>
									    </div>
									</div>
								</div>
							</div>
						</div>
						<div class="column-two">
							<button type="button" id="back-button-doc" class="button button-large button-blue">Back</button>
						</div>
						<div class="column-two">
							<button type="button" id="save-button-doc" class="button button-large button-green">Upload & Save</button>
						</div>
						<div class="column-two">
							<button type="button" id="continue-button-doc" class="button button-large button-orange">Submit</button>
						</div>						
					</div>
				</fieldset>
			</form>
		</div>	
	</div>