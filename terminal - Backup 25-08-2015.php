<?php require_once 'common/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Terminal</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/tinyscrollbar.css" rel="stylesheet" >

	<script type="text/javascript" src="assets/js/jquery.latest.js"></script>
        
        <script src="assets/js/jquery.tinyscrollbar.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                var $scrollbar = $("#scrollbar1");
                $scrollbar.tinyscrollbar();
                subtotalcalc();
                $(".calculator input").prop('disabled', true);
                $calState = false;

                // Add New Product with scan
                $("#latest_product_submit").on('submit', function(event) {
                	event.preventDefault();
                	latestqty=$("#latestqty").val();
                	$.post('ajex.php', {'latestqty': latestqty, 'action': 'add'}, function(data) {
                		console.log(data);
                		$(data).appendTo('.overview').find('ul');
                		subtotalcalc(); // Refresh Subtotal Section

                		$('.product_list').each(function(index, el) {
					    	$(this).find('.product').find('div').first().text((index+1));
					    });
                	});

                	$.post('ajex.php', {'action': 'removelatestscan'}, function(data) {
				    	$("#latest_product_submit").remove();
				    	$(".calculator input").val("");
						$(".calculator input").css('background', '#ffffff');
					});
                });

                // Delete Single Item in Terminal List
            	$(".overview").on('click', '.itemDelete',function(event) {
                	event.preventDefault();
                	var $this = $(this);
                	$.get($this.attr('href'), function(data){
                		$this.parents('li').remove();
                		subtotalcalc(); // Refresh Subtotal Section

                		$('.product_list').each(function(index, el) {
					    	$(this).find('.product').find('div').first().text((index+1));
					    });

                	});
                });
            	
            	// Refresh Terminal List & Subtotal Section
                function subtotalcalc (event) {
                	//alert('Press Hit Button');
                	// Sub Total All Amount Table and save in subtotal variable
                	var subtotal = 0;
				    $('.subtotalAmt').each(function() {
				        subtotal += parseFloat($(this).val());
				    });
				    // Display Value to Sub Total Amount
				    $("#subtotalAmount").text(parseFloat(subtotal).toFixed(2));

				    // Sub Total All Discount Table and save in discount variable
				    var discount = 0;
				    $('.discounttotalAmt').each(function() {
				        discount += parseFloat($(this).val());
				    });
				    // Display Value to Discount Amount
				    $("#discountAmount").text(parseFloat(discount).toFixed(2));
				    
				    //Display Value to Tax Amount
				    var tax = 0;
				    $("#taxAmount").text(tax);
				    //Display Value to Total Amount
				    // var totalamount = subtotal+tax - discount;
				    var totalamount = subtotal+tax;
			        $("#totalAmount").text(parseFloat(totalamount).toFixed(2));
			        $(".finalAmount").text('Rs. '+ parseFloat(totalamount).toFixed(2));
                }

                $(document).keypress(function(e) {
				  // Delete Button
				  if(e.which == 68) {
				    // alert('Press Delete');
					var itemNumber = prompt("Enter Item Number", "0");
					if (itemNumber != null) {
					    // alert("You Select Item # " + itemNumber);
					    var $overview = $('.overview');
					    $overview.find('ul').find('li').eq((itemNumber-1)).find('a').click();
					}else {
						alert('No Item Select');
					}
				  }
				  // Hold Button
				  else if(e.which == 72){
				    alert('Press Hold');
				    jQuery(function($) {    
			        $.ajax( {           
			            url : "old.php",
			            type : "GET",
			            success : function(data) {
			                alert ("works!");
			                }
			            });
			        });
			        alert('Hold Function Complete');
				  }
				  // Switch Button
				  else if(e.which == 83) {
				    alert('Press Switch');
				    jQuery(function($) {    
			        $.ajax( {           
			            url : "old.php",
			            type : "GET",
			            success : function(data) {
			                alert ("works!");
			                }
			            });
			        });
				    $('#switchModal').click();
				  }
				  // Edit Button
				  else if(e.which == 69){
				    // alert('Press Edit');
				    var itemNumber = prompt("Select Item Number", "");
					if (itemNumber != null) {
					    var itemQuantity = prompt("Enter Quantity", "");
					    var $overview = $('.overview');
					    $overview.find('#row_'+itemNumber).find('lable').text(itemQuantity);
					    var productPrice = $overview.find('#row_'+itemNumber).find('.productPrice').text();
					    var totalPrice = itemQuantity*parseInt(productPrice);
					    $overview.find('#row_'+itemNumber).find('.subtotalAmt').val(totalPrice);
					    $overview.find('#row_'+itemNumber).find('.subtotalAmtSpan').text(parseFloat(totalPrice).toFixed(2));
					    var rowArray = $overview.find('#row_'+itemNumber).find('.rowdelete').val();
					    event.preventDefault();
					    $.post('ajex.php', {'itemqty': itemQuantity, 'rowarray': rowArray, 'action': 'edit'}, function(data) {
	                		console.log(data);
						});
					    subtotalcalc(); // Refresh Subtotal Section
					}else {
						alert('No Item Select');
					}
				  }
				  // Checkout Button 
				  else if((e.keyCode == 10 || e.keyCode == 13) && e.ctrlKey) {
				  	// alert('Press Checkout');
				  	var paymentmode = $("#paymentMode").text();
				  	var cashamount = $(".calculator input").val();
				  	// var discountamount = $("#paymentMode").text();
				  	window.open("sales.php?payment_mode="+ paymentmode+"&amount="+ cashamount, "myWindowName", "width=800, height=600");
				  	return false;
				  }
				  // Credit Button 
				  else if(e.which == 67) {
				  	alert('Press Credit');
				  	$calState = true;
				  	$("#paymentMode").text('credit');
				  }
				  // Calculator Button 
				  else if(e.which == 49 || e.which == 50 || e.which == 51 || e.which == 52 || e.which == 53 || e.which == 54 || e.which == 55 || e.which == 56 || e.which == 57 || e.which == 48 || e.which == 190) {
				    var $codeVal = String.fromCharCode(e.which);
				    var current = $(".calculator input").val();
				    newcurrent = current+$codeVal; 
				    if(current == '0'){newcurrent = $codeVal; }
				    // current = 0;
				    $(".calculator input").val(newcurrent);
				  } 
				  // Calculator Enter Button
				  else if(e.which == 13) {
					// alert('Press Enter');
					var totalamount = parseInt($("#totalAmount").text());
					var balanceamount = newcurrent-totalamount; 
					$(".calculator input").val(balanceamount);
					$(".calculator input").css({
						    background: '#00FF13',
							color: '#000'
					}); 
				  } 
				});

				$(document).keyup(function(e) {
	             	// Calculator C Button
					if(e.which == 27) {
						// alert('Press Esc');
						$(".calculator input").val("");
						$(".calculator input").css('background', '#ffffff');
					}
					// Calculator Dacemal Button 
					else if(e.keyCode == 110 || e.keyCode == 190) {
						// alert('Press Decimal');
						var current = $(".calculator input").val();
						newcurrent = current+ '.'; 
						if(current == '0'){newcurrent = $codeVal; }
						$(".calculator input").val(newcurrent);
					}
				});
            });
        </script> 
</head>
<body>
	<!-- Payment Mode -->
	<span id="paymentMode" style="display:none;">cash</span>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Swtich Sessions</h4>
	      </div>
	      <div class="modal-body">
	        <?php
	        if(isset($_SESSION['hold_session'])){
				//print_f($_SESSION['hold_session'][3]);
				foreach ($_SESSION['hold_session'] as $key => $value) {
					echo $key .'</BR>';
					//print_f($value);
					//echo $value[$barcode]['quantity'];
				}
			}
			else {
				echo 'No Hold List';
			}
	        ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>



	<div class="container">
		<div class="row">
			<div class="col-md-12 userHead">
				<ul>
					<li class="col-md-3">
						<p>WELCOME : <?php echo $_SESSION['user']->first_name; ?> <?php echo $_SESSION['user']->last_name; ?></p>
					</li>
					<li class="col-md-3">
						<p>Date &amp; Time : <span><?php $date = new DateTime('now', new DateTimeZone('Asia/Karachi'));
 						echo $date->format("j-n-Y, g:i a"); ?></span></p>
					</li>
					<li class="col-md-2">
						<p>Shift Number : <span><?php echo $user_shift_number; ?></span></p>
					</li>
					<li class="col-md-3">
						<p>Terminal Point Number : <span><?php echo $user_terminal_point_number; ?></span></p>
					</li>
					<li class="col-md-1">
						<p><a href="login.php?logout=true"><img src="assets/images/login.png"/></a></p>
					</li>
				</ul>
			</div>
			<div class="col-md-12 compHead">
					<div class="col-md-3">
						<img src="assets/images/logo.png" class="img-responsive marginauto" />
					</div>
					<div class="col-md-4 col-md-offset-1">
						<p>Customer Name : <span> <input type="text" value="Raheel Ghani"></span></p>
					</div>
					<div class="col-md-4">
						<p class="alignRight">Bill Number : <span><?php echo $bill_number; ?></span></p>
					</div>
				</ul>
			</div>
		</div><!-- Row Close -->

		<div class="row">
			<div class="col-md-8">
				<div class="col-md-12 latestScan">
					<?php 
					if(isset($_SESSION['barcode_detail'])){ 
						$latest_product = $_SESSION['barcode_detail'];
						?>
						<form action="#" method="post" name="latest_product_submit" id="latest_product_submit">
							<div class="col-md-10 nopadding">
								<h1><?php echo $latest_product->p_name; ?></h1>
								<?php 
								if(isset($latest_product->offer_products)){
									foreach($latest_product->offer_products as $offer_product_name){
										echo '<p>'.$offer_product_name->p_name.'</p>';
									}
								}
								?>
								<p><?php echo $latest_product->inv_barcode; ?></p>
							</div>
							<div class="col-md-2 latestQty">
								<input type="text" name="latestqty" id="latestqty" value="1">
							</div>
						</form>
					<?php	
					}
					else {
						
					}

					?>
				</div><!-- latestScan Close -->

				<div class="col-md-12 productTable">
					<ul class="headingTable">
	                    <li class="col-md-1 nopadding">#</li>
	                    <li class="col-md-4">Description</li>
	                    <li class="col-md-2 nopadding">Price</li>
	                    <li class="col-md-2 nopadding">Discount</li>
	                    <li class="col-md-1">Qty</li>
	                    <li class="col-md-2 nopadding noborderRight">Total</li>
	                    <div class="clearfix"></div>
                	</ul>
                	<div id="scrollbar1">
			        <!--    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div> -->
			            <div class="viewport">
			                <div class="overview">
			                <ul>
			                	<?php 
			                	$subtotalamount = 0;
			                	$count = 1;
			                	if(isset($_SESSION['terminal_list'])){
									foreach ($_SESSION['terminal_list'] as $key => $value) {
										$barcode = key($value);
									?>
									<li class="col-md-12 nopadding product_list">
					                    <div class="product" id="row_<?php echo $count; ?>">
						                    <div class="col-md-1 nopadding alignCenter"><?php echo $count; ?></div>
						                    <div class="col-md-4 "><?php echo $value[$barcode]->p_name; ?><a class="itemDelete" href="ajex.php?delete=<?php echo $key ?>" style="color:#fff;"><span class="glyphicon glyphicon-trash floatRight" aria-hidden="true"></span></a><input type="hidden" class="rowdelete" value="<?php echo $key ?>"/></div>
						                    <div class="col-md-2 alignRight paddingright30 productPrice"><?php echo $price = number_format((float)$value[$barcode]->inv_price, 2, '.', '') ?></div>
						                    <div class="col-md-2 alignCenter"><lable><?php
						                    	$discount_type = $value[$barcode]->discount_type;
						                    	if($discount_type == 'flat'){
						                    		echo $currency . $discount = $value[$barcode]->discount_amount;
						                    		$discount_product_amount = $discount;
						                    	}
						                    	else {
						                    		echo $discount = $value[$barcode]->discount_amount.'%';
						                    		$discount_product_amount = $price * ($discount/100); 
						                    	}
						                    ?></lable><input type="hidden" class="discounttotalAmt" value="<?php echo $discount_product_amount*$value[$barcode]->quantity; ?>"/></div>
						                    <div class="col-md-1 alignCenter"><lable><?php echo $qty = $value[$barcode]->quantity; ?></lable></div>
						                    <div class="col-md-2 alignRight paddingright30"><span class="subtotalAmtSpan"><?php echo $subtotal = number_format(((float)$price-$discount_product_amount) * $qty, 2, '.', ''); ?></span><input type="hidden" class="subtotalAmt" value="<?php echo $subtotal; ?>" /></div>
						                    <div class="clearfix"></div>
					                	</div>
					                	<div class="productoffer">
					                		<?php if(isset($value[$barcode]->offer_products)){
					                			$free_products = $value[$barcode]->offer_products; 
						                			foreach ($free_products as $free_product) { ?>
						                				<div class="col-md-5 col-md-offset-1"><?php echo $free_product->offer_product_quantity .' - '. $free_product->p_name; ?></div>
							                    		<div class="col-md-6 nopadding"></div>
							                    		<div class="clearfix"></div>
						                    <?php
					                				}
					                			}
					                		?>
					                	</div>
				                	</li><!-- One Product Close -->
									<?php
									$subtotalamount += $subtotal;
									$count++;
				                	}
				                } // Close If Session Line
			                	?>
			                </ul>
			                </div>
			            </div>
			        </div>
				</div><!-- Product Table Close -->
				
				<div class="col-md-12 marginTop subTotal">
					<ul>
						<li class="col-md-12">
							<div class="col-md-10">Sub Total</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="subtotalAmount">0</span></div>
						</li>
						<li class="col-md-12 bgdark">
							<div class="col-md-10">Discount</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="discountAmount">0</span></div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Taxes</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="taxAmount">0</span></div>
						</li>
						<li class="col-md-12">
							<div class="col-md-10">Totals</div>
	                    	<div class="col-md-2 alignRight paddingright30"><span id="totalAmount">0</span></div>
						</li>
					</ul>
				</div><!-- latestScan Close -->

				<div class="col-md-12 finalBill nopaddingRight">
					<div class="col-md-6 nopadding">
						<h1>Billed Amount</h1>
					</div>
					<div class="col-md-6 marginTop alignRight nopaddingRight">
						<span class="finalAmount">
							Rs. 0.00
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 terminalControl">
				<div class="col-md-6 nopadding">
					<button id="holdBtn">Hold <span>(caps h)</span></button>
				</div>
				<div class="col-md-6 nopadding">
					<button id="switchModal" data-toggle="modal" data-target="#myModal">switch <span>(caps s)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>configuration setting <span>(F3)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>delete <span>(caps d)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button>change / edit <span>(caps e)</span></button>
				</div>

				<div class="col-md-6 nopadding">
					<button>REPORT <span>(F2)</span></button>
				</div>
				<!--
				<div class="col-md-4 nopadding">
					<button>cash<br/><span>(caps C)</span></button>
				</div>
				-->
				<div class="col-md-6 nopadding">
					<button>card <span>(caps c)</span></button>
				</div>

				<div class="col-md-12 nopadding">
					<button class="bgcheckoutBtn" id="checkoutBtn">checkout <span>(cltr + enter)</span></button>
				</div>

				<div class="clearfix"></div>
				<div class="calculator">
					<div class="col-md-12 nopadding">
						<input type="text" value="" /> 
					</div>
					<div class="col-md-9 nopadding">
						<div class="col-md-4 nopadding">
							<button>7</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>8</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>9</button>
						</div>	
						<div class="col-md-4 nopadding">
							<button>4</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>5</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>6</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>1</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>2</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>3</button>
						</div>
						<div class="col-md-8 nopadding">
							<button class="zeroBtn">0</button>
						</div>
						<div class="col-md-4 nopadding">
							<button>.</button>
						</div>
					</div>
					<div class="col-md-3 nopadding">
						<div class="col-md-12 nopadding">
							<button class="clearBtn">C</button>
						</div>
						<div class="col-md-12 nopadding">
							<button class="clearBtn" style="font-size:15px;">Enter</button>
						</div>	
					</div>
					
				</div>
				
				
				
				<div class="clearfix"></div>
			</div><!-- Right Col Close -->
		</div><!-- Row Close -->


		<div class="row footer">
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
	</div><!-- Container Close -->




	
	<!--Attched Bootstrap JS  -->
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>