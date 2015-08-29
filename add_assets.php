<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Assets</p>
			</div>
			
			<?php 
			$accounts = new accounts();
			
			$bank = new bank();
			$bank_result = $bank->get_banks();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_assets'])) {
				$type = $_POST['assets_type'];
				$amount = $_POST['assets_amount'];
				$payment_mode = $_POST['assets_payment_mode'];
				$bank = $_POST['bank_name'];
				$due_date = $_POST['due_date'];
				$detail = $_POST['assets_detail'];
				// Update old record
				if (isset($ID)) {
					$results = $accounts->update_assets($type, $amount, $payment_mode, $bank, $due_date, $detail, $ID);
				}else{ // Insert new
					$results = $accounts->create_assets($type, $amount, $payment_mode, $bank, $due_date, $detail);
				}
				
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Assets Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$assets_result = $accounts->get_assets($ID);
			}
			?>
			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-8">	
					<div class="form-group">
						<label for="assets_type" class="col-sm-3 control-label">Assets Type: </label>
						<div class="col-sm-8">
							<select name="assets_type" required>
								<option value="">Select Assets Type</option>
								<optgroup label="Current Assets">
									<?php foreach ($current_assets as $key => $value) { ?>
										<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
									<?php
									} 
									?>
								</optgroup>
								<optgroup label="Fixed Assets">
									<?php foreach ($fixed_assets as $key => $value) { ?>
										<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
									<?php
									} 
									?>
								</optgroup>
							</select>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="assets_amount" class="col-sm-3 control-label">Amount: </label>
						<div class="col-sm-8">
							<input type="text" name="assets_amount" id="assets_amount" value="<?php echo (isset($ID))? $assets_result[0]->assets_amount : '' ?>" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="assets_payment_mode" class="col-sm-3 control-label">Payment Mode: </label>
						<div class="col-sm-8">
							<select name="assets_payment_mode"  id="payment_mode" required>
								<option value="">Select Payment Mode</option>
								<option value="cash" <?php if(isset($ID) && 'cash' == $assets_result[0]->assets_payment_mode){echo 'selected=selected';}?>>Cash</option>
								<option value="cheque" <?php if(isset($ID) && 'cheque' == $assets_result[0]->assets_payment_mode){echo 'selected=selected';}?>>Cheque</option>
							</select>
						</div>
					</div>
				</div>
				<div id="payment_cheque_mode" <?php if(isset($ID) && 'cash' == $assets_result[0]->assets_payment_mode){echo 'style="display:none;"';}?>>
					<div class="col-md-8">	
						<div class="form-group">
							<label for="bank_name" class="col-sm-3 control-label">Bank Name: </label>
							<div class="col-sm-8">
								<select name="bank_name" required>
									<option value="">Select Bank Branch</option>
									<?php foreach ($bank_result as $bank) { ?>
								    	<option value="<?php echo $bank->bank_id; ?>" <?php if(isset($ID) && $bank->bank_id == $assets_result[0]->assets_bank){echo 'selected=selected';}?>><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
								    <?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="col-md-8">	
						<div class="form-group">
							<label for="due_date" class="col-sm-3 control-label">Due Date: </label>
							<div class="col-sm-8">
								<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="due_date" data-link-format="yyyy-mm-dd">
				                    <input class="form-control" size="16" type="text" value="">
				                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
				                </div>
								<input type="hidden" id="due_date" name="due_date" value="<?php echo (isset($ID))? $assets_result[0]->assets_due_date : '' ?>" /><br/>
							</div>
						</div>
					</div>
				</div><!-- Close payment_cheque_mode -->
				<div class="col-md-8">	
					<div class="form-group">
						<label for="assets_detail" class="col-sm-3 control-label">Detail: </label>
						<div class="col-sm-8">
							<textarea type="text" rows="5" name="assets_detail" id="assets_detail" class="form-control" required><?php echo (isset($ID))? $assets_result[0]->assets_detail : '' ?></textarea>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_assets"><?php echo (isset($ID))? 'Update' : 'Add' ?> Assets</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>