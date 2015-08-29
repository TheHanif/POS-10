<?php 
/**
* INVENTORY MAIN CLASS
*/
class accounts extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'accounts';
		$this->general_ledger = 'accounts_general_ledger';
		$this->sales = 'accounts_sales';
		$this->profitloss = 'accounts_profitloss';	
		$this->payable_receviable = 'accounts_payable_receviable';	
		$this->purchases = 'accounts_purchases';	
		$this->reconcilation = 'account_reconcilation';	
		$this->assets = 'accounts_assets';	
		$this->capital = 'accounts_capital';	
	}


	/**
     * General Ledger Entry Insert
     * @param  Float $amount	type Float
     * @param  varchar $type Debit / Credit
     * @param  varchar $account Purchase, Bank, Supplier etc etc
     * @param  varchar $account_type General Purchase, Bank Name etc etc
     * @param  varchar $Date
     * @return Result True / False
     */
	public function create_general_ledger($amount, $type, $account, $account_type, $date)
	{
		$data = array();
		$data['gl_amount'] = $amount;
		$data['gl_type'] = $type;
		$data['gl_account'] = $account;
		$data['gl_account_type'] = $account_type;
		$data['gl_date'] = $date;

		$this->insert($this->general_ledger, $data);
		return $this->row_count();
	} // end of General Ledger Entry Insert


	/**
     * Sales Insert
     * @param  Int $product_id
     * @param  Float $cost
     * @param  Float $price
     * @param  Int $quantity
     * @param  Float $total
     * @param  varchar $date
     * @return Result True / False
     */
	public function create_sales($product_id, $cost, $price, $quantity, $total, $date)
	{
		$data = array();
		$data['sales_product_id'] = $product_id;
		$data['sales_cost'] = $cost;
		$data['sales_price'] = $price;
		$data['sales_quantity'] = $quantity;
		$data['sales_total'] = $total;
		$data['sales_date'] = $date;
		$this->insert($this->sales, $data);
		return $this->row_count();
	} // end of Sales Insert


	// Get Sales Report
	public function get_sales_report($product_id = NULL, $to_date = NULL, $from_date = NULL)
	{
		if (isset($product_id)) {
			$this->where('sales_product_id',$product_id);
		}

		if (!empty($to_date) && !empty($from_date)) {
			$this->where('sales_date', array($to_date,$from_date), 'BETWEEN');
		}else
		if (!empty($to_date)) {
			$this->where('sales_date',$to_date);
			// $this->where('sales_date', array($to_date,$from_date), 'BETWEEN');
		}

		$this->inner_join('products', 'p', 'p.p_id = accounts_sales.sales_product_id');
		$this->from($this->sales);
		return $this->all_results();
	} // End of Sales Report


	/**
     * Profit / Loss Insert
     * @param  Int $product_id
     * @param  Float $cost
     * @param  Float $price
     * @param  Int $quantity
     * @param  Float $profit
     * @param  varchar $date
     * @return Result True / False
     */
	public function create_profitloss($product_id, $cost, $price, $quantity, $profit, $date)
	{
		$data = array();
		$data['pl_product_id'] = $product_id;
		$data['pl_cost'] = $cost;
		$data['pl_price'] = $price;
		$data['pl_quantity'] = $quantity;
		$data['pl_profit'] = $profit;
		$data['pl_date'] = $date;
		$this->insert($this->profitloss, $data);
		return $this->row_count();
	} // end of Profit / Loss Insert

	// Get Profit Loss Report
	public function get_profitloss_report($product_id = NULL, $to_date = NULL, $from_date = NULL)
	{
		if (isset($product_id)) {
			$this->where('pl_product_id',$product_id);
		}
		if (isset($to_date)) {
			$this->where('pl_date', array($to_date,$from_date), 'BETWEEN');
		}
		$this->inner_join('products', 'p', 'p.p_id = accounts_profitloss.pl_product_id');
		$this->from($this->profitloss);
		return $this->all_results();
	} // End of Profit Loss Report

	/**
     * Payable / Receviable Insert
     * @param  Float $amount
     * @param  varchar $account
     * @param  varchar $person
     * @param  varchar $date
     * @param  varchar $due_date
     * @param  varchar $type (Payable / Receviable)
     * @param  int 	   $status
     * @return Result True / False
     */
	public function create_payable_receviable($amount, $description, $account, $account_type, $bank, $date, $due_date, $type, $status)
	{
		$data = array();
		$data['pr_amount'] = $amount;
		$data['pr_description'] = $description;
		$data['pr_account'] = $account;
		$data['pr_account_type'] = $account_type;
		$data['pr_bank'] = $bank;
		$data['pr_date'] = $date;
		$data['pr_due_date'] = $due_date;
		$data['pr_type'] = $type;
		$data['pr_status'] = $status;
		$this->insert($this->payable_receviable, $data);
		return $this->row_count();
	} // End of Payable / Receviable Insert

	// Get Payable / Receviable Report
	public function get_payable_receviable_report($account = NULL, $account_type = NULL, $to_date = NULL, $from_date = NULL, $type = NULL, $status = NULL)
	{
		if (isset($account)) {
			$this->where('pr_account',$account);
		}
		if (isset($account_type)) {
			$this->where('pr_account_type',$account_type);
		}
		if (isset($to_date) || isset($from_date)) {
			$this->where('pr_date', array($to_date,$from_date), 'BETWEEN');
		}

		if (isset($type)) {
			$this->where('pr_type',$type);
		}

		if (isset($status)) {
			$this->where('pr_status',$status);
		}
		$this->from($this->payable_receviable);
		return $this->all_results();
	} // End of Payable / Receviable Report

	/**
     * Create Purchase Insert
     * @param  varchar	$product
     * @param  float 	$cost
     * @param  int 		$quantity
     * @param  varchar	$date
     * @param  varchar 	$account
     * @param  varchar 	$account_type
     * @return Result True / False
     */
	public function create_purchase($product, $cost, $quantity, $date, $account, $account_type)
	{
		$data = array();
		$data['purchase_product'] = $product;
		$data['purchase_cost'] = $cost;
		$data['purchase_quantity'] = $quantity;
		$data['purchase_date'] = $date;
		$data['purchase_account'] = $account;
		$data['purchase_account_type'] = $account_type;
		// print_f($data);
		// die();
		$this->insert($this->purchases, $data);
		return $this->row_count();
	} // End of Create Purchase Insert

	/* Checking
	*	Product Wise
	*	To Date Wise
	*	From Date Wise
	*	Account Wise
	*	Account Type Wise
	*/
	// Get Purchase Report
	public function get_purchase_report($product_name = NULL, $to_date = NULL, $from_date = NULL, $accounts = NULL, $account_type = NULL)
	{
		echo $product_name;
		if (isset($product_name)) {
			$this->where('purchase_product',$product_name);
		}
		if (isset($to_date)) {
			$this->where('purchase_date', array($to_date,$from_date), 'BETWEEN');
		}
		if (isset($accounts)) {
			$this->where('purchase_account', $accounts);
		}
		if (isset($account_type)) {
			$this->where('purchase_account_type', $account_type);
		}
		$this->from($this->purchases);
		return $this->all_results();
	} // End of Purchase Report


	/**
     * Create Reconselation Insert
     * @param  varchar	$amount
     * @param  varchar 	$bank
     * @param  varchar	$type Debit Credit
     * @param  varchar	$date
     * @return Result True / False
     */
	public function create_reconsilation($amount, $bank, $type, $date)
	{
		$data = array();
		$data['recon_amount'] = $amount;
		$data['recon_bank'] = $bank;
		$data['recon_type'] = $type;
		$data['recon_date'] = $date;

		$this->insert($this->reconcilation, $data);
		return $this->row_count();
	} // End of Create Purchase Insert



	/**
     * Assets Insert
     * @param  string $type
     * @param  string $amount
     * @param  string $payment_mode cheque / cash
     * @param  int 	  $bank
     * @param  string $date
     * @param  text   $detail
     * @return Result True / False
     */
	public function create_assets($type, $amount, $payment_mode, $bank, $due_date, $detail)
	{
		$data = array();
		$data['assets_type'] = $type;
		$data['assets_amount'] = $amount;
		$data['assets_payment_mode'] = $payment_mode;
		$data['assets_bank'] = $bank;
		$data['assets_due_date'] = $this->_date('Y-m-d H:i:s', $due_date);
		$data['assets_detail'] = $detail;
		
		$this->insert($this->assets, $data);
		return $this->row_count();
	} // end of Assets Insert

	// Assets Update
	public function update_assets($type, $amount, $payment_mode, $bank, $due_date, $detail, $ID)
	{
		$data = array();
		$ID;
		$data['assets_type'] = $type;
		$data['assets_amount'] = $amount;
		$data['assets_payment_mode'] = $payment_mode;
		$data['assets_bank'] = $bank;
		$data['assets_due_date'] = $this->_date('Y-m-d H:i:s', $due_date);;
		$data['assets_detail'] = $detail;

		$this->where('assets_id', $ID);
		$this->update($this->assets, $data);
		return $this->row_count();
	} // end of Assets Update

	public function get_assets($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('assets_id',$ID);
		}
		$this->from($this->assets);
		return $this->all_results();
	} // end of get_assets

	/**
     * Capital Insert
     * @param  string $name
     * @param  string $amount
     * @param  string $date
     * @param  text   $detail
     * @return Result True / False
     */
	public function create_capital($name, $amount, $date, $detail)
	{
		$data = array();
		$data['capital_name'] = $name;
		$data['capital_amount'] = $amount;
		$data['capital_detail'] = $detail;
		$data['capital_date'] = $this->_date('Y-m-d H:i:s', $date);
		$this->insert($this->capital, $data);
		return $this->row_count();
	} // end of Capital Insert

	public function update_capital($name, $amount, $date, $detail, $ID)
	{
		$data = array();
		$data['capital_name'] = $name;
		$data['capital_amount'] = $amount;
		$data['capital_detail'] = $detail;
		$data['capital_date'] = $this->_date('Y-m-d H:i:s', $date);

		$this->where('capital_id', $ID);
		$this->update($this->capital, $data);
		return $this->row_count();
	} // end of Capital Update

	public function get_capital($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('capital_id',$ID);
		}
		$this->from($this->capital);
		return $this->all_results();
	} // end of get_capital

} // end of class


 ?>