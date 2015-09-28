<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Suppliers</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="view_supplier.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-users icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Supplier</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_supplier.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Supplier</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_supplier_bill.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-file-text-o icon-xl"></i>
										<h1 class="bolded less-distance">Bill</h1>
										<h4>Add Supplier Bill</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Manage All Suppliers</h1>
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
					  
					</div>
					
					

				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>