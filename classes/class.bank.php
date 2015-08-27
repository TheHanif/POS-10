 <?php 
/**
* USER MAIN CLASS
*/
class bank extends database
{	
	
	private $table_name;

	function __construct(){
		parent::__construct();

		$this->table_name = 'banks';
		$this->transection = 'banks_transection';
	}

	public function add_bank($add_bank)
	{	
		$data = array();
		$data['bank_name'] = $add_bank['bank_name'];
		$data['bank_address'] = $add_bank['bank_address'];
		$data['bank_branch'] = $add_bank['bank_branch'];
		$data['bank_account_no'] = $add_bank['bank_account_no'];
		$data['bank_br_code'] = $add_bank['bank_branch_code'];
		$data['bank_ibn_no'] = $add_bank['bank_ibn_number'];
		$data['bank_account_type'] = $add_bank['bank_account_type'];
		$data['bank_account_title'] = $add_bank['bank_account_title'];
		$data['bank_opening_balance'] = $add_bank['bank_opening_balance'];
		$this->insert($this->table_name, $data);
		return $this->row_count();
	} // end of add_bank


	public function update_bank($add_bank, $id)
	{
		$data = array();
		$data['bank_name'] = $add_bank['bank_name'];
		$data['bank_address'] = $add_bank['bank_address'];
		$data['bank_branch'] = $add_bank['bank_branch'];
		$data['bank_account_no'] = $add_bank['bank_account_no'];
		$data['bank_br_code'] = $add_bank['bank_branch_code'];
		$data['bank_ibn_no'] = $add_bank['bank_ibn_number'];
		$data['bank_account_type'] = $add_bank['bank_account_type'];
		$data['bank_account_title'] = $add_bank['bank_account_title'];
		$data['bank_opening_balance'] = $add_bank['bank_opening_balance'];

		$this->where('bank_id', $id);
		$this->update($this->table_name, $data);
		return $this->row_count();
	} // end of update_bank


	public function get_banks($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('bank_id',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get_banks


	public function add_transection_bank($bank_transection)
	{	
		$data = array();
		$data['transection_bank'] = $bank_transection['transection_bank'];
		$data['transection_amount'] = $bank_transection['transection_amount'];
		$data['transection_type'] = $bank_transection['transection_type'];
		$data['transection_payment_mode'] = $bank_transection['transection_payment_mode'];
		$data['transection_detail'] = $bank_transection['transection_detail'];
		$data['transection_date'] = date("j-n-Y, g:i a");
		$this->insert($this->transection, $data);
		return $this->row_count();
	} // end of add_bank
}
 ?>