<?php require_once 'header.php'; ?>
<div class="page-content">
	<div class="container-fluid">

		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Reports</a></li>
			<li class="active">Invoice Number Report</li>
		</ol>
		

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3>Invoice Number Report</h3>
		  </div>
		  <div class="panel-body">
		<div class="the-box bg-primary no-border">
			<?php 
			$sales = new sales();
			$all_sales = $sales->get_all_sale();
			//print_f($all_sales);
			if (isset($_GET['bill'])) {	
				
				if($_GET['bill']){
					$invoice_number = $_GET['bill'];	
				} else {
					$invoice_number = NULL;
				}

				$results = $sales->get_sale_invoice_report($invoice_number);
				//print_f($results);
			}
			?>	

	  		<form class="form-horizontal dashboardForm"  action="" method="get">
				<div class="col-md-8">	
					<div class="form-group">
						<label for="bill" class="col-sm-12">Invoice Number</label>
						<div class="col-sm-12">
							<select name="bill" data-placeholder="Enter Invoice Number" class="chosen-select form-control" tabindex="4">
								<option value=""></option>
								<option value=""></option>
								<?php 
								foreach($all_sales as $key => $value){ 
								?>
									<option value="<?php echo $value->sale_id; ?>"<?php if(isset($_GET['bill'] ) && $_GET['bill'] == $value->sale_id){echo 'selected=selected';}?>><?php echo $value->sale_bill_number; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
				</div><!-- Col-md-3 Close -->
				
				<div class="col-md-4">
					<div class="form-group">
						<label for="p_supplier" class="col-sm-12">&nbsp;</label>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success btn-perspective pull-right">Show Report</button>
						</div>
				  	</div>
				</div>
				</form>
			<div class="clearfix" style="margin-bottom:10px;"></div>
		</div><!-- Box Close -->

		<div class="clearfix" style="margin-bottom:10px;"></div>
			
	
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
					<th>Product Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Total</th>
				</thead>
				<tbody>
					<?php 
					$count = 1;
					$total = 0;
					$total_daily_sale = 0;
        			foreach ($results as $key => $value){ ?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $value->p_name; ?></td>
					<td><?php echo $qty = $value->salepro_product_quantity; ?></td>
					<td><?php echo $price = $value->salepro_product_price; ?></td>
					<td><?php echo $total = $qty*$price; ?></td>
				</tr>
					<?php
					$count++;
					$total_daily_sale += $total;
					}
					?>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total Bill Amount:</td>
					<td><?php echo $total_daily_sale; ?></td>
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