<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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

		$this->template->coba_render('bank/dashboard/dashboard', $this->data);

	}
	public function dashboard()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();

		$this->template->coba_render('bank/dashboard/dashboard', $this->data);

	}
}
