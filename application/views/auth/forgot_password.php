<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $username);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<?php echo form_input($username);?>
      </p>

      <p><?php echo form_submit('submit', lang('actions_submit'));?></p>

<?php echo form_close();?>