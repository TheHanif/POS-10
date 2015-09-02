<?php require_once 'header.php'; ?>
<?php 
			$accounts = new accounts();

			$product = new product();
			$all_product = $product->get_product();
			?>

<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter"> Sales Report </p>
			</div>
			<form class="form-horizontal dashboardForm"  action="report_sales.php?from_date=$from_date&to_date=$to_date&product_id=$product_id" method="get">
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_cost" class="col-sm-3 control-label">Start date: </label>
					<div class="col-sm-8">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input3" name="to_date" value="" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_name" class="col-sm-3 control-label">End Date: </label>
					<div class="col-sm-8">
						<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
		                    <input class="form-control" size="16" type="text" value="">
		                    <span class="input-group-addon" style="padding: 6px 10px 6px 30px;"><span class="glyphicon glyphicon-calendar"></span></span>
		                </div>
						<input type="hidden" id="dtp_input2" name="from_date" value="" /><br/>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-6">	
				<div class="form-group">
					<label for="p_supplier" class="col-sm-3 control-label">Product Name: </label>
					<div class="col-sm-8" style="margin-top:7px;">
						<select name="product_name">
							<option value="">Select Product</option>
							<?php 
							foreach($all_product as $product){ ?>					
									<option value="<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div><!-- Col-md-6 Close -->
			<div class="clear"></div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
					<div class="col-sm-8">
						<button type="submit" class="btn submitBtn" name="show_report">Show Report</button>
					</div>
			  	</div>
			</div>
			</form>
		</div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>