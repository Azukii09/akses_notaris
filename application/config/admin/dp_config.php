<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['title']      = 'Akses Notaris';
$config['title_mini'] = 'Akses Notaris';
$config['title_lg']   = 'Akses Notaris';



/* Display panel login */
$config['auth_social_network'] = FALSE;
$config['forgot_password']     = TRUE;
$config['new_membership_bank']      = TRUE;
$config['new_membership_notary']      = TRUE;



/*
 * **********************
 * AdminLTE
 * **********************
 */
/* Page Title */
$config['pagetitle_open']     = '<h1>';
$config['pagetitle_close']    = '</h1>';
$config['pagetitle_el_open']  = '<small>';
$config['pagetitle_el_close'] = '</small>';

/* Breadcrumbs */
$config['breadcrumb_open']     = '<ol class="breadcrumb">';
$config['breadcrumb_close']    = '</ol>';
$config['breadcrumb_el_open']  = '<li>';
$config['breadcrumb_el_close'] = '</li>';
$config['breadcrumb_el_first'] = '<i class="fa fa-dashboard"></i>';
$config['breadcrumb_el_last']  = '<li class="active">';
