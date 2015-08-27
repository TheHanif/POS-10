<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<p>Copyright 2015 </p>
			</div>

			<div class="col-md-4">
				<p>email: info@webnet.com.pk</p>
			</div>

			<div class="col-md-4 ">
				<img src="assets/images/powered_logo.png" class="img-responsive marginauto flogo" />
			</div>
		</div>
	</div>
</footer>
	<!--Attched Bootstrap JS  -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.js"></script>



	<script type="text/javascript">
		/*function addRow1() {
				var div = document.createElement('div');
			
				div.className = 'row';
				div.innerHTML = '<div class="col-sm-12 row-el">\
									<div class="add-div form-group">\
										<label for="min_purchase" class="col-md-1 control-label">Product: </label>\
										<span class="col-md-4">\
											<select name="offer[product_id][]">'+<?php foreach($all_product as $product) { ?>'<option value="<?php echo $product->p_id; ?>"><?php echo $product->p_name; ?></option>'+<?php } ?>
											'</select>\
										</span>\
										<label for="min_purchase" class="col-md-1 col-md-offset-1 control-label">Quantity: </label>\
										<span class="col-md-4">\
											<input type="text" name="offer[qty][]" value="" class="form-control" required>\
										</span>\
										<span class="col-md-1">\
											  <input type="button" class="btn minus-btn">\
										</span>\
									</div>';
					
				
			
				 document.getElementById('content1').appendChild(div);
			} */
		$(document).ready(function(){
			// Minus Button function for Offer Page
 		/*	$("#content1").on('click', '.minus-btn', function() {
 				$(this).parents('.row-el').parent('.row').remove();
 			});
*/
 			// Type Calender
 			$('.form_date').datetimepicker({
		        weekStart: 1,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		    });
 		});
	</script>
</body>
</html>