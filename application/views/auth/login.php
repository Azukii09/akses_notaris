<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="login-box-body">
<div class="login-logo">
    <a href="#"><b><?php echo $title_lg; ?></b></a>
</div>
    <p class="login-box-msg">
        <?php echo lang('auth_sign_session'); ?>
    </p>
    <?php echo $message;?>

    <?php echo form_open('auth/login', 'id="form"');?>
    <div class="form-group has-feedback">
        <?php echo form_input($identity);?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?php echo form_input($password);?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row" style="margin-top: 5%">
        <div class="col-xs-8">
                <label class="switch">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="success"'); ?>
                    <span class="slider round"></span>
                </label><span style="line-height: 2;padding: 5px;font-size: 18px;"><?php echo lang('auth_remember_me'); ?></span>
        </div>
        <div class="col-xs-4" style="text-align: center">
        <?php if ($forgot_password == TRUE): ?>
    <?php echo '<a style="cursor:pointer" data-toggle="modal" data-target="#modal-forgot">'.lang('auth_forgot_password').'</a>'?><br />
    <?php endif; ?>
        </div>
    </div>
    <?php echo form_close();?>

    <div class="modal fade" id="modal-bank">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="modal-bank-body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-notary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="modal-notary-body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-forgot">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="modal-forgot-body">
                </div>
            </div>
        </div>
    </div>

    <?php if ($auth_social_network == TRUE): ?>
    <div class="social-auth-links text-center">
        <p>-
            <?php echo lang('auth_or'); ?> -</p>
        <?php echo anchor('#', '<i class="fa fa-facebook"></i>' . lang('auth_sign_facebook'), array('class' => 'btn btn-block btn-social btn-facebook btn-flat')); ?>
        <?php echo anchor('#', '<i class="fa fa-google-plus"></i>' . lang('auth_sign_google'), array('class' => 'btn btn-block btn-social btn-google btn-flat')); ?>
    </div>
    <?php endif; ?>
    <div class="row" style="margin-top: 10%">
        <div class="col-xs-8">
        <?php if ($new_membership_bank == TRUE): ?>
    <?php echo '<a style="cursor:pointer" data-toggle="modal" data-target="#modal-bank">'.lang('auth_new_bank_member').'</a>'?><br />
    <?php endif; ?>
    <?php if ($new_membership_notary == TRUE): ?>
    <?php echo '<a style="cursor:pointer" data-toggle="modal" data-target="#modal-notary">'.lang('auth_new_notary_member').'</a>'?><br />
    <?php endif; ?>
    </div>
        <div class="col-xs-4">
            <?php echo form_submit('submit', lang('auth_login'), array('class' => 'btn btn-login btn-block btn-flat', 'form' => "form"));?>
        </div></div>
<script>
function defer() {
            if (window.jQuery) {
                        $('*[data-target="#modal-bank"]').on('click', function (e) {
                        $('#modal-notary-body').html("");
                        $('#modal-bank-body').load("<?php echo base_url("auth/create_bank");?>", function(){
                        //eval($('script').html()); 
                        $('#modal-bank-body').find(".login-box").removeClass("login-box");
                        });
                        });
                        $('*[data-target="#modal-notary"]').on('click', function (e) {
                        $('#modal-bank-body').html("");
                        $('#modal-notary-body').load("<?php echo base_url("auth/create_notary");?>", function(){
                        //eval($('script').html()); 
                        $('#modal-notary-body').find(".login-box").removeClass("login-box");
                        });
                        });
                        $('*[data-target="#modal-forgot"]').on('click', function (e) {
                        $('#modal-forgot-body').load("<?php echo base_url("auth/forgot_password");?>", function(){
                        //eval($('script').html()); 
                        $('#modal-forgot-body').find(".login-box").removeClass("login-box");
                        });
                  });
            } else {
                  setTimeout(function () {
                        defer()
                  }, 500);
            }
      }
      defer();
</script>