<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('template');
		$this->load->database();
		$this->load->helper(array('array', 'language', 'url'));
		$this->load->model(array('menu_u'));
	}

	public function report()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();
		$this->data['uri_sub']						 = 'ordercomplete';

		$this->template->coba_render('bank/report/report', $this->data);

	}
}
