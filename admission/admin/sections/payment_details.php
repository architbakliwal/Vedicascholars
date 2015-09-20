

	<div class="form">
		<div class="header inner_header">
			<div class="grid-container">
				<div class="column-twelve">
					<h4 style="margin-bottom:15px;"><?php echo $lang['section_payment'];?></h4>
				</div>							
			</div>
		</div>
		<div class="section inner_section">
			<form method="post" action="<?php echo $baseurl;?>php/processor-payment.php?lang=<?php echo $_GET['lang'];?>" id="section_payment">
				<fieldset>
					<div class="grid-container">
						<div class="column-twelve">
							<div class="input-group">
								<?php echo CSRF::make('section_payment-form')->protect();?>                                      
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box irequire">
							    <div class="box-header" style="text-align: left;">
								    <h3>Fees</h3>
								</div>
								<div class="box-section center" style="text-align: left;">
									<div class="column-twelve">
										<h4 style="color:black;">For General Category, Application fee is Rs 1200 per candidate per course and for Reserved Category from Maharashtra, it is Rs 950 per candidate per course.</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box">
							    <!-- <div class="box-header" style="text-align: left;">
								    <h3>Fees</h3>
								</div> -->
								<div class="box-section center" style="text-align: left;">
									<div class="column-twelve">
										<h3 style="color:black;" id="coursesapplied"></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box irequire">
							    <div class="box-header" style="text-align: left;">
								    <h3>Payment Mode</h3>
								</div>
								<div class="box-section center" style="text-align: left;">
									<div class="column-twelve">
										<div class="input-group-right">
											<div class="radio-group">
												<label for="creditdebitcard-radio" class="group space-right">
													<input type="radio" name="paymentmode" class="radio" value="Credit-Debit card" id="creditdebitcard-radio">
													<span class="label space-right">Credit card/Debit card</span>
												</label>
												<!-- <label for="netbanking-radio" class="group space-right">
													<input type="radio" name="paymentmode" class="radio" value="Net banking" id="netbanking-radio">
													<span class="label space-right">Net banking</span>
												</label> -->
												<label for="ddbanktransfer-radio" class="group space-right">
													<input type="radio" name="paymentmode" class="radio" value="ddbanktransfer" id="ddbanktransfer-radio">
													<span class="label space-right">DD/ Bank transfer</span>
												</label>
											</div>
									    </div>
									</div>
									<div class="column-twelve" style="margin: 10px 0px;">
										<h4 style="color:black;">It is the responsibility of the candidate to understand the eligibility requirements of JBIMS, for a particular course, before deciding to register for the admissions process 2015-2017. If the candidate registers and then determines that he or she is ineligible for admission to the MMS programme, no refund will be made. <b>For eligibility requirements and application fee please visit www.jbims.edu</b></h4>
									</div>
								</div>
							</div>
						</div>
						<div class="column-twelve" id="demanddraft-container" style="display:none;">
						    <div class="box">
							    <div class="box-header" style="text-align: left;">
								    <h3>DD/Bank transfer details</h3>
								</div>
								<div class="box-section center" style="text-align: left;">
									<div class="column-twelve">
										<h3><u>Through demand draft</u></h3>
										</br>
										<table class="testscoretable" style="width:100%; font-weight:bold;">
											<tbody>
											<tr>
												<td>Name on DD</td>
												<td colspan="2">Director,JBIMS</td>
											</tr>
											<tr>
												<td>Address to which the DD should be couriered to</td>
												<td colspan="2">Jamnalal Bajaj Institute of Management Studies, 164 Backbay Reclamation, H.T Parekh Road, Churchgate, Mumbai - 400020</td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="column-twelve" style="margin-top: 50px;margin-bottom: 50px;">
										<h3><u>Through direct bank transfer to our account</u></h3>
										</br>
										<table class="testscoretable" style="width:100%; font-weight:bold;">
											<tbody>
											<tr>
												<td>Account name</td>
												<td colspan="2">Jamnalal Bajaj Institute of Management Studies</td>
											</tr>
											<tr>
												<td>Bank name</td>
												<td colspan="2">Bank of Baroda</td>
											</tr>
											<tr>
												<td>Branch Address</td>
												<td colspan="2">Backbay reclamation Churchgate, Mumbai</td>
											</tr>
											<tr>
												<td>A/C type</td>
												<td colspan="2">Saving</td>
											</tr>
											<tr>
												<td>Account number</td>
												<td colspan="2">03820100000865</td>
											</tr>
											<tr>
												<td>Bank IFSC code</td>
												<td colspan="2">BARB0BACKBA</td>
											</tr>
											<tr>
												<td>Bank MCIR code</td>
												<td colspan="2">400012056</td>
											</tr>
											<tr>
												<td>PAN</td>
												<td colspan="2">AAATU1070A</td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="column-four">
										<div class="select-group irequire">
											<label for="ddpaymentmode" class="group custom-select">
												<select id="ddpaymentmode" name="ddpaymentmode" class="select">
												    <option value="">Select Payment mode</option>
													<option value="Demand Draft">Demand Draft</option>
													<option value="Bankers cheque">Banker's cheque</option>
													<option value="Wire transfer">Wire transfer</option>
												</select>
											</label>
								        </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
										    <label for="referencenumber" class="group label-input">
				                                <input type="text" id="referencenumber" name="referencenumber" class="input-right" placeholder="Reference/DD number">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
										    <label for="paymentemailid" class="group label-input">
			                                    <input type="text" id="paymentemailid" name="paymentemailid" class="input-right" placeholder="Registered email id">										
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
										    <label for="nameofbank" class="group label-input">
			                                    <input type="text" id="nameofbank" name="nameofbank" class="input-right" placeholder="Name of the bank">										
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
										    <label for="paymentdate" class="group label-input">
			                                    <input type="text" id="paymentdate" name="paymentdate" class="input-right" placeholder="DD Date">										
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
										    <label for="paymentamount" class="group label-input">
			                                    <input type="text" id="paymentamount" name="paymentamount" class="input-right" placeholder="Amount (INR)">										
											</label>
									    </div>
									</div>
									<div class="column-twelve" style="margin: 10px;">
										<span><em>Note: When applying through DD/Bank transfer, mention your application id, registered email id and the programme you are applying for on the back, for our reference. Do NOT send a printed copy of your application with the DD/Banker's Cheque. We do NOT accept Personal Cheques.</em></span>
									</div>
									
								</div>
							</div>
						</div>
						<div class="column-two">
							<button type="button" id="continue-button-payment" class="button button-large button-orange">Submit</button>
						</div>
						<div class="column-ten">
							<h3>Note: Once submitted you will not be  able to make any changes to your application.</h3>
						</div>
						 
					</div>
				</fieldset>
			</form>
		</div>	
	</div>