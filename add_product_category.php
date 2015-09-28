<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="products.php">Products</a></li>
			<li><a href="view_product_categories.php">Products Categories</a></li>
			<li class="active">Add Product Category</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Product Category</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$product = new product();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_product_category'])) {		
				// Update old record
				if (isset($ID)) {
					$results = $product->pro_category_update($_POST, $ID);
				}else{ // Insert new
					$results = $product->pro_category_insert($_POST);
				}
				if ($results) {
				echo '<div class="alert alert-success alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Add Product Category Sucessfully</strong>
				</div>';
			}else{
				echo '<div class="alert alert-danger alert-block fade in alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error</strong>
				</div>';
			}
			}
			if (isset($ID)) {
				$product_result = $product->get_product_category($ID);
			}
			?>
		
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal">
						<div class="form-group">
							<label class="col-lg-3 control-label">Category Name</label>
							<div class="col-lg-5">
								<input type="text" name="p_name" value="<?php echo (isset($ID))? $product_result[0]->pc_name : '' ?>" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_product_category"><?php echo (isset($ID))? 'Update' : 'Add' ?> Product Category</button>
							</div>
						</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>