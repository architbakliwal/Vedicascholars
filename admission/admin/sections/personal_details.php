	

	<div class="form">
		<div class="header inner_header">
			<div class="grid-container">
				<div class="column-twelve">
					<h4 style="margin-bottom:15px;"><?php echo $lang['section_personal'];?></h4>
				</div>							
			</div>
		</div>
		<div class="section inner_section">
			<form method="post" action="<?php echo $baseurl;?>php/processor-personal.php?lang=<?php echo $_GET['lang'];?>" id="section_personal">
				<fieldset>
					<div class="grid-container">
						<div class="column-twelve">
							<div class="input-group">
								<?php echo CSRF::make('section_personal-form')->protect();?>                                      
							</div>
						</div>
						<div class="column-four">
							<div class="input-group-right irequire">
							    <label for="firstname" class="group label-input">
								    <i class="icon-user-3"></i>
	                                <input type="text" id="firstname" name="firstname" maxlength="30" class="input-right" placeholder="<?php echo $lang['form_register_placeholder_firstname'];?>">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right">
								<label for="middlename" class="group label-input">
								    <i class="icon-user-3"></i>
	                                <input type="text" id="middlename" name="middlename" maxlength="30" class="input-right" placeholder="<?php echo $lang['form_register_placeholder_middlename'];?>">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right irequire">
								<label for="lastname" class="group label-input">
								    <i class="icon-user-3"></i>
	                                <input type="text" id="lastname" name="lastname" maxlength="30" class="input-right" placeholder="<?php echo $lang['form_register_placeholder_lastname'];?>">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right irequire">
							    <label for="dob" class="group label-input">
								    <i class="icon-calendar"></i>
                                    <input type="text" id="dob" name="dob" class="input-right" placeholder="Date of Birth">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="select-group irequire">
								<label for="gender" class="group custom-select">
									<select id="gender" name="gender" class="select">
									    <option value="">Gender</option>
										<option value="M">Male</option>
										<option value="F">Female</option>
										<option value="O">Others</option>
									</select>
								</label>
					        </div>
						</div>
						<div class="column-four">
							<div class="input-group-right">
								<label for="panssn" class="group label-input">
	                                <input type="text" id="panssn" name="panssn" maxlength="10" class="input-right" placeholder="PAN / SSN">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right">
								<label for="passportnumber" class="group label-input">
									<i class="icon-profile"></i>
	                                <input type="text" id="passportnumber" name="passportnumber" class="input-right" placeholder="Passport Number">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right">
								<label for="passportissued" class="group label-input">
	                                <input type="text" id="passportissued" name="passportissued" class="input-right" placeholder="Passport Issued By">
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="input-group-right">
							    <label for="passportexipry" class="group label-input">
								    <i class="icon-calendar"></i>
                                    <input type="text" id="passportexipry" name="passportexipry" class="input-right" placeholder="Exipry Date of Passport">										
								</label>
						    </div>
						</div>
						<div class="column-four">
							<div class="select-group irequire">
								<label for="differentailyabled" class="group custom-select">
									<select id="differentailyabled" name="differentailyabled" class="select">
									    <option value="">Differently abled</option>
										<option value="Y">Yes</option>
										<option value="N">No</option>
									</select>
								</label>
					        </div>
						</div>
						<div class="column-four">
							<div class="select-group irequire">
								<label for="category" class="group custom-select">
									<select id="category" name="category" class="select">
									    <option value="">Category</option>
										<option value="General">General</option>
										<option value="OBC">OBC</option>
										<option value="SC">SC</option>
										<option value="ST">ST</option>
										<option value="NT">NT</option>
										<option value="DT">VJ / DT / NT-A</option>
										<option value="NT-B">NT-B</option>
										<option value="NT-C">NT-C</option>
										<option value="NT-D">NT-D</option>
										<option value="SBC">SBC</option>
										<option value="NRI">NRI</option>
										<option value="PIOs">PIOs</option>
										<option value="Foreign Nationals">Foreign Nationals</option>
										<option value="Other">Other</option>
									</select>
								</label>
					        </div>
						</div>
						<div class="column-four">
							<div class="input-group-right" id="categoryothers-div">
								<label for="categoryothers" class="group label-input disabled">
	                                <input type="text" id="categoryothers" name="categoryothers" class="input-right" disabled="disabled" placeholder="Specify if Others">
								</label>
						    </div>
						</div>
						<div class="column-twelve">
							<div class="select-group irequire">
								<label for="universitygraduated" class="group custom-select">
									<select id="universitygraduated" name="universitygraduated" class="select">
									    <option value="">Select University Graduated from...</option>
										<option value="University of Mumbai">University of Mumbai</option>
										<option value="University of Maharashtra, other than Mumbai">University of Maharashtra, other than Mumbai</option>
										<option value="University other than Maharashtra">University other than Maharashtra</option>
									</select>
								</label>
					        </div>
						</div>
						<div class="column-two">
							<button type="button" id="save-button-personal" class="button button-large button-blue">Save</button>
						</div>
						<div class="column-two">
							<button type="button" id="continue-button-personal" class="button button-large button-green">Save and Continue</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>	
	</div>