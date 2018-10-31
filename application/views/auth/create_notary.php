<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!$this->input->is_ajax_request()) {
      exit('No direct script access allowed');
   }
?>

<?php
if(!strlen($message)==0){
echo $message;
die();
}
?>
<div id="message"></div>
<?php echo form_open_multipart(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_notary')); ?>
<h2>Registrasi Notaris</h2>
<div class="form-group">
      <?php //echo lang('users_username', 'username', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-sm-6">
            <?php echo form_input($username);?>
      </div>
      <?php //echo lang('users_name', 'name', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-sm-6">
            <?php echo form_input($name);?>
      </div>
      </div>
	 <div class="form-group">
      <?php //echo lang('users_username', 'username', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-sm-offset-3 col-sm-6">
            <?php echo form_input($motto);?>
      </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_phone', 'phone', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($phone);?>
            </div>
            <?php //echo lang('users_email', 'email', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($email);?>
            </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_notary1', 'notary1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($notary1);?>
            </div>
            <?php //echo lang('users_notary2', 'notary2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($notary2);?>
            </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_notary3', 'notary3', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($notary3);?>
            </div>
            <?php //echo lang('users_address5', 'address5', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($address5);?>
            </div>
</div>
      <div class="form-group">
            <?php //echo lang('users_address1', 'address1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_dropdown($address1);?>
            </div>

            <?php //echo lang('users_address2', 'address2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_dropdown($address2);?>
            </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_address3', 'address3', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_dropdown($address3);?>
            </div>
            <?php //echo lang('users_address4', 'address4', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_dropdown($address4);?>
            </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_password', 'password', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($password);?>
            </div>
            <?php //echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($password_confirm);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-sm-6">
            <?php echo lang('users_file1', 'file1', array('class' => 'col-sm-0 control-label')); ?>
            </div>
            <div class="col-sm-6">
            <?php echo lang('users_file2', 'file2', array('class' => 'col-sm-0 control-label')); ?>
            </div>
      </div>
      <div class="form-group">
            <?php //echo lang('users_file1', 'file1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($file1);?>
            </div>
            <?php //echo lang('users_file2', 'file2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($file2);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-sm-offset-4 col-sm-12">
                  <div class="btn-group">
                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                        <?php echo anchor('#', lang('actions_cancel'), array('data-dismiss'=>'modal', 'class' => 'btn btn-default btn-flat')); ?>
                  </div>
            </div>
      </div>
      <?php echo form_close();?>
      <script>
            $(function () {
                  $('#form-create_notary').on('submit', function (e) {

                        e.preventDefault();
                        var formData = new FormData(this);

                        $.ajax({
                              url: '<?php echo base_url();?>auth/create_notary',
                              type: 'POST',
                              data: formData,
                              cache: false,
                              contentType: false,
                              processData: false,
                              success: function (result) {
                                    if (result.includes("success")) {
                                          location.reload();
                                    } else {
                                          $("#message").html(result);
                                          $('#modal-notary').show().scrollTop(0);
                                    }
                              }
                        });

                  });

                  $('#address1').on('change', function (e) {
                        $.ajax({
                              type: 'get',
                              url: '<?php echo base_url();?>auth/ajax_kota/' + $(
                                    "#address1 option:selected").val(),
                              success: function (result) {
                                    $('#address2').html(result);
                                    $('#address3').html("<option value=''>Pilih Kecamatan</option>");
                                    $('#address4').html("<option value=''>Pilih Kelurahan/Desa</option>");
                              }
                        });
                  });

                  $('#address2').on('change', function (e) {
                        $.ajax({
                              type: 'get',
                              url: '<?php echo base_url();?>auth/ajax_kota/' + $(
                                    "#address2 option:selected").data('url'),
                              success: function (result) {
                                    $('#address3').html(result);
                                    $('#address4').html("<option value=''>Pilih Kelurahan/Desa</option>");
                              }
                        });
                  });
                  $('#address3').on('change', function (e) {
                        $.ajax({
                              type: 'get',
                              url: '<?php echo base_url();?>auth/ajax_kota/' + $(
                                    "#address3 option:selected").data('url'),
                              success: function (result) {
                                    $('#address4').html(result);
                              }
                        });
                  });
            });
      </script>
      <?php die();?>