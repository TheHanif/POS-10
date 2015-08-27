
<?php 
/**
* INVENTORY MAIN CLASS
*/
class inventory extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'inventory';
	}

	public function inv_insert($form)
	{

		$data = array();

		$data['inv_name'] = $form['inv_name'];
		$data['inv_pid'] = $form['inv_id'];
		$data['inv_cost'] = $form['inv_cost'];
		$data['inv_price'] = $form['inv_price'];
		$data['inv_quantity'] = $form['inv_quantity'];
		$data['inv_barcode'] = $form['inv_barcode'];

		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function inv_update($form, $id)
	{
		$data = array();

		$data['inv_name'] = $form['inv_name'];
		$data['inv_cost'] = $form['inv_cost'];
		$data['inv_price'] = $form['inv_price'];
		$data['inv_quantity'] = $form['inv_quantity'];
		$data['inv_barcode'] = $form['inv_barcode'];


		$this->where('inv_id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update

	public function inv_get($ID)
	{
		$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
		$this->where('inv_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get
 

	public function get_int($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->where('inv_id',$ID);
		}

		$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
		$this->from($this->table_name);

		return $this->all_results();
	} // end of get


	public function get_product_name($product_id)
	{
		if (isset($product_id)) {
			$this->where('p_id',$product_id);
			$this->from('products');
			return $this->result();
		}
	}

	/**
	 * Get product by barcode
	 * @param $barcode string primary key or product key
	 * @return obecject
	 */
	public function get_product($barcode)
	{
		if (isset($barcode)) {		
			$this->where('p_barcode',$barcode);
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->left_join('discount', 'd', 'd.discount_product_id = p_id');	
		}


		$this->from($this->table_name);
		$result = $this->result();



		 if($result->discount_mode == 'offer'){

		 	$discount_id = $result->discount_id;
		 	$this->left_join('products', 'p', 'p.p_id = offers.offer_product_id');
		 	$this->where('offer_discount_id',$discount_id);
			$this->from('offers');
			$offer = $this->all_results();

			$result->offer_products = $offer;
		 }
		$result = (array)$result;
		$result['quantity'] = '1';
		$result = (object)$result;
		
		return $result;


		 /*
			$this->from('products');
			$product_bar = $this->result();
			$product_bar->p_id;
			
			$this->where('discount_product_id',$product_bar->p_id);
			$this->from('discount');
			$product_discount = $this->result();

			$product_discount_mode = $product_discount->discount_mode;
			//print_f($product_discount);
			if($product_discount_mode == 'offer'){
					echo 'Product in Offer';
					$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
					$this->left_join('discount', 'd', 'd.discount_product_id = p.p_id');
				//	$this->where('d.discount_status',1);
					$this->left_join('offers', 'o', 'o.offer_discount_id = d.discount_id');
					$this->where('o.offer_status',1);
					$this->where('inv_barcode',$barcode);
			}
			else if ($product_discount_mode == 'discount'){
					echo 'Product in Discount';
					$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
					$this->left_join('discount', 'd', 'd.discount_product_id = p.p_id');
					$this->where('d.discount_status',1);
					$this->where('inventory.inv_barcode',$barcode);
			}
			else {
				echo 'No Discount or Offer';
				$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
				$this->where('inv_barcode',$barcode);
			}
			*/
		
			/*
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->left_join('discount', 'd', 'd.discount_product_id = p.p_id');
			$this->where('d.discount_status',1);
			$this->left_join('offers', 'o', 'o.offer_discount_id = d.discount_id');
			$this->where('o.offer_status',1);
			$this->where('inv_barcode',$barcode);
			*/
			/*
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->left_join('discount', 'd', 'd.discount_product_id = p.p_id');
			//$this->where('d.discount_status',1);
			$this->where('inv_barcode',$barcode);
			*/

	} // end of get_product

} // end of class
?>