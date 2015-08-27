<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View Offers</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$offer = new offer();
				$results = $offer->get_products();
				if ($results) {
				?>
				<table border="1" cellpadding="5" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>Name</th>
						<th>Min Purchase</th>
						<th>Offer Status</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){ ?>
						<tr>
						<td><?php echo $res->p_name; ?></td>
						<td><?php echo $res->discount_min_purchase_qty; ?></td>
						<td>
							<?php 
							if($res->discount_status == '1'){
								echo 'Active';
							}
							else {
								echo 'Deactive';
							}
							?>
						</td>
						<td><a href="add_offer.php?id=<?php echo $res->discount_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr>
						<?php
						}
						?>
				</table>
				<?php
				}else{
					echo 'Error';
				} 
				?>
			</div>
		<div><!-- Row Close -->
	</div><!-- Container Close -->
</section>
<?php require_once 'footer.php'; ?>