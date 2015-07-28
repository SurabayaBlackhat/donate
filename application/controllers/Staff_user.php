<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Staff_user extends Staff
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('staff/user/index');
	}
}