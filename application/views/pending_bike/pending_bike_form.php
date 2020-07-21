<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>PENDING_BIKE</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike Code <?php echo form_error('bike_code') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_code" id="bike_code" placeholder="Bike Code" value="<?php echo $bike_code; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike Color <?php echo form_error('bike_color') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_color" id="bike_color" placeholder="Bike Color" value="<?php echo $bike_color; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike No Rangka <?php echo form_error('bike_no_rangka') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_no_rangka" id="bike_no_rangka" placeholder="Bike No Rangka" value="<?php echo $bike_no_rangka; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike No Mesin <?php echo form_error('bike_no_mesin') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_no_mesin" id="bike_no_mesin" placeholder="Bike No Mesin" value="<?php echo $bike_no_mesin; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike Year <?php echo form_error('bike_year') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_year" id="bike_year" placeholder="Bike Year" value="<?php echo $bike_year; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Bike Faktur <?php echo form_error('bike_faktur') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="bike_faktur" id="bike_faktur" placeholder="Bike Faktur" value="<?php echo $bike_faktur; ?>" />
                                   </div> 
                                </div>
      <input type="hidden" name="bike_id" value="<?php echo $bike_id; ?>" /> 
   <div style='text-align: right;'> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
      <a href="<?php echo site_url('pending_bike') ?>" class="btn btn-default">Cancel</a>
  </div>
                          </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section><!-- /.content -->