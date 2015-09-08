<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<?php 
	$dashboard = new dashboard();

	$sale_monthly_report = $dashboard->get_sale_monthly_report();
	$sale_user_report = $dashboard->get_sale_user_report();
	$sale_profit_loss = $dashboard->get_profitloss_report();
	$latest_sale = $dashboard->get_latest_sale_person();
	//print_f($latest_sale);
	?>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">Dashboard</p>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Mothly Sale</div>
				  <div class="panel-body">
				  	<div style="width: 100%">
						<canvas id="canvas"></canvas>
					</div>
					<script>
					var barChartData = {
						labels : [<?php foreach ($sale_monthly_report as $key => $value) {
							echo '"'.$dashboard->_date($format = 'F', $value->salepro_datetime).'",';
						}?>],
						datasets : [
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,0.8)",
								highlightFill : "rgba(151,187,205,0.75)",
								highlightStroke : "rgba(151,187,205,1)",
								data: [<?php foreach ($sale_monthly_report as $key => $value) {
							echo $value->bill_amount.',';
						}?>]
							}
						]
					}
					</script>
				  </div>
				</div><!-- Panel Close -->
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Mothly Profit &amp; Loss</div>
				  <div class="panel-body">
				  	<div style="width: 100%">
						<canvas id="canvas-profit"></canvas>
					</div>
					<script>
					var lineChartData = {
						labels : [<?php foreach ($sale_profit_loss as $key => $value) {
							echo '"'.$dashboard->_date($format = 'F', $value->pl_date).'",';
						}?>],
						datasets : [
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								pointColor : "rgba(151,187,205,1)",
								pointStrokeColor : "#fff",
								pointHighlightFill : "#fff",
								pointHighlightStroke : "rgba(151,187,205,1)",
								data: [<?php foreach ($sale_profit_loss as $key => $value) {
							echo $value->profit_product_amount.',';
						}?>]
							}
						]

					}
					</script>
				  </div>
				</div><!-- Panel Close -->
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Sale Person Report</div>
				  <div class="panel-body">
				  	<div style="width: 100%">
						<div id="canvas-holder">
							<canvas id="chart-area" width="260" height="260"/></canvas>
							<div class="userChart">
								<ul>
									<?php 
									$chartColor = array('#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360');
									$count = 1;
									foreach ($sale_user_report as $key => $value) {
										echo '<li><span style="background-color:'.$chartColor[$count].';"></span>'. $value->fname .' '.$value->lname .'</li>';
									$count++;
									} ?>
								</ul>
							</div>
						</div>
					</div>
					
					<script>
					var pieData = [
							<?php 
					$counter = 1;
					foreach ($sale_user_report as $key => $value) {
						echo '{
								value: '.$value->bill_amount.',
								color: "'.$chartColor[$counter].'",
								highlight: "'.$chartColor[$counter].'",
								label: "'.$value->fname .' '. $value->lname.'"
							},';
					$counter++;
					} ?>
						];

						/* Chart Load Dashboard */
						window.onload = function(){
							var ctx1 = document.getElementById("chart-area").getContext("2d");
							window.myPie = new Chart(ctx1).Pie(pieData);

							var ctx = document.getElementById("canvas").getContext("2d");
							window.myBar = new Chart(ctx).Bar(barChartData, {
								responsive : true
							});

							var ctx = document.getElementById("canvas-profit").getContext("2d");
							window.myLine = new Chart(ctx).Line(lineChartData, {
								responsive: true
							});
						};
					</script>
				  </div>
				</div><!-- Panel Close -->
			</div>


			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">Latest Bill Generate</div>
				  <div class="panel-body">
				  	<table class="table table-hover" style="margin-bottom: 5px;">
				      <thead>
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
				          <td class="alignCenter"><?php echo $value->sale_bill_number; ?></td>
				          <td class="alignRight"><?php echo $currency. number_format($value->bill_amount, 2, '.', ''); ?></td>
				        </tr>
				        <?php 
				        	$count++;
				      		} 
				      	?>
				      </tbody>
				    </table>
				  </div>
				</div><!-- Panel Close -->
			</div>

		<div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>