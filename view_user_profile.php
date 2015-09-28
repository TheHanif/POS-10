<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="users.php">User</a></li>
			<li class="active">User Profile</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3>Profile</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$user = new user();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($ID)) {
				$user_result = $user->get_user($ID);
			}
			?>
		
			<div class="the-box noborder">
				<div class="col-sm-4">
					<img src="uploads/<?php echo $user_result->photo; ?>" class="img-responsive thumbnail" alt="">
				</div>
				<div class="col-sm-8">
					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">First Name</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->fname; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Last Name</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->lname; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Email</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->email; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Username</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->login; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Mobile No</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->mobile; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Phone No</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->phone; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Address</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->address; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">City</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->city; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Country</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->country; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">NIC</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->nic; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Date of Birth</label>
						<p class="col-sm-8 form-control-static"><?php echo $user_result->dob; ?></p>
					</div>

					<div class="form-group clearfix">
						<label class="col-sm-4 control-label">Designation</label>
						<p class="col-sm-8 form-control-static" style="text-transform: capitalize;"><?php $designation = $user_result->designation;
						echo str_replace("_"," ","$designation"); ?></p>
					</div>
				</div><!-- Col-sm-8 -->
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>