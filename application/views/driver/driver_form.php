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
                          <form action="<?php echo $action; ?>" method="post">
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                   </div> 
                                </div>
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Address <?php echo form_error('address') ?></label>
                                    <div class='col-sm-10'><textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
                                    </div>
                                </div>
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Telephone <?php echo form_error('telephone') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>" />
                                   </div> 
                                </div>
	                                   <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name Wife <?php echo form_error('name_wife') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name_wife" id="name_wife" placeholder="Name Wife" value="<?php echo $name_wife; ?>" />
                                   </div> 
                                </div>
	                                   <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Telephone Wife <?php echo form_error('telephone_wife') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="telephone_wife" id="telephone_wife" placeholder="Telephone Wife" value="<?php echo $telephone_wife; ?>" />
                                   </div> 
                                </div>
	                               <div class='form-group row'>
                                  <label for='label' class='col-sm-2 col-form-label'>Sim Expire <?php echo form_error('sim_expire') ?></label>
                                    <div class="col-sm-4 input-group date" data-target-input="nearest" id="inputDate">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#inputDate" placeholder="Sim Expire"  name="sim_expire" id="sim_expire" value="<?php echo $sim_expire; ?>"/>
                                      <div class="input-group-append" data-target="#inputDate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                      </div>
                                    </div>
                                    <!-- /.form group -->
                                  </div>
	  
                          	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                          	 <div style='text-align: right;'> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                          	    <a href="<?php echo site_url('driver') ?>" class="btn btn-default">Cancel</a>
                          	</div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
        
        <script>
          $(function () {
               $('#inputDate').datetimepicker({
                  format: 'YYYY-MM-DD'
                })
            });
        </script>
        </section><!-- /.content