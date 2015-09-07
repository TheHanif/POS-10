<div class="container">
	<div class="col-md-12 nopadding">
		<nav class="navbar navbar-default navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span></a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daily Balance<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="view_open_balance.php">View Opening Balance</a></li>
					<li><a href="add_opening_balance.php">Add Opening Balance</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Warehouse<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="view_warehouse.php">View Warehouse Products</a></li>
					<li><a href="add_warehouse.php">Add Warehouse Products</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="view_inventory.php">View Inventory</a></li>
					<li><a href="add_inventory.php">Add Inventory</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="view_user.php">View User</a></li>
					<li><a href="add_user.php">Add User</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="view_product.php">View Products</a></li>
					<li><a href="add_product.php">Add Product</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Supplier <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="view_supplier.php">View Supplier</a></li>
					<li><a href="add_supplier.php">Add Supplier</a></li>
					<li><a href="add_supplier_bill.php">Add Supplier Bill</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promotions <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		          	<li><a href="view_discount.php">View Discount</a></li>
					<li><a href="add_discount.php">Add Discount</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="view_offer.php">View Offer</a></li>
					<li><a href="add_offer.php">Add Offer</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="accounts.php">Accounts</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="view_payable.php">View Account Payable</a></li>
					<li><a href="view_receviable.php">View Account Receviable</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="view_assets.php">View Assets</a></li>
					<li><a href="add_assets.php">Add Assets</a></li>
					<li role="separator" class="divider"></li>
		            <li><a href="view_capitals.php">View Capitals</a></li>
					<li><a href="add_capitals.php">Add Capitals</a></li>
		          </ul>
		        </li>
		        <!--
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Purchases<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="">View Purchases</a></li>
					<li><a href="add_purchase.php">Add Purchase</a></li>
		          </ul>
		        </li>
		    -->
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Banks<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="view_bank.php">View Banks</a></li>
					<li><a href="add_bank.php">Add Bank</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="add_transection.php">Add Bank Transection</a></li>
		          </ul>
		        </li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="report_sales.php">Sales Report</a></li>
					<li><a href="report_profitloss.php">Profit &amp; Loss Report</a></li>
					<li><a href="report_acc_payable.php">Account Payable Report</a></li>
					<li><a href="report_acc_receviable.php">Account Receviable Report</a></li>
					<li><a href="report_assets.php">Assets Report</a></li>
					<li><a href="report_capital.php">Capital Report</a></li>
					<li><a href="report_products.php">Product Stock Report</a></li>
					<li><a href="report_sale_person.php">Sales Person Report</a></li>
					<li><a href="#">Product Expiry Report</a></li>
					<li><a href="#">Purchase Report</a></li>
					<li><a href="#">Account Report</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="terminal.php" target="_blank"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>	
	</div>	
</div>