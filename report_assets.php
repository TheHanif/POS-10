<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$accounts = new accounts();

			if (isset($_POST['show_report'])) {	
				$to_date = $_POST['to_date'];
				$from_date = $_POST['from_date'];
				$assets_type = $_POST['assets_type'];

				if($_POST['assets_type']){
					$assets_type = $_POST['assets_type'];	
				} else {
					$assets_type = NULL;
				}

				if($_POST['to_date']){
				$to_date = $_POST['to_date'];
				$to_date = $accounts->_date('Y-m-d H:i:s', $to_date);	
				} else {
					$to_date = NULL;
				}

				if($_POST['from_date']){
					$from_date = $_POST['from_date'];
					$from_date = $accounts->_date('Y-m-d H:i:s', $from_date);
				} else {
					$from_date = NULL;	
				}
				// $results = $accounts->get_sales_report($assets_type, $to_date, $from_date);
				$results = $accounts->get_assets_report($assets_type, $to_date, $from_date);
				//print_f($results);
			}
			?>			
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Assets Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_cost" class="col-sm-12">Start date: </label>
					<div class="col-sm-12">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_name" class="col-sm-12">End Date: </label>
					<div class="col-sm-12">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input2" name="from_date" value="<?php echo (isset($_POST['from_date']))? $_POST['from_date'] : '' ?>" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">	
				<div class="form-group">
					<label for="p_supplier" class="col-sm-12">Assets Type: </label>
					<div class="col-sm-12">
						<select name="assets_type">
							<option value="">Select Assets Type</option>
							<optgroup label="Current Assets">
								<?php foreach ($current_assets as $key => $value) { ?>
									<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
								<?php
								} 
								?>
							</optgroup>
							<optgroup label="Fixed Assets">
								<?php foreach ($fixed_assets as $key => $value) { ?>
									<option value="<?php echo $key; ?>" <?php if(isset($ID) && $key == $assets_result[0]->assets_type){echo 'selected=selected';}?>><?php echo $value; ?></option>
								<?php
								} 
								?>
							</optgroup>
						</select>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="col-md-3">
				<div class="form-group">
					<label for="p_supplier" class="col-sm-12">&nbsp;</label>
					<div class="col-sm-12">
						<button type="submit" class="btn submitBtn floatRight" name="show_report">Show Report</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
	
	<div class="container" style="margin-bottom:50px; text-align:center;">
		<div class="row">
			<?php 
			if (isset($results)) { 
			// print_f($results);
			?>
			<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
				<tr>
					<th>No.</th>
					<th>Assets Type</th>
					<th>Assets Detail</th>
					<th>Assets Amount</th>
					<th>Assets Date</th>
				</tr>
					<?php 
					$count = 1;
        			$sub_total = 0;
					foreach ($results as $key => $value){ ?>
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $value->assets_type; ?></td>
					<td><?php echo $value->assets_detail; ?></td>
					<td><?php echo $total = $value->assets_amount; ?></td>
					<td><?php echo $accounts->_date($format = 'd-m-Y', $value->assets_timestamp); ?></td>
				</tr>
					<?php
					$count++;
        			$sub_total += $total;
					}
					?>
				<tr>
					<td colspan="3" style="text-align:right;"><strong>Total Sales: </strong></td>
					<td><strong><?php echo $sub_total; ?></strong></td>
					<td></td>
				</tr>
			</table>
			<?php }
			?>
		</div>
	</div>
	<div class="clear"></div>
</section>
<?php require_once 'footer.php'; ?>