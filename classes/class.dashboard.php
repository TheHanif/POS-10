<?php 
/**
* DASHBOARD MAIN CLASS
*/
class dashboard extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_sale = 'sale';
		$this->table_sale_product = 'sale_product';
		$this->table_profitloss = 'accounts_profitloss';
	}

	public function get_sale_monthly_report()
	{
		$this->select(array('SUM(salepro_product_quantity * salepro_product_price)' => 'bill_amount', 'MONTH(salepro_date)' => 'MONTH' ));
		$this->force_select_all();
		$this->group_by('YEAR(salepro_date), MONTH(salepro_date)');
		$this->from($this->table_sale_product);
		return $this->all_results();
	} // end of get_sale_monthly_report


	public function get_sale_user_report()
	{

		$this->select(array('SUM(salepro_product_quantity * salepro_product_price)' => 'bill_amount'));
		$this->inner_join('sale_product', 'sp', 'sp.salepro_sale_id = sale.sale_id');
		$this->left_join('users', 'u', 'u.id = sale.sale_user_id');
		$this->force_select_all();
		$this->group_by('sale.sale_user_id');
		$this->from($this->table_sale, '0,5');
		return $this->all_results();
	} // end of get_sale_user_report


	public function get_profitloss_report()
	{
		$this->select(array('SUM(pl_profit)' => 'profit_product_amount', 'MONTH(pl_date)' => 'MONTH' ));
		$this->force_select_all();
		$this->group_by('YEAR(pl_date), MONTH(pl_date)');
		$this->from($this->table_profitloss);
		return $this->all_results();
	} // End of get_profitloss_report


	public function get_latest_sale_person()
	{
		$this->select(array('SUM(salepro_product_quantity * salepro_product_price)' => 'bill_amount'));
		$this->inner_join('sale_product', 'sp', 'sp.salepro_sale_id = sale.sale_id');
		$this->inner_join('users', 'u', 'u.id = sale.sale_user_id');
		$this->force_select_all();
		$this->group_by('sp.salepro_sale_id');
		$this->order_by('sp.salepro_sale_id', 'DESC');
		$this->from($this->table_sale, '0,6');
		return $this->all_results();
	} // end of get_latest_sale_person
	
} // end of class


 ?>