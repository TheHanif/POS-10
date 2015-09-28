<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="users.php">User</a></li>
			<li class="active">Add User</li>
		</ol>

		<div class="panel panel-info">
		  <div class="panel-heading">
			<h3><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> User</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<?php 
			$user = new user();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_user'])) {
				// Update old record
				if (isset($ID)) {
					$results = $user->update_user($_POST, $ID);
				}else{ // Insert new
					$results = $user->add_user($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success alert-block fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Add Staff Member</strong> Sucessfully
					</div>';
				}else{
					echo '<div class="alert alert-danger alert-block fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Error</strong>
					</div>';
				}
			} 

			if (isset($ID)) {
				$user_result = $user->get_user($ID);
			}
			?>
		
			<div class="the-box noborder">
				<form id="ExampleBootstrapValidationForm" method="post" action="" class="form-horizontal" enctype="multipart/form-data">
					<fieldset>
						<legend>User Detail:</legend>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-4">
								<input type="text" name="fname" id="fname" value="<?php echo (isset($ID))? $user_result->fname : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-4">
								<input type="text" name="lname" id="lname" value="<?php echo (isset($ID))? $user_result->lname : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-4">
								<input type="email" name="email" id="email" value="<?php echo (isset($ID))? $user_result->email : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-4">
								<input type="text" name="username" id="username" value="<?php echo (isset($ID))? $user_result->login : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-4">
								<input type="password" name="password" id="password" value="<?php echo (isset($ID))? $user_result->password : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Mobile No</label>
							<div class="col-sm-4">
								<input type="text" name="mobile" id="mobile" value="<?php echo (isset($ID))? $user_result->mobile : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Phone No</label>
							<div class="col-sm-4">
								<input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $user_result->phone : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Address</label>
							<div class="col-sm-4">
								<input type="text" name="address" id="address" value="<?php echo (isset($ID))? $user_result->address : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">City</label>
							<div class="col-sm-4">
								<input type="text" name="city" id="city" value="<?php echo (isset($ID))? $user_result->city : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Country</label>
							<div class="col-sm-4">
								<input type="text" name="country" id="country" value="<?php echo (isset($ID))? $user_result->country : '' ?>" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">NIC</label>
							<div class="col-sm-4">
								<input type="text" name="nic" id="nic" value="<?php echo (isset($ID))? $user_result->nic : '' ?>" class="form-control" required>
							</div>
							<label class="col-sm-2 control-label">Date of Birth</label>
							<div class="col-sm-4">
								<input type="date" name="dob" id="dob" value="<?php echo (isset($ID))? $user_result->dob : '' ?>" class="form-control dateTime" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Photo</label>
							<div class="col-sm-4">
								<?php 
								if(isset($ID)){
									if($user_result->photo){ ?>
										<div class="profilePic">
											<span>
												<?php echo '<img src="uploads/'.$user_result->photo.'" class="img-responsive thumbnail" alt="">'; ?>
												<a id="removeProfilePic"><i class="fa fa-times icon-circle icon-xs icon-danger"></i></a>
											</span>
											<input type="hidden" name="photo1" value="<?php echo $user_result->photo; ?>">
										</div>
										<div class="input-group" id="showNewPicSubmit" style="display:none;">
											<input type="text" class="form-control" name="photo" id="photo" readonly>
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													Browse&hellip; <input type="file" name="photo">
												</span>
											</span>
										</div><!-- /.input-group -->
									<?php
									}
									else { ?>
										<div class="input-group">
											<input type="text" class="form-control" name="photo" id="photo" readonly>
											<span class="input-group-btn">
												<span class="btn btn-default btn-file">
													Browse&hellip; <input type="file" name="photo">
												</span>
											</span>
										</div><!-- /.input-group -->
									<?php
									}
								} else { ?>
									<div class="input-group">
										<input type="text" class="form-control" name="photo" id="photo" readonly>
										<span class="input-group-btn">
											<span class="btn btn-default btn-file">
												Browse&hellip; <input type="file" name="photo">
											</span>
										</span>
									</div><!-- /.input-group -->
								<?php
								}
								?>
							</div>
							<label class="col-sm-2 control-label">Designation</label>
							<div class="col-sm-4">
								<select name="designation" id="designation" class="form-control" required>
							<?php 
							foreach($designations as $designation=>$value){
								?>
									<option value="<?php echo $designation; ?>" <?php (isset($ID))? $des = $user_result->designation : ''; if(isset($ID)){if($designation == $des){echo 'selected=selected';}}?>><?php echo $value; ?></option>
								<?php
							}
							?>
						</select>
							</div>
						</div>				
					</fieldset>

					<fieldset>
						<legend>Permission Allow</legend>

						<div class="form-group">
							<div class="col-sm-12">
								<?php 
								foreach($capabilities as $capability=>$value){
									?>
										<?php
										if(isset($ID)){
											$user_capabilities = $user_result->capabilities;
											$user_capabilities = (!empty($user_capabilities))? json_decode($user_capabilities) : array();
										}
										?>
										<div class="checkbox col-sm-4">
											<label>
												<input type="checkbox" <?php echo (isset($ID) && in_array($capability, $user_capabilities))? 'checked' : ''; ?> name="capabilities[]" value="<?php echo $capability; ?>">
												<?php echo $value; ?>
											</label>
										</div>
								<?php
								}
								?>	
							</div>
						</div>
					</fieldset>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-success btn-perspective btn-lg" name="add_user"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Staff Member</button>
						</div>
					</div>
				</form>
			</div><!-- /.the-box -->
		</div>		</div>
	</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>