<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Transection</p>
			</div>
			
			<?php 
			$bank = new bank();
			$bank_result = $bank->get_banks();
			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_transection'])) {
				// Update old record
				$results = $bank->add_transection_bank($_POST);
				
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Bank Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 
			?>
			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-8">	
					<div class="form-group">
						<label for="bank_name" class="col-sm-3 control-label">Bank Name: </label>
						<div class="col-sm-8">
							<select name="transection_bank" required>
								<option value="">Select Bank Branch</option>
								<?php foreach ($bank_result as $bank) { ?>
							    	<option value="<?php echo $bank->bank_id; ?>"><?php echo $bank->bank_name .' - '. $bank->bank_branch; ?></option>
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
						<label for="transection_amount" class="col-sm-3 control-label">Amount: </label>
						<div class="col-sm-8">
							<input type="text" name="transection_amount" id="transection_amount" value="" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="transection_type" class="col-sm-3 control-label">Transection Type: </label>
						<div class="col-sm-8">
							<select name="transection_type" required>
								<option value="">Select Type</option>
								<option value="credit">Credit</option>
								<option value="debit">Debit</option>
							</select>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="transection_payment_mode" class="col-sm-3 control-label">Payment Mode: </label>
						<div class="col-sm-8">
							<select name="transection_payment_mode" required>
								<option value="">Select Payment Mode</option>
								<option value="case">Cash</option>
								<option value="cheque">Cheque</option>
							</select>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="transection_detail" class="col-sm-3 control-label">Detail: </label>
						<div class="col-sm-8">
							<textarea type="text" rows="5" name="transection_detail" id="transection_detail" class="form-control" required></textarea>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_transection"><?php echo (isset($ID))? 'Update' : 'Add' ?> Bank Transection</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>