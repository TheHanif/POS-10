<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Promotions</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4 col-sm-offset-2">
							<div class="the-box no-border full text-center">
								<a href="view_discount.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-tags icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Discount</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_discount.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Discount</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="clearfix marginBottom"></div>
						<div class="col-sm-4 col-sm-offset-2">
							<div class="the-box no-border full text-center">
								<a href="view_offer.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-ticket icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Offers</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_offer.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Product Offer</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Manage All Discount</h1>
					  	<!-- BEGIN DATA TABLE -->
					  	<div class="the-box">
							<div class="table-responsive">
								<?php 
								$discount = new discount();
								$results = $discount->get_products();

								if ($results) {
								?>
								<table class="table table-striped table-hover" id="datatable-example">
									<thead class="the-box dark full">
										<tr>
											<th>Name</th>
											<th>Discount Type</th>
											<th>Discount Amount</th>
											<th>Min Purchase</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach($results as $res){ ?>
										<tr>
										<td><a href="add_discount.php?id=<?php echo $res->discount_id; ?>"><?php echo $res->p_name; ?></a></td>
										<td><?php echo $res->discount_type; ?></td>
										<td><?php echo $res->discount_amount; ?></td>
										<td><?php echo $res->discount_min_purchase_qty; ?></td>
										<td><?php 
											if($res->discount_status == '1'){
												echo '<span class="label label-success">Active</span>';
											}
											else {
												echo '<span class="label label-danger">Deactive</span>';
											}
											?></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<?php
								}else{
									echo '<div class="alert alert-danger" role="alert"> No Supplier Available. </div>';
								} 
								?>
							</div><!-- /.table-responsive -->
						</div><!-- /.the-box .default -->
					  </div><!-- /.panel-body -->
					  
					</div>


					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Manage All Offers</h1>
					  	<!-- BEGIN DATA TABLE -->
					  	<div class="the-box">
							<div class="table-responsive">
								<?php 
								$offer = new offer();
								$results = $offer->get_products();
								if ($results) {
								?>
								<table class="table table-striped table-hover" id="datatable-example1">
									<thead class="the-box dark full">
										<tr>
											<th>Name</th>
											<th>Min Purchase</th>
											<th>Offer Status</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach($results as $res){ ?>
										<tr>
											<td><a href="add_offer.php?id=<?php echo $res->discount_id; ?>"><?php echo $res->p_name; ?></a></td>
											<td><?php echo $res->discount_min_purchase_qty; ?></td>
											<td>
												<?php 
												if($res->discount_status == '1'){
													echo '<span class="label label-success">Active</span>';
												}
												else {
													echo '<span class="label label-danger">Deactive</span>';
												}
												?>
											</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
								<?php
								}else{
									echo '<div class="alert alert-danger" role="alert"> No Offer Available. </div>';
								} 
								?>
							</div><!-- /.table-responsive -->
						</div><!-- /.the-box .default -->
					  </div><!-- /.panel-body -->
					  
					</div>
					
					

				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>