<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="promotions.php">Promotions</a></li>
			<li class="active">View Offer</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
		  	<div class="right-content">
				<a href="add_offer.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD PRODUCT OFFER</button></a>
			</div>
			<h3>View Offers</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
						$offer = new offer();
						$results = $offer->get_products();
						if ($results) {
						?>
						<table class="table table-striped table-hover" id="datatable-example">
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
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>