	<!-- BEGIN FOOTER -->
	<footer>
		<div class="col-md-9" style="text-align:left;">
			&copy; 2015 <a href="#">Your company</a><br />
			Product by <a href="http://www.webnet.com.pk" target="_blank">Webnet</a> Email at <a href="mailto:info@webnet.com.pk" target="_blank"> info@webnet.com.pk</a>
		</div>

		<div class="col-md-3">
			<img src="assets/img/powered_logo.png" alt="" />
		</div>
		<div class="clearfix"></div>
	</footer>
	<!-- END FOOTER -->
				
				
			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->
	
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		<script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
 
		<!-- PLUGINS -->
		<script src="assets/plugins/skycons/skycons.js"></script>
		<script src="assets/plugins/prettify/prettify.js"></script>
		<script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
		<script src="assets/plugins/icheck/icheck.min.js"></script>
		<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="assets/plugins/mask/jquery.mask.min.js"></script>
		<script src="assets/plugins/validator/bootstrapValidator.min.js"></script>
		<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatable/js/bootstrap.datatable.js"></script>
		<script src="assets/plugins/summernote/summernote.min.js"></script>
		<script src="assets/plugins/markdown/markdown.js"></script>
		<script src="assets/plugins/markdown/to-markdown.js"></script>
		<script src="assets/plugins/markdown/bootstrap-markdown.js"></script>
		<script src="assets/plugins/slider/bootstrap-slider.js"></script>
		
		<!-- EASY PIE CHART JS -->
		<script src="assets/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>
		
		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="assets/plugins/jquery-knob/knob.js"></script>

		<!-- FLOT CHART JS -->
		<script src="assets/plugins/flot-chart/jquery.flot.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.tooltip.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
		<script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>

		<!-- MORRIS JS -->
		<script src="assets/plugins/morris-chart/raphael.min.js"></script>
		<script src="assets/plugins/morris-chart/morris.min.js"></script>
		<script src="assets/plugins/morris-chart/example.js"></script>
		
		<!-- C3 JS -->
		<script src="assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8"></script>
		<script src="assets/plugins/c3-chart/c3.min.js"></script>
		
		<!-- MAIN APPS JS -->
		<script src="assets/js/apps.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){

			$("#alert1").fadeIn('slow', function() {
				$("#alert1").delay(3000).fadeOut('fast', function() {
						$("#alert2").fadeIn('fast', function() {
						$("#alert2").delay(3000).fadeOut();
					});
				});
			});
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
		    
			// Dropdown Cash / Cheque value change on click
 			$("#payment_mode").on("change", function() {
 				id = "payment_" + $(this).val() + "_mode";
			    if(id == 'payment_cash_mode'){
			    	$("#payment_cheque_mode").hide();
			    } 
			    else if(id == 'payment_cheque_mode') {
			    	$("#" + id).show();
			    }
			    
			})

			// Product Exchange Policy value change on click
 			$(".exchange_policy").on("change", function() {
 				id = $(this).val();
 				console.log(id);
			    if(id == 'no'){
			    	$(".exchange_detail").hide();
			    } 
			    else if(id == 'yes') {
			    	$(".exchange_detail").show();
			    }
			})

			// Product Return Policy value change on click
 			$(".return_policy").on("change", function() {
 				id = $(this).val();
 				console.log(id);
			    if(id == 'no'){
			    	$(".return_detail").hide();
			    } 
			    else if(id == 'yes') {
			    	$(".return_detail").show();
			    }
			})

			$(function() {
		    	$('.chosen-select').chosen();
		        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		    });

		    /* Profile Picture */
		    $('#removeProfilePic').click(function(event) {
		    	$('.profilePic').fadeOut('slow', function() {
		    		$('#showNewPicSubmit').fadeIn('slow', function() {
		    			
		    		});
		    	});
		    });
 		});
	</script>
	</body>
</html>