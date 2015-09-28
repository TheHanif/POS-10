<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Products</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="view_product.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-shopping-cart icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Products</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_product.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Product</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="report_sales.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-bar-chart-o icon-xl"></i>
										<h1 class="bolded less-distance">Products</h1>
										<h4>Sale Report</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="clearfix marginBottom"></div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="report_products.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-bar-chart-o icon-xl"></i>
										<h1 class="bolded less-distance">Products</h1>
										<h4>Stock Report</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Product Stock Report</h1>
					  	<!-- BEGIN DATA TABLE -->
					  	<div class="the-box bg-primary no-border">
					  		<form class="form-horizontal dashboardForm"  action="" method="post">
								<div class="col-md-4">	
									<div class="form-group">
										<label for="product_name" class="col-sm-12">Product Name: </label>
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
								</div><!-- Col-md-3 Close -->
								
								<div class="col-md-4">	
									<div class="form-group">
										<label for="product_place" class="col-sm-12">Unit / Warehouse: </label>
										<div class="col-sm-12">
											<select name="product_place" class="form-control" required>
												<option value="">Select Place</option>
													<option value="warehouse" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'warehouse'){echo 'selected=selected';}?>>Warehouse</option>
													<option value="unit" <?php if(isset($_POST['product_place']) && $_POST['product_place'] == 'unit'){echo 'selected=selected';}?>>Unit</option>
											</select>
										</div>
									</div>
								</div><!-- Col-md-3 Close -->
								
								<div class="col-md-4">
									<div class="form-group">
										<label for="p_supplier" class="col-sm-12">&nbsp;</label>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-success btn-perspective pull-right" name="show_report1">Show Report</button>
										</div>
								  	</div>
								</div>
								</form>
							<div class="clearfix"></div>
						</div><!-- Box Close -->

						<div class="the-box">
							<?php 
							$product = new product();

							if (isset($_POST['show_report1'])) {	
								$product_name 	= $_POST['product_name'];
								$product_place	= $_POST['product_place'];

								if($_POST['product_name']){
									$product_name = $_POST['product_name'];	
								} else {
									$product_name = NULL;
								}

								if($_POST['product_place']){
									$product_place = $_POST['product_place'];	
								} else {
									$product_place = NULL;
								}

								$results = $product->get_product_stock($product_name, $product_place);
								$results_inventory = $product->get_product_inventory_stock($product_name);
								$result_saleproducts = $product->get_product_sale_stock($product_name);
								//print_f($result_saleproducts);
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
									<th>Product Name</th>
									<th>Product Quantity</th>
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
												$product_place	= $_POST['product_place'];
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
							<?php }
							?>
							</div><!-- /.table-responsive -->
						</div>	
						<!-- END DATA TABLE -->
					  </div><!-- /.panel-body -->
					  
					</div>
					
					

				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>