		<div class="modal modal-gre" style="display: none;">
			<div class="container">
				<div class="form-bar">
					<div class="top-bar bar-orange"></div>
				</div>
				<div class="form">
					<div class="header">
						<div class="grid-container">
							<div class="column-eleven">
								<h4>GRE Details</h4>
							</div>
							<div class="column-one">
								<div class="close"><i class="icon-close"></i></div>
							</div>
						</div>
					</div>
					<div class="section">
						<form method="post" action="<?php echo $baseurl;?>php/processor-gre.php?lang=<?php echo $_GET['lang'];?>" id="window_gre">					   
							<fieldset>
								<div class="grid-container">
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="greregnumber" class="group label-input">
												<input type="text" id="greregnumber" name="greregnumber" class="input-right" placeholder="GRE Registration number">
											</label>
										</div>
									</div>
									<div class="column-six">
										<div class="input-group-right irequire">
											<label for="gredate" class="group label-input">
												<i class="icon-calendar"></i>
                                    			<input type="text" id="gredate" name="gredate" class="input-right" placeholder="Exam Date">
											</label>
										</div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="greverbalscore" class="group label-input">
				                                <input type="text" id="greverbalscore" name="greverbalscore" class="input-right" placeholder="Verbal Score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="grequantscore" class="group label-input">
				                                <input type="text" id="grequantscore" name="grequantscore" class="input-right" placeholder="Quantitative Score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gretotalscore" class="group label-input">
				                                <input type="text" id="gretotalscore" name="gretotalscore" class="input-right" placeholder="Total score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="greverbalpercentile" class="group label-input">
				                                <input type="text" id="greverbalpercentile" name="greverbalpercentile" class="input-right" placeholder="Verbal percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="grequantpercentile" class="group label-input">
				                                <input type="text" id="grequantpercentile" name="grequantpercentile" class="input-right" placeholder="Quantitative percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="gretotalpercentile" class="group label-input">
				                                <input type="text" id="gretotalpercentile" name="gretotalpercentile" class="input-right" placeholder="Total percentile">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="select-group irequire">
											<label for="greawaawaited" class="group custom-select">
												<select id="greawaawaited" name="greawaawaited" class="select">
												    <option value="">AWA awaited</option>
													<option value="Y">Yes</option>
													<option value="N">No</option>
												</select>
											</label>
								        </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="greawascore" class="group label-input">
				                                <input type="text" id="greawascore" name="greawascore" class="input-right" placeholder="AWA score">
											</label>
									    </div>
									</div>
									<div class="column-four">
										<div class="input-group-right irequire">
											<label for="greawapercentile" class="group label-input">
				                                <input type="text" id="greawapercentile" name="greawapercentile" class="input-right" placeholder="AWA percentile">
											</label>
									    </div>
									</div>
									<div class="column-six">
										<button type="button" id="gre-save-button" class="button button-large button-blue space">Save</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>	
				</div>
			</div>
		</div>