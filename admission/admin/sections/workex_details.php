	

	<div class="form">
		<div class="header inner_header">
			<div class="grid-container">
				<div class="column-twelve">
					<h4 style="margin-bottom:15px;"><?php echo $lang['section_workex'];?></h4>
				</div>							
			</div>
		</div>
		<div class="section inner_section" id="workex-clone">
			<form method="post" action="<?php echo $baseurl;?>php/processor-workex.php?lang=<?php echo $_GET['lang'];?>" id="section_workex">
				<fieldset>
					<div class="grid-container">
						<div class="column-twelve">
							<div class="input-group">
								<?php echo CSRF::make('section_workex-form')->protect();?>                                      
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box">
								<div class="box-header" style="text-align:left; border-bottom:0; background-color: white; margin-bottom: 25px;">
								    <div class="column-four">
										<h3></font>Work Experience</h3>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<div class="radio-group" style="margin-left: 20px;">
												<label for="workexyes-radio" class="group space-right">
													<input type="radio" name="isworkex" class="radio" value="Yes" id="workexyes-radio">
													<span class="label space-right">Yes</span>
												</label>
												<label for="workexno-radio" class="group space-right">
													<input type="radio" name="isworkex" class="radio" value="No" id="workexno-radio">
													<span class="label space-right">No</span>
												</label>
											</div>
									    </div>
									</div>
								</div>
								<div id="workex-super-div" style="display:none;">
									<div class="box-header" style="text-align:left">
									    <h3>Latest Work Experience</h3>
									</div>
									<div class="box-section center toclone">
										<div class="column-four">
											<div class="input-group-right irequire">
											    <label for="organizationname" class="group label-input">
					                                <input type="text" id="organizationname" name="organizationname" class="input-right" placeholder="Name of the organisation">
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="select-group irequire">
												<label for="organizationtype" class="group custom-select">
													<select id="organizationtype" name="organizationtype" class="select">
													    <option value="">Select Organisation Type</option>
														<option value="06">Autonomous</option>
														<option value="01">Government (Central / State / Local bodies)</option>
														<option value="05">NGO</option>
														<option value="03">Private Sector</option>
														<option value="02">Public Sector</option>
														<option value="04">Self Employed</option>
														<option value="07">Any Other</option>
													</select>
												</label>
									        </div>
										</div>
										<div class="column-four">
											<div class="input-group-right" id="organizationtypeother-div">
												<label for="organizationtypeother" class="group label-input">
					                                <input type="text" id="organizationtypeother" name="organizationtypeother" class="input-right" placeholder="If other, please specify">
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="select-group irequire">
											    <label for="industrytype" class="group custom-select">
					                                <select id="industrytype" name="industrytype" class="select">
														<option value="">Select Industry Type</option>
														<option value="01">Agriculture, Agriculture</option>
														<option value="02">Agriculture, Climate Change</option>
														<option value="03">Agriculture, Food Processing</option>
														<option value="04">Agriculture, Water</option>
														<option value="66">Industrial Competitiveness, Climate Change</option>
														<option value="67">Industrial Competitiveness, Competitiveness</option>
														<option value="68">Industrial Competitiveness, Design</option>
														<option value="69">Industrial Competitiveness, Human Resource Development</option>
														<option value="70">Industrial Competitiveness, Knowledge Management</option>
														<option value="71">Industrial Competitiveness, Logistics</option>
														<option value="72">Industrial Competitiveness, Micro, Medium &amp; Small Scale Industry</option>
														<option value="73">Industrial Competitiveness, Safety and Security</option>
														<option value="74">Industrial Competitiveness, Skills Development</option>
														<option value="75">Industrial Competitiveness, Technology</option>
														<option value="05">Infrastructure, Bio Fuels</option>
														<option value="06">Infrastructure, Civil Aviation</option>
														<option value="07">Infrastructure, Climate Change</option>
														<option value="08">Infrastructure, Energy</option>
														<option value="09">Infrastructure, Housing</option>
														<option value="10">Infrastructure, Hydrocarbons</option>
														<option value="11">Infrastructure, Infrastructure</option>
														<option value="12">Infrastructure, Oil and Gas</option>
														<option value="13">Infrastructure, Petrochemicals</option>
														<option value="14">Infrastructure, Petroleum</option>
														<option value="15">Infrastructure, Power</option>
														<option value="16">Infrastructure, Real Estate</option>
														<option value="17">Infrastructure, Renewable Energy</option>
														<option value="18">Infrastructure, Surface Transport</option>
														<option value="19">Infrastructure, Urban Development</option>
														<option value="79">International Agency(such as UNDP, Ford Foundation etc.)</option>
														<option value="20">Manufacturing, Aerospace</option>
														<option value="21">Manufacturing, Auto Components</option>
														<option value="22">Manufacturing, Automobiles</option>
														<option value="23">Manufacturing, Capital Goods</option>
														<option value="24">Manufacturing, Chemicals</option>
														<option value="25">Manufacturing, Climate Change</option>
														<option value="26">Manufacturing, Competitiveness</option>
														<option value="27">Manufacturing, Defence</option>
														<option value="28">Manufacturing, Design</option>
														<option value="29">Manufacturing, Energy</option>
														<option value="30">Manufacturing, Engineering</option>
														<option value="31">Manufacturing, Family Business</option>
														<option value="32">Manufacturing, Fast Moving Consumer Goods (FMCG)</option>
														<option value="33">Manufacturing, Gems and Jewellery </option>
														<option value="34">Manufacturing, Human Resource Development</option>
														<option value="35">Manufacturing, ICTE Manufacturing</option>
														<option value="36">Manufacturing, Industrial Relations</option>
														<option value="80">Manufacturing, Information Technology Products</option>
														<option value="37">Manufacturing, Innovation</option>
														<option value="38">Manufacturing, Intellectual Property Rights (IPR)</option>
														<option value="39">Manufacturing, Leather and Leather Products</option>
														<option value="40">Manufacturing, Manufacturing</option>
														<option value="41">Manufacturing, Micro, Medium &amp; Small Scale Industry</option>
														<option value="42">Manufacturing, Mining</option>
														<option value="43">Manufacturing, Safety and Security</option>
														<option value="44">Manufacturing, Steel &amp; Non-Ferrous Metals</option>
														<option value="45">Manufacturing, Technology</option>
														<option value="46">Manufacturing, Textiles &amp; Apparel</option>
														<option value="77">Others</option>
														<option value="47">Services, Biotechnology</option>
														<option value="48">Services, Business Process Outsourcing</option>
														<option value="49">Services, Climate Change</option>
														<option value="50">Services, Competitiveness</option>
														<option value="51">Services, Design</option>
														<option value="52">Services, Education</option>
														<option value="53">Services, Family Business</option>
														<option value="76">Services, Finance &amp; Banking</option>
														<option value="54">Services, Healthcare</option>
														<option value="55">Services, Human Resource Development</option>
														<option value="56">Services, Industrial Relations</option>
														<option value="57">Services, Information &amp; Communication Technology</option>
														<option value="78">Services, Insurance</option>
														<option value="58">Services, Intellectual Property Rights (IPR)</option>
														<option value="59">Services, Knowledge Management</option>
														<option value="60">Services, Media &amp; Entertainment</option>
														<option value="61">Services, Micro, Medium &amp; Small Scale Industry</option>
														<option value="62">Services, Retail</option>
														<option value="63">Services, Technology</option>
														<option value="64">Services, Telecommunications</option>
														<option value="65">Services, Tourism &amp; Hospitality</option>
													</select>
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="input-group-right irequire">
											    <label for="workstarted" class="group label-input">
				                                    <input type="text" id="workstarted" name="workstarted" class="input-right workstarted" placeholder="Started work in (YYYY-MM-DD">
				                                </label>
										    </div>
										</div>
										<div class="column-four">
											<div class="input-group-right irequire">
											    <label for="workcompleted" class="group label-input">
				                                    <input type="text" id="workcompleted" name="workcompleted" class="input-right workcompleted" placeholder="Completed work in (YYYY-MM-DD)">
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="input-group-right irequire">
											    <label for="comapnyjoinedas" class="group label-input">
					                                <input type="text" id="comapnyjoinedas" name="comapnyjoinedas" class="input-right" placeholder="Joined as">
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="input-group-right irequire">
											    <label for="currentdesignation" class="group label-input">
					                                <input type="text" id="currentdesignation" name="currentdesignation" class="input-right" placeholder="Current designation">
												</label>
										    </div>
										</div>
										<div class="column-four">
											<div class="input-group-right">
											    <label for="annualrenumeration" class="group label-input">
					                                <input type="text" id="annualrenumeration" name="annualrenumeration" class="input-right" placeholder="Annual Remuneration in INR (Numeric)">
												</label>
										    </div>
										</div>
										<div class="column-eight">
											<div class="textarea-group irequire">
											    <label for="rolesandresponsibility" class="group label-textarea">
					                                <textarea rows="5" id="rolesandresponsibility" name="rolesandresponsibility" class="textarea no-resisable" placeholder="Please give a brief description of your role and responsibilities in the organisation (Max 200 words)"></textarea>
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
										<div class="column-four">
											<button type="button" id="add-extra-workex" class="button button-large button-orange clone">Add another work experience</button>
										</div>
										<div class="column-four">
	                                        <button type="button" id="add-extra-workex-delete" class="button button-large button-red delete">Remove</button>
	                                    </div>
										<div class="column-four hiddencontainer">
											<div class="input-group-right">
												<label for="hiddencontainer" class="group label-input">
					                                <input type="hidden" id="extraworkexcount" name="extraworkexcount" class="input-right" placeholder="" title="">
												</label>
										    </div>
										</div>
									</div>
									<div class="column-twelve" style="margin:20px 0px;">
										<div class="column-four" style="padding-top: 10px;">
											<h3>Total work experience</h3>
										</div>
										<div class="column-four">
											<div class="input-group-right irequire">
												<label for="totalworkex" class="group label-input">
					                                <input type="text" id="totalworkex" name="totalworkex" class="input-right" placeholder="Total work experience in months">
												</label>
											</div>
										</div>
										<div class="column-four">
											<div class="input-group-right">
												<p>If currently working, please calculate as of 31st January, 2015.</p>
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="column-two">
							<button type="button" id="back-button-workex" class="button button-large button-blue">Back</button>
						</div>
						<div class="column-two">
							<button type="button" id="save-button-workex" class="button button-large button-blue">Save</button>
						</div>
						<div class="column-two">
							<button type="button" id="continue-button-workex" class="button button-large button-green">Save and Continue</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>	
	</div>