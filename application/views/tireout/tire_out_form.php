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
                          <form action="<?php echo $action; ?>" method="post">
	                           <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Tire Name <?php echo form_error('tire_id') ?></label>
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
                                    <!-- <div class='col-sm-10'><input type="text" class="form-control" name="tire_id" id="tire_id" placeholder="Tire Name" value="<?php echo $tire_id; ?>" />
                                   </div> --> 
                                </div>
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Amount <?php echo form_error('amount') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo $amount; ?>" />
                                   </div> 
                                </div>
	                               <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Driver Name <?php echo form_error('driver_id') ?></label>
                                    <div class='col-sm-10'>
                                      <!-- <input type="text" class="form-control" name="driver_id" id="driver_id" placeholder="Driver Name" value="<?php echo $driver_id; ?>" /> -->
                                      <select class="form-control" id="driver_id" name="driver_id">
                                          <?php if($driver_id != null){ 
                                               echo '<option value="'.$driver_id.'">'.$driver_name.'</option>';
                                           } 
                                          foreach ($get_all_driver as $row)
                                              {
                                                if($driver_id != $row->id){
                                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                }
                                              } ?>
                                          >
                                        </select>
                                   </div> 
                                </div>
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nopol <?php echo form_error('nopol') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" />
                                   </div> 
                                </div>
	                                 <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km Before <?php echo form_error('km_before') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="km_before" id="km_before" placeholder="Km Before" value="<?php echo $km_before; ?>" />
                                   </div> 
                                </div>
	                               <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km After <?php echo form_error('km_after') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="km_after" id="km_after" placeholder="Km After" value="<?php echo $km_after; ?>" />
                                   </div> 
                                </div>
                          	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                          	 <div style='text-align: right;'> 
                                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                          	    <a href="<?php echo site_url('tire_out') ?>" class="btn btn-default">Cancel</a>
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

        <script>
          // $( "#driver_id" ).autocomplete({
          //     source: "<?php echo base_url()?>driver/get_all_driver/",

          //     select: function (event, ui) {
          //       $('[name="driver_id"]').val(ui.item.label); 
          //       return false;
          //     },
          //   });
          $( "#nopol" ).autocomplete({
              source: "<?php echo base_url()?>truck/get_all_nopol/",

              select: function (event, ui) {
                $('[name="nopol"]').val(ui.item.label); 
                $('[name="km_before"]').val(ui.item.km_before); 
                return false;
              },
            });
        </script>
        </section><!-- /.content -->