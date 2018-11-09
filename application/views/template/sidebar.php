
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->

  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/template/AdminLTE/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php
      // memanggil data menu
      foreach ($menu as $menus) {

      // menentukan menu ada label angkanya atau tidak (if pertama)
      if ($menus->jenis_menu==1) {
              // menentukan menu aktif atau tidak (if pertama)
              if ($this->uri->segment('1')==$menus->url_menu) {

                // menentukan ada sub menu atau tidak (if pertama)
                $a = $menus->id_menu;
					      $submenu = $this->db->query("SELECT * FROM sub_menu WHERE id_menu = '$a' ");
                if ($menus->jenis_sub==1) {
                  ?>
                  <li class="active treeview">
                    <a href="#">
                      <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                      <span><?php echo $menus->nama_menu; ?></span>
                      <span class="pull-right-container">

                        <!-- penulisan label angka job -->
                        <?php if ($menus->nama_menu=='Order') {?>
                        <span class="label label-primary pull-right">
                          <?php
                            $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="delivered" or STATUS_PESAN="read"');
                            echo $jumlah;
                          ?>
                        </span>
                      <?php }
                      else if ($menus->nama_menu=='Monitoring') {?>
                      <span class="label label-warning pull-right">
                        <?php
                          $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="progres"');
                          echo $jumlah;
                        ?>
                      </span>
                    <?php }
                    else if ($menus->nama_menu=='Report') {?>
                    <span class="label bg-purple pull-right">
                      <?php
                        $jumlah= $this->order_model->hitung_data_order_rep('STATUS_PESAN');
                        echo $jumlah;
                      ?>
                    </span>
                  <?php } ?>
                      <!-- /penulisan label angka job -->

                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <?php // memanggil data menu
                      foreach ($submenu->result() as $submenus) {
                      if ($this->uri->segment('2')==$submenus->url_sub_menu) {?>
                      <li class="active"><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                        <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                      </li>
                      <?php
                      }else{
                      ?>
                      <li><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                        <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                      </li>
                      <?php
                      }
                    }
                      // akhir dari memanggil data sub menu
                      ?>

                    </ul>
                  </li>
              <?php
                }
                // akhir menentukan sub menu (if pertama)
                else {?>
                  <li class="active">
                    <a href="<?php echo site_url($menus->url_menu.'/'.$menus->url_menu); ?>">
                      <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                      <span><?php echo $menus->nama_menu; ?></span>
                      <span class="pull-right-container">

                        <!-- penulisan label angka job -->
                        <?php if ($menus->nama_menu=='Order') {?>
                          <span class="label label-primary pull-right">
                            <?php
                              $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="delivered" or STATUS_PESAN="read"');
                              echo $jumlah;
                            ?>
                          </span>
                        <?php }
                        else if ($menus->nama_menu=='Monitoring') {?>
                        <span class="label label-warning pull-right">
                          <?php
                            $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="progres"');
                            echo $jumlah;
                          ?>
                        </span>
                      <?php }
                      else if ($menus->nama_menu=='Report') {?>
                      <span class="label bg-purple pull-right">
                        <?php
                          $jumlah= $this->order_model->hitung_data_order_rep('STATUS_PESAN');
                          echo $jumlah;
                        ?>
                      </span>
                    <?php } ?>
                        <!-- /penulisan label angka job -->

                      </span>
                    </a>
                  </li>
              <?php  }
              }
              // akhir menentukan menu aktif atau tidak (if pertama)

              // menentukan menu aktif atau tidak (else pertama)
              else {
                // menentukan ada sub menu atau tidak (else kedua)
                $a = $menus->id_menu;
                $submenu = $this->db->query("SELECT * FROM sub_menu WHERE id_menu = '$a' ");
                if ($menus->jenis_sub==1) {
              ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                  <span><?php echo $menus->nama_menu; ?></span>
                  <span class="pull-right-container">

                    <!-- penulisan label angka job -->
                    <?php if ($menus->nama_menu=='Order') {?>
                        <span class="label label-primary pull-right">
                          <?php
                            $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="delivered" or STATUS_PESAN="read"');
                            echo $jumlah;
                          ?>
                        </span>
                      <?php }
                      else if ($menus->nama_menu=='Monitoring') {?>
                      <span class="label label-warning pull-right">
                        <?php
                          $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="progres"');
                          echo $jumlah;
                        ?>
                      </span>
                    <?php }
                    else if ($menus->nama_menu=='Report') {?>
                    <span class="label bg-purple pull-right">
                      <?php
                        $jumlah= $this->order_model->hitung_data_order_rep('STATUS_PESAN');
                        echo $jumlah;
                      ?>
                    </span>
                  <?php } ?>
                      <!-- /penulisan label angka job -->

                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php // memanggil data menu
                  foreach ($submenu->result() as $submenus) {if ($this->uri->segment('2')==$submenus->url_sub_menu) {?>
                  <li class="active"><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                    <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                  </li>
                  <?php
                  }else{
                  ?>
                  <li><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                    <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                  </li>
                  <?php
                  }
                 }
                  // akhir dari memanggil sub menu
                  ?>
                </ul>
              </li>
              <?php
            }
            else {?>
              <li >
                <a href="<?php echo site_url($menus->url_menu.'/'.$menus->url_menu); ?>">
                  <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                  <span><?php echo $menus->nama_menu; ?></span>
                  <span class="pull-right-container">

                    <!-- penulisan label angka job -->
                    <?php if ($menus->nama_menu=='Order') {?>
                      <span class="label label-primary pull-right">
                        <?php
                          $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="delivered" or STATUS_PESAN="read"');
                          echo $jumlah;
                        ?>
                      </span>
                    <?php }
                    else if ($menus->nama_menu=='Monitoring') {?>
                    <span class="label label-warning pull-right">
                      <?php
                        $jumlah= $this->order_model->hitung_data_order_req('STATUS_PESAN','STATUS_PESAN="progres"');
                        echo $jumlah;
                      ?>
                    </span>
                  <?php }
                  else if ($menus->nama_menu=='Report') {?>
                  <span class="label bg-purple pull-right">
                    <?php
                      $jumlah= $this->order_model->hitung_data_order_rep('STATUS_PESAN');
                      echo $jumlah;
                    ?>
                  </span>
                <?php } ?>
                    <!-- /penulisan label angka job -->

                  </span>
                </a>
              </li>
          <?php  }
            // akhir menentukan sub menu (else kedua)
            }

              // akhir menentukan menu aktif atau tidak (else pertama)
      }


      // akhir dari menentukan menu ada label angkanya atau tidak (if pertama)


      // menentukan menu ada label angkanya atau tidak (else pertama)
      else {
        // menentukan menu aktif atau tidak (if kedua)
        if ($this->uri->segment('1')==$menus->url_menu) {

          // menentukan ada sub menu atau tidak (else ketiga)
          $a = $menus->id_menu;
          $submenu = $this->db->query("SELECT * FROM sub_menu WHERE id_menu = '$a' ");
          if ($menus->jenis_sub==1) {
          ?>
            <li class="active treeview">
              <a href="#">
                <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                <span><?php echo $menus->nama_menu; ?></span>
              </a>
              <ul class="treeview-menu">
                <?php // memanggil data menu
                foreach ($submenu->result() as $submenus) {
                if ($this->uri->segment('2')==$submenus->url_sub_menu) {?>
                <li class="active"><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                  <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                </li>
                <?php
                }else{
                ?>
                <li><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
                  <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
                </li>
                <?php
                }
              }
                // akhir dari memanggil sub menu
                ?>
              </ul>
            </li>
            <?php
              }
              else {?>
                <li class="active">
                  <a href="<?php echo site_url($menus->url_menu.'/'.$menus->url_menu); ?>">
                    <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                    <span><?php echo $menus->nama_menu; ?></span>
                  </a>
                </li>
            <?php  }
              // akhir menentukan sub menu (else ketiga)
            }
        // akhir menentukan menu aktif atau tidak (if kedua)

        // menentukan menu aktif atau tidak (else kedua)

        else {

          // menentukan ada sub menu atau tidak (else keempat)
          $a = $menus->id_menu;
          $submenu = $this->db->query("SELECT * FROM sub_menu WHERE id_menu = '$a' ");
          if ($menus->jenis_sub==1) {
          ?>
          <li class="treeview">
            <a href="#">
              <i class="fa <?php echo $menus->icon_menu; ?>"></i>
              <span><?php echo $menus->nama_menu; ?></span>
            </a>

          <ul class="treeview-menu">
            <?php // memanggil data menu
            foreach ($submenu->result() as $submenus) {if ($this->uri->segment('2')==$submenus->url_sub_menu) {?>
            <li class="active"><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
              <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
            </li>
            <?php
            }else{
            ?>
            <li><a href="<?php echo site_url($menus->url_menu.'/'.$submenus->url_sub_menu); ?>">
              <i class="fa <?php echo $submenus->icon_sub_menu; ?>"></i> <?php echo $submenus->nama_sub_menu; ?></a>
            </li>
            <?php
            }
           }
            // akhir dari memanggil sub menu
            ?>
          </ul>
          </li>
        <?php
            }
            else {?>
              <li >
                <a href="<?php echo site_url($menus->url_menu.'/'.$menus->url_menu); ?>">
                  <i class="fa <?php echo $menus->icon_menu; ?>"></i>
                  <span><?php echo $menus->nama_menu; ?></span>
                </a>
              </li>
          <?php  }
            // akhir menentukan sub menu (else ketiga)
          }
          // akhir menentukan menu aktif atau tidak (else kedua)
      }
    // akhir dari menentukan menu ada label angkanya atau tidak (else pertama)
    }
    // akhir dari memanggil data menu
    ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
