<?php 
/**
* USER MAIN CLASS
*/
class user extends database
{	
	
	private $table_name;

	function __construct(){
		parent::__construct();

		$this->table_name = 'users';
	}


	/**
	 * Login user
	 * @param  array $info submited form data
	 * @return boolean
	 */
	public function do_login($info)
	{	
		// Filter password
		$password = md5($info['password']);

		// Prepare where statement
		$this->where('login', $info['username']);
		$this->where('password', $password);

		// Select user primary key
		$this->select(array('id' => 'id', 'fname'=>'first_name', 'lname'=>'last_name', 'photo'=>'photo', 'designation'=>'designation', 'capabilities'=>'capabilities',));


		// From table
		$this->from($this->table_name);

		// If provided info is correct, login user
		if ($this->row_count() > 0) {
			
			$results = $this->result();

			$_SESSION['user'] = $results;

			return $results;
		}else{
			return false;
		}
	} // end of do_login()



	public function add_user($add_user)
	{	
		// Filter password
		$username 	= $add_user['username'];
		$email 		= $add_user['email'];
		// Prepare where statement
		$this->where('login', $add_user['username']);
	
		// From table
		$this->from($this->table_name);

		// If provided info is correct, login user
		if ($this->row_count() > 0) {
			$results = '<div class="alert alert-danger" role="alert">The ' . $username . ' Username is already exists</div>'; ;
			return $results;
		}else{
			$data = array();
			$password 	= md5($add_user['password']);
			$data['fname'] = $add_user['fname'];
			$data['lname'] = $add_user['lname'];
			$data['email'] = $add_user['email'];
			$data['login'] = $add_user['username'];
			$data['password'] = $password;
			$data['mobile'] = $add_user['mobile'];
			$data['phone'] = $add_user['phone'];
			$data['address'] = $add_user['address'];
			$data['city'] = $add_user['city'];
			$data['country'] = $add_user['country'];
			$data['nic'] = $add_user['nic'];
			$data['dob'] = $add_user['dob'];
			$data['designation'] = $add_user['designation'];
		//	$data['photo'] = $add_user['photo'];
			$data['capabilities'] = json_encode($add_user['capabilities']);
			$this->insert($this->table_name, $data);
			return '<div class="alert alert-success" role="alert">'.$username.' User Register Sucessfully...</div>';
		}
	} // end of do_register()


	public function update_user($add_user, $id)
	{
		
		$data = array();
			$password 	= md5($add_user['password']);
			$data['fname'] = $add_user['fname'];
			$data['lname'] = $add_user['lname'];
			$data['email'] = $add_user['email'];
			$data['login'] = $add_user['username'];
			$data['password'] = $password;
			$data['mobile'] = $add_user['mobile'];
			$data['phone'] = $add_user['phone'];
			$data['address'] = $add_user['address'];
			$data['city'] = $add_user['city'];
			$data['country'] = $add_user['country'];
			$data['nic'] = $add_user['nic'];
			$data['dob'] = $add_user['dob'];
			$data['designation'] = $add_user['designation'];
		//	$data['photo'] = $add_user['photo'];
			$data['capabilities'] = json_encode($add_user['capabilities']);
		
		$this->where('id', $id);

		$this->update($this->table_name, $data);

		return $this->row_count();

	} // end of update


	public function get_user($ID)
	{
		$this->where('id',$ID);
		$this->from($this->table_name);

		return $this->result();
	} // end of get

	public function get_users($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('id',$ID);
		}

		$this->from($this->table_name);

		return $this->all_results();
	} // end of get

	public function session_destroy(){
		unset($_SESSION['user']);
		session_destroy();
	}

}
 ?>