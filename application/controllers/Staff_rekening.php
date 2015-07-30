<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Staff_rekening extends Staff
{
	function index()
	{
		$data = array(
			'payments' => $this->sbh_query->all('rekening', 'id_rekening DESC')
			);
		$this->load->view('staff/rekening/index', $data);
	}

	function add()
	{
		$this->form_validation->set_rules('atas_nama_rekening', 'Atas Nama', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ASpace');
		$this->form_validation->set_rules('no_rekening', 'Nomor Rekening', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_NSpaceStripe');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required|xss_clean|min_length[3]|max_length[100]|callback_pm_ASpace');
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == TRUE) {
			$add = array(
				'atas_nama_rekening' => $this->form_validation->set_value('atas_nama_rekening'),
				'no_rekening' => $this->form_validation->set_value('no_rekening'),
				'bank' => $this->form_validation->set_value('bank'),
				);
			$this->sbh_query->insert('rekening', $add);
			redirect('staff_rekening');
		} else {
			$this->load->view('staff/rekening/add');
		}
	}

	function edit($id)
	{
		$this->form_validation->set_rules('atas_nama_rekening', 'Atas Nama', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ASpace');
		$this->form_validation->set_rules('no_rekening', 'Nomor Rekening', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_NSpaceStripe');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required|xss_clean|min_length[3]|max_length[100]|callback_pm_ASpace');
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == TRUE) {
			$edit = array(
				'atas_nama_rekening' => $this->form_validation->set_value('atas_nama_rekening'),
				'no_rekening' => $this->form_validation->set_value('no_rekening'),
				'bank' => $this->form_validation->set_value('bank'),
				);
			$this->sbh_query->update('rekening', $edit, array('id_rekening' => $id));
			redirect('staff_rekening');
		} else {
			$data = array(
				'id' => $this->_get_id($id)
				);
			$this->load->view('staff/rekening/edit', $data);
		}
	}

	function drop($id)
	{
		if (isset($id)) {
			if (!empty($this->_get_id($id))) {
				$this->sbh_query->delete('rekening', array('id_rekening' => $id));
				redirect('staff_rekening');
			} else {
				show_404();
			}
		} else {
			redirect('staff_rekening');
		}
	}

	function _get_id($id)
	{
		$sbh = $this->sbh_query->one('rekening', array('id_rekening' => $id));
		return ($sbh == FALSE)?array():$sbh;
	}
}