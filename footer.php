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
	<!-- Select Search JS -->
	<script src="assets/js/chosen.jquery.js"></script>
	<!-- Chart JS -->
	<script src="assets/js/chart.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
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

			$(function() {
		    	$('.chosen-select').chosen();
		        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		    });
 		});
	</script>
</body>
</html>