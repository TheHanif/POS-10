<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Opening Balance</p>
			</div>
			
			<?php 
			$openingbalance = new openingbalance();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_balance'])) {
				// Update old record
				if (isset($ID)) {
					$results = $openingbalance->update_open_balance($_POST, $ID);
				}else{ // Insert new
					$results = $openingbalance->insert_open_balance($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Supplier Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$results = $openingbalance->get_opening_balance($ID);
			}
			?>

			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-6">	
					<div class="form-group">
						<label for="p_name" class="col-sm-3">Date: </label>
						<div class="col-sm-9">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-6">	
					<div class="form-group">
						<label for="p_name" class="col-sm-3">Amount: </label>
						<div class="col-sm-9">
			                <input class="form-control" name="amount" type="text" value="<?php echo (isset($ID))? $results[0]->ob_balance : '' ?>">
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-6">	
					<div class="form-group">
						<label for="person_name" class="col-sm-3">Sale Person: </label>
						<?php 	$user = new user();
								$all_user = $user->get_sales_user(); 
						?>
						<div class="col-sm-9">
							<select name="person_name" data-placeholder="Select Sale Person" class="chosen-select" tabindex="4">
								<option value=""></option>
								<?php 
								foreach($all_user as $user){ ?>					
										<option value="<?php echo $user->id; ?>"<?php if(isset($ID)){if($results[0]->id == $user->id){echo 'selected=selected';}}?>><?php echo $user->fname; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-6">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_balance"><?php echo (isset($ID))? 'Update' : 'Add' ?> Balance</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>