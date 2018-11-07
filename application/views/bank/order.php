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
        <li><a href="<?php echo $menus->url_menu; ?>"><i class="fa <?php echo $menus->icon_menu; ?>"></i> <?php echo $menus->nama_menu; ?></a></li>
      </ol>
    <?php
    }
   } ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Nasabah</th>
                  <th>Tanggal Request</th>
                  <th>Nama Petugas</th>
                </tr>
                </thead>
                <!-- body table -->
                <tbody>
                  <?php foreach ($joinorder as $row) {?>
                <tr>
                  <td><?php echo $row->NAMA_NASABAH; ?></td>
                  <td><?php echo $row->TGL_REQUEST; ?></td>
                  <td><?php echo $row->PETUGAS_REQUEST; ?></td>
                </tr>
              <?php } ?>
                </tbody>
                <!-- /body table -->

                <!-- footer table -->
                <tfoot>
                <tr>
                  <th>Nama Nasabah</th>
                  <th>Tanggal Request</th>
                  <th>Nama Petugas</th>
                </tr>
                </tfoot>
                <!-- /footer table -->
              </table>
            </div>
            <!-- /.box-body -->
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
