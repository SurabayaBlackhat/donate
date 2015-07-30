<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Staff_konfirmasi extends Staff
{
	function index()
	{
		$data = array(
			'all' => $this->sbh_query->join2('konfirmasi', 'user', 'rekening', 'konfirmasi.id_user=user.id_user', 'konfirmasi.ke_rekening=rekening.id_rekening', 'id_konfirmasi DESC')
			);
		$this->load->view('staff/konfirmasi/index', $data);
	}

	function struk($id)
	{
		if (isset($id)) {
			if (!empty($this->_get_id($id))) {
				$check_gambar = $this->sbh_query->join_where('konfirmasi_gambar', 'konfirmasi', 'konfirmasi_gambar.id_konfirmasi_relation=konfirmasi.id_konfirmasi', array('id_konfirmasi' => $id), 'id_konfirmasi_gambar ASC');
				if ($check_gambar != FALSE) {
					$data['gambar'] = $check_gambar;
				} else {
					$data['gambar'] = array();
				}
				$data['id'] = $this->_get_id($id);
				$this->load->view('staff/konfirmasi/struk', $data);
			} else {
				show_404();
			}			
		} else {
			redirect('staff_konfirmasi');
		}
	}

	function edit($id)
	{
		if (isset($id)) {
			if (!empty($this->_get_id($id))) {
				$data = array(
					'id' => $this->_get_id($id),
					'rekening' => $this->sbh_query->all('rekening', 'id_rekening ASC'),
					);
				$this->form_validation->set_rules('atas_nama_konfirmasi', 'Atas Nama', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ASpace');
				$this->form_validation->set_rules('no_rekening_konfirmasi', 'Nomor Rekening', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('berita_rekening', 'Berita', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ANSpace');
				$this->form_validation->set_rules('status', 'Status', 'trim|xss_clean|min_length[5]|max_length[7]');
				$this->form_validation->set_rules('ke_rekening', 'Ke Rekening', 'trim|required|xss_clean|min_length[1]|max_length[11]|callback_pm_rekening');
				$this->form_validation->set_error_delimiters('', '');
				if ($this->form_validation->run() == TRUE) {
					$edit = array(
						'atas_nama_konfirmasi' => $this->form_validation->set_value('atas_nama_konfirmasi'),
						'no_rekening_konfirmasi' => $this->form_validation->set_value('no_rekening_konfirmasi'),
						'jumlah' => $this->form_validation->set_value('jumlah'),
						'berita_rekening' => $this->form_validation->set_value('berita_rekening'),
						'ke_rekening' => $this->form_validation->set_value('ke_rekening'),
						);
					if ($this->input->post('status', TRUE) == '') {
						$edit['status'] = NULL;
					} else {
						$edit['status'] = $this->form_validation->set_value('status');
					}					
					$this->sbh_query->update('konfirmasi', $edit, array('id_konfirmasi' => $id));
					redirect('staff_konfirmasi');
				} else {
					$this->load->view('staff/konfirmasi/edit', $data);
				}
			} else {
				show_404();
			}			
		} else {
			redirect('staff_konfirmasi');
		}
	}

	function drop($id)
	{
		if (isset($id)) {
			if (!empty($this->_get_id($id))) {
				$this->sbh_query->delete('konfirmasi', array('id_konfirmasi' => $id));
				redirect('staff_konfirmasi');
			} else {
				show_404();
			}
		} else {
			redirect('staff_konfirmasi');
		}
	}

	function _get_id($id)
	{
		$sbh = $this->sbh_query->join_where('konfirmasi', 'rekening', 'konfirmasi.ke_rekening=rekening.id_rekening', array('id_konfirmasi' => $id), 'id_konfirmasi');
		return ($sbh == FALSE)?array():$sbh;
	}
}