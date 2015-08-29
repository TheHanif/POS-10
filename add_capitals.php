<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Capital</p>
			</div>
			
			<?php 
			$accounts = new accounts();


			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_capital'])) {
				$name = $_POST['capital_name'];
				$amount = $_POST['capital_amount'];
				$date = $_POST['capital_date'];
				$detail = $_POST['capital_detail'];
				// Update old record
				if (isset($ID)) {
					$results = $accounts->update_capital($name, $amount, $date, $detail, $ID);
				}else{ // Insert new
					$results = $accounts->create_capital($name, $amount, $date, $detail);
				}
				
				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Capital Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$capital_result = $accounts->get_capital($ID);
			}
			?>
			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-8">	
					<div class="form-group">
						<label for="capital_name" class="col-sm-3 control-label">Capital Person Name: </label>
						<div class="col-sm-8">
							<input type="text" name="capital_name" id="capital_name" value="<?php echo (isset($ID))? $capital_result[0]->capital_name : '' ?>" class="form-control" required>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="capital_amount" class="col-sm-3 control-label">Amount: </label>
						<div class="col-sm-8">
							<input type="text" name="capital_amount" id="capital_amount" value="<?php echo (isset($ID))? $capital_result[0]->capital_amount : '' ?>" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="capital_date" class="col-sm-3 control-label">Due Date: </label>
						<div class="col-sm-8">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="capital_date" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
			                </div>
							<input type="hidden" id="capital_date" name="capital_date" value="<?php echo (isset($ID))? $capital_result[0]->capital_date: '' ?>" /><br/>
						</div>
					</div>
				</div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="capital_detail" class="col-sm-3 control-label">Detail: </label>
						<div class="col-sm-8">
							<textarea type="text" rows="5" name="capital_detail" id="capital_detail" class="form-control" required><?php echo (isset($ID))? $capital_result[0]->capital_detail : '' ?></textarea>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-8">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_capital"><?php echo (isset($ID))? 'Update' : 'Add' ?> Capital</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>