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

		// Sales Products Insert in Sale Products Table
		if($sale_id){

			foreach ($_SESSION['terminal_list'] as $key => $value) {

				$val_array = array();
				foreach ($value[key($value)] as $key_array => $value_array) {
					$val_array[$key_array] = $value_array;
				}

				$product['salepro_product_id']			= $val_array['p_id'];
				$product['salepro_product_price'] 		= $val_array['p_price']-$val_array['discount_amount'];
				$product['salepro_product_quantity']	= $val_array['quantity'];
				$product['salepro_sale_id']				= $sale_id;
				
				$this->insert('sale_product', $product);


				// Account
				$accounts = new accounts();
				
				// Sale and revenue
				$product_id = $val_array['p_id'];
				$cost = $val_array['p_cost'];
				$price = $val_array['p_price']-$val_array['discount_amount'];
				$quantity = $val_array['quantity'];
				$total = $price * $quantity;
				$date = $accounts->_date('Y-m-d H:i:s', date('d-m-Y'));
				$accounts->create_sales($product_id, $cost, $price, $quantity, $total, $date);
				
				// Profit and loss
				$cost1 = $cost * $quantity;
				$price1 = $price * $quantity;
				$profit = $price1 - $cost1;
				$results = $accounts->create_profitloss($product_id, $cost, $price, $quantity, $profit, $date);
				


			}
			return true;
		}
		else{
			return false;
		}
	} // end of insert

} // end of class


 ?>