<div class="login-box-body">
  <div class="login-logo">
    <a href="#"><h1><?php echo $title_lg; ?></h1></a>
  </div>
    <p><?php echo lang('login_subheading');?></p>
    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>


        <?php echo lang('login_identity_label', 'identity');?>
        <div class="form-group has-feedback" >
            <?php echo form_input($identity);?>
            <span class="fa fa-user fa-2x form-control-feedback"></span>
        </div>
        <?php echo lang('login_password_label', 'password');?>
        <div class="form-group has-feedback">
            <?php echo form_input($password);?>
            <span class="fa fa-lock fa-2x form-control-feedback"></span>
        </div>

      <p>
        <?php //echo lang('login_remember_label', 'remember');?>
        <?php //echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>


      </p>


      <div class="row" style="margin-top: 5%">
        <div class="col-xs-8">
                <label class="switch">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="success"'); ?>
                    <span class="slider round"></span>
                </label><span style="line-height: 2;padding: 5px;font-size: 16px;"><?php echo lang('auth_remember_me'); ?></span>
        </div>
          <div class="col-xs-4" style="text-align: center">
            <a href="forgot_password" style="font-size: 16px;"><?php echo lang('auth_forgot_password');?></a>
          </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
            <?php if ($new_membership_bank == TRUE): ?>
            <?php echo '<a style="cursor:pointer; font-size: 16px;" data-toggle="modal" data-target="#modal-bank">'.lang('auth_new_bank_member').'</a>'?><br />
            <?php endif; ?>
            <?php if ($new_membership_notary == TRUE): ?>
            <?php echo '<a style="cursor:pointer; font-size: 16px;" data-toggle="modal" data-target="#modal-notary">'.lang('auth_new_notary_member').'</a>'?><br />
            <?php endif; ?>
        </div>
        <div class="col-xs-4">
          <?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-login btn-block btn-flat'));?>
        </div>
      </div>



    <?php echo form_close();?>



</div>
