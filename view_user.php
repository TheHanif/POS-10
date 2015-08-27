<?php require_once 'header.php'; ?>
<section>
	<hr/>
	<div class="container">
		<div class="row">
			<div class="tableHeading">
				<p class="nomargin alignCenter">View User</p>
			</div>
			<div class="col-md-12">	
				<?php 
				$user = new user();
				$results = $user->get_users();
				if ($results) {
				?>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-hover tableView">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Designation</th>
						<th>Mobile</th>
						<th>Action</th>
					</tr>
						<?php 
						foreach($results as $res){
						$designation = $res->designation;
						echo '<tr>';
						echo '<td>'. $res->fname .'</td>';
						echo '<td>'. $res->lname .'</td>';
						echo '<td>'. $res->login .'</td>';
						echo '<td>'. $res->email.'</td>';
						echo '<td style="text-transform: capitalize;">'. str_replace("_"," ","$designation") .'</td>';
						echo '<td>'. $res->mobile .'</td>';
						echo '<td class="alignCenter"><a href="add_user.php?id='.$res->id.'"><span class="glyphicon glyphicon-pencil"></span></a></td>';
						echo '</tr>';
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