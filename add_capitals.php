<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="accounts.php">Accounts</a></li>
			<li><a href="view_capitals.php">Capitals</a></li>
			<li class="active">Add Capital</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Capital</h3>
		  </div>
		  <div class="panel-body">
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
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
					<fieldset>
						<legend>Product Detail:</legend>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Capital Person Name</label>
							<div class="col-lg-5">
								<input type="text" name="capital_name" id="capital_name" value="<?php echo (isset($ID))? $capital_result[0]->capital_name : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-5">
								<input type="text" name="capital_amount" id="capital_amount" value="<?php echo (isset($ID))? $capital_result[0]->capital_amount : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Due Date</label>
							<div class="col-lg-5">
								<input type="text" class="form-control datepicker" name="capital_date" data-date-format="mm-dd-yy" placeholder="mm-dd-yy" value="<?php echo (isset($ID))? $capital_result[0]->capital_date: '' ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-lg-3 control-label">Detail</label>
							<div class="col-lg-5">
								<textarea type="text" rows="5" name="capital_detail" id="capital_detail" class="form-control" required><?php echo (isset($ID))? $capital_result[0]->capital_detail : '' ?></textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg"  name="add_capital"><?php echo (isset($ID))? 'Update' : 'Add' ?> Capital</button>					
							</div>
						</div>

					</fieldset>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>