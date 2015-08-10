<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();		
	}
	
	function pm_ASpace($str)
	{
		if (preg_match('/^[a-zA-Z\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ASpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_ANSpace($str)
	{
		if (preg_match('/^[a-zA-Z0-9\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ANSpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_NStripe($str)
	{
		if (preg_match('/^[0-9-]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_NStripe', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_StrongPassword($str)
	{
		if (preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_StrongPassword', '%s kurang kuat. Silakan gunakan kombinasi huruf, angka dan symbol lainnya.');
			return FALSE;
		}
	}

	function pm_rekening($id)
	{
		if ($this->sbh_query->id('rekening', array('id_rekening' => $id))){
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_rekening', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
}

class Client extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->lib->id_user() && $this->lib->username()) {
			return TRUE;
		} else {
			show_404();
			return FALSE;
		}		
	}
	
	function pm_ASpace($str)
	{
		if (preg_match('/^[a-zA-Z\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ASpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_ANSpace($str)
	{
		if (preg_match('/^[a-zA-Z0-9\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ANSpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_StrongPassword($str)
	{
		if (preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_StrongPassword', '%s kurang kuat. Silakan gunakan kombinasi huruf, angka dan symbol lainnya.');
			return FALSE;
		}
	}

	function pm_rekening($id)
	{
		if ($this->sbh_query->id('rekening', array('id_rekening' => $id))){
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_rekening', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
}

class Staff extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->lib->id_user() && $this->lib->username()) {
			if ($this->lib->role() === '1') {
				return TRUE;
			} else {
				show_404();
				return FALSE;
			}			
		} else {
			show_404();
			return FALSE;
		}
	}
	
	function pm_ASpace($str)
	{
		if (preg_match('/^[a-zA-Z\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ASpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_ANSpace($str)
	{
		if (preg_match('/^[a-zA-Z0-9\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_ANSpace', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_NSpaceStripe($str)
	{
		if (preg_match('/^[0-9-\s]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_NSpaceStripe', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_NStripe($str)
	{
		if (preg_match('/^[0-9-]+$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_NStripe', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
	
	function pm_StrongPassword($str)
	{
		if (preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $str)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_StrongPassword', '%s kurang kuat. Silakan gunakan kombinasi huruf, angka dan symbol lainnya.');
			return FALSE;
		}
	}

	function pm_rekening($id)
	{
		if ($this->sbh_query->id('rekening', array('id_rekening' => $id))){
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_rekening', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}

	function pm_role($id)
	{
		if ($this->sbh_query->id('role', array('id_role' => $id))){
			return TRUE;
		} else {
			$this->form_validation->set_message('pm_role', 'Terjadi kesalahan dalam bidang %s');
			return FALSE;
		}
	}
}