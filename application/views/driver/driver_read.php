<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>DRIVER</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" disabled/>
                                   </div> 
                                </div>
	    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Address <?php echo form_error('address') ?></label>
                                    <div class='col-sm-10'><textarea class="form-control" rows="3" name="address" id="address" placeholder="Address" disabled><?php echo $address; ?></textarea>
                                    </div>
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Telephone <?php echo form_error('telephone') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name Wife <?php echo form_error('name_wife') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name_wife" id="name_wife" placeholder="Name Wife" value="<?php echo $name_wife; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Telephone Wife <?php echo form_error('telephone_wife') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="telephone_wife" id="telephone_wife" placeholder="Telephone Wife" value="<?php echo $telephone_wife; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Sim Expire <?php echo form_error('sim_expire') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="sim_expire" id="sim_expire" placeholder="Sim Expire" value="<?php echo $sim_expire; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Create At <?php echo form_error('create_at') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" disabled/>
                                   </div> 
                                </div>
	 <div style='text-align: right;'>
	    <a href="<?php echo site_url('index.php/driver') ?>" class="btn btn-default">Cancel</a>
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
          document.getElementById("sim_expire").value = moment(document.getElementById("sim_expire").value).format('D MMM YYYY');
        </script>
        </section><!-- /.content -->