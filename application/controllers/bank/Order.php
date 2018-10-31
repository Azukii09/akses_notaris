<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Bank_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Breadcrumbs :: Common */
        //$this->breadcrumbs->unshift(1, lang('menu_preferences'), 'admin/prefs');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->in_group("Rekanan"))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('bank/order/form_request', 'location');
        }
	}

    public function form_request()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->in_group("Rekanan"))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->template->bank_render('bank/order/form_request', $this->data);
        }
    }
    
	public function form_request_modal()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->in_group("Rekanan"))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            if(!$this->uri->segment(4)) {
                redirect('bank/order/form_request_modal/1', 'location');
           }
            /* Title Page */
            $this->page_title->push(lang('menu_form_request_modal'));
            $this->data['pagetitle'] = $this->page_title->show();   

            if($this->uri->segment(4)==1) {
            $this->data['progress_percent'] = "0";
            $this->data['content_header'] = "Data Notaris";
            $this->data['local_notaries'] = [];
            $notaries = $this->ion_auth->users(3)->result();
            foreach($notaries as $notary){
            if($notary->address2==$this->ion_auth->user()->row()->address2)
            $this->data['local_notaries'][]=$notary;
             }
            }
            else if($this->uri->segment(4)==2) {
                if(!$this->input->post('notary'))
                redirect('bank/order/form_request_modal/1', 'location');
                if($this->input->post('notary')=="")
                redirect('bank/order/form_request_modal/1', 'location');
                $this->data['notary'] = $this->ion_auth->where('username', $this->input->post('notary'))->users()->row();
                    $this->data['name'] = array(
                    'name'  => 'name',
                    'id'    => 'name',
                    'type'  => 'text',
                    'class' => 'form-control register-input',
                    'placeholder' => lang('users_name')
                );
                $this->data['number'] = array(
                    'name'  => 'number',
                    'id'    => 'number',
                    'type'  => 'number',
                    'class' => 'form-control register-input',
                    'placeholder' => "Jumlah Pinjaman"
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
                $this->data['address5'] = array(
                    'name'  => 'address5',
                    'id'    => 'address5',
                    'type'  => 'text',
                    'class' => 'form-control register-input',
                    'placeholder' => lang('users_address5'),
                    'value' => $this->form_validation->set_value('address5'),
                );
                $this->data['date_of_birth'] = array(
                    'name'  => 'date_of_birth',
                    'id'    => 'date_of_birth',
                    'type'  => 'date',
                    'class' => 'form-control register-input',
                    'placeholder' => lang('users_date_of_birth')
                );
                $this->data['notary_username'] = $this->input->post('notary');
                $this->data['progress'] = "Langkah 1 dari 3";
                $this->data['progress_percent'] = "33";
                $this->data['content_header'] = "Data Nasabah";
            }
                else if($this->uri->segment(4)==3) {
                $this->form_validation->set_rules('name', 'lang:users_name', 'required');
                $this->form_validation->set_rules('number', 'lang:users_email', 'is_numeric');
                $this->form_validation->set_rules('address1', 'lang:users_address1', 'required');
                $this->form_validation->set_rules('address2', 'lang:users_address2', 'required');
                $this->form_validation->set_rules('address3', 'lang:users_address3', 'required');
                $this->form_validation->set_rules('address4', 'lang:users_address4', 'required');
                $this->form_validation->set_rules('address5', 'lang:users_address5', 'required');
                $this->form_validation->set_rules('date_of_birth', 'lang:users_date_of_birth', 'required');
                if (!$this->form_validation->run() == TRUE)
                {    
                    redirect('bank/order/form_request_modal/1', 'location');
                }
                else
                {
                    $this->data['notary'] = $this->ion_auth->where('username', $this->input->post('notary'))->users()->row();
                    $this->data['notary_username'] = $this->input->post('notary');
                    $this->data['progress'] = "Langkah 2 dari 3";
                    $this->data['progress_percent'] = "66";
                    $this->data['content_header'] = "Data Agunan";
                    $this->data['name'] = $this->input->post('name');
                    $this->data['number']    = $this->input->post('number');
                    $this->data['address1'] =$this->input->post('address1');
                    $this->data['address2'] =$this->input->post('address2');
                    $this->data['address3'] =$this->input->post('address3');
                    $this->data['address4'] =$this->input->post('address4');
                    $this->data['address5'] =$this->input->post('address5');
                    $this->data['date_of_birth'] =$this->input->post('date_of_birth');
                    $this->data['file1'] = array(
                        'name'  => 'file1',
                        'id'    => 'file1',
                        'type'  => 'file',
                        'class' => 'form-control register-input',
                        'placeholder' => "file1"
                    );
        }
    }
            else if($this->uri->segment(4)==4) {
                    $this->data['notary'] = $this->ion_auth->where('username', $this->input->post('notary'))->users()->row();
                    $this->data['notary_username'] = $this->input->post('notary');
                    $this->data['progress'] = "Langkah 3 dari 3";
                    $this->data['progress_percent'] = "100";
                    $this->data['content_header'] = "hmm";
                    $this->data['name'] = $this->input->post('name');
                    $this->data['number']  = $this->input->post('number');
                    $this->data['address1'] =$this->input->post('address1');
                    $this->data['address2'] =$this->input->post('address2');
                    $this->data['address3'] =$this->input->post('address3');
                    $this->data['address4'] =$this->input->post('address4');
                    $this->data['address5'] =$this->input->post('address5');
                    $this->data['date_of_birth'] =$this->input->post('date_of_birth');
                    $this->data['file1'] =$this->input->post('file1');
                
            }
            else{
                redirect('bank/order/form_request_modal/1', 'location');
            }

            /* Load Template */
            $this->template->auth_render('bank/order/form_request_modal', $this->data);
        }
	}

}
