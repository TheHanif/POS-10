<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="suppliers.php">Suppliers</a></li>
			<li class="active">Manage Suppliers</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
			<div class="right-content">
				<a href="add_supplier.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD NEW SUPPLIER</button></a>
			</div>
			<h3>Manage Suppliers</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
					$supplier = new supplier();
					$results = $supplier->get_suppliers();
					if ($results) {
					?>

					<table class="table table-striped table-hover" id="datatable-example">
						<thead class="the-box dark full">
							<tr>
								<th>Supplier Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($results as $res){
							echo '<tr>';
							echo '<td>'. $res->sup_name .'</td>';
							echo '<td>'. $res->sup_email.'</td>';
							echo '<td>'. $res->sup_phone .'</td>';
							echo '<td>'. $res->sup_city .'</td>';
							echo '<td class="alignCenter">
							<div class="btn-group">
							  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-cog"></i> Action <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu success" role="menu">
								<li><a href="add_supplier.php?id='.$res->sup_id.'">Edit Supplier</a></li>
								<li><a href="view_supplier_product.php?supplier_id='.$res->sup_id.'">View Products</a></li>
							  </ul>
							</div>';
							echo '</tr>';
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
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>