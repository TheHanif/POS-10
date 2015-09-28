<?php require_once 'header.php'; ?>

<div class="page-content">
				<div class="container-fluid">

					<!-- Begin breadcrumb -->
					<ol class="breadcrumb success rsaquo">
						<li><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
						<li class="active">Users</li>
					</ol>
					<!-- End breadcrumb -->
					<div class="row">
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="view_user.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-users icon-xl"></i>
										<h1 class="bolded less-distance">Manage</h1>
										<h4>All Users</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="add_user.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-plus-square icon-xl"></i>
										<h1 class="bolded less-distance">Add New</h1>
										<h4>User</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="the-box no-border full text-center">
								<a href="report_sale_person.php">
									<div class="the-box no-border bg-primary no-margin">
										<i class="fa fa-bar-chart-o icon-xl"></i>
										<h1 class="bolded less-distance">Report</h1>
										<h4>Sales Person</h4>
									</div><!-- /.the-box no-border bg-warning no-margin -->
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix marginBottom"></div>

					<div class="panel panel-info">
					  <div class="panel-body">
					  	<h1 class="bolded noMarginTop text-primary">Sale Person Report</h1>
					  	<!-- BEGIN DATA TABLE -->
					  	<div class="the-box bg-primary no-border">
					  		<form class="form-horizontal dashboardForm"  action="" method="post">
								<div class="col-md-4">	
									<div class="form-group noMarginBottom">
										<label for="p_cost" class="col-sm-12">Date: </label>
										<div class="col-sm-12">
											<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
							                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
							                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
							                </div>
											<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
										</div>
									</div>
								</div><!-- Col-md-3 Close -->

								<div class="col-md-4">	
									<div class="form-group noMarginBottom">
										<label for="person_name" class="col-sm-12">Sale Person: </label>
										<?php 	$user = new user();
												$all_user = $user->get_sales_user(); 
										?>
										<div class="col-sm-12">
											<select name="person_name" data-placeholder="Select Sale Person" class="chosen-select form-control" tabindex="4">
												<option value=""></option>
												<?php 
												foreach($all_user as $user){ ?>					
														<option value="<?php echo $user->id; ?>"<?php if(isset($_POST['person_name'] ) && $_POST['person_name'] == $user->id){echo 'selected=selected';}?>><?php echo $user->fname; ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
								</div><!-- Col-md-3 Close -->
								
								<div class="col-md-4">
									<div class="form-group noMarginBottom">
										<label for="p_supplier" class="col-sm-12">&nbsp;</label>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-success btn-perspective pull-right" name="show_report">Show Report</button>
										</div>
								  	</div>
								</div>
								</form>
							<div class="clearfix"></div>
						</div><!-- Box Close -->

						<div class="the-box">
							<?php 
								$sales = new sales();
								$openingbalance = new openingbalance();

								if (isset($_POST['show_report'])) {	
									
									if($_POST['person_name']){
										$person_name = $_POST['person_name'];	
									} else {
										$person_name = NULL;
									}

									if($_POST['to_date']){
										$date = $_POST['to_date'];
										$date = $sales->_date('Y-m-d H:i:s', $date);	
									} else {
										$date = NULL;
									}

									$balance_date = $sales->_date('Y-m-d', $date);
									$results = $sales->get_sale_person_report($person_name, $date);
									$results_balance = $openingbalance->get_opening_date_balance($person_name, $balance_date);
									// print_f($results_balance);
								}
								?>	
						
							<!-- Begin page heading -->
							

							<div class="the-box full no-border">
								<div class="table-responsive">
									<?php 
								if (isset($results)) { 
								// print_f($results);
								?>
								<table class="table table-th-block table-primary">
									<thead>
										<th>No.</th>
										<th>Sale ID</th>
										<th>Shift Number</th>
										<th>Terminal Number</th>
										<th>Bill Number</th>
										<th>Payment Method</th>
										<th>Bill Amount</th>
										<th>Date</th>
									</thead>
									<tbody>
										<?php 
										$count = 1;
										$total = 0;
										$total_daily_sale = 0;
					        			foreach ($results as $key => $value){ ?>
									<tr>
										<td><?php echo $count; ?></td>
										<td><?php echo $value->sale_id; ?></td>
										<td><?php echo $value->sale_shift_number; ?></td>
										<td><?php echo $value->sale_terminal_number; ?></td>
										<td><?php echo $value->sale_bill_number; ?></td>
										<td><?php echo $value->sale_payment; ?></td>
										<td><?php echo $total = $value->bill_amount; ?></td>
										<td><?php echo $sales->_date('d-m-Y', $value->salepro_date )?></td>
									</tr>
										<?php
										$count++;
										$total_daily_sale += $total;
										}
										?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>Sub Total Bill Amount:</td>
										<td><?php echo $total_daily_sale; ?></td>
										<td></td>
									</tr>
									<?php 
									if(isset($results_balance[0]->ob_balance)){
									?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>Opening Balance: </td>
										<td><?php echo $results_balance[0]->ob_balance; ?></td>
										<td></td>
									</tr>
									<?php 
									}
									?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>Final Received Amount:</td>
										<?php 
											if(isset($results_balance[0]->ob_balance)){
										?>
										<td><?php echo $total_daily_sale+$results_balance[0]->ob_balance; ?></td>
										<?php 
											}
											else {
										?>
										<td><?php echo $total_daily_sale; ?></td>
										<?php
											}
										?>
										<td></td>
									</tr>
									</tbody>
								</table>
								<?php }
								?>
								</div><!-- /.table-responsive -->
							</div>	
						</div><!-- /.the-box .default -->
						<!-- END DATA TABLE -->
					  </div><!-- /.panel-body -->
					  
					</div>
					
					

				</div><!-- /.container-fluid -->
<?php require_once 'footer.php'; ?>