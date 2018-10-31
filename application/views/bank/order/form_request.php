<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Order Data Akta</h3>
                                </div>
                                <div class="box-body">
                                <button type="button" class="btn btn-login btn-flat pull-right"  data-toggle="modal" data-target="#formModal"><span class="glyphicon glyphicon-plus"></span> Order Baru</button>
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CodeIgniter</td>
                                        <td>100-000-301</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Bootstrap</td>
                                        <td>110-000-335</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>jQuery</td>
                                        <td>120-000-214</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>AdminLTE</td>
                                        <td>130-000-203</td>
                                        <td>Framework</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </section>
                <!-- Modal -->
<div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            </div>
<script>
function defer() {
            if (window.jQuery) {
                        $('*[data-target="#formModal"]').on('click', function (e) {
                        $('.modal-body').load("<?php echo base_url("bank/order/form_request_modal");?>", function(){
                        $('.modal-body').find(".login-box").removeClass("login-box");
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