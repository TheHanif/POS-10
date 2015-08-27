<?php 
/**
* INVENTORY MAIN CLASS
*/
class warehouse extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'warehouse';
	}

	public function insert_product_warehouse($form)
	{
		$data = array();

		$data['product_id'] = $form['product_id'];
		$data['warehouse_cost'] = $form['product_cost'];
		$data['warehouse_price'] = $form['product_price'];
		$data['warehouse_quantity'] = $form['product_quantity'];
		$data['warehouse_barcode'] = $form['product_barcode'];
		$data['warehouse_qtytype'] = $form['p_qtytype'];
		$data['warehouse_sp_bill'] = $form['sup_bill'];
		
		$this->insert($this->table_name, $data);
		
		$accounts = new accounts();
		$products = new product();
		
		// Create GL
		$amount = $form['product_cost']*$products->generate_item_quantity($form['product_id'], $form['p_qtytype'], $form['product_quantity']);
		$type = 'debit';
		$account = 'Purchase';
		$account_type = 'Stock';
		$date = $accounts->_date('Y-m-d H:i:s', date('d-m-Y'));
		$results = $accounts->create_general_ledger($amount, $type, $account, $account_type, $date);

		// Purchase
		$product = $form['product_id'];
		$cost = $form['product_cost'];
		$quantity = $products->generate_item_quantity($form['product_id'], $form['p_qtytype'], $form['product_quantity']);
		$date = $date;
		$account = 'purchase';
		$account_type = 'stock';
		$results = $accounts->create_purchase($product, $cost, $quantity, $date, $account, $account_type);

		return $this->row_count();

	} // end of insert

	public function update_product_warehouse($form, $id)
	{
		
		$product_id = $form['product_id'];
		$data = array();

		// $data['product_id'] = $form['product_id'];
		$data['warehouse_cost'] = $form['product_cost'];
		$data['warehouse_price'] = $form['product_price'];
		$data['warehouse_quantity'] = $form['product_quantity'];
		// $data['warehouse_barcode'] = $form['product_barcode'];
		$data['warehouse_qtytype'] = $form['p_qtytype'];
		$data['warehouse_sp_bill'] = $form['sup_bill'];

		$this->where('warehouse_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		// Update Cost & Price in Product Table
		$dataproduct['p_cost'] = $form['product_cost'];
		$dataproduct['p_price'] = $form['product_price'];
		$this->where('p_id', $product_id);
		$this->update('products', $dataproduct);

		return $this->row_count();

	} // end of update

	public function inv_get($ID)
	{
		$this->where('inv_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get


	public function get_products($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = warehouse.product_id');
			$this->where('warehouse_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			// $this->where('id',$ID);
			$this->inner_join('products', 'p', 'p.p_id = warehouse.product_id');
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get

	// Get Product Detail Insert Inventory Ajex Function --- Data Fetch by Product ID
	public function get_products_detail($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = warehouse.product_id');
			$this->where('product_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
	} // end of get


	public function get_product($barcode)
	{
		if (isset($barcode)) {
			$this->where('inv_barcode',$barcode);
		}

		$this->from($this->table_name);


		return $result = $this->all_results();
		


	} // end of get


} // end of class


 ?>