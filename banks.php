<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Banks</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="view_bank.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-building-o icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Banks Account</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_bank.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>Bank Account</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_transection.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-file-text-o icon-xl"></i>
										<h1 class="bolded less-distance">Add</h1>
										<h4>Bank Transection</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Manage All Bank Accounts</h1>
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
					  
					</div>
					
					

				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>