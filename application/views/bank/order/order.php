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
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Order Baru</button><br><br>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="js-title-step"></h4>
              </div>
              <div class="modal-body">
                <div class="row hide" data-step="1" data-title="Pilih Notaris">
                  <div>
                    <div class="col-md-4">
                      <button type="button" class="btn btn-default">
                          <!-- Widget: user widget style 1 -->
                          <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                              <h3 class="widget-user-username">Kristina Angelina</h3>
                              <h5 class="widget-user-desc">Notaris</h5>
                            </div>
                            <div class="widget-user-image">
                              <img class="img-circle" src="<?php echo base_url('assets/template/AdminLTE/')?>dist/img/user3-128x128.jpg">
                            </div>
                            <div class="box-footer">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="description-block">
                                    <h5 class="description-header">Motto</h5>
                                    <span class="description-text">Hidup tertib hati senang</span>
                                  </div>
                                  <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                            </div>
                          </div>
                          <!-- /.widget-user -->
                          </button>
                        </div>

                        <div class="col-md-4">
                          <button type="button" class="btn btn-default">
                              <!-- Widget: user widget style 1 -->
                              <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">
                                  <h3 class="widget-user-username">Kristina Angelina</h3>
                                  <h5 class="widget-user-desc">Notaris</h5>
                                </div>
                                <div class="widget-user-image">
                                  <img class="img-circle" src="<?php echo base_url('assets/template/AdminLTE/')?>dist/img/user3-128x128.jpg">
                                </div>
                                <div class="box-footer">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="description-block">
                                        <h5 class="description-header">Motto</h5>
                                        <span class="description-text">Hidup tertib hati senang</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->
                                </div>
                              </div>
                              <!-- /.widget-user -->
                              </button>
                            </div>
                            <div class="col-md-4">
                              <button type="button" class="btn btn-default">
                                  <!-- Widget: user widget style 1 -->
                                  <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                      <h3 class="widget-user-username">Kristina Angelina</h3>
                                      <h5 class="widget-user-desc">Notaris</h5>
                                    </div>
                                    <div class="widget-user-image">
                                      <img class="img-circle" src="<?php echo base_url('assets/template/AdminLTE/')?>dist/img/user3-128x128.jpg">
                                    </div>
                                    <div class="box-footer">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="description-block">
                                            <h5 class="description-header">Motto</h5>
                                            <span class="description-text">Hidup tertib hati senang</span>
                                          </div>
                                          <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                      <!-- /.row -->
                                    </div>
                                  </div>
                                  <!-- /.widget-user -->
                                  </button>
                                </div>
                    </div>
                </div>
                <!-- /* batas step notaris -->

                <div class="row hide" data-step="2" data-title="Data Nasabah">
                  <div>
                    <div class="col-xs-12">
                				<div class="col-md-12">
                					<h2> Data Nasabah</h2>
                					<h5><p class="subHead">silahkan masukkan data agunan beserta akta yang terikat dengan agunan </p></i></h5>
                				    </br>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama Nasabah</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="NamaNasabah" placeholder="Nama Nasabah">
                                      </br>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="AlamatNasabah" placeholder="Alamat">
                                      </br>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-4">
                                      <select class="form-control">

                                      </select>
                                    </br>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                                    <div class="col-sm-4">
                                      <select class="form-control">

                                        </select>
                                      </br>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-4">
                                      <select class="form-control">

                                        </select>
                                      </br>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                    <div class="col-sm-4">
                                      <select class="form-control">

                                      </select>
                                      </br>
                                    </div>
                              <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Pinjaman*</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="jumlahPinjaman" placeholder="Jumlah Pinjaman">
                                </br>
                              </div>
                              <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Akad*</label>
                              <div class="col-sm-4">
                                <input type="date" class="form-control" id="tanggalAkad" placeholder="Tanggal Akad">
                                </br>
                              </div>
                            </div>

                        </div>
                				</div>
                  </div>
                </div>
                <!-- /* batas step 1 -->

                <div class="row hide" data-step="3" data-title="Data Agunan & Aktanya">
                  <div >
                      <div class="col-xs-12">
                        <h2> Data Agunan & Aktanya</h2>
                        </br>
              			          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-sm">
                                      <div class="form-group row">
                                          <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Agunan</label>
                                          <div class="col-sm-4">
                                            <select class="form-control" placeholder="Jenis Agunan">
                                              <option>Default select</option>
                                            </select>
                                            </br>
                                          </div>
                                          <label for="inputPassword" class="col-sm-2 col-form-label">No Bukti</label>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="noBuktiAgunan" placeholder="Nomor Bukti Agunan">
                                            </br>
                                          </div>
                                          <label for="inputPassword" class="col-sm-2 col-form-label">Atas Nama</label>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="atasNamaAgunan" placeholder="Atas Nama">
                                            </br>
                                          </div>
                                          <label for="inputPassword" class="col-sm-2 col-form-label">Nilai Pengikatan</label>
                                          <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nilaiPengikatanAgunan" placeholder="Nilai Pengikatan">
                                            </br>
                                          </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Akta Pengikatan</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="aktaPengikatan" placeholder="Akta yang diikat">
                                      </br>
                                    </div>
              											<button class="btn btn-primary nextBtn btn-lg" type="button" >-</button>
              											<button class="btn btn-primary nextBtn btn-lg" type="button" >+</button>
              											  </div>
                                  </div>
                                  </div>
                                  <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Simpan</button>
                                  <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Jenis Agunan</th>
                                      <th scope="col">Atas Nama</th>
                                      <th scope="col">No. Bukti</th>
                                      <th scope="col">Nilai Pengikatan</th>
                                      <th scope="col">Akta Pengikatan</th>
                                      <th scope="col">Aksi</th>
                                    </tr>
                                  </thead>

                                  <tbody>
              											<tr>
                                    <td>1</td>
                                    <td>Agunan A</td>
                                    <td>Atas Nama A</td>
                                    <td>No Bukti A</td>
                                    <td>Nilai Pengikatan A</td>
                                    <td>Akta Pengikatan A</td>
                                    <td>Aksi A / B</td>
                                    </tr>
                                  </tbody>
                                </table>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- /* batas step 2 -->

                <div class="row hide" data-step="4" data-title="Akta Tambahan">
                  <div>
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h2> Data Akta yang akan ditambahkan</h2>
            								<h5><p class="subHead">silahkan masukkan data akta tak terikat agunan yang akan dimaksudkan </p></i></h5>

                            <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Akta</th>
                                <th scope="col">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
            									<tr>
            									<td>1</td>
            									<td>Akta A</td>
            									<td>Akta untuk kendaraan bermotor </td>
            									</tr>
                            </tbody>
            							</table>

            							<button class="btn btn-primary btn-lg pull-right" type="submit">Tambah Akta</button>
            							<h4> Tabel akta tak terikat agunan </h4>
            								<table class ="table">
            								<thead>
            									<tr>
            										<th scope="col">No</th>
            										<th scope="col">Jenis Akta</th>
            										<th scope="col">Keterangan</th>
            									</tr>
            								</thead>
            								<tbody>
            									<tr>
            									<td>1</td>
            									<td>Akta A</td>
            									<td>Akta untuk kendaraan bermotor </td>
            									</tr>
            								</tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /* batas step 3 -->

                <div class="row hide" data-step="5" data-title="Keterangan & Lampiran">
                  <div>
                    <div class="col-xs-12">
                        <div class="col-md-12">
            							<h2> Keterangan & Lampiran</h2>
            							<h5><p class="subHead">silahkan keterangan & dokumen tambahan untuk notaris  </p></i></h5>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="5" id="comment" required></textarea>
                              </br>
            									Masukkan file yang akan diinmputkan :
                							<input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /* batas step 4 -->

                <div class="row hide" data-step="6" data-title="Order Anda">
                  <div >
                    <div class="col-xs-12">
                            <h2> Order Anda</h2>
                  						<h5><p class="subHead">berikut adalah order yang telah dilakukan, silahkan cek ulang order anda sebelum melanjutkan </p></i></h5>
                            </br>
                            <h4> Data Debitur</h4>
                              <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Nama Lengkap : </label>
                              </div>
                              <div class="col-md-12">
                                      <label for="inputPassword" class="col-sm-3 col-form-label">Alamat : </label>
                              </div>
                              <div class="col-md-12">
                                  <label for="inputPassword" class="col-sm-3 col-form-label">Provinsi : </label>
                              </div>
                              <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Kabupaten / Kota : </label>
                              </div>
                              <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Kecamatan : </label>
                              </div>
                              <div class="col-md-12">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Desa / Kelurahan : </label>
                              </div>
                          </div>
                          <div class="col-xs-12">
                              </br>
                              <h4> Data Agunan</h4>

                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Agunan</th>
                                    <th scope="col">Atas Nama</th>
                                    <th scope="col">No. Bukti</th>
                                    <th scope="col">Nilai Pengikatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                  								<tbody>
                  									<tr>
                  									<td>1</td>
                  									<td>Agunan A</td>
                  									<td>Atas Nama A</td>
                  									<td>No Bukti A</td>
                  									<td>Nilai Pengikatan A</td>
                  									</tr>
                  								</tbody>
                                </tbody>
                              </table>
                          </div>
                          <div class="col-xs-12">
                            </br>
                            <h4> Data Akta</h4>
                            <table class="table">
                              <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Akta</th>
                                    <th scope="col">Keterangan</th>
                                  </tr>
                              </thead>
                              <tbody>
                  								<td>1</td>
                  								<td>Akta A</td>
                  								<td>Akta untuk kendaraan bermotor </td>
                              </tbody>
                          </table>
                        </div>
                        <div class="col-xs-6">
                          </br>
                          <h4> Lampiran & Keterangan</h4>
                          <div class="col-md-12">
                                <label for="inputPassword" class="col-sm-3 col-form-label">SKMPHT.docx</label>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
                <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
                <button type="button" class="btn btn-primary js-btn-step" data-orientation="next"></button>
              </div>
            </div>
          </div>
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
                  <th style="text-align: center;">Aksi</th>
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
                  <td style="text-align: center;"><button type="button" class="btn btn-primary" ><span class="fa fa-pencil"></span></button>
                      &ensp;<button type="button" class="btn btn-danger" ><span class="fa fa-trash"></span></button>
                      &ensp;<button type="button" style="background-color:#78909c;" class="btn"><span class="fa fa-navicon"></span></button>
                  </td>
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
