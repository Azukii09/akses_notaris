<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <?php foreach ($menu as $menus) {
        if ($this->uri->segment('1')==$menus->url_menu) {
      ?>
      <ol class="breadcrumb">
        <li><i class="fa <?php echo $menus->icon_menu; ?>"></i> <?php echo $menus->nama_menu; ?></li>
      </ol>
    <?php
    }
   } ?>
    <!-- Main content -->

    <?php foreach ($data_req as $row1) {
      if ($row1->STATUS_PESAN=='progres') {
    ?>
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order <?php echo $row1->ID_REQUEST; ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">

        </div>

        <div class="box-body">
          <!-- content monitoring-->
                <table class="table">
                        <tr>
                          <th>Nama Agunan</th>
                          <th>Nama Akta</th>
                          <th>Deadline</th>
                          <th>Hari</th>
                          <th>Status</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                        <?php foreach ($data_agunan as $row_ag){
                          if ($row1->STATUS_PESAN=='progres' && $row1->ID_REQUEST == $row_ag->ID_REQUEST) {
                          ?>
                        <tr>
                          <td><?php echo $row_ag->JENIS_AGUNAN; ?></td>
                          <?php foreach ($joinorder as $row) {
                            if ($row->STATUS_PESAN=='progres' && $row1->ID_REQUEST == $row->ID_REQUEST && $row_ag->ID_AGUNAN == $row->ID_AGUNAN) {
                          ?>
                          <td><?php echo $row->NAMA_AKTA_REQUEST; ?></td>
                          <td><?php echo $row->DEADLINE_AKTA; ?></td>
                          <td>0</td>
                          <td>

                            <?php
                            if ($row->STATUS_AKTA=='progres') {
                            ?>
                              <p class="label label-warning"><?php echo $row->STATUS_AKTA; ?></p>
                            <?php }
                            else if ($row->STATUS_AKTA=='done') {
                            ?>
                              <p class="label label-success"><?php echo $row->STATUS_AKTA; ?></p>
                            <?php }?>
                          </td>
                          <td style="text-align: center;">
                            <button type="button" class="btn bg-olive" data-toggle="tooltip" data-placement="top" title="Detail">
                              <span class="fa fa-navicon"></span>
                            </button>
                          </td>
                          <tr>
                          </tr>
                          <div><td></td></div>
                          <?php }} ?>
                        </tr>
                        <?php
                      }}?>

                    </table>

          <!-- /content monitoring-->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

  <?php } }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
