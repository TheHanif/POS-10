<?php 
/**
* INVENTORY MAIN CLASS
*/
class product extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'products';
		$this->warehouse = 'warehouse';
		$this->inventory = 'inventory';
		$this->sale_product = 'sale_product';
	}

	public function pro_insert($form)
	{
		$data = array();

		$data['p_name'] = $form['p_name'];
		$data['p_supplier'] = $form['p_supplier'];
		$data['p_cost'] = $form['p_cost'];
		$data['p_price'] = $form['p_price'];
		$data['p_gst'] = $form['p_gst'];
		$data['p_vat'] = $form['p_vat'];
		$data['p_barcode'] = $form['p_barcode'];
		$data['p_volumetype'] = $form['p_volumetype'];
		$data['p_volumevalue'] = $form['p_volumevalue'];
		$data['p_skucrate'] = $form['p_skucrate'];
		$data['p_skucarton'] = $form['p_skucarton'];
		$data['p_skubag'] = $form['p_skubag'];

		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function pro_update($form, $id)
	{
		$data = array();

		$data['p_name'] = $form['p_name'];
		$data['p_supplier'] = $form['p_supplier'];
		$data['p_cost'] = $form['p_cost'];
		$data['p_price'] = $form['p_price'];
		$data['p_gst'] = $form['p_gst'];
		$data['p_vat'] = $form['p_vat'];
		$data['p_barcode'] = $form['p_barcode'];
		$data['p_volumetype'] = $form['p_volumetype'];
		$data['p_volumevalue'] = $form['p_volumevalue'];
		$data['p_skucrate'] = $form['p_skucrate'];
		$data['p_skucarton'] = $form['p_skucarton'];
		$data['p_skubag'] = $form['p_skubag'];

		$this->where('p_id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update

	public function pro_get($ID)
	{
		$this->where('p_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get

	public function generate_item_quantity($ID, $type, $qty = 1)
	{
		$product = $this->pro_get($ID);
		$type = 'p_sku'.$type;
		return $product->$type*$qty;
	}


	public function get_product($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('p_id',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get

	public function get_supplier_product($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('p_supplier',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get

	public function get_product_stock($product_name = NULL, $product_place = NULL)
	{
		
		if($product_place == 'warehouse'){
			if (isset($product_name)) {
				$this->where('product_id',$product_name);
			}
			$this->force_select_all();
			$this->inner_join('products', 'p', 'p.p_id = warehouse.product_id');
			$this->select(array('SUM(warehouse.warehouse_quantity)' => 'qty'));
			$this->group_by('warehouse.product_id');
			$this->from($this->warehouse);
			return $this->all_results();
		}
		else {
			if (isset($product_name)) {
				$this->where('inv_pid',$product_name);
			}
			$this->force_select_all();
			$this->inner_join('products', 'p', 'p.p_id = inventory.inv_pid');
			$this->select(array('SUM(inventory.inv_quantity)' => 'qty'));
			$this->group_by('inventory.inv_pid');
			$this->from($this->inventory);
			return $this->all_results();
		}
	} // end of get_product_stock

	public function get_product_inventory_stock($product_name = NULL)
	{
		if (isset($product_name)) {
				$this->where('inv_pid',$product_name);
			}
			// $this->force_select_all();
			$this->select(array('SUM(inventory.inv_quantity)' => 'inventory_quantity'));
			$this->group_by('inventory.inv_pid');
			$this->from($this->inventory);
			return $this->all_results();
	} // end of get_product_inventory_stock
	
	public function get_product_sale_stock($product_name = NULL)
	{
		if (isset($product_name)) {
				$this->where('salepro_product_id',$product_name);
			}
			// $this->force_select_all();
			$this->select(array('SUM(sale_product.salepro_product_quantity)' => 'salepro_pro_quantity'));
			$this->group_by('sale_product.salepro_product_id');
			$this->from($this->sale_product);
			return $this->all_results();
	} // end of get_product_sale_stock
	

} // end of class


 ?>