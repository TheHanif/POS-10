<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Warehouse</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="view_warehouse.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-shopping-cart icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>Warehouse Products</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_warehouse.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Warehouse Product</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="report_products.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-bar-chart-o icon-xl"></i>
										<h1 class="bolded less-distance">Stock Report</h1>
										<h4>Warehouse Products</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<!-- BEGIN DATA TABLE -->
						<div class="the-box">
							<?php 
							$product = new product();
							$product_name = NULL;	
							$product_place = 'warehouse';
							$results = $product->get_product_stock($product_name, $product_place);
							$results_inventory = $product->get_product_inventory_stock($product_name);
							$result_saleproducts = $product->get_product_sale_stock($product_name);
							// print_f($results);
							?>		
							<div class="table-responsive">
							<h1 class="bolded noMarginTop text-primary">Latest Warehouse Product Stock</h1>
							<?php 
							if (isset($results)) { 
							?>
							<table class="table table-striped table-hover" id="datatable-example">
								<thead class="the-box dark full">
									<tr>
										<th>No.</th>
										<th>Product Name</th>
										<th>Product Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$count = 1;
				        			foreach ($results as $key => $value){ ?>
									<tr>
										<td><?php echo $count; ?></td>
										<td><?php echo $value->p_name; ?></td>
										<td>
											<?php 
											if(isset($_POST)){
												if($product_place == 'warehouse'){
													$inv_qty = $results_inventory[$count-1]->inventory_quantity;
													$warehouse_qty = $value->qty; 
													echo ($warehouse_qty-$inv_qty);
												}
												else {
													$sale_qty = $result_saleproducts[$count-1]->salepro_pro_quantity;
													$warehouse_qty = $value->qty; 
													echo ($warehouse_qty-$sale_qty);
												}
											}
											?>
										</td>
									</tr>
									<?php
									$count++;
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
<?php require_once 'footer.php'; ?>