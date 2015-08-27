<?php 
/**
* INVENTORY MAIN CLASS
*/
class offer extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name 	= 'discount';
		$this->table_offer	= 'offers';
	}

	public function insert_offer($form)
	{
		$data = array();
		$data['discount_product_id']		= $form['product_id'];
		$data['discount_min_purchase_qty']	= $form['min_purchase'];
		$data['discount_mode'] 				= $form['type'];
		$data['discount_status']			= $form['status'];
		
		// Offer Insert in Discount Table
		$this->insert($this->table_name, $data);
		if($this->row_count() > 0){
			$offer_id = $this->last_id();
		}
		else {
			return false;
		}

		// Offer Products Insert in Offer Table
		if($offer_id){
			foreach ($form['offer']['product_id'] as $key => $product_id) {
				$offer = array();
				$offer['offer_discount_id']		= $offer_id;
				$offer['offer_product_id']		= $product_id;
				$offer['offer_product_quantity']= $form['offer']['qty'][$key];
				$offer['offer_status']			= 1;
				$this->insert('offers', $offer);
			}
			return true;
		}
		else{
			return false;
		}

	} // end of insert

	public function update_offer($form, $id)
	{
		
	
		$data = array();
		$data['discount_product_id']		= $form['product_id'];
		$data['discount_min_purchase_qty']	= $form['min_purchase'];
		$data['discount_mode'] 				= $form['type'];
		$data['discount_status']			= $form['status'];
		
		// Offer Update in Discount Table
		$this->where('discount_id', $id);
		$this->update($this->table_name, $data);


		// Offer Products Delete Only Latest Product for Offer Table
		$this->where('offer_discount_id', $id);
		$this->where('offer_status', 1);
		$this->delete($this->table_offer, $num_rows = NULL);

		// Offer Products Insert in Offer Table
		if($form['offer']['product_id']){
			foreach ($form['offer']['product_id'] as $key => $product_id) {
				$offer = array();
				$offer['offer_discount_id']		= $id;
				$offer['offer_product_id']		= $product_id;
				$offer['offer_product_quantity']= $form['offer']['qty'][$key];
				$offer['offer_status']			= 1;
				$this->insert('offers', $offer);
			}
			return true;
		}
		else{
			return false;
		}
	
	} // end of update

	public function get_products($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = discount.discount_product_id');
			$this->where('discount.discount_id',$ID);
			$this->where('discount.discount_mode','offer');
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			// $this->where('id',$ID);
			$this->inner_join('products', 'p', 'p.p_id = discount.discount_product_id');
			$this->where('discount_mode','offer');
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get

	public function get_offers($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'pro', 'pro.p_id = offers.offer_product_id');
			$this->where('offers.offer_discount_id',$ID);
			$this->where('offers.offer_status',1);
			$this->from($this->table_offer);
			return $this->all_results();
		}
	} // end of get

} // end of class


 ?>