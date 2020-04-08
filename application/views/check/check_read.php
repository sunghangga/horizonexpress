<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>CHECK</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Examiner <?php echo form_error('examiner') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="examiner" id="examiner" placeholder="Examiner" value="<?php echo $examiner; ?>" disabled/>
                                   </div> 
                                </div>
                                <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Date Check <?php echo form_error('date_check') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="date_check" id="date_check" placeholder="Date Check" value="<?php echo $date_check; ?>" disabled/>
                                   </div> 
                                </div>
	                               <div class='form-group row'>
                                  <label for='label' class='col-sm-2 col-form-label'>Create At <?php echo form_error('create_at') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" disabled/>
                                   </div> 
                                </div>
	 <div style='text-align: right;'>
	    <a href="<?php echo site_url('index.php/check') ?>" class="btn btn-default">Cancel</a>
	</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        </section><!-- /.content -->