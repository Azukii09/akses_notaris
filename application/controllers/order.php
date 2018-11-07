<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('template');
		$this->load->database();
		$this->load->helper(array('array', 'language', 'url'));
		$this->load->model(array('menu_u'));
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
	public function dashboard()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();

		$this->template->coba_render('bank/dashboard', $this->data);

	}
	public function order()
	{

		/* Load config*/
		$this->load->config('admin/dp_config');
		$this->load->config('common/dp_config');
		$this->load->model(array('prefs_model','order_model'));
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation','session'));
		$this->load->helper(array('url', 'language'));

		/* load data */
		$this->data['title']               = $this->config->item('title');
		$this->data['title_lg']            = $this->config->item('title_lg');
		$this->data['menu'] 							 = $this->menu_u->tampil_menu();
		$this->data['user_login']  = $this->prefs_model->user_info_login($this->ion_auth->users()->row()->id);
		$this->data['joinorder']		=	$this->order_model->tampil_data_order();

		$this->template->coba_render('bank/order', $this->data);

	}

	public function ordercomplete()
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
