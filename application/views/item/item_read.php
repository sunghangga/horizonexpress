<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>ITEM</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                    	   <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" disabled/>
                             </div> 
                          </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Category <?php echo form_error('category') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="category" id="category" placeholder="Category" value="<?php echo $category; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Satuan <?php echo form_error('satuan_id') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="satuan_id" id="satuan_id" placeholder="Satuan Id" value="<?php echo $unit; ?>" disabled/>
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
                        	    <a href="<?php echo site_url('index.php/item') ?>" class="btn btn-default">Cancel</a>
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
          document.getElementById("update_at").value = moment(document.getElementById("create_at").value).format('D MMM YYYY');
        </script>
        </section><!-- /.content -->