<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
              <?php foreach ($menu as $menus) {
                if ($this->uri->segment('1')==$menus->url_menu) {
              ?>
              <h3 class="box-title ">
                  <i class="fa <?php echo $menus->icon_menu; ?>"></i> <?php echo $menus->nama_menu; ?>
              </h3>
              <?php
                }
               } ?>
        </div>

        <!-- Ini pengaturan tombol modal-->
        <div class="box-body">
          <button type="button" class="btn btn-primary btn-flat pull-right" ><span class="glyphicon glyphicon-plus"></span> Order Baru</button><br><br>
        </div>

        <!-- /Ini pengaturan tombol modal-->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal Request</th>
                  <th>Ref.</th>
                  <th>Nasabah</th>
                  <th>Alamat Nasabah</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <!-- body table -->
                <tbody>
                <?php foreach ($data_req as $row) {
                  if ($row->STATUS_PESAN=='delivered'||$row->STATUS_PESAN=='read') {
                ?>
                <tr>
                  <td><?php echo $row->TGL_REQUEST; ?></td>
                  <td><?php echo $row->ID_REQUEST; ?></td>
                  <td><?php echo $row->NAMA_NASABAH; ?></td>
                  <td><?php echo $row->ALAMAT_JALAN_NASABAH; ?></td>
                  <td>

                    <?php
                    if ($row->STATUS_PESAN=='delivered') {
                    ?>
                      <p class="label label-primary"><?php echo $row->STATUS_PESAN; ?></p>
                    <?php }
                    else if ($row->STATUS_PESAN=='read') {
                    ?>
                      <p class="label label-info"><?php echo $row->STATUS_PESAN; ?></p>
                    <?php } ?>
                  </td>
                  <td style="text-align: center;"><input class="btn btn-primary" type="submit" value="Edit">&ensp;<input class="btn btn-danger" type="submit" value="Hapus"></td>
                </tr>
              <?php }} ?>
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
