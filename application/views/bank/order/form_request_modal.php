<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
        <link rel="stylesheet" href="<?php echo base_url($plugins_dir . '/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>">
        <script>
        jQuery.cachedScript = function( url, options ) {
      options = $.extend( options || {}, {
      dataType: "script",
      cache: true,
      url: url
      });
      return jQuery.ajax( options );
      };
      $.cachedScript("<?php echo base_url($plugins_dir . '/bootstrap-tagsinput/bootstrap-tagsinput.min.js'); ?>").done(function( script, textStatus ) {
      });
</script>
                    <div class="row">
                        <div class="col-md-12">
                        <?php if($progress_percent!=0)
                             echo '<b><p>'.$notary->name.'</p><span>'.$notary->address5.'</span></b>';
                              ?>
                             <div class="box">
                             <?php if($progress_percent!=0){
                                   ?>
                             <div class="box-header with-border"><h4><?php echo $progress; ?></h4></div>
                                <div class="progress">
                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="<?php echo $progress_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress_percent; ?>%">
                <span class="sr-only"></span>
                </div>
              </div>
                                    <?php
                                    }?> 
                                    <div class="box-body">
                                    <div class=""><h4><?php echo $content_header; ?></h4></div>
                                    <?php if($progress_percent==0){
                                    ?>
                                    <div class="container"><div class="row col-sm-10">
                                    <?
                                    foreach($local_notaries as $row)
                                    { 
                                    if($row->active)
                                    echo '<div onclick="next(\''.$row->username.'\');" style="cursor:pointer" class="col-sm-3"><div class="well"><p>'.$row->name.'</p><span>'.$row->address5.'</span></div></div>';
                                    }
                                    ?>
                                    </div></div>
                                    <script>
                                    function next(username){
                                    $('.modal-body').load("<?php echo base_url("bank/order/form_request_modal/2");?>",{notary: username}, function(){
                                    $('.modal-body').find(".login-box").removeClass("login-box");
                                    });}</script>
                                    <?php
                                    }
                                    if($progress_percent==33){
                                    echo form_open_multipart('bank/order/form_request_modal/3', array('class' => 'form-horizontal', 'id' => 'form')); ?>
<div class="form-group">
      <?php //echo lang('users_name', 'name', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-sm-6">
            <?php echo form_input($name);?>
      </div>
      <?php //echo lang('users_number', 'number', array('class' => 'col-sm-2 control-label')); ?>
      <div class="col-sm-6">
            <?php echo form_input($number);?>
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
      <?php //echo lang('users_address5', 'address5', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-6">
                  <?php echo form_input($address5);?>
            </div>
            <div class="col-sm-6">
                  <?php echo form_input($date_of_birth);?>
                  <?php echo form_hidden('notary', $notary_username); ?>
            </div>
</div>
      <?php echo form_close();?>
      <script>
      
function defer() {
            if (window.jQuery) {
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
                  $('#form').on('submit', function (e) {

e.preventDefault();
var formData = new FormData(this);

$.ajax({
      url: '<?php echo base_url();?>bank/order/form_request_modal/3',
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (result) {
            $('.modal-body').html(result);
            $('.modal-body').find(".login-box").removeClass("login-box");
      }
});
});
                  $('#back').on('click', function (e) {

e.preventDefault();

$.ajax({
      url: '<?php echo base_url();?>bank/order/form_request_modal/1',
      type: 'GET',
      success: function (result) {
            $('.modal-body').html(result);
            $('.modal-body').find(".login-box").removeClass("login-box");
      }
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
                                        <?php
                                        }
                                    if($progress_percent==66){
                                    ?>
                                    <button type="button" class="btn btn-login btn-flat pull-right" onclick="add();"><span class="glyphicon glyphicon-plus"></span> Tambah Agunan</button>
                                    <table id="mainTable" class="table table-striped">
                                    <thead>
                                    <tr>
                                          <th>Jenis Agunan</th>
                                          <th>Nama</th>
                                          <th>No Bukti</th>
                                          <th>Pengikatan</th>
                                          <th>Akta Pengikatan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <br>
                                    <h4>Akta Lainnya</h4>
                                    <button type="button" class="btn btn-login btn-flat pull-right" onclick="add2();"><span class="glyphicon glyphicon-plus"></span> Tambah akta</button>
                                    <table id="mainTable2" class="table table-striped">
                                    <thead>
                                    <tr>
                                    <th style="width: 90%;">Nama Akta</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <br>
                                    <?php echo form_hidden('name', $name); ?>
                                    <?php echo form_hidden('number', $number); ?>
                                    <?php echo form_hidden('address1', $address1); ?>
                                    <?php echo form_hidden('address2', $address2); ?>
                                    <?php echo form_hidden('address3', $address3); ?>
                                    <?php echo form_hidden('address4', $address4); ?>
                                    <?php echo form_hidden('address5', $address5); ?>
                                    <?php echo form_hidden('date_of_birth', $date_of_birth); ?>
                                    <?php echo form_hidden('notary', $notary_username); ?>
                                    <div class="form-group">
                                          <div class="col-sm-12">
                                                <?php echo form_input($file1);?>
                                          </div>
                                          </div>
                                    <script>
                                    $.getScript( "<?php echo base_url($plugins_dir . '/editable-table/jquery.tabledit.min.js'); ?>", function( data, textStatus, jqxhr ) {
                                    });
                                    $('table tbody').on('click', '.btn-danger', function(){
                                          $(this).parent().parent().remove();
                                    });
                                    function add(){
    $('#mainTable tbody').prepend('<tr><td tabindex=1></td><td tabindex=1></td><td tabindex=1></td><td tabindex=1></td><td data-pass="true" tabindex=1><select multiple data-role="tagsinput"></select></td><td tabindex=1><button type="button" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
                                    $('select').tagsinput('refresh');
                                    $('#mainTable').Tabledit({
                                    editButton: false,
                                    saveButton: false,
                                    deleteButton: false,
                                    hideIdentifier: false,
                                    columns: {
                                    identifier: [6, '-'],      
                                    editable: [[0, 'Jenis Agunan'], [1, 'Nama'], [2, 'No Bukti'], [3, 'Pengikatan']]
                                    }
                                    });
                                    }
                                    function add2(){
    $('#mainTable2 tbody').prepend('<tr><td></td><td><button type="button" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-remove"></span></button></td></tr>');
                                    $('select').tagsinput('refresh');
                                    $('#mainTable2').Tabledit({
                                    editButton: false,
                                    saveButton: false,
                                    deleteButton: false,
                                    hideIdentifier: false,
                                    columns: {
                                    identifier: [2, '-'],      
                                    editable: [[0, '????']]
                                    }
                                    });
                                    }
                                    $('*[form="form"]').on('click', function (e) {
                                    e.preventDefault();
                                    var reader = new FileReader();
                                    reader.onload = function () {
                                    function getData(){
                                    var json = '{';
                                    var otArr = [];
                                    var tbl2 = $('#mainTable tbody tr').each(function(i) {
                                          x = $(this).children();
                                          var itArr = [];
                                          x.each(function() {
                                                itArr.push('"' + $(this).text() + '"');
                                          });
										  itArr = itArr.slice(0, -2);
										  itArr.push('"' + $($('#mainTable tr')[i+1]).find('select').tagsinput('items') + '"');
                                          otArr.push('"' + i + '": [' + itArr.join(',') + ']');
                                    })
                                    json += otArr.join(",") + '}';
                                    return json;
                                    }      
                                    function getData2(){
                                    var json = '{';
                                    var otArr = [];
                                    var tbl2 = $('#mainTable2 tbody tr').each(function(i) {
                                          x = $(this).children();
                                          var itArr = [];
                                          x.each(function() {
                                                itArr.push('"' + $(this).text() + '"');
                                          });
                                          itArr = itArr.slice(0, -1);
                                          otArr.push('"' + i + '": [' + itArr.join(',') + ']');
                                    })
                                    json += otArr.join(",") + '}';
                                    return json;
                                    }
                                    $.ajax({
                                          url: '<?php echo base_url();?>bank/order/form_request_modal/4',
                                          type: 'POST',
                                          data: { notary: '<?php echo $notary_username;?>',
                                          data: getData(),
                                          data2: getData2(),
                                          name: '<?php echo $name;?>',
                                          file1: reader.result,
                                          number: '<?php echo $number;?>',
                                          address1: '<?php echo $address1;?>',
                                          address2: '<?php echo $address2;?>',
                                          address3: '<?php echo $address3;?>',
                                          address4: '<?php echo $address4;?>',
                                          address5: '<?php echo $address5;?>',
                                          date_of_birth: '<?php echo $date_of_birth;?>' },
                                          success: function (result) {
                                                $('.modal-body').html(result);
                                                $('.modal-body').find(".login-box").removeClass("login-box");
                                          }
                                    });
                                    };
                                    reader.readAsDataURL($('#file1').prop('files')[0]);
                                    });
                                    $('#back').on('click', function (e) {
                                    e.preventDefault();
                                    $('.modal-body').load("<?php echo base_url("bank/order/form_request_modal/2");?>",{notary: '<?php echo $notary_username;?>'}, function(){
                                    $('.modal-body').find(".login-box").removeClass("login-box");
                                    });
                                    });
                                    </script>
                                    <?php
                                    }
                                    if($progress_percent==100){
                                          ?>
                                          <p>Nama Notaris:  <b><?php echo $notary->name;?></b></p>
                                          <p>Nasabah:  <b><?php echo $name;?></b></p>
                                          <p>Alamat Nasabah:  <b><?php echo $address1;?>,<?php echo $address2;?>,<?php echo $address3;?>,<?php echo $address4;?>,<?php echo $address5;?></b>
                                          <p>Jumlah Pinjaman:  <b><?php echo $number;?></b></p>
                                          <?php date_default_timezone_set("Asia/Jakarta");?>
                                          <p>Tanggal Order:  <b><?php echo date("d/m/Y",time());?></b></p>
                                          <?php $date=date_create($date_of_birth);?>
                                          <p>Tanggal Akad:  <b><?php echo date_format($date,"d/m/Y");?></b></p>
                                          <script>
                                          $('#form').on('submit', function (e) {
                                          e.preventDefault();
                                          var formData = new FormData(this);
                                          $.ajax({
                                                url: '<?php echo base_url();?>bank/order/form_request_modal/5',
                                                type: 'POST',
                                                data: formData,
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                success: function (result) {
                                                      $('.modal-body').html(result);
                                                      $('.modal-body').find(".login-box").removeClass("login-box");
                                                }
                                          });
                                          });
                                          </script>
                                          <?php
                                          }
                                    ?>
                                    <div class="box-footer with-border">
                                    <?php if($progress_percent!=0){
                                   ?>
                                    <button type="button" id="back" class="btn btn-default pull-left">Back</button>
                                    <button type="submit" form="form" class="btn btn-default pull-right">Next</button>
                                    <?php
                                    }?> 
                            </div>
                            </div>
                         </div>
                    </div>