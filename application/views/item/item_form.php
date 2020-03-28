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
                          <form action="<?php echo $action; ?>" method="post">
	                           <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Name <?php echo form_error('name') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                                   </div> 
                                </div>
	                         <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Category <?php echo form_error('category') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control" id="category" name="category" >
                                        <?php if($category != null){ 
                                             echo '<option value="'.$category.'">'.strtoupper($category).'</option>';
                                         } ?>
                                        <option value="barang">BARANG</option>
                                        <option value="kelengkapan">KELENGKAPAN</option>
                                      </select>
                                   </div> 
                                </div>
	                         <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Unit<?php echo form_error('unit_id') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control" id="unit" name="unit_id">
                                        <?php if($unit_id != null){ 
                                             echo '<option value="'.$unit_id.'">'.$unit.'</option>';
                                         } 
                                        foreach ($get_all_unit as $row)
                                            {
                                              if($unit_id != $row->id){
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                              }
                                            } ?>
                                        >
                                      </select>
                                   </div> 
                                </div>
	 
                          	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                          	 <div style='text-align: right;'> 
                                                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                          	    <a href="<?php echo site_url('item') ?>" class="btn btn-default">Cancel</a>
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
        </section><!-- /.content -->