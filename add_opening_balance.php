<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"><?php echo (isset($_GET['id']))? 'Update' : 'Add' ?> Supplier</p>
			</div>
			
			<?php 
			$supplier = new supplier();

			$ID = (isset($_GET['id']))? $_GET['id'] : NULL;

			if (isset($_POST['add_supplier'])) {
				// Update old record
				if (isset($ID)) {
					$results = $supplier->update_supplier($_POST, $ID);
				}else{ // Insert new
					$results = $supplier->add_supplier($_POST);
				}

				if ($results) {
					echo '<div class="alert alert-success" role="alert"> Add Supplier Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			} 

			if (isset($ID)) {
				$supplier_result = $supplier->get_supplier($ID);
			}
			?>

			<form class="form-horizontal dashboardForm" action="" method="post">
				<div class="col-md-6">	
					<div class="form-group">
						<label for="sname" class="col-sm-3 control-label">Supplier Name: </label>
						<div class="col-sm-8">
							<input type="text" name="sname" id="sname" value="<?php echo (isset($ID))? $supplier_result->sup_name : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="col-sm-3 control-label">Phone No: </label>
						<div class="col-sm-8">
							<input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $supplier_result->sup_phone : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-3 control-label">City: </label>
						<div class="col-sm-8">
							<input type="text" name="city" id="city" value="<?php echo (isset($ID))? $supplier_result->sup_city : '' ?>" class="form-control" required>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="col-md-6">	
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email: </label>
						<div class="col-sm-8">
							<input type="email" name="email" id="email" value="<?php echo (isset($ID))? $supplier_result->sup_email : '' ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-3 control-label">Address: </label>
						<div class="col-sm-8">
							<input type="text" name="address" id="address" value="<?php echo (isset($ID))? $supplier_result->sup_address : '' ?>" class="form-control" required>
						</div>
					</div>
				</div><!-- Col-md-6 Close -->
				<div class="clear"></div>
				<div class="col-md-6">	
					<div class="form-group">
						<label for="photo" class="col-sm-3 control-label"></label>
						<div class="col-sm-8">
							<button type="submit" class="btn submitBtn" name="add_supplier"><?php echo (isset($ID))? 'Update' : 'Add' ?> Supplier</button>
						</div>
				  	</div>
				</div><!-- Col-md-6 Close -->
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>



<!--
<h2>Add User</h2>
<form action="" method="post">
	<label for="fname">First Name <input type="text" name="fname" id="fname" value="<?php echo (isset($ID))? $user_result->fname : '' ?>" required></label> <br>
	<label for="lname">Last Name <input type="text" name="lname" id="lname" value="<?php echo (isset($ID))? $user_result->lname : '' ?>" required></label> <br>
	<label for="email">Email <input type="email" name="email" id="email" value="<?php echo (isset($ID))? $user_result->email : '' ?>" required></label> <br>
	<label for="username">Username <input type="text" name="username" id="username" value="<?php echo (isset($ID))? $user_result->login : '' ?>" required></label> <br>
	<label for="password">Password <input type="password" name="password" id="password" value="<?php echo (isset($ID))? $user_result->password : '' ?>" required></label> <br>
	<label for="mobile">Mobile <input type="text" name="mobile" id="mobile" value="<?php echo (isset($ID))? $user_result->mobile : '' ?>" required></label> <br>
	<label for="phone">Phone <input type="text" name="phone" id="phone" value="<?php echo (isset($ID))? $user_result->phone : '' ?>" required></label> <br>
	<label for="address">Address <input type="text" name="address" id="address" value="<?php echo (isset($ID))? $user_result->address : '' ?>" required></label> <br>
	<label for="city">City <input type="text" name="city" id="city" value="<?php echo (isset($ID))? $user_result->city : '' ?>" required></label> <br>
	<label for="country">Country <input type="text" name="country" id="country" value="<?php echo (isset($ID))? $user_result->country : '' ?>" required></label> <br>
	<label for="nic">NIC <input type="text" name="nic" id="nic" value="<?php echo (isset($ID))? $user_result->nic : '' ?>" required></label> <br>
	<label for="dob">Date of Birth <input type="date" name="dob" id="dob" value="<?php echo (isset($ID))? $user_result->dob : '' ?>" required></label> <br>
	<label for="photo">Photo <input type="file" name="photo" id="photo"></label> <br>
	<label for="designation">Designation 
		<select name="designation" id="designation" required>
			<?php 
			foreach($designation as $designation=>$value){
				?>
					<option value="<?php echo $designation; ?>" <?php (isset($ID))? $des = $user_result->designation : ''; if(isset($ID)){if($designation == $des){echo 'selected=selected';}}?>><?php echo $value; ?></option>
				<?php
			}
			?>
		</select>
	</label> <br>
	<label for="permission">Permission Allow</label> <br>
	<?php 
	foreach($capabilities as $capability=>$value){
		?>
			<?php
			if(isset($ID)){
				$user_capabilities = $user_result->capabilities;
				$user_capabilities = (!empty($user_capabilities))? json_decode($user_capabilities) : array();
			}

				?>
				<label><input type="checkbox" <?php echo (isset($ID) && in_array($capability, $user_capabilities))? 'checked' : ''; ?> name="capabilities[]" value="<?php echo $capability; ?>"><?php echo $value; ?></label><br/>
		<?php
		}
	?>
	<input type="submit" name="add_user" value="Add User">
</form>
-->
<?php require_once 'footer.php'; ?>