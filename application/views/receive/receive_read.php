<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>RECEIVE</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Receiver <?php echo form_error('receiver') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="receiver" id="receiver" placeholder="Receiver" value="<?php echo $receiver; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Pdi <?php echo form_error('pdi') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="pdi" id="pdi" placeholder="Pdi" value="<?php echo $pdi; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Pic <?php echo form_error('pic') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="pic" id="pic" placeholder="Pic" value="<?php echo $pic; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Create At <?php echo form_error('create_at') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Update At <?php echo form_error('update_at') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" disabled/>
                                   </div> 
                                </div>
	 <div style='text-align: left;'>
	    <a href="<?php echo site_url('index.php/receive') ?>" class="btn btn-default">Cancel</a>
	</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section><!-- /.content -->