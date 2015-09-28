<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="view_open_balance.php">Opening Balance</a></li>
			<li class="active">Add Opening Balance</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?>  Opening Balance</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$openingbalance = new openingbalance();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_balance'])) {
				// Update old record
				if (isset($ID)) {
					$results = $openingbalance->update_open_balance($_POST, $ID);

					if ($results) {
						echo '<div class="alert alert-success" role="alert"> Update Balance Sucessfully </div>';
					}else{
						echo '<div class="alert alert-danger" role="alert">ERROR</div>';
					}
				}else{ // Insert new
					$result_insert = $openingbalance->insert_open_balance($_POST);
					if ($result_insert == 'Already Balance') {
						//print_f($result_insert);
						echo '<div class="alert alert-danger" role="alert">User already assigned balance at '.$_POST['from_date'].'</div>';;
					}else{
						//print_f($result_insert);
						echo '<div class="alert alert-success" role="alert"> Add Balance Sucessfully </div>';
					}
				}
			} 

			if (isset($ID)) {
				$results = $openingbalance->get_opening_balance($ID);
			}
			?>
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label class="col-lg-3 control-label">Date:</label>
							<div class="col-lg-5">
								<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
				                    <input class="form-control" size="16" type="text" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>">
				                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
				                </div>
								<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>" /><br/>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-5">
								<input class="form-control" name="amount" type="text" value="<?php echo (isset($ID))? $results[0]->ob_balance : '' ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Sale Person</label>
							<div class="col-lg-5">
								<?php 	$user = new user();
									$all_user = $user->get_sales_user(); 
								?>
								<select data-placeholder="Select Sale Person" class="form-control chosen-select" tabindex="2" name="person_name" required>
									<option></option>
									<?php 
									foreach($all_user as $user){ ?>					
											<option value="<?php echo $user->id; ?>"<?php if(isset($ID)){if($results[0]->id == $user->id){echo 'selected=selected';}}?>><?php echo $user->fname; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
					</fieldset>

					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_balance"><?php echo (isset($ID))? 'Update' : 'Add' ?> Balance</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>