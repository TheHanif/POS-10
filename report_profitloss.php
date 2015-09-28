<?php require_once 'header.php'; ?>

<div class="page-content">
	<div class="container-fluid">

		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Reports</a></li>
			<li class="active">Profit & Loss Report</li>
		</ol>
		

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3>Profit & Loss Report</h3>
		  </div>
		  <div class="panel-body">
		<div class="the-box bg-primary no-border">
	  		<form class="form-horizontal dashboardForm"  action="" method="post">
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_cost" class="col-sm-12">Start date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
			                </div>
							<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_name" class="col-sm-12">End Date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
			                </div>
							<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-3">	
					<div class="form-group">
						<label for="p_supplier" class="col-sm-12">Product Name: </label>
						<?php 	$product = new product();
								$all_product = $product->get_product(); 
						?>
						<div class="col-sm-12">
							<select name="product_name" data-placeholder="Choose a Product Name" class="chosen-select form-control" tabindex="4">
								<option value=""></option>
								<?php 
								foreach($all_product as $product){ ?>					
										<option value="<?php echo $product->p_id; ?>"<?php if(isset($_POST['product_name'] ) && $_POST['product_name'] == $product->p_id){echo 'selected=selected';}?>><?php echo $product->p_name; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-3">
					<div class="form-group">
						<label for="p_supplier" class="col-sm-12">&nbsp;</label>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success btn-perspective pull-right" name="show_report">Show Report</button>
						</div>
				  	</div>
				</div>
				</form>
			<div class="clearfix" style="margin-bottom:10px;"></div>
		</div><!-- Box Close -->

		<div class="clearfix" style="margin-bottom:10px;"></div>
			<?php 
			$accounts = new accounts();

			if (isset($_POST['show_report'])) {	
				$to_date = $_POST['to_date'];
				$from_date = $_POST['from_date'];
				$product_name = $_POST['product_name'];

				if($_POST['product_name']){
					$product_id = $_POST['product_name'];	
				} else {
					$product_id = NULL;
				}

				if($_POST['to_date']){
				$to_date = $_POST['to_date'];
				$to_date = $accounts->_date('Y-m-d H:i:s', $to_date);	
				} else {
					$to_date = NULL;
				}

				if($_POST['from_date']){
					$from_date = $_POST['from_date'];
					$from_date = $accounts->_date('Y-m-d H:i:s', $from_date);
				} else {
					$from_date = NULL;	
				}
				$results = $accounts->get_profitloss_report($product_id, $to_date, $from_date);
				// print_f($results);
			}
			?>
		<!-- Begin page heading -->
		

		<div class="the-box full no-border">
			<div class="table-responsive">
				<?php 
			if (isset($results)) { 
			// print_f($results);
			?>
			<table class="table table-th-block table-primary">
				<thead>
					<th>Product Name</th>
					<th>Cost</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Profit</th>
					<th>Date</th>
				</thead>
				<tbody>
					<?php 
					$totalprofit = 0;
					foreach($results as $res){ ?>
				<tr>
					<td><?php echo $res->p_name; ?></td>
					<td><?php echo $cost = $res->pl_cost; ?></td>
					<td><?php echo $price = $res->pl_price; ?></td>
					<td><?php echo $qty = $res->pl_quantity; ?></td>
					<td><?php echo $profit = $res->pl_profit; ?></td>
					<td><?php echo $res->pl_date; ?></td>
				</tr>
					<?php
					$totalprofit += $profit;
					}
					?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><strong>Total Profit</strong></td>
					<td><strong><?php echo $totalprofit; ?></strong></td>
					<td></td>
				</tr>
				</tbody>
			</table>
			<?php }
			?>
			</div><!-- /.table-responsive -->
		</div>	





		  </div><!-- /.panel-body -->
		  
		</div>
		
		  
	</div>
</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>