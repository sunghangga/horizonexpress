<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>RECEIVE_ITEM</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Delivery Detail Id <?php echo form_error('delivery_detail_id') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="delivery_detail_id" id="delivery_detail_id" placeholder="Delivery Detail Id" value="<?php echo $delivery_detail_id; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Qty Received <?php echo form_error('qty_received') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="qty_received" id="qty_received" placeholder="Qty Received" value="<?php echo $qty_received; ?>" disabled/>
                                   </div> 
                                </div>
	    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Keterangan <?php echo form_error('keterangan') ?></label>
                                    <div class='col-sm-10'><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" disabled><?php echo $keterangan; ?></textarea>
                                    </div>
                                </div>
	 <div style='text-align: left;'>
	    <a href="<?php echo site_url('receive_item') ?>" class="btn btn-default">Cancel</a>
	</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section><!-- /.content -->