<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');
class Template {
    protected $ci;
    public function __construct() {
        $this->ci =& get_instance();
    }
    public function display($view, $data = null) {
        $data['_content'] = $this->ci->load->view($view, $data, TRUE);
        $this->ci->load->view('template/index', $data, FALSE);
    }
} */

defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

    public function __construct()
    {
		$this->CI =& get_instance();
    }


    public function admin_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']          = $this->CI->load->view('admin/_templates/header', $data, TRUE);
            $this->template['main_header']     = $this->CI->load->view('admin/_templates/main_header', $data, TRUE);
            $this->template['main_sidebar']    = $this->CI->load->view('admin/_templates/main_sidebar', $data, TRUE);
            $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
            $this->template['control_sidebar'] = $this->CI->load->view('admin/_templates/control_sidebar', $data, TRUE);
            $this->template['footer']          = $this->CI->load->view('admin/_templates/footer', $data, TRUE);

            return $this->CI->load->view('admin/_templates/template', $this->template);
        }
	}

    public function bank_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']          = $this->CI->load->view('bank/_templates/header', $data, TRUE);
            $this->template['main_header']     = $this->CI->load->view('bank/_templates/main_header', $data, TRUE);
            $this->template['main_sidebar']    = $this->CI->load->view('bank/_templates/main_sidebar', $data, TRUE);
            $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
            $this->template['control_sidebar'] = $this->CI->load->view('bank/_templates/control_sidebar', $data, TRUE);
            $this->template['footer']          = $this->CI->load->view('bank/_templates/footer', $data, TRUE);

            return $this->CI->load->view('bank/_templates/template', $this->template);
        }
    }

    public function notary_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']          = $this->CI->load->view('notary/_templates/header', $data, TRUE);
            $this->template['main_header']     = $this->CI->load->view('notary/_templates/main_header', $data, TRUE);
            $this->template['main_sidebar']    = $this->CI->load->view('notary/_templates/main_sidebar', $data, TRUE);
            $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
            $this->template['control_sidebar'] = $this->CI->load->view('notary/_templates/control_sidebar', $data, TRUE);
            $this->template['footer']          = $this->CI->load->view('notary/_templates/footer', $data, TRUE);

            return $this->CI->load->view('notary/_templates/template', $this->template);
        }
    }

    public function coba_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']  = $this->CI->load->view('template/header', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['footer']  = $this->CI->load->view('template/footer', $data, TRUE);

            return $this->CI->load->view('template/index', $this->template);
        }
	}
  public function auth_render($content, $data = NULL)
  {
      if ( ! $content)
      {
          return NULL;
      }
      else
      {
          $this->template['header']  = $this->CI->load->view('auth/_templates/header', $data, TRUE);
          $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
          $this->template['footer']  = $this->CI->load->view('auth/_templates/footer', $data, TRUE);

          return $this->CI->load->view('auth/_templates/template', $this->template);
      }
}

}
