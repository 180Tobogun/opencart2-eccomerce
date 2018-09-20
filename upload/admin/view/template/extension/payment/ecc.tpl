<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-ecc" data-toggle="tooltip" title="<?php echo $button_save; ?>"
                        class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                   class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-ecc"
                      class="form-horizontal">


                    <!--
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-email"><?php echo $entry_email; ?></label>
                     <div class="col-sm-10">
                       <input type="text" name="ecc_email" value="<?php echo $ecc_email; ?>" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />
                       <?php if ($error_email) { ?>
                       <div class="text-danger"><?php echo $error_email; ?></div>
                       <?php } ?>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-secret"><?php echo $entry_secret; ?></label>
                     <div class="col-sm-10">
                       <input type="text" name="ecc_secret" value="<?php echo $ecc_secret; ?>" placeholder="<?php echo $entry_secret; ?>" id="input-secret" class="form-control" />
                     </div>
                   </div>


                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip" title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span></label>
                     <div class="col-sm-10">
                       <input type="text" name="ecc_total" value="<?php echo $ecc_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-total" class="form-control" />
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_order_status; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_order_status_id" id="input-order-status" class="form-control">
                         <?php foreach ($order_statuses as $order_status) { ?>
                         <?php if ($order_status['order_status_id'] == $ecc_order_status_id) { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-pending-status"><?php echo $entry_pending_status; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_pending_status_id" id="input-pending-status" class="form-control">
                         <?php foreach ($order_statuses as $order_status) { ?>
                         <?php if ($order_status['order_status_id'] == $ecc_pending_status_id) { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-canceled-status"><?php echo $entry_canceled_status; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_canceled_status_id" id="input-canceled-status" class="form-control">
                         <?php foreach ($order_statuses as $order_status) { ?>
                         <?php if ($order_status['order_status_id'] == $ecc_canceled_status_id) { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-failed-status"><?php echo $entry_failed_status; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_failed_status_id" id="input-failed-status" class="form-control">
                         <?php foreach ($order_statuses as $order_status) { ?>
                         <?php if ($order_status['order_status_id'] == $ecc_failed_status_id) { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-chargeback-status"><?php echo $entry_chargeback_status; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_chargeback_status_id" id="input-chargeback-status" class="form-control">
                         <?php foreach ($order_statuses as $order_status) { ?>
                         <?php if ($order_status['order_status_id'] == $ecc_chargeback_status_id) { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="form-group">
                     <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
                     <div class="col-sm-10">
                       <select name="ecc_geo_zone_id" id="input-geo-zone" class="form-control">
                         <option value="0"><?php echo $text_all_zones; ?></option>
                         <?php foreach ($geo_zones as $geo_zone) { ?>
                         <?php if ($geo_zone['geo_zone_id'] == $ecc_geo_zone_id) { ?>
                         <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                         <?php } else { ?>
                         <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                         <?php } ?>
                         <?php } ?>
                       </select>
                     </div>
                   </div>

                   -->

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="ecc_status" id="input-status" class="form-control">
                                <?php if ($ecc_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                      <div class="col-sm-10">
                        <input type="text" name="ecc_sort_order" value="<?php echo $ecc_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-load-pem-file"><?php echo $load_pem_file; ?></label>
                      <div class="col-sm-10">
                          <input type="file" name="ecc_load_pem_file" accept=".pem">
                      </div>
                    </div>

                    -->

                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="input-merchant-id"><?php echo $entry_merchant_id; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="ecc_merchant_id" value="<?php echo $ecc_merchant_id; ?>"
                                   placeholder="<?php echo $entry_merchant_id; ?>" id="input-merchant_id"
                                   class="form-control"/>
                            <?php if ($error_merchant_id) { ?>
                            <div class="text-danger"><?php echo $error_merchant_id; ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"
                               for="input-terminal-id"><?php echo $entry_terminal_id; ?></label>
                        <div class="col-sm-10">
                            <input type="text" name="ecc_terminal_id" value="<?php echo $ecc_terminal_id; ?>"
                                   placeholder="<?php echo $entry_terminal_id; ?>" id="input-terminal_id"
                                   class="form-control"/>
                            <?php if ($error_terminal_id) { ?>
                            <div class="text-danger"><?php echo $error_terminal_id; ?></div>
                            <?php } ?>
                        </div>
                    </div>


                    <!--
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="input-load-pem-file"><?php echo $entry_load_pem_file; ?></label>

                                          <div>
                                              <input type="file" id="pem-file-input" name="ecc_load_pem_file" accept=".pem">
                                              <h3>Contents of the file:</h3>
                                              <pre id="pem-file-content"></pre>

                                              <script type="text/javascript">
                                                  function readPemFile(e) {
                                                      var file = e.target.files[0];
                                                      if (!file) {
                                                          return;
                                                      }
                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                          var contents = e.target.result;
                                                          displayPemFileContents(contents);
                                                      };
                                                      reader.readAsText(file);
                                                  }

                                                  function displayPemFileContents(contents) {
                                                      var element = document.getElementById('pem-file-content');
                                                      element.textContent = contents;

                                                      <?php echo 'QQQQZZZZQQQQ' ?>


                                                  }

                                                  document.getElementById('pem-file-input')
                                                      .addEventListener('change', readPemFile, false);
                                              </script>

                                          </div>
                                        </div>


                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="input-load-pub-file"><?php echo $entry_load_pub_file; ?></label>

                                          <div>
                                              <input type="file" id="pub-file-input" name="ecc_load_pub_file" accept=".pub">
                                              <h3>Contents of the file:</h3>
                                              <pre id="pub-file-content"></pre>

                                              <script type="text/javascript">
                                                  function readPubFile(e) {
                                                      var file = e.target.files[0];
                                                      if (!file) {
                                                          return;
                                                      }
                                                      var reader = new FileReader();
                                                      reader.onload = function(e) {
                                                          var contents = e.target.result;
                                                          displayPubFileContents(contents);
                                                      };
                                                      reader.readAsText(file);
                                                  }

                                                  function displayPubFileContents(contents) {
                                                      var element = document.getElementById('pub-file-content');
                                                      element.textContent = contents;

                                                      <?php echo 'QQQQZZZZQQQQ' ?>


                                                  }

                                                  document.getElementById('pub-file-input')
                                                      .addEventListener('change', readPubFile, false);
                                              </script>

                                          </div>
                                          !-->
            </div>
            </form>
        </div>

        <!--delete !-->
        <div class="panel-body delete">
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="input-delete"><?php echo $entry_delete; ?></label>
                <div class="col-sm-10">
                    <form method="post"
                          action="<?php $_SERVER['HTTP_HOST'] ?>/admin/view/template/extension/payment/ecc_delete.php">
                        <input name="delete" type="submit" value="Delete Now!">
                    </form>
                    <?php if ($success_delete) { ?>
                    <div class="text-danger"><?php echo $success_delete; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--delete end!-->
    </div>
</div>
</div>
<?php echo $footer; ?> 