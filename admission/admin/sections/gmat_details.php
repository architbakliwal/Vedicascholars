		<div class="modal modal-gmat" style="display: none;">
			<div class="container">
				<div class="form-bar">
					<div class="top-bar bar-orange"></div>
				</div>
				<div class="form">
					<div class="header">
						<div class="grid-container">
							<div class="column-eleven">
								<h4>GMAT Details</h4>
							</div>
							<div class="column-one">
								<div class="close"><i class="icon-close"></i></div>
							</div>
						</div>
					</div>
					<div class="section">
						<form method="post" action="<?php echo $baseurl;?>php/processor-gmat.php?lang=<?php echo $_GET['lang'];?>" id="window_gmat">					   
							<fieldset>
								<div class="grid-container">
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="gmatregnumber" class="group label-input">
												<input type="text" id="gmatregnumber" name="gmatregnumber" class="input-right" placeholder="GMAT Registration number">
											</label>
										</div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="gmatdate" class="group label-input">
												<i class="icon-calendar"></i>
                                    			<input type="text" id="gmatdate" name="gmatdate" class="input-right" placeholder="Exam Date">
											</label>
										</div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatverbalscore" class="group label-input">
				                                <input type="text" id="gmatverbalscore" name="gmatverbalscore" class="input-right" placeholder="Verbal Score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatquantscore" class="group label-input">
				                                <input type="text" id="gmatquantscore" name="gmatquantscore" class="input-right" placeholder="Quantitative Score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmattotalscore" class="group label-input">
				                                <input type="text" id="gmattotalscore" name="gmattotalscore" class="input-right" placeholder="Total score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatverbalpercentile" class="group label-input">
				                                <input type="text" id="gmatverbalpercentile" name="gmatverbalpercentile" class="input-right" placeholder="Verbal percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatquantpercentile" class="group label-input">
				                                <input type="text" id="gmatquantpercentile" name="gmatquantpercentile" class="input-right" placeholder="Quantitative percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmattotalpercentile" class="group label-input">
				                                <input type="text" id="gmattotalpercentile" name="gmattotalpercentile" class="input-right" placeholder="Total percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="select-group irequire">
											<label for="gmatawaawaited" class="group custom-select">
												<select id="gmatawaawaited" name="gmatawaawaited" class="select">
												    <option value="">AWA awaited</option>
													<option value="Y">Yes</option>
													<option value="N">No</option>
												</select>
											</label>
								        </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatawascore" class="group label-input">
				                                <input type="text" id="gmatawascore" name="gmatawascore" class="input-right" placeholder="AWA score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gmatawapercentile" class="group label-input">
				                                <input type="text" id="gmatawapercentile" name="gmatawapercentile" class="input-right" placeholder="AWA percentile">
											</label>
									    </div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="gmatintegratedpercentile" class="group label-input">
				                                <input type="text" id="gmatintegratedpercentile" name="gmatintegratedpercentile" class="input-right" placeholder="Integrated Reasoning percentile">
											</label>
									    </div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="gmatintegratedscore" class="group label-input">
				                                <input type="text" id="gmatintegratedscore" name="gmatintegratedscore" class="input-right" placeholder="Integrated Reasoning Score">
											</label>
									    </div>
									</div>
									<div class="column-six">
										<button type="button" id="gmat-save-button" class="button button-large button-blue space">Save</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>	
				</div>
			</div>
		</div>