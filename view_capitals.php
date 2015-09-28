<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="accounts.php">Accounts</a></li>
			<li class="active">View Capital</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
		  	<div class="right-content">
				<a href="add_capitals.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD CAPITAL</button></a>
			</div>
		  	<h3>Capital</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
					$accounts = new accounts();
					$results = $accounts->get_capital();
					if ($results) {
					?>
					<table class="table table-striped table-hover" id="datatable-example">
						<thead class="the-box dark full">
							<tr>
								<th>Capital Name</th>
								<th>Assets Amount</th>
								<th>Assets Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($results as $res){
							echo '<tr>';
							echo '<td>'. $res->capital_name .'</td>';
							echo '<td>'. $res->capital_amount.'</td>';
							echo '<td>'. $res->capital_date .'</td>';
							echo '<td class="alignCenter"><a href="add_capitals.php?id='.$res->capital_id.'" class="btn btn-info active">Edit</a></td>';
							echo '</tr>';
							}
							?>
						</tbody>
					</table>
					<?php
					}else{
						echo '<div class="alert alert-danger" role="alert"> No Capital Available. </div>';
					} 
					?>
				</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>