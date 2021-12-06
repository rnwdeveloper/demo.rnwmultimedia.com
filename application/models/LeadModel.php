	<?php
class LeadModel extends CI_Model
{
	function __construct()
	{
		parent ::__construct();	
	}
		

	public function view_all_records($tbl)
	{
		$this->db->from($tbl);
		$data = $this->db->get();
		return $data->num_rows();	
	}

	public function view_all($tbl)
	{
		$data=$this->db->get($tbl);
		return $data->result();	
	}
	

}

?>