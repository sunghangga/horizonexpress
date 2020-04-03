<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>TRUCK</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
	                           <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                   </div> 
                                </div>
	                             <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nopol <?php echo form_error('nopol') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" />
                                   </div> 
                                </div>
	                             <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nosin <?php echo form_error('nosin') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nosin" id="nosin" placeholder="Nosin" value="<?php echo $nosin; ?>" />
                                   </div> 
                                </div>
	                             <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Norangka <?php echo form_error('norangka') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="norangka" id="norangka" placeholder="Norangka" value="<?php echo $norangka; ?>" />
                                   </div> 
                                </div>
	                           <div class='form-group row'>
                              <label for='label' class='col-sm-2 col-form-label'>Production Year <?php echo form_error('production_year') ?></label>
                                    <div class='col-sm-4 input-group date' data-target-input="nearest" id="inputYear">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#inputYear" name="production_year" id="production_year" placeholder="Production Year" value="<?php echo $production_year; ?>"/>
                                      <div class="input-group-append" data-target="#inputYear" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                      </div>
                                   </div> 
                                </div>
	                           <div class='form-group row'>
                              <label for='label' class='col-sm-2 col-form-label'>Jto Samsat <?php echo form_error('jto_samsat') ?></label>
                                    <div class='col-sm-4 input-group date' data-target-input="nearest" id="inputDate">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#inputDate" name="jto_samsat" id="jto_samsat" placeholder="Jto Samsat" value="<?php echo $jto_samsat; ?>"/>
                                      <div class="input-group-append" data-target="#inputDate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                      </div>
                                   </div> 
                                </div>
	                     <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kir <?php echo form_error('kir') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="kir" id="kir" placeholder="Kir" value="<?php echo $kir; ?>" />
                                   </div> 
                                </div>
	                     <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km <?php echo form_error('km') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="km" id="km" placeholder="Km" value="<?php echo $km; ?>" />
                                   </div> 
                                </div>
	
	                       <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	                     <div style='text-align: right;'> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	                       <a href="<?php echo site_url('index.php/truck') ?>" class="btn btn-default">Cancel</a>
                       </div>
                          </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <script src="<?php echo base_url('template/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script>
          $(function () {
               $('#inputDate').datetimepicker({
                  format: 'YYYY-MM-DD'
                });
               $('#inputYear').datetimepicker({
                  format: 'YYYY'
                });
            });
        </script>
        </section><!-- /.content -->