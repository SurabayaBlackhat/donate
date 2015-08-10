<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @package		Surabaya Blackhat - Apps Donate
 * @author		LibsCode | libscode.com (Cahyadi Triyansyah | sundi3yansyah.com)
 * @version		0.1
 * @license		MIT
 */
class Staff_user extends Staff
{
	function index($id=NULL)
	{
		$total = $this->db->get('user');
		$config['base_url'] = base_url('staff_user/index');
		$config['total_rows'] = $total->num_rows();
		$config['per_page'] = 20;
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();
		$data['users'] = $this->sbh_query->pagination_join('user', $config['per_page'], $id, 'role', 'user.role=role.id_role','id_user DESC');
		$this->load->view('staff/user/index', $data);
	}

	function edit($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[100]|alpha_dash');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|min_length[5]|max_length[100]|valid_email');
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required|xss_clean|min_length[3]|max_length[100]|callback_pm_ASpace');
		$this->form_validation->set_rules('role', 'Role', 'trim|xss_clean|min_length[1]|max_length[11]|callback_pm_role');
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == TRUE) {
			$edit = array(
				'username' => $this->form_validation->set_value('username'),
				'email' => $this->form_validation->set_value('email'),
				'nama_user' => $this->form_validation->set_value('nama_user'),
				'role' => $this->form_validation->set_value('role'),
				);
			$this->sbh_query->update('user', $edit, array('id_user' => $id));
			redirect('staff_rekening');
		} else {
			$data = array(
				'id' => $this->_get_id($id),
				'role' => $this->sbh_query->all('role', 'id_role ASC')
				);
			$this->load->view('staff/user/edit', $data);
		}
	}

	function drop($id)
	{
		if (isset($id)) {
			$data = array(
				'id' => $this->_get_id($id)
				);
			if (!empty($data['id'])) {
				$this->sbh_query->delete('user', array('id_user' => $id));
				redirect('staff_user');
			} else {
				show_404();
				return FALSE;
			}
		} else {
			redirect('staff_user');
		}
	}

	function _get_id($id)
	{
		$sbh = $this->sbh_query->join_where('user', 'role', 'user.role=role.id_role', array('id_user' => $id), 'id_user');
		return ($sbh == FALSE)?array():$sbh;
	}
}