<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Sbh_query extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

    function id($table,$where)
    {
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return $query->result_array();
        } else {
            return FALSE;
        }
    }

	function one($table,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function all($table,$order)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function all_where($table,$where,$order)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function join_where($table1,$table2,$join,$where,$order)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$join);
		$this->db->where($where);
		$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function join2($table1,$table2,$table3,$join1,$join2,$order)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$join1);
		$this->db->join($table3,$join2);
		$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function join_2where($table1,$table2,$join,$where1,$where2,$order)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$join);
		$this->db->where($where1);
		$this->db->where($where2);
		$this->db->order_by($order);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	function update($table,$data,$where)
	{
		$this->db->update($table,$data,$where);
	}

	function delete($table,$where)
	{
		$this->db->delete($table,$where);
	}

	function count_where($table,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$count = $this->db->count_all_results();
		if ($count == 0) {
			return FALSE;
		} else {
			return $count;
		}
	}

	function count_2where($table,$where1,$where2)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where1);
		$this->db->where($where2);
		$count = $this->db->count_all_results();
		if ($count == 0) {
			return FALSE;
		} else {
			return $count;
		}
	}
}
