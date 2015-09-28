<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="products.php">Products</a></li>
			<li class="active">Manage Products Categories</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
			<div class="right-content">
				<a href="add_product_category.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD NEW PRODUCT CATEGORY</button></a>
			</div>
			<h3>Manage Products Categories</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
					$product = new product();
					$results = $product->get_product_category();
					if ($results) {
					?>
					<table class="table table-striped table-hover" id="datatable-example">
						<thead class="the-box dark full">
							<tr>
								<th>Product Category Name</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($results as $res){
							echo '<tr>';
							echo '<td>'. $res->pc_name .'</td>';
							echo '<td><a href="add_product_category.php?id='.$res->pc_id.'" class="btn btn-info active">EDIT</a></td>';
							echo '</tr>';
							}
							?>
						</tbody>
					</table>
					<?php
					}else{
						echo '<div class="alert alert-danger" role="alert"> No Product Category Available. </div>';
					} 
					?>
					</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>