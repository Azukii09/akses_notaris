<!DOCTYPE html>
<html>
<!-- *header -->
<?php $this->load->view('template/header'); ?>
<!-- */header -->
<?php if ($link!=NULL): ?>
  <?php $this->load->view($link); ?>
<?php endif; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
<?php $this->load->view('template/navbar'); ?>
<!-- /Navbar -->

<!-- Sidebar -->
<?php $this->load->view('template/sidebar'); ?>
<!-- /Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <?php echo $content;  ?>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php $this->load->view('template/footer'); ?>
  <!-- /Footer -->

  <!-- Control Sidebar -->

</div>

<?php $this->load->view('template/Scriptshiet'); ?>
<?php if ($script!=NULL): ?>
  <?php $this->load->view($script); ?>
<?php endif; ?>

</body>
</html>
