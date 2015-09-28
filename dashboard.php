<?php require_once 'header.php'; ?>
<?php 
$dashboard = new dashboard();

$sale_monthly_report = $dashboard->get_sale_monthly_report();
$sale_user_report = $dashboard->get_sale_user_report();
$sale_profit_loss = $dashboard->get_profitloss_report();
$latest_sale = $dashboard->get_latest_sale_person();
//print_f($latest_sale);
?>
<div class="alert alert-success alert-bold-border square fade in alert-dismissable" id="alert1">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <strong>Admin</strong> Upcoming clearing cheque # 123456789<br/> Dated 25-09-2015
  <a href="#fakelink" class="alert-link">Aamir Liaquat.</a>
</div>
<div class="alert alert-info alert-bold-border square fade in alert-dismissable" id="alert2">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <strong>Product!</strong> <a href="#fakelink" class="alert-link">Pepsi 1Ltr </a> remianing quantity 5 Peace
</div>
			<!-- BEGIN PAGE CONTENT -->
			<div class="page-content">
				<div class="container-fluid">
				
				<!-- 
				<h1 class="page-heading">DASHBOARD</h1>
				-->
				
					<!-- BEGIN EXAMPLE ALERT -->
					<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <p><strong>Welcome!</strong> <?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p>
					</div>
					<!-- END EXAMPLE ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row marginBottom">
						<div class="col-sm-3">
							<div class="the-box no-border bg-success tiles-information">
								<i class="fa fa-users icon-bg"></i>
								<div class="tiles-inner text-center">
									<?php 
									$to_date = '2015-09-02 00:00:00';
									$from_date = NULL;
									$product_id = NULL;
									$accounts = new accounts();
									$results = $accounts->get_sales_report($product_id, $to_date, $from_date);
									// print_f($results);
									$total = 0;
									foreach ($results as $value) {
										$price = $value->sales_price;
										$qty = $value->sales_quantity;
										$subtotal = $price*$qty;
										$total += $subtotal;
									}
									?>
									<p>TODAY SALES</p>
									<h1 class="bolded"><?php echo $currency. $total; ?></h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-success -->
									</div><!-- /.progress .no-rounded -->
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-primary tiles-information">
								<i class="fa fa-shopping-cart icon-bg"></i>
								<div class="tiles-inner text-center">
									<?php
									$count = 0;
									foreach ($results as $value) {
										$count++;
									}
									?>
									<p>TODAY BILLS</p>
									<h1 class="bolded"><?php echo $count; ?></h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-primary -->
									</div><!-- /.progress .no-rounded -->
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-danger tiles-information">
								<i class="fa fa-comments icon-bg"></i>
								<div class="tiles-inner text-center">
									<?php
									$totalprofit = 0;
									// print_f($results);
									foreach ($results as $value) {
										$cost = $value->sales_cost;
										$price = $value->sales_price;
										$qty = $value->sales_quantity;
										$prof = $price-$cost;
										$profitsinglesale = $prof*$qty;
										$totalprofit += $profitsinglesale;
									}
									?>
									<p>TODAY PROFIT</p>
									<h1 class="bolded"><?php echo $currency. $totalprofit; ?></h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-danger -->
									</div><!-- /.progress .no-rounded -->
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
						<div class="col-sm-3">
							<div class="the-box no-border bg-warning tiles-information">
								<i class="fa fa-money icon-bg"></i>
								<div class="tiles-inner text-center">
									<?php 
									$balance_date = '2015-09-02';
									$person_name = NULL;
									$openingbalance = new openingbalance();
									$results = $openingbalance->get_opening_date_balance($person_name, $balance_date);
									// print_f($results);
									$total = 0;
									foreach ($results as $value) {
										$balance = $value->ob_balance;
										$total += $balance;
									}
									?>
									<p>TODAY OPENING BALANCE</p>
									<h1 class="bolded"><?php echo $currency. $total; ?></h1> 
									<div class="progress no-rounded progress-xs">
									  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
									  </div><!-- /.progress-bar .progress-bar-warning -->
									</div><!-- /.progress .no-rounded -->
								</div><!-- /.tiles-inner -->
							</div><!-- /.the-box no-border -->
						</div><!-- /.col-sm-3 -->
					</div><!-- /.row -->
					<!-- END SITE INFORMATIONS -->
				
					
					<div class="row">
						<div class="col-lg-8">
							<div class="panel panel-default panel-no-border panel-square">
							  <div class="panel-heading">
								<h1 class="bolded">Monthly</h1>
								<p class="text-muted">Sale Report</p>
							  </div><!-- /.panel-heading -->
								<div class="the-box no-border full no-margin">
									<div class="the-box no-border no-margin full">
										<div id="morris-widget-2" style="height: 250px;"></div>
									</div><!-- the-box no-border bg-info no-margin full -->
								</div><!-- /.the-box no-border .full -->
							</div><!-- /.the-box no-border .full -->

							<!-- BEGIN CHART WIDGET 1 -->
							<div class="panel panel-info panel-no-border panel-square">
							  <div class="panel-heading">
								<h3 class="panel-title">EARNINGS YEARLY CHART</h3>
							  </div><!-- /.panel-heading -->
								<div class="the-box no-border full no-margin">
									<div class="the-box no-border bg-info no-margin full">
										<div id="morris-widget-1" style="height: 250px;"></div>
									</div><!-- the-box no-border bg-info no-margin full -->
								</div><!-- /.the-box no-border .full -->
							</div><!-- /.the-box no-border .full -->

							
						</div><!-- /.col-sm-8 -->
						<div class="col-lg-4">
							<!-- BEGIN WEATHER WIDGET 3 -->
							<div class="the-box bg-primary no-border">
							<h4 class="small-title">ADD OPENING BALANCE</h4>
								<?php 
								$openingbalance = new openingbalance();
								if (isset($_POST['add_balance'])) {
									$results = $openingbalance->insert_open_balance($_POST);
									if ($results) {
										echo '<div class="alert alert-success alert-bold-border square fade in alert-dismissable">
											  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											  <strong>Opening Balance Add Sucessfully</strong>
											</div>';
									}else{
										echo '<div class="alert alert-danger alert-bold-border square fade in alert-dismissable">
											  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											  <strong>ERROR</strong>
											</div>';
									}
								} 
								?>
								<form id="ExampleBootstrapValidationForm" method="post" action="" >
								  <div class="form-group noMarginBottom">
									<label>Date</label>
										<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						                    <input class="form-control" size="16" type="text" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>">
						                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><i class="fa fa-calendar"></i></span>
						                </div>
										<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($ID))? $results[0]->ob_date : '' ?>" /><br/>
								  </div>
								  <div class="form-group">
									<label>Amount</label>
										<input class="form-control" name="amount" type="text" value="<?php echo (isset($ID))? $results[0]->ob_balance : '' ?>">
								  </div>
								  <div class="form-group">
									<label>Sale Person</label>
										<?php 	$user = new user();
											$all_user = $user->get_sales_user(); 
										?>
										<select data-placeholder="Select Sale Person" class="form-control chosen-select" tabindex="2" name="person_name" required>
											<option></option>
											<?php 
											foreach($all_user as $user){ ?>					
													<option value="<?php echo $user->id; ?>"<?php if(isset($ID)){if($results[0]->id == $user->id){echo 'selected=selected';}}?>><?php echo $user->fname; ?></option>
											<?php
											}
											?>
										</select>
								  </div>
								  <button type="submit" class="btn btn-primary btn-perspective btn-lg" name="add_balance"><?php echo (isset($ID))? 'Update' : 'Add' ?> Balance</button>
								</form>
							</div>
								<p></p>

							<div class="the-box bg-danger no-border">
							<h4 class="small-title">ANNOUNCEMENT</h4>
								<?php 
								if (isset($_POST['send_announcement'])) {
										echo '<div class="alert alert-success alert-bold-border square fade in alert-dismissable">
											  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											  <strong>Announcement Send Sucessfully</strong>
											</div>';
									} 
								?>
								<form id="ExampleBootstrapValidationForm" method="post" action="" >
								  <div class="form-group">
									<label>User</label>
										<?php 	$user = new user();
											$all_user = $user->get_users();
										?>
										<select data-placeholder="Select Users" class="form-control chosen-select" multiple tabindex="4" name="person_name" required>
											<option></option>
											<?php 
											foreach($all_user as $user){ ?>					
													<option value="<?php echo $user->id; ?>"<?php if(isset($ID)){if($results[0]->id == $user->id){echo 'selected=selected';}}?>><?php echo $user->fname; ?></option>
											<?php
											}
											?>
										</select>
								  </div>
								  <div class="form-group">
									<label>Message</label>
										<textarea class="form-control"></textarea>
								  </div>
								  <button type="submit" class="btn btn-danger btn-perspective btn-lg" name="send_announcement">Send</button>
								</form>
							</div>
						</div><!-- /.col-sm-4 -->
					</div><!-- /.row -->


					<div class="col-sm-12" style="padding:0px;">
						<div class="panel with-nav-tabs panel-primary">
								  <div class="panel-heading">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#panel-sale" data-toggle="tab">Latest Sales</a></li>
										<li class=""><a href="#panel-user" data-toggle="tab">Staff Member</a></li>
										<li class=""><a href="#panel-supplier" data-toggle="tab">Suppliers</a></li>
										<li class=""><a href="#panel-product" data-toggle="tab">Products</a></li>
									</ul>
								  </div>
									<div id="panel-collapse-1" class="collapse in" style="height: auto;">
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade active in" id="panel-sale">
													<div class="table-responsive">
													<table class="table table-striped table-hover" id="datatable-example">
														<thead class="the-box dark full">
															<tr>
																  <th>#</th>
														          <th>Sale Person</th>
														          <th class="alignCenter">Terminal #</th>
														          <th class="alignCenter">Bill Number</th>
														          <th>Bill Amount</th>
															</tr>
														</thead>
														<tbody>
															<?php
													      		$count = 1;
													      		foreach ($latest_sale as $key => $value) {
													      	?>
													        <tr>
													          <th scope="row"><?php echo $count; ?></th>
													          <td><?php echo $value->fname .' '. $value->lname; ?></td>
													          <td class="alignCenter"><?php echo $value->sale_terminal_number; ?></td>
													          <td><a href="report_sale_invoice.php?bill=<?php echo $value->sale_id; ?>"><?php echo $value->sale_bill_number; ?></a></td>
													          <td class="alignRight"><?php echo $currency. number_format($value->bill_amount, 2, '.', ''); ?></td>
													        </tr>
													        <?php 
													        	$count++;
													      		} 
													      	?>
														</tbody>
													</table>
													</div><!-- /.table-responsive -->
												</div>
												<div class="tab-pane fade" id="panel-user">
													<?php 
													$user = new user();
													$results = $user->get_users();
													if ($results) {
													?>
													<table class="table table-striped table-hover" id="datatable-example1">
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
												</div>
												<div class="tab-pane fade" id="panel-supplier">
													<?php 
													$supplier = new supplier();
													$results = $supplier->get_suppliers();
													if ($results) {
													?>

													<table class="table table-striped table-hover" id="datatable-example2">
														<thead class="the-box dark full">
															<tr>
																<th>Supplier Name</th>
																<th>Email</th>
																<th>Phone</th>
																<th>City</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															foreach($results as $res){
															echo '<tr>';
															echo '<td>'. $res->sup_name .'</td>';
															echo '<td>'. $res->sup_email.'</td>';
															echo '<td>'. $res->sup_phone .'</td>';
															echo '<td>'. $res->sup_city .'</td>';
															echo '<td class="alignCenter">
															<div class="btn-group">
															  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
																<i class="fa fa-cog"></i> Action <span class="caret"></span>
															  </button>
															  <ul class="dropdown-menu success" role="menu">
																<li><a href="add_supplier.php?id='.$res->sup_id.'">Edit Supplier</a></li>
																<li><a href="view_supplier_product.php?supplier_id='.$res->sup_id.'">View Products</a></li>
															  </ul>
															</div>';
															echo '</tr>';
															}
															?>
														</tbody>
													</table>
													<?php
													}else{
														echo '<div class="alert alert-danger" role="alert"> No Supplier Available. </div>';
													} 
													?>
												</div>
												<div class="tab-pane fade" id="panel-product">
													<?php 
													$product = new product();
													$results = $product->get_supplier_product();
													if ($results) {
													?>

													<table class="table table-striped table-hover" id="datatable-example3">
														<thead class="the-box dark full">
															<tr>
																<th>Product Name</th>
																<th>Product Cost</th>
																<th>Product Price</th>
																<th>Product GST</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															foreach($results as $res){
															echo '<tr>';
															echo '<td><a href="add_product.php?id='.$res->p_id.'">'. $res->p_name .'</a></td>';
															echo '<td>'. $res->p_cost .'</td>';
															echo '<td>'. $res->p_price .'</td>';
															echo '<td>'. $res->p_gst .'</td>';
															echo '</tr>';
															}
															?>
														</tbody>
													</table>
													<?php
													}else{
														echo '<div class="alert alert-danger" role="alert"> No Product Available. </div>';
													} 
													?>
												</div>
											</div><!-- /.tab-content -->
										</div><!-- /.panel-body -->
									</div><!-- /.collapse in -->
								</div>
					

					</div>
				</div><!-- /.container-fluid -->
<script>
	/** BEGIN WIDGET MORRIS JS FUNCTION **/
	$(document).ready(function(){
		if ($('#morris-widget-1').length > 0){
		Morris.Line({
		  element: 'morris-widget-1',
		  data: [
			{ y: '2011', a: 250898},
			{ y: '2012', a: 358980},
			{ y: '2013', a: 489808},
			{ y: '2014', a: 250890},
			{ y: '2015', a: 158098}
		  ],
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Sale per year'],
			resize: true,
			lineColors: ['#1F91BD'],
			pointFillColors :['#fff'],
			pointStrokeColors : ['#3EAFDB'],
			gridTextColor: ['#fff'],
			pointSize :3,
			grid: false
		}); 


		}


		if ($('#morris-widget-2').length > 0){
		//MORRIS
		Morris.Bar({
		  element: 'morris-widget-2',
		 data: [
		    { y: 'March', a: 14960, b: 16511},
			{ y: 'April', a: 39050, b: 19811},
			{ y: 'May', a: 50590, b: 5511},
			{ y: 'June', a: 44985, b: 25511},
			{ y: 'July', a: 86808, b: 35511},
			<?php foreach ($sale_monthly_report as $key => $value) {
	  		echo "{ y: '".$dashboard->_date($format = 'F', $value->salepro_datetime)."', a: ".$value->bill_amount.", b: 1000},";
		}?>
		  ],
		  xkey: 'y',
		  ykeys: ['a', 'b'],
		  labels: ['Sale', 'Profit'],
		  barColors: ['#3BAFDA', '#8CC152']
		});
		}
		if ($('#morris-donut-example').length > 0){
			Morris.Donut({
			  element: 'morris-donut-example',
			  data: [
			    {label: "Download Sales", value: 12},
			    {label: "In-Store Sales", value: 30},
			    {label: "Mail-Order Sales", value: 20}
			  ],
			  colors: ['#E9573F', '#8CC152', '#F6BB42']
			});
		}

	});
</script>
<!-- END CHART WIDGET 1 -->
<?php require_once 'footer.php'; ?>