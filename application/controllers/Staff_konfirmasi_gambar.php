<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Staff_konfirmasi_gambar extends Staff
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('staff/konfirmasi_gambar/index');
	}
}