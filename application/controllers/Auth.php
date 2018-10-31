<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->lang->load('admin/users');//del!!!!!!!!!!!!!!!!!
        $this->lang->load('admin/actions');//del!!!!!!!!!!!!!!!!!
	}


	function index()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}


    function login()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership_bank'] = $this->config->item('new_membership_bank');
            $this->data['new_membership_notary'] = $this->config->item('new_membership_notary');

            if ($this->form_validation->run() == TRUE)
            {
                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    if ( ! $this->ion_auth->is_admin())
                    {
						if($this->ion_auth->in_group("Rekanan"))
                        redirect(base_url('bank'));
						if($this->ion_auth->in_group("Notaris"))
                        redirect(base_url('notary'));
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('/', 'refresh');
                    }
                    else
                    {
                        redirect(base_url('admin'));
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
				    redirect('auth/login', 'refresh');
                }
            }
            else
            {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['identity'] = array(
                    'name'        => 'identity',
                    'id'          => 'identity',
                    'type'        => 'username',
                    'value'       => $this->form_validation->set_value('identity'),
                    'class'       => 'form-control login-input',
                    'placeholder' => lang('auth_your_email')
                );
                $this->data['password'] = array(
                    'name'        => 'password',
                    'id'          => 'password',
                    'type'        => 'password',
                    'class'       => 'form-control login-input',
                    'placeholder' => lang('auth_your_password')
                );

                /* Load Template */
                $this->template->auth_render('auth/login', $this->data);
            }
        }
        else
        {
            if ( ! $this->ion_auth->is_admin())
                    {
						if($this->ion_auth->in_group("Rekanan"))
						redirect(base_url('bank'));
						if($this->ion_auth->in_group("Notaris"))
                        redirect(base_url('notary'));
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('/', 'refresh');
                    }
                    else
                    {
                        redirect(base_url('admin'));
                    }
        }
   }


    function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin')
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
    }
    
    public function create_bank()
	{

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
        $this->data['title']               = $this->config->item('title');

		/* Validate form input */
		$this->form_validation->set_rules('username', 'lang:users_username', 'required|is_unique['.$tables['users'].'.username]');
		$this->form_validation->set_rules('name', 'lang:users_name', 'required');
		$this->form_validation->set_rules('motto', 'lang:users_motto', 'required');
		$this->form_validation->set_rules('email', 'lang:users_email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', 'lang:users_phone', 'required');
		$this->form_validation->set_rules('address1', 'lang:users_address1', 'required');
		$this->form_validation->set_rules('address2', 'lang:users_address2', 'required');
		$this->form_validation->set_rules('address3', 'lang:users_address3', 'required');
		$this->form_validation->set_rules('address4', 'lang:users_address4', 'required');
		$this->form_validation->set_rules('address5', 'lang:users_address5', 'required');
		$this->form_validation->set_rules('password', 'lang:users_password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'lang:users_password_confirm', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$q=$this->input->post('address1');
			$query = $this->db->query("SELECT * FROM lokasi_provinsi where provinsiId=$q");
			$row = $query->row();

			if (!$this->ion_auth->username_check($username))
		{
			if (!file_exists('./upload/'.$username)) {
				mkdir('./upload/'.$username, 0777, true);
			}
			$config['upload_path']      = './upload/'.$username;
			$config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
			/*$config['max_size']         = 2048;
            $config['max_width']        = 1024;
            $config['max_height']       = 1024;*/
            $config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file1'))
		{
			/* Data */
			$this->data['message'] = $this->upload->display_errors();

			/* Load Template */
			$this->template->auth_render('auth/create_bank', $this->data);
		}
		else
            {
                /* Data */
                $file1 = $this->upload->data();
			}
			echo $file1;
		if ( ! $this->upload->do_upload('file2'))
            {
                /* Data */
                $this->data['message'] = $this->upload->display_errors();

                /* Load Template */
                $this->template->auth_render('auth/create_bank', $this->data);
			}
		else
            {
                /* Data */
				$file2 = $this->upload->data();
			}	
		}
			$additional_data = array(
				'name' => $this->input->post('name'),
				'motto' => $this->input->post('motto'),
				'address1'    => $row->provinsiNama,
				'address2'    => $this->input->post('address2'),
				'address3'    => $this->input->post('address3'),
				'address4'    => $this->input->post('address4'),
				'address5'    => $this->input->post('address5'),
				'file1'    => $file1['file_name'],
				'file2'    => $file2['file_name'],
				'phone'      => $this->input->post('phone'),
			);
		}
		
		if ($this->form_validation->run() == TRUE && $user_id=$this->ion_auth->register($username, $password, $email, $additional_data))
		{
			$this->data['message']="success";
			$this->ion_auth->remove_from_group(NULL, $user_id);
			$this->ion_auth->add_to_group(2, $user_id);
            $this->template->auth_render('auth/create_bank', $this->data);
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'class' => 'form-control register-input',
				'placeholder' => lang('users_username'),
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['name'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_name'),
				'value' => $this->form_validation->set_value('name'),
			);
			$this->data['motto'] = array(
				'name'  => 'motto',
				'id'    => 'motto',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_motto'),
				'value' => $this->form_validation->set_value('motto'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_email'),
				'value' => $this->form_validation->set_value('email'),
			);
			$query = $this->db->query("SELECT * FROM lokasi_provinsi order by provinsiNama");
			$options = array();
			$options[''] = "Pilih Provinsi";
			foreach ($query->result_array() as $row)
			{
				$options[$row['provinsiId']] = $row['provinsiNama'];
			}
			$this->data['address1'] = array(
				'name'  => 'address1',
				'id'    => 'address1',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address1'),
				'value' => $this->form_validation->set_value('address1'),
			);
			$options = array();
			$options[''] = "Pilih Kota/Kab";
			$this->data['address2'] = array(
				'name'  => 'address2',
				'id'    => 'address2',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address2'),
				'value' => $this->form_validation->set_value('address2'),
			);
			$options = array();
			$options[''] = "Pilih Kecamatan";
			$this->data['address3'] = array(
				'name'  => 'address3',
				'id'    => 'address3',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address3'),
				'value' => $this->form_validation->set_value('address3'),
			);
			$options = array();
			$options[''] = "Pilih Kelurahan/Desa";
			$this->data['address4'] = array(
				'name'  => 'address4',
				'id'    => 'address4',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address4'),
				'value' => $this->form_validation->set_value('address4'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'tel',
                'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_phone'),
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['address5'] = array(
				'name'  => 'address5',
				'id'    => 'address5',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address5'),
				'value' => $this->form_validation->set_value('address5'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_password'),
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_password_confirm'),
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$this->data['file1'] = array(
				'name'  => 'file1',
				'id'    => 'file1',
				'type'  => 'file',
                'class' => 'form-control register-input',
				'placeholder' => lang('file1'),
				'value' => $this->form_validation->set_value('file1'),
			);
			$this->data['file2'] = array(
				'name'  => 'file2',
				'id'    => 'file2',
				'type'  => 'file',
                'class' => 'form-control register-input',
				'placeholder' => lang('file2'),
				'value' => $this->form_validation->set_value('file2'),
			);

            /* Load Template */
            $this->template->auth_render('auth/create_bank', $this->data);
        }
	}

    public function create_notary()
	{

        /* Variables */
		$tables = $this->config->item('tables', 'ion_auth');
        $this->data['title']               = $this->config->item('title');

		/* Validate form input */
		$this->form_validation->set_rules('username', 'lang:users_username', 'required|is_unique['.$tables['users'].'.username]');
		$this->form_validation->set_rules('name', 'lang:users_name', 'required');
		$this->form_validation->set_rules('motto', 'lang:users_motto', 'required');
		$this->form_validation->set_rules('email', 'lang:users_email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('notary1', 'lang:users_notary1', 'required');
		$this->form_validation->set_rules('notary2', 'lang:users_notary2', 'required');
		$this->form_validation->set_rules('notary3', 'lang:users_notary3', 'required');
		$this->form_validation->set_rules('phone', 'lang:users_phone', 'required');
		$this->form_validation->set_rules('address1', 'lang:users_address1', 'required');
		$this->form_validation->set_rules('address2', 'lang:users_address2', 'required');
		$this->form_validation->set_rules('address3', 'lang:users_address3', 'required');
		$this->form_validation->set_rules('address4', 'lang:users_address4', 'required');
		$this->form_validation->set_rules('address5', 'lang:users_address5', 'required');
		$this->form_validation->set_rules('password', 'lang:users_password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'lang:users_password_confirm', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');
			$q=$this->input->post('address1');
			$query = $this->db->query("SELECT * FROM lokasi_provinsi where provinsiId=$q");
			$row = $query->row();

			if (!$this->ion_auth->username_check($username))
		{
			if (!file_exists('./upload/'.$username)) {
				mkdir('./upload/'.$username, 0777, true);
			}
			$config['upload_path']      = './upload/'.$username;
			$config['allowed_types']    = 'gif|jpg|png|pdf|jpeg';
			/*$config['max_size']         = 2048;
            $config['max_width']        = 1024;
            $config['max_height']       = 1024;*/
            $config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file1'))
		{
			/* Data */
			$this->data['message'] = $this->upload->display_errors();

			/* Load Template */
			$this->template->auth_render('auth/create_notary', $this->data);
		}
		else
            {
                /* Data */
                $file1 = $this->upload->data();
			}
			echo $file1;
		if ( ! $this->upload->do_upload('file2'))
            {
                /* Data */
                $this->data['message'] = $this->upload->display_errors();

                /* Load Template */
                $this->template->auth_render('auth/create_notary', $this->data);
			}
		else
            {
                /* Data */
				$file2 = $this->upload->data();
			}	
		}
			$additional_data = array(
				'name' => $this->input->post('name'),
				'motto' => $this->input->post('motto'),
				'address1'    => $row->provinsiNama,
				'notary1'     => $this->input->post('notary1'),
				'notary2'     => $this->input->post('notary2'),
				'notary3' 	  => $this->input->post('notary3'),
				'address2'    => $this->input->post('address2'),
				'address3'    => $this->input->post('address3'),
				'address4'    => $this->input->post('address4'),
				'address5'    => $this->input->post('address5'),
				'file1'       => $file1['file_name'],
				'file2'       => $file2['file_name'],
				'phone'       => $this->input->post('phone'),
			);
		}
		
		if ($this->form_validation->run() == TRUE && $user_id=$this->ion_auth->register($username, $password, $email, $additional_data))
		{
			$this->data['message']="success";
			$this->ion_auth->remove_from_group(NULL, $user_id);
			$this->ion_auth->add_to_group(3, $user_id);
            $this->template->auth_render('auth/create_bank', $this->data);
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['username'] = array(
				'name'  => 'username',
				'id'    => 'username',
				'type'  => 'text',
				'class' => 'form-control register-input',
				'placeholder' => lang('users_username'),
				'value' => $this->form_validation->set_value('username'),
			);
			$this->data['name'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_name'),
				'value' => $this->form_validation->set_value('name'),
			);
			$this->data['motto'] = array(
				'name'  => 'motto',
				'id'    => 'motto',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_motto'),
				'value' => $this->form_validation->set_value('motto'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_email'),
				'value' => $this->form_validation->set_value('email'),
			);
			$query = $this->db->query("SELECT * FROM lokasi_provinsi order by provinsiNama");
			$options = array();
			$options[''] = "Pilih Provinsi";
			foreach ($query->result_array() as $row)
			{
				$options[$row['provinsiId']] = $row['provinsiNama'];
			}
			$this->data['address1'] = array(
				'name'  => 'address1',
				'id'    => 'address1',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address1'),
				'value' => $this->form_validation->set_value('address1'),
			);
			$options = array();
			$options[''] = "Pilih Kota/Kab";
			$this->data['address2'] = array(
				'name'  => 'address2',
				'id'    => 'address2',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address2'),
				'value' => $this->form_validation->set_value('address2'),
			);
			$options = array();
			$options[''] = "Pilih Kecamatan";
			$this->data['address3'] = array(
				'name'  => 'address3',
				'id'    => 'address3',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address3'),
				'value' => $this->form_validation->set_value('address3'),
			);
			$options = array();
			$options[''] = "Pilih Kelurahan/Desa";
			$this->data['address4'] = array(
				'name'  => 'address4',
				'id'    => 'address4',
				'type'  => 'text',
				'options' => $options,
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address4'),
				'value' => $this->form_validation->set_value('address4'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'tel',
                'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_phone'),
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['address5'] = array(
				'name'  => 'address5',
				'id'    => 'address5',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_address5'),
				'value' => $this->form_validation->set_value('address5'),
			);
			$this->data['notary1'] = array(
				'name'  => 'notary1',
				'id'    => 'notary1',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_notary1'),
				'value' => $this->form_validation->set_value('notary1'),
			);
			$this->data['notary2'] = array(
				'name'  => 'notary2',
				'id'    => 'notary2',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_notary2'),
				'value' => $this->form_validation->set_value('notary2'),
			);
			$this->data['notary3'] = array(
				'name'  => 'notary3',
				'id'    => 'notary3',
				'type'  => 'text',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_notary3'),
				'value' => $this->form_validation->set_value('notary3'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_password'),
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
                'class' => 'form-control register-input',
				'placeholder' => lang('users_password_confirm'),
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$this->data['file1'] = array(
				'name'  => 'file1',
				'id'    => 'file1',
				'type'  => 'file',
                'class' => 'form-control register-input',
				'placeholder' => lang('file1'),
				'value' => $this->form_validation->set_value('file1'),
			);
			$this->data['file2'] = array(
				'name'  => 'file2',
				'id'    => 'file2',
				'type'  => 'file',
                'class' => 'form-control register-input',
				'placeholder' => lang('file2'),
				'value' => $this->form_validation->set_value('file2'),
			);

            /* Load Template */
            $this->template->auth_render('auth/create_notary', $this->data);
        }
	}

	public function ajax_kota()
	{
		$q=$this->uri->segment(3);
		$kec=$this->uri->segment(4);
		$kel=$this->uri->segment(5);
		if (!$kec){
			if (ctype_digit($q)) {
				$query = $this->db->query("SELECT * FROM lokasi_kabupaten where provinsiId=$q order by kabupatenNama");
				echo"<option selected value=''>Pilih Kota/Kab</option>";
				foreach ($query->result_array() as $row)
				{
					echo "<option data-url='$q/$row[kabupatenId]' value='$row[kabupatenNama]'>$row[kabupatenNama]</option>";
				}
			}
		}
		else if (!$kel){
			if (ctype_digit($kec) and ctype_digit($q)) {
				$query = $this->db->query("SELECT * FROM lokasi_kecamatan where kabupatenId=$kec order by kecamatanNama");
				echo"<option selected value=''>Pilih Kecamatan</option>";
				foreach ($query->result_array() as $row)
				{
					echo "<option data-url='$q/$kec/$row[kecamatanId]' value='$row[kecamatanNama]'>$row[kecamatanNama]</option>";
				}		 
			}
		}
		else
				if (ctype_digit($kel) and ctype_digit($q)) {
					$query = $this->db->query("SELECT * FROM lokasi_desa where kecamatanId=$kel order by desaNama");
					echo"<option selected value=''>Pilih Kelurahan/Desa</option>";
					foreach ($query->result_array() as $row)
					{
						echo "<option data-url='$q/$kec/$kel/$row[desaId]' value='$row[desaNama]'>$row[desaNama]</option>";
					}	
				}
}
		public function forgot_password()
		{
			$this->form_validation->set_rules('username', 'lang:users_username', 'required');
			if ($this->form_validation->run() == false) {
				//setup the input
				$this->data['username'] = array('name'    => 'username',
											 'id'      => 'username',
											 'type'  => 'text',
											 'class' => 'form-control register-input',
											 'placeholder' => lang('users_username')
											);
				//set any errors and display the form
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->load->view('auth/forgot_password', $this->data);
			}
			else {
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($this->input->post('username'));

				if ($forgotten) { //if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}
			}
		}
		public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}
		$user = $this->ion_auth->forgotten_password_check($code);
		if ($user)
		{
			// if the code is valid then display the password reset form
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
			if ($this->form_validation->run() === FALSE)
			{
				// display the form
				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;
				// render
				$this->template->auth_render('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{
					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);
					show_error($this->lang->line('error_csrf'));
				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));
					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}