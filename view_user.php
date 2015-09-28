<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="users.php">Users</a></li>
			<li class="active">Manage Users</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
			<div class="right-content">
				<a href="add_user.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD NEW USER</button></a>
			</div>
			<h3>Manage Users</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
					$user = new user();
					$results = $user->get_users();
					if ($results) {
					?>
					<table class="table table-striped table-hover" id="datatable-example">
						<thead class="the-box dark full">
							<tr>
								<th>Full Name</th>
								<th>User Name</th>
								<th>Email</th>
								<th>Designation</th>
								<th>Mobile</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($results as $res){
							$designation = $res->designation;
							echo '<tr>';
							echo '<td><a href="add_user.php?id='.$res->id.'">'. $res->fname .' '.$res->lname .'</a></td>';
							echo '<td>'. $res->login .'</td>';
							echo '<td>'. $res->email.'</td>';
							echo '<td style="text-transform: capitalize;"><span class="label label-success">'. str_replace("_"," ","$designation") .'</span></td>';
							echo '<td>'. $res->mobile .'</td>';
							echo '</tr>';
							}
							?>
						</tbody>
					</table>
					<?php
					}else{
						echo 'No User Available';
					} 
					?>
					</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>