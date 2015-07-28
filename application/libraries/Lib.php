<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Lib
{	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function destroy_all()
	{
		$this->ci->session->sess_destroy();
		$this->ci->session->sess_create();
	}

	function id_user()
	{
		return $this->ci->session->userdata('id_user');
	}

	function username()
	{
		return $this->ci->session->userdata('username');
	}

	function role()
	{
		return $this->ci->session->userdata('role');
	}

	function register()
	{
		return $this->ci->session->userdata('register');
	}

	function donate()
	{
		return $this->ci->session->userdata('donate');
	}

	function record()
	{
		$user = $this->ci->sbh_query->one('user', array('id_user' => $this->id_user()));
		if ($user != FALSE) {
			return $user;
		} else {
			return array();
		}
	}

	function logout()
	{
		$array = array('id_user', 'username', 'role');
		$this->ci->session->unset_userdata($array);
	}

	function dateNoHour($str)
	{
		$year = substr($str,0,4);
		$date = substr($str,8,2);
		$month = substr($str,5,2);
		$formatMonth = $this->monthID($month);
		return $date.' '.$formatMonth.' '.$year;
	}

	function dateAndHour($str)
	{
		$year = substr($str,0,4);
		$date = substr($str,8,2);
		$month = substr($str,5,2);
		$hour = substr($str,11,2);
		$minute = substr($str,14,2);
		$formatMonth = $this->monthID($month);
		return $date.' '.$formatMonth.' '.$year.' '.$hour.':'.$minute;
	}

	function dateAndHourStripe($str)
	{
		$year = substr($str,0,4);
		$date = substr($str,8,2);
		$month = substr($str,5,2);
		$hour = substr($str,11,2);
		$minute = substr($str,14,2);
		$formatMonth = $this->monthID($month);
		return $date.' '.$formatMonth.' '.$year.' ─ '.$hour.':'.$minute;
	}

	function dateAndHourIcon($str)
	{
		$year = substr($str,0,4);
		$date = substr($str,8,2);
		$month = substr($str,5,2);
		$hour = substr($str,11,2);
		$minute = substr($str,14,2);
		$formatMonth = $this->monthID($month);
		$icon = array(
			'clock' => '<i class="fa fa-clock-o"></i>',
			'calendar' => '<i class="fa fa-calendar-o"></i>'
			);
		return $icon['calendar'].' '.$date.' '.$formatMonth.' '.$year.' '.$icon['clock'].' '.$hour.':'.$minute;
	}

	function monthID($str)
	{
		$month = '';
		switch($str){
			case '01':
				$month = 'Januari';
			break;
			case '02':
				$month = 'Februari';
			break;
			case '03':
				$month = 'Maret';
			break;
			case '04':
				$month = 'April';
			break;
			case '05':
				$month = 'Mei';
			break;
			case '06':
				$month = 'Juni';
			break;
			case '07':
				$month = 'Juli';
			break;
			case '08':
				$month = 'Agustus';
			break;
			case '09':
				$month = 'September';
			break;
			case '10':
				$month = 'Oktober';
			break;
			case '11':
				$month = 'November';
			break;
			case '12':
				$month = 'Desember';
			break;
		}
		return $month;
	}
}