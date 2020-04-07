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
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nopol <?php echo form_error('nopol') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nopol" id="nopol" placeholder="Nopol" value="<?php echo $nopol; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Nosin <?php echo form_error('nosin') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="nosin" id="nosin" placeholder="Nosin" value="<?php echo $nosin; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Norangka <?php echo form_error('norangka') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="norangka" id="norangka" placeholder="Norangka" value="<?php echo $norangka; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Production Year <?php echo form_error('production_year') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="production_year" id="production_year" placeholder="Production Year" value="<?php echo $production_year; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Jto Samsat <?php echo form_error('jto_samsat') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="jto_samsat" id="jto_samsat" placeholder="Jto Samsat" value="<?php echo $jto_samsat; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kir <?php echo form_error('kir') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="kir" id="kir" placeholder="Kir" value="<?php echo $kir; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Km <?php echo form_error('km') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="km" id="km" placeholder="Km" value="<?php echo $km; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Create At <?php echo form_error('create_at') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" disabled/>
                                   </div> 
                                </div>
	 <div style='text-align: right;'>
	    <a href="<?php echo site_url('index.php/truck') ?>" class="btn btn-default">Cancel</a>
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
          document.getElementById("jto_samsat").value = moment(document.getElementById("jto_samsat").value).format('D MMM YYYY');
          document.getElementById("create_at").value = moment(document.getElementById("create_at").value).format('D MMM YYYY');
        </script>
        </section><!-- /.content -->