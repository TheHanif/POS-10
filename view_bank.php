<?php require_once 'header.php'; ?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container-fluid">
		<!-- Begin breadcrumb -->
		<ol class="breadcrumb success rsaquo">
			<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
			<li><a href="banks.php">Bank</a></li>
			<li class="active">View Bank</li>
		</ol>
		<!-- End breadcrumb -->
		
		<div class="panel panel-info">
		  <div class="panel-heading">
		  	<div class="right-content">
				<a href="add_bank.php"><button class="btn btn-success btn-perspective btn-lg pull-right">ADD BANK / BRANCH</button></a>
			</div>
		  	<h3>Bank</h3>
		  </div>
		  <div class="panel-body">
			<!-- BEGIN DATA TABLE -->
			<div class="the-box">
				<div class="table-responsive">
					<?php 
					$bank = new bank();
					$results = $bank->get_banks();
					if ($results) {
					?>
					<table class="table table-striped table-hover" id="datatable-example">
						<thead class="the-box dark full">
							<tr>
								<th>Bank Name</th>
								<th>Branch</th>
								<th>Account #</th>
								<th>Account Title</th>
								<th>Account Type</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($results as $res){
							echo '<tr>';
							echo '<td>'. $res->bank_name .'</td>';
							echo '<td><a href="add_bank.php?id='.$res->bank_id.'">'. $res->bank_branch.'</a></td>';
							echo '<td>'. $res->bank_account_no .'</td>';
							echo '<td>'. $res->bank_account_title .'</td>';
							echo '<td>'. $res->bank_account_type .'</td>';
							echo '</tr>';
							}
							?>
						</tbody>
					</table>
					<?php
					}else{
						echo '<div class="alert alert-danger" role="alert"> No Bank Available. </div>';
					} 
					?>
				</div><!-- /.table-responsive -->
			</div><!-- /.the-box .default -->
			<!-- END DATA TABLE -->
		  </div><!-- /.panel-body -->
	</div><!-- /.container-fluid -->
</div>
<?php require_once 'footer.php'; ?>