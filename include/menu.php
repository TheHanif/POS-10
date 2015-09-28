<div class="top-main-navigation">
				<nav class="navbar square navbar-default navbar-inverse no-border" role="navigation">
				  <div class="container-fluid">

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="navbar-collapse collapse" id="top-main-navigation" aria-expanded="false" style="height: 1px;">
					  <ul class="nav navbar-nav">
						<li>
						  <a href="dashboard.php">
							<i class="fa fa-dashboard"></i><br/>
							<span class="hidden-sm hidden-md">Dashboard</span></a>
						</li>
						<li>
						  <a href="view_open_balance.php">
							  <i class="fa fa-money"></i><br/>
							  <span class="hidden-sm hidden-md">Opening Balance</span>
						  </a>
						  <!--
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_open_balance.php">View Opening Balance</a></li>
							<li><a href="add_opening_balance.php">Add Opening Balance</a></li>
						  </ul>
						-->
						</li>
						<li class="dropdown">
						  <a href="warehouse.php">
							  <i class="fa fa-inbox"></i><br/>
							  <span class="hidden-sm hidden-md">Warehouse</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_warehouse.php">Manage Warehouse Products</a></li>
							<li><a href="add_warehouse.php">Add New Warehouse Product</a></li>
							<li><a href="report_products.php">Stock Report Warehouse Product</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="inventory.php">
							  <i class="fa fa-archive"></i><br/>
							  <span class="hidden-sm hidden-md">Inventory</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_inventory.php">Manage Inventory Products</a></li>
							<li><a href="add_inventory.php">Add New Inventory Product</a></li>
							<li><a href="report_products.php">Stock Report Inventory Products</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="users.php">
							  <i class="fa fa-users"></i><br/>
							  <span class="hidden-sm hidden-md">User</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_user.php">Manage Users</a></li>
							<li><a href="add_user.php">Add New User</a></li>
							<li><a href="report_sale_person.php">Sales Person Report</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="products.php">
							  <i class="fa fa-shopping-cart"></i><br/>
							  <span class="hidden-sm hidden-md">Products</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_product.php">View Products</a></li>
							<li><a href="add_product.php">Add Product</a></li>
							<li><a href="report_products.php">Product Stock Report</a></li>
							<li><a href="report_sales.php">Sales Report</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="view_product_categories.php">View Product Category</a></li>
							<li><a href="add_product_category.php">Add Product Category</a></li>
						  </ul>
						</li>

						<li class="dropdown">
						  <a href="suppliers.php">
							  <i class="fa  fa-user"></i><br/>
							  <span class="hidden-sm hidden-md">Supplier</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_supplier.php">View Supplier</a></li>
							<li><a href="add_supplier.php">Add Supplier</a></li>
							<li><a href="add_supplier_bill.php">Add Supplier Bill</a></li>
						  </ul>
						</li>
						
						<li class="dropdown">
						  <a href="promotions.php">
							  <i class="fa fa-gift"></i><br/>
							  <span class="hidden-sm hidden-md">Promotions</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_discount.php">View Discount</a></li>
							<li><a href="add_discount.php">Add Discount</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="view_offer.php">View Offer</a></li>
							<li><a href="add_offer.php">Add Offer</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="accounts.php">
							  <i class="fa fa-book"></i><br/>
							  <span class="hidden-sm hidden-md">Accounts</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_payable.php">Account Payable</a></li>
							<li><a href="view_receviable.php">Account Receviable</a></li>
				            <li role="separator" class="divider"></li>
				            <li><a href="view_assets.php">Manage Assets</a></li>
							<li><a href="add_assets.php">Add New Assets</a></li>
							<li role="separator" class="divider"></li>
				            <li><a href="view_capitals.php">Manage Capitals</a></li>
							<li><a href="add_capitals.php">Add New Capitals</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="banks.php">
							  <i class="fa fa-building-o"></i><br/>
							  <span class="hidden-sm hidden-md">Banks</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="view_bank.php">View Banks</a></li>
							<li><a href="add_bank.php">Add Bank</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="add_transection.php">Add Bank Transection</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="reports.php">
							  <i class="fa fa-bar-chart-o"></i><br/>
							  <span class="hidden-sm hidden-md">Reports</span>
						  </a>
						  <ul class="dropdown-menu square margin-list-rounded with-triangle">
							<li><a href="report_sales.php">Sales Report</a></li>
							<li><a href="report_profitloss.php">Profit &amp; Loss Report</a></li>
							<li><a href="report_acc_payable.php">Account Payable Report</a></li>
							<li><a href="report_acc_receviable.php">Account Receviable Report</a></li>
							<li><a href="report_assets.php">Assets Report</a></li>
							<li><a href="report_capital.php">Capital Report</a></li>
							<li><a href="report_products.php">Product Stock Report</a></li>
							<li><a href="report_sale_person.php">Sales Person Report</a></li>
							<li><a href="report_sale_invoice.php">Invoice Number Report</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Product Expiry Report</a></li>
							<li><a href="#">Purchase Report</a></li>
							<li><a href="#">Account Report</a></li>
						  </ul>
						</li>
						<li class="bg-primary">
						  <a href="terminal.php" target="_blank">
							<i class="fa fa-qrcode"></i><br/>
							<span class="hidden-sm hidden-md">Terminal</span></a>
						</li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				<!-- End inverse navbar -->
			</div>
			
			
			
			
			

			<!-- BEGIN PAGE CONTENT -->