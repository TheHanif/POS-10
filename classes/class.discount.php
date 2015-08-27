<?php 
/**
* INVENTORY MAIN CLASS
*/
class discount extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'discount';
	}

	public function insert_discount($form)
	{
		$data = array();

		$data['discount_product_id'] = $form['product_id'];
		$data['discount_type'] = $form['discount_type'];
		$data['discount_amount'] = $form['discount_amount'];
		$data['discount_min_purchase_qty'] = $form['min_purchase'];
		$data['discount_mode'] = $form['type'];
		$data['discount_status'] = $form['status'];

		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_discount($form, $id)
	{
		
	
		$data = array();

		$data['discount_product_id'] = $form['product_id'];
		$data['discount_type'] = $form['discount_type'];
		$data['discount_amount'] = $form['discount_amount'];
		$data['discount_min_purchase_qty'] = $form['min_purchase'];
		$data['discount_mode'] = $form['type'];
		$data['discount_status'] = $form['status'];

		$this->where('discount_id', $id);
		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update

	public function get_products($ID = NULL)
	{
		if (isset($ID)) {
			$this->inner_join('products', 'p', 'p.p_id = discount.discount_product_id');
			$this->where('discount_id',$ID);
			$this->where('discount_mode','discount');
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			// $this->where('id',$ID);
			$this->inner_join('products', 'p', 'p.p_id = discount.discount_product_id');
			$this->where('discount_mode','discount');
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get

} // end of class


 ?>