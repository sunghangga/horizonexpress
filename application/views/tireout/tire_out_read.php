<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>TIRE OUT</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Tire Id <?php echo form_error('tire_id') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="tire_id" id="tire_id" placeholder="Tire Id" value="<?php echo $tire_id; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Amount <?php echo form_error('amount') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Driver Id <?php echo form_error('driver_id') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="driver_id" id="driver_id" placeholder="Driver Id" value="<?php echo $driver_id; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nopol <?php echo form_error('nopol') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km Before <?php echo form_error('km_before') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="km_before" id="km_before" placeholder="Km Before" value="<?php echo $km_before; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km After <?php echo form_error('km_after') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="km_after" id="km_after" placeholder="Km After" value="<?php echo $km_after; ?>" disabled/>
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
	 <div style='text-align: right;'>
	    <a href="<?php echo site_url('tire_out') ?>" class="btn btn-default">Cancel</a>
	</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <script src="<?php echo base_url('template/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
        <script>
          document.getElementById("create_at").value = moment(document.getElementById("create_at").value).format('D MMM YYYY');
          document.getElementById("update_at").value = moment(document.getElementById("update_at").value).format('D MMM YYYY');
        </script>
        </section><!-- /.content -->