<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li><a href="view_warehouse.php">Warehouse</a></li>
						<li class="active">Manage Warehouse</li>
					</ol>
					<!-- End breadcrumb -->

					<div class="panel panel-info">
					  <div class="panel-heading">
						<div class="right-content">
							<a href="add_warehouse.php" class="btn btn-default btn-lg active"><i class="fa fa-plus"></i>ADD NEW ITEM</a>
						</div>
						<h3>Manage Warehouse Product</h3>
					  </div>
					  <div class="panel-body">
						<!-- BEGIN DATA TABLE -->
						<div class="the-box">
							<div class="table-responsive">
							<?php
							$warehouse = new warehouse();
							$results = $warehouse->get_products();
							if ($results) {
							?>
							<table class="table table-striped table-hover" id="datatable-example">
								<thead class="the-box dark full">
									<tr>
										<th>Product Name</th>
										<th>Cost</th>
										<th>Price</th>
										<th>Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach($results as $res){ ?>
									<tr>
										<td><a href="add_warehouse.php?id=<?php echo $res->warehouse_id; ?>"><?php echo $res->p_name; ?></a></td>
										<td><?php echo $res->warehouse_cost; ?></td>
										<td><?php echo $res->warehouse_price; ?></td>
										<td><?php echo $res->warehouse_quantity; ?></td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<?php
							}else{
								echo 'No Product Available in Warehouse';
							} 
							?>
							</div><!-- /.table-responsive -->
						</div><!-- /.the-box .default -->
						<!-- END DATA TABLE -->
					  </div><!-- /.panel-body -->
					  
					</div>
				</div><!-- /.container-fluid -->


			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				<div class="container-fluid">
					<!-- Begin breadcrumb -->
					<ol class="breadcrumb info rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li><a href="view_warehouse.php">Warehouse</a></li>
						<li class="active">Manage Warehouse</li>
					</ol>
					<!-- End breadcrumb -->

					<!-- Begin page heading -->
					<div class="alert alert-success alert-bold-border square">
					  <div class="col-md-6">
					  	<h2>Manage Warehouse Product</h2>
					  </div>
					  <div class="col-md-6">
					  	<a href="add_warehouse.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD NEW ITEM</button></a>
					  </div>
					  <div class="clearfix"></div>
					</div>
					<!-- End page heading -->
				
					<!-- BEGIN DATA TABLE -->
					<div class="the-box">
						<div class="table-responsive">
						<?php
						$warehouse = new warehouse();
						$results = $warehouse->get_products();
						if ($results) {
						?>
						<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
								<tr>
									<th>Product Name</th>
									<th>Cost</th>
									<th>Price</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($results as $res){ ?>
								<tr>
									<td><a href="add_warehouse.php?id=<?php echo $res->warehouse_id; ?>"><?php echo $res->p_name; ?></a></td>
									<td><?php echo $res->warehouse_cost; ?></td>
									<td><?php echo $res->warehouse_price; ?></td>
									<td><?php echo $res->warehouse_quantity; ?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<?php
						}else{
							echo 'No Product Available in Warehouse';
						} 
						?>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box .default -->
					<!-- END DATA TABLE -->
				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>