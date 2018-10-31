<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prefs_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function admin_prefs()
    {
        $query = $this->db->get('admin_preferences');
        foreach ($query->result_array() as $value)
        {
            $data['user_panel']         = $value['user_panel'];
            $data['sidebar_form']       = $value['sidebar_form'];
            $data['messages_menu']      = $value['messages_menu'];
            $data['notifications_menu'] = $value['notifications_menu'];
            $data['tasks_menu']         = $value['tasks_menu'];
            $data['user_menu']          = $value['user_menu'];
            $data['ctrl_sidebar']       = $value['ctrl_sidebar'];
            $data['transition_page']    = $value['transition_page'];
        }

        return $data;
    }


    public function user_info_login($id)
    {
        $user = $this->ion_auth->user($id)->row();

        $data['id']         = $user->id;
        $data['ipadress']   = $user->id;
        $data['username']   = ! empty($user->username) ? htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') : NULL;
        $data['email']      = $user->email;
        $data['created_on'] = $user->created_on;
        $data['lastlogin']  = ! empty($user->last_login) ? $user->last_login : NULL;
        $data['active']     = $user->active;
        $data['name']       = ! empty($user->name) ? htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') : NULL;
        $data['place_of_birth']    = htmlspecialchars($user->place_of_birth, ENT_QUOTES, 'UTF-8');
        $data['date_of_birth']    = htmlspecialchars($user->date_of_birth, ENT_QUOTES, 'UTF-8');
        $data['phone']      = ! empty($user->phone) ? $user->phone : NULL;
        $data['group']      = ! empty($this->ion_auth->get_users_groups($user->id)->result()) ? $this->ion_auth->get_users_groups($user->id)->result()[0]->name : NULL;

        return $data;
    }

}
