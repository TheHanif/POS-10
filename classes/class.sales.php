<?php 
/**
* INVENTORY MAIN CLASS
*/
class sales extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'sale';
	}

	public function sale_insert($form)
	{
		$data = array();
		$data['sale_bill_number'] = $form['bill_number'];
		$data['sale_shift_number'] = $form['user_shift_number'];
		$data['sale_terminal_number'] = $form['user_terminal_point_number'];
		$data['sale_payment'] = $form['payment_mode'];
		$data['sale_user_id'] = $form['user_id'];
	
		// Sales Insert in Sale Table
		$this->insert($this->table_name, $data);
		if($this->row_count() > 0){
			$sale_id = $this->last_id();
		}
		else {
			return false;
		}
	

		// print_f($_SESSION['terminal_list']);
		// Sales Products Insert in Sale Products Table
		if($sale_id){
			foreach ($_SESSION['terminal_list'] as $key => $value) {

				
				$product['salepro_product_id']			= $value[key($value)]['product_id'];
				$product['salepro_product_price'] 		= $value[key($value)]['price'];
				$product['salepro_product_quantity']	= $value[key($value)]['quantity'];
				$product['salepro_sale_id']				= $sale_id;

				
				$this->insert('sale_product', $product);
			}
			return true;
		}
		else{
			return false;
		}
	} // end of insert

} // end of class


 ?>