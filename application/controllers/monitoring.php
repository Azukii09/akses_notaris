<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('template');
		$this->load->database();
		$this->load->helper(array('array', 'language', 'url'));
		$this->load->model(array('menu_u','prefs_model','order_model'));
	}

	public function index()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();

		$this->template->coba_render('template/konten', $this->data);

	}
	public function monitoring()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();
		$this->data['script']							 = NULL;
		$this->data['link']							 	 = NULL;
		$this->data['data_req']						 =	$this->order_model->tampil_data_order_req('*','request');
		$this->data['data_agunan']				 =	$this->order_model->tampil_data_detail('*');
		$this->data['joinorder']					 =	$this->order_model->tampil_data_order('*');

		$this->template->coba_render('bank/monitoring/monitoring', $this->data);

	}
}
