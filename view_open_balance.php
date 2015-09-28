<?php require_once 'header.php'; ?>
<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li><a href="view_open_balance.php">Opening Balance</a></li>
						<li class="active">View Opening Balance</li>
					</ol>
					<!-- End breadcrumb -->

					<div class="panel panel-info">
					  <div class="panel-heading">
						<div class="right-content">
							<a href="add_opening_balance.php" class="btn btn-success btn-perspective btn-lg pull-right"><i class="fa fa-plus"></i>ADD NEW OPENING BALANCE</a>
						</div>
						<h3>View Opening Balance</h3>
					  </div>
					  <div class="panel-body">
						<!-- BEGIN DATA TABLE -->
						<div class="the-box">
							<div class="table-responsive">
							<?php 
							$openingbalance = new openingbalance();
							$results = $openingbalance->get_opening_balance();
							if ($results) {
							?>
							<table class="table table-striped table-hover" id="datatable-example">
								<thead class="the-box dark full">
									<tr>
										<th>User Name</th>
										<th>Amount</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach($results as $res){
									echo '<tr>';
									echo '<td>'. $res->fname .' '.$res->lname.'</td>';
									echo '<td>'. $res->ob_balance.'</td>';
									echo '<td>'. $res->ob_date .'</td>';
									echo '<td class="alignCenter"><a href="add_opening_balance.php?id='.$res->ob_id.'" class="btn btn-default">Edit</a></td>';
									echo '</tr>';
									}
									?>
								</tbody>
							</table>
							<?php
							}else{
								echo 'No Opening Balance Available';
							} 
							?>
							</div><!-- /.table-responsive -->
						</div><!-- /.the-box .default -->
						<!-- END DATA TABLE -->
					  </div><!-- /.panel-body -->
					  
					</div>
				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>