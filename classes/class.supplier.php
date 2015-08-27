 <?php 
/**
* USER MAIN CLASS
*/
class supplier extends database
{	
	
	private $table_name;

	function __construct(){
		parent::__construct();

		$this->table_name = 'supplier';
		$this->bills = 'bills';
	}


	public function add_supplier($add_supplier)
	{	
		$data = array();

		$data['sup_name'] = $add_supplier['sname'];
		$data['sup_email'] = $add_supplier['email'];
		$data['sup_phone'] = $add_supplier['phone'];
		$data['sup_address'] = $add_supplier['address'];
		$data['sup_city'] = $add_supplier['city'];

		$this->insert($this->table_name, $data);

		return $this->row_count();
	} // end of do_register()


	public function update_supplier($add_supplier, $id)
	{
		
		$data = array();
			$data['sup_name'] = $add_supplier['sname'];
			$data['sup_email'] = $add_supplier['email'];
			$data['sup_phone'] = $add_supplier['phone'];
			$data['sup_address'] = $add_supplier['address'];
			$data['sup_city'] = $add_supplier['city'];
		
		$this->where('sup_id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update


	public function get_supplier($ID)
	{
		$this->where('sup_id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get

	public function get_suppliers($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('id',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get


	public function add_bill($add_supplier)
	{	
		$data = array();

		$data['bill_supid'] = $add_supplier['supplier_id'];
		$data['bill_number'] = $add_supplier['bill_number'];
		$data['bill_duedate'] = $add_supplier['due_date'];
		$data['bill_amount'] = $add_supplier['bill_amount'];
		$data['bill_type'] = $add_supplier['payment_type'];
		$data['bill_bankdetail'] = $add_supplier['bank_detail'];
		$this->insert($this->bills, $data);

		return $this->row_count();
	} // end of do_register()

	public function get_bills($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('bill_id',$ID);
		}
		$this->from($this->bills);
		return $this->all_results();
	} // end of get

}
 ?>