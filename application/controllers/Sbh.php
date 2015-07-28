<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Sbh extends Main
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			$data = array(
				'my_donate' => $this->sbh_query->count_where('konfirmasi', array('id_user' => $this->lib->id_user())),
				'valid_donate' => $this->sbh_query->count_2where('konfirmasi', array('status' => 'VALID'), array('id_user' => $this->lib->id_user())),
				'invalid_donate' => $this->sbh_query->count_2where('konfirmasi', array('status' => 'INVALID'), array('id_user' => $this->lib->id_user())),
				'donate' => $this->sbh_query->join_where('konfirmasi', 'rekening', 'konfirmasi.ke_rekening=rekening.id_rekening', array('id_user' => $this->lib->id_user()), 'id_konfirmasi DESC')
				);
			$this->load->view('client/sbh/index', $data);
		} else {
			show_404();
			return FALSE;
		}		
	}

	function struk($hash)
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			if (!empty($hash)) {
				$data = array(
					'array_hash' => $this->_struk($hash)
					);
				if (!empty($data['array_hash'])) {
					foreach ($data['array_hash'] as $row) {
						$data['count_image'] = $this->sbh_query->count_where('konfirmasi_gambar', array('id_konfirmasi_relation' => $row->id_konfirmasi));
						$check_gambar = $this->sbh_query->join_where('konfirmasi_gambar', 'konfirmasi', 'konfirmasi_gambar.id_konfirmasi_relation=konfirmasi.id_konfirmasi', array('hash' => $hash), 'id_konfirmasi_gambar ASC');
						if ($check_gambar != FALSE) {
							$data['gambar'] = $check_gambar;
						} else {
							$data['gambar'] = array();
						}
						$this->load->view('client/sbh/struk', $data);
					}					
				} else {
					show_404();
				}
			} else {
				redirect('sbh');
			}
		} else {
			redirect('sbh/login');
		}
	}

	function struk_ajax($hash)
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			if (!empty($hash)) {
				$data = array(
					'array_hash' => $this->_struk($hash)
					);
				if (!empty($data['array_hash'])) {
					foreach ($data['array_hash'] as $row) {
						$count_image = $this->sbh_query->count_where('konfirmasi_gambar', array('id_konfirmasi_relation' => $row->id_konfirmasi));
						if ($count_image < 2) {
							if (!empty($_FILES['userfile']['tmp_name'])) {
								$config_upload = array(
									'upload_path' => 'assets/images/struk/',
									'allowed_types' => 'jpg|jpeg|png|gif',
									'max_size' => '1024',
									'encrypt_name' => TRUE
								);
								$this->load->library('upload', $config_upload);
								if (!$this->upload->do_upload()) {
									$this->load->view('client/sbh/struk_error');
								} else {
									$data_upload = $this->upload->data();
									if ($data_upload['image_width'] >= 1000) {
										$config['image_library'] = 'gd2';
										$config['source_image'] = 'assets/images/struk/'.$data_upload['file_name'];
										$config['width'] = 500;
										$config['height'] = AUTO;
										$this->load->library('image_lib',$config);
										$this->image_lib->resize();
										$insert = array(
											'id_konfirmasi_relation' => $row->id_konfirmasi,
											'gambar' => $data_upload['file_name']
											);
										$this->sbh_query->insert('konfirmasi_gambar', $insert);
									} else {
										$insert = array(
											'id_konfirmasi_relation' => $row->id_konfirmasi,
											'gambar' => $data_upload['file_name']
											);
										$this->sbh_query->insert('konfirmasi_gambar', $insert);
									}
								}
							} else {
								$this->load->view('client/sbh/struk_error');
							}
						} else {
							$this->load->view('client/sbh/struk_error_max_2');
						}
					}
				} else {
					show_404();
				}
			} else {
				redirect('sbh');
			}
		} else {
			redirect('sbh/login');
		}
	}
	
	function _struk($hash)
	{
		$sbh = $this->sbh_query->join_2where('konfirmasi', 'rekening', 'konfirmasi.ke_rekening=rekening.id_rekening', array('id_user' => $this->lib->id_user()), array('hash' => $hash), 'id_konfirmasi DESC');
		return ($sbh == FALSE)?array():$sbh;
	}

	function register()
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			redirect('sbh');
		} else {
			if ($this->lib->register()) {
				$this->load->view('client/sbh/register');
			} else {
				$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[4]|max_length[25]|alpha_dash');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[40]|callback_pm_StrongPassword');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|min_length[5]|max_length[100]|valid_email');
				$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required|xss_clean|min_length[5]|max_length[100]|callback_pm_ASpace');
				$this->form_validation->set_error_delimiters('', '');
				if ($this->form_validation->run() == TRUE) {
					$check_username = $this->sbh_query->one('user', array('username' => $this->input->post('username', TRUE)));
					$check_email = $this->sbh_query->one('user', array('email' => $this->input->post('email', TRUE)));
					if ($check_username != FALSE) {
						$data = array(
							'error_username' => 'Username yang anda masukkan sudah ada pada database, silakan gunakan yang lain.'
							);
						$this->load->view('client/sbh/register', $data);
					} elseif ($check_email != FALSE) {
						$data = array(
							'error_email' => 'Email yang anda masukkan sudah ada pada database, silakan gunakan yang lain.'
							);
						$this->load->view('client/sbh/register', $data);
					} else {
						$insert = array(
							'username' => $this->form_validation->set_value('username'),
							'password' => sha1(md5(md5(sha1($this->input->post('password', TRUE))))),
							'email' => $this->form_validation->set_value('email'),
							'nama_user' => $this->form_validation->set_value('nama_user'),
							'code_verifikasi' => sha1(microtime()),
							);
						$this->sbh_query->insert('user', $insert);
						$this->session->set_userdata(array(
							'register' => 'TRUE'
							));
						$this->email->from($this->config->item('email'), $this->config->item('nama'));
						$this->email->reply_to($this->config->item('email'), $this->config->item('nama'));
						$this->email->to($insert['email']);
						$this->email->subject(sprintf('Register Account', $this->config->item('nama')));
						$this->email->message($this->load->view('client/email/register', $insert, TRUE));
						$this->email->send();
						$this->load->view('client/sbh/register_sukses');
					}
				} else {
					$this->load->view('client/sbh/register');
				}
			}
		}
	}

	function login()
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			redirect('sbh');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[4]|max_length[25]|alpha_dash');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[40]');
			$this->form_validation->set_error_delimiters('', '');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username', TRUE);
				$password = sha1(md5(md5(sha1($this->input->post('password', TRUE)))));
				$check = $this->user->login('user', array('username' => $username), array('password' => $password));
				if ($check != FALSE) {
					foreach ($check as $user) {
						if ($user->verifikasi_email === '0') {
							$this->load->view('client/sbh/verifikasi_email');
						} else {
							$this->session->set_userdata(array(
								'id_user' => $user->id_user,
								'username' => $user->username,
								'role' => $user->role
								));
							redirect();
						}
					}
				} else {
					$data = array(
						'error' => 'Gagal login, silakan ulang kembali'
						);
					$this->load->view('client/sbh/login', $data);
				}
			} else {
				$this->load->view('client/sbh/login');
			}
		}
	}

	function payment()
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			$data = array(
				'payments' => $this->sbh_query->all('rekening', 'id_rekening ASC')
				);
			$this->load->view('client/sbh/payment', $data);
		} else {
			redirect('sbh/login');
		}
	}

	function logout()
	{
		if ($this->lib->id_user() && $this->lib->username()) {
			$this->lib->logout();
			redirect();
		} else {
			show_404();
			return FALSE;
		}
	}

	function verifikasi_email($hash)
	{
		if (!empty($hash)) {
			$data = array(
				'array_hash' => $this->_hash($hash)
				);
			if (!empty($data['array_hash'])) {
				$update = array(
					'verifikasi_email' => 1,
					'code_verifikasi' => NULL,
					);
				$this->sbh_query->update('user', $update);
				$this->load->view('client/sbh/verifikasi_email_valid');
			} else {
				$this->load->view('client/sbh/verifikasi_email_invalid');
			}
		} else {
			redirect();
		}
	}
	
	function _hash($hash)
	{
		$sbh = $this->sbh_query->one('user', array('code_verifikasi' => $hash));
		return ($sbh == FALSE)?array():$sbh;
	}
}