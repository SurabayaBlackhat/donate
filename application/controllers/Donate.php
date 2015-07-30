<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Donate extends Main
{
	function index()
	{
		if (!$this->lib->id_user() && !$this->lib->username()) {
			redirect('sbh/login');
		} else {
			if ($this->lib->donate()) {
				$this->load->view('client/donate/sudah_donate');
			} else {
				$this->form_validation->set_rules('atas_nama_konfirmasi', 'Atas Nama', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ASpace');
				$this->form_validation->set_rules('no_rekening_konfirmasi', 'Nomor Rekening', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|xss_clean|numeric');
				$this->form_validation->set_rules('berita_rekening', 'Berita', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ANSpace');
				$this->form_validation->set_rules('ke_rekening', 'Ke Rekening', 'trim|required|xss_clean|min_length[1]|max_length[11]|callback_pm_rekening');
				$this->form_validation->set_error_delimiters('', '');
				if ($this->form_validation->run() == TRUE) {
					$insert = array(
						'id_user' => $this->lib->id_user(),
						'atas_nama_konfirmasi' => $this->form_validation->set_value('atas_nama_konfirmasi'),
						'no_rekening_konfirmasi' => $this->form_validation->set_value('no_rekening_konfirmasi'),
						'jumlah' => $this->form_validation->set_value('jumlah'),
						'berita_rekening' => $this->form_validation->set_value('berita_rekening'),
						'status' => NULL,
						'tanggal_waktu' => date('Y-m-d H:i:s'),
						'ke_rekening' => $this->form_validation->set_value('ke_rekening'),
						);
					$this->sbh_query->insert('konfirmasi', $insert);
					$this->session->set_userdata(array(
						'donate' => 'TRUE'
						));
					foreach ($this->lib->record() as $user) {
						$this->email->from($this->config->item('email'), $this->config->item('nama'));
						$this->email->reply_to($this->config->item('email'), $this->config->item('nama'));
						$this->email->to($user->email);
						$this->email->subject(sprintf('Your Donate - ' . $insert['atas_nama_konfirmasi'], $this->config->item('nama')));
						$this->email->message($this->load->view('client/email/donate', $insert, TRUE));
						$this->email->send();
					}
					$this->load->view('client/donate/sukses');
				} else {
					$data = array(
						'rekening' => $this->sbh_query->all('rekening', 'id_rekening ASC'),
						);
					$this->load->view('client/donate/index', $data);
				}
			}
		}		
	}
}