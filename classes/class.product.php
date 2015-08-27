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

		print_f($data);
		die();

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

} // end of class


 ?>