<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>TIRE IN</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Tire Name <?php echo form_error('tire_id') ?></label>
                                    <!-- <div class='col-sm-10'><input type="text" class="form-control" name="tire_id" id="tire_id" placeholder="Tire Id" value="<?php echo $tire_id; ?>" />
                                   </div>  -->
                                   <div class='col-sm-10'>
                                      <select class="form-control" id="tire_id" name="tire_id">
                                        <?php if($tire_id != null){ 
                                             echo '<option value="'.$tire_id.'">'.$tire_name.'</option>';
                                         } 
                                        foreach ($get_all_tire as $row)
                                            {
                                              if($tire_id != $row->id){
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                              }
                                            } ?>
                                        >
                                      </select>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Amount <?php echo form_error('amount') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
                                   </div> 
                                </div>	    
                                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        	                 <div style='text-align: right;'> 
                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        	    <a href="<?php echo site_url('index.php/tire_in') ?>" class="btn btn-default">Cancel</a>
                        	</div>
                          </form>
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
        </section><!-- /.content -->