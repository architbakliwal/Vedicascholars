	

	<div class="form">
		<div class="header inner_header">
			<div class="grid-container">
				<div class="column-twelve">
					<h4 style="margin-bottom:15px;"><?php echo $lang['section_scores'];?></h4>
				</div>							
			</div>
		</div>
		<div class="section inner_section">
			<form method="post" action="<?php echo $baseurl;?>php/processor-score.php?lang=<?php echo $_GET['lang'];?>" id="section_scores">
				<fieldset>
					<div class="grid-container">
						<div class="column-twelve">
							<div class="input-group">
								<?php echo CSRF::make('section_scores-form')->protect();?>                                      
							</div>
						</div>
						<div class="column-twelve">
						    <div class="box irequire" id="qualifyingexam-box">
							    <div class="box-header" style="text-align: left;">
								    <h3>Qualifying exams appearing for</h3>
								</div>
								<div class="box-section center" style="text-align: left;">
									<div class="radio-group">
										<label for="cattest" class="group">
											<input type="checkbox" name="testappearing[]" class="checkbox" value="CAT" id="cattest">
											<span class="label space-right">CAT</span>
										</label>
										<label for="cettest" class="group">
											<input type="checkbox" name="testappearing[]" class="checkbox" value="MH-CET" id="cettest">
											<span class="label space-right">MH-CET</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="column-twelve" style="margin-bottom: 20px;">
							<table class="testscoretable" style="width:100%">
								<tbody><tr>
									<th>Exam</th>
									<th>Details</th>
								</tr>
								<tr>
									<td>CAT</td>
									<td><a href="#" id="cat-link" class="open-cat">Click here to view/enter details</a></td>
								</tr>
								<tr>
									<td>MH-CET</td>
									<td><a href="#" id="cet-link" class="open-cet">Click here to view/enter details</a></td>
								</tr>
								<tr>
									<td>GRE</td>
									<td><a href="#" id="gre-link" class="open-gre">Click here to view/enter details</a></td>
								</tr>
								<tr>
									<td>GMAT</td>
									<td><a href="#" id="gmat-link" class="open-gmat">Click here to view/enter details</a></td>
								</tr>
								</tbody>
							</table>
						</div>
						<div class="column-two">
							<button type="button" id="back-button-score" class="button button-large button-blue">Back</button>
						</div>
						<div class="column-two">
							<button type="button" id="save-button-score" class="button button-large button-blue">Save</button>
						</div>
						<div class="column-two">
							<button type="button" id="continue-button-score" class="button button-large button-green">Save and Continue</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>	
	</div>