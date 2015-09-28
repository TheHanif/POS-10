<?php require_once 'header.php'; ?>

<div class="page-content">
	<div class="container-fluid">

		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Reports</a></li>
			<li class="active">Sales Report</li>
		</ol>
		

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3>Sales Report</h3>
		  </div>
		  <div class="panel-body">
		<div class="the-box bg-primary no-border">
	  		<form class="form-horizontal dashboardForm"  action="" method="post">
				<div class="col-sm-3">	
					<div class="form-group" style="margin-bottom: 0px;">
						<label for="p_cost" class="col-sm-12">Start date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="dd-mm-yyyy">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="fa fa-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-sm-6 Close -->
				<div class="col-sm-3">	
					<div class="form-group" style="margin-bottom: 0px;">
						<label for="p_name" class="col-sm-12">End Date: </label>
						<div class="col-sm-12">
							<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
			                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>">
			                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="fa fa-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>" /><br/>
						</div>
					</div>
				</div><!-- Col-sm-6 Close -->
				<div class="col-sm-4">	
					<div class="form-group" style="margin-bottom: 0px;">
						<label for="p_supplier" class="col-sm-12">Product Name: </label>
						<?php 	$product = new product();
								$all_product = $product->get_product(); 
						?>
						<div class="col-sm-12">
							<select name="product_name" data-placeholder="Choose a Product Name" tabindex="4" class="chosen-select form-control">
								<option></option>
								<?php 
								foreach($all_product as $product){ ?>					
										<option value="<?php echo $product->p_id; ?>"<?php if(isset($_POST['product_name'] ) && $_POST['product_name'] == $product->p_id){echo 'selected=selected';}?>><?php echo $product->p_name; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div><!-- Col-sm-6 Close -->
				<div class="col-sm-2">
					<div class="form-group" style="margin-bottom: 0px;">
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
				$results = $accounts->get_sales_report($product_id, $to_date, $from_date);
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
						<th>No.</th>
						<th>Product</th>
						<th>Date</th>
						<th>Cost</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</thead>
					<tbody>
						<?php 
						$count = 1;
	        			$sub_total = 0;
						foreach ($results as $key => $value){ ?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><?php echo $value->p_name; ?></td>
						<td><?php echo $accounts->_date($format = 'd-m-Y', $value->sales_date); ?></td>
						<td><?php echo $value->sales_cost; ?></td>
						<td><?php echo $value->sales_price; ?></td>
						<td><?php echo $value->sales_quantity; ?></td>
						<td><?php echo $total = $value->sales_total; ?></td>
					</tr>
						<?php
						$count++;
	        			$sub_total += $total;
						}
						?>
					<tr>
						<td colspan="6" style="text-align:right;"><strong>Total Sales: </strong></td>
						<td><strong><?php echo $sub_total; ?></strong></td>
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