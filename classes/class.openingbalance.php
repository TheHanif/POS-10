<?php 
/**
* INVENTORY MAIN CLASS
*/
class openingbalance extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'open_balance';
	}

	public function insert_open_balance($form)
	{
		
		$data = array();
		$data['ob_user'] = $form['person_name'];
		$data['ob_date'] = $form['from_date'];
		$data['ob_balance'] = $form['amount'];
		$this->insert($this->table_name, $data);
		return $this->row_count();

	} // end of insert

	public function update_open_balance($form, $id)
	{
		
		$data = array();
		$data['ob_user'] = $form['person_name'];
		$data['ob_date'] = $form['from_date'];
		$data['ob_balance'] = $form['amount'];

		$this->where('ob_id', $id);
		$this->update($this->table_name, $data);
		return $this->row_count();
	} // end of update

	public function get_opening_balance($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('ob_id',$ID);
		}
		$this->inner_join('users', 'u', 'u.id = open_balance.ob_user');
		$this->from($this->table_name);
		return $this->all_results();
	} // end of get_opening_balance

	public function get_opening_date_balance($person_name = NULL, $balance_date = NULL)
	{
		if (isset($person_name)) {
			$this->where('ob_user', $person_name);
		}

		if (isset($balance_date)) {
			$this->where('ob_date', $balance_date);
		}
		$this->from($this->table_name);
		return $this->all_results();
	} // end of get_opening_balance


} // end of class


 ?>