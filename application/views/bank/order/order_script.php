<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/template/AdminLTE/')?>bower_components/bootstrap/dist/js/modal-steps.min.js"></script>

<script>
$('#myModal').modalSteps({
  btnCancelHtml: "Cancel",
  btnPreviousHtml: "Previous",
  btnNextHtml: "Next",
  btnLastStepHtml: "Complete",
  disableNextButton: false,
  completeCallback: function() {},
  callbacks: {},
  getTitleAndStep: function() {}
  });
</script>

<script>
  $(function () {
    $('#example1').DataTable()

  })
</script>

<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
