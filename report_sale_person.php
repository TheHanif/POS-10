<?php require_once 'header.php'; ?>


<section>
	<hr/>
	<div class="container">
		<div class="row">
			<?php 
			$sales = new sales();

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

				$results = $sales->get_sale_person_report($person_name, $date);
				//print_f($results);
			}
			?>			
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Sale Person Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="" method="post">
			<div class="col-md-4">	
				<div class="form-group">
					<label for="p_cost" class="col-sm-12">Date: </label>
					<div class="col-sm-12">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input3" name="to_date" value="<?php echo (isset($_POST['to_date']))? $_POST['to_date'] : '' ?>" /><br/>
					</div>
				</div>
			</div><!-- Col-md-3 Close -->

			<div class="col-md-4">	
				<div class="form-group">
					<label for="person_name" class="col-sm-12">Sale Person: </label>
					<?php 	$user = new user();
							$all_user = $user->get_sales_user(); 
					?>
					<div class="col-sm-12">
						<select name="person_name" data-placeholder="Select Sale Person" class="chosen-select" tabindex="4">
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
			?>
			<div class="col-md-12"><h3>Opening Balance: <?php echo $opening_balance = $results[0]->ob_balance;?></h3></div>
			<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
				<tr>
					<th>No.</th>
					<th>Sale ID</th>
					<th>Shift Number</th>
					<th>Terminal Number</th>
					<th>Bill Number</th>
					<th>Payment Method</th>
					<th>Bill Amount</th>
					<th>Date</th>
				</tr>
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
					<td><?php echo $value->salepro_date; ?></td>
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
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Opening Balance: </td>
					<td><?php echo $opening_balance; ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Final Received Amount:</td>
					<td><?php echo $total_daily_sale+$opening_balance; ?></td>
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