<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['name'];?></p>
                            <span><?php echo $user_login['group'];?></span>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('bank/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>

                        <li class="<?=active_link_function('form_request')?>">
                          <a href="<?php echo site_url('bank/order/form_request'); ?>">
                            <i class="fa fa-pencil-square-o"></i><span><?php echo lang('menu_form_request'); ?></span>
                          </a>
                        </li>

                        <li class="<?=active_link_function('to_do_list')?>">
                          <a href="<?php echo site_url('bank/order/to_do_list'); ?>">
                            <i class="fa fa-pencil-square-o"></i><span><?php echo lang('menu_to_do_list'); ?></span>
                          </a>
                        </li>

                        </li>

                        <li class="<?=active_link_controller('report')?>">
                            <a href="<?php echo site_url('bank/report'); ?>">
                                <i class="fa fa-legal"></i> <span><?php echo lang('menu_report'); ?></span>
                            </a>
                        </li>
                        <div class="col-md-10 col-md-offset-1"><a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-login btn-block btn-flat"><?php echo lang('actions_logout'); ?></a></div>
                    </ul>
                </section>
            </aside>
