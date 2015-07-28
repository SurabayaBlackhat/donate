<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function login($table,$field1,$field2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function loggedin($table,$field)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}
}