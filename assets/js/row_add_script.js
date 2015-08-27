// JavaScript Document
		jQuery(document).ready(function(){
		document.getElementById("uploadBtn").onchange = function () {
			};
		});
		
		/* -Add Row1 Function */
			function addRow1() {
				alert('Faizan');
				var div = document.createElement('div');
			
				div.className = 'row';
				div.innerHTML = '<div class="col-sm-12 ">\
									<div class="add-div">\
										<label for="min_purchase" class="col-md-1 control-label">Product: </label>\
										<span class="col-md-4">\
											<select name="product_id[]" id="product_id">'+
											<?php foreach($all_product as $product) { ?>'<option value="<?php echo $product->p_id; ?>">1</option>'+<?php } ?>
											'</select>\
										</span>\
										<label for="min_purchase" class="col-md-1 col-md-offset-1 control-label">Quantity: </label>\
										<span class="col-md-4">\
											<input type="text" name="min_purchase[]" value="" class="form-control" required>\
										</span>\
										<span class="col-md-1">\
											  <input type="button" class="btn add-btn" value="" onclick="addRow1()">\
										</span>\
									</div>';
					
				
			
				 document.getElementById('content1').appendChild(div);
			}