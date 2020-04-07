
        <!-- Main content -->
        <section class='content'>
          <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                    <h3 class='box-title'>Customer Read</h3>
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
                          <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Address <?php echo form_error('address') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?php echo $address; ?>" disabled/>
                             </div> 
                          </div>
                          <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Telephone <?php echo form_error('telephone') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" value="<?php echo $telephone; ?>" disabled/>
                             </div> 
                          </div>
                          <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">NIP <?php echo form_error('nip') ?></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $nip; ?>" disabled/>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Photo <?php echo form_error('photo') ?></label>
                              <div class="col-sm-10">
                                <img type="file" style="width: 200px;height: 200px;" name="photo" id="photo" src="<?php echo base_url('assets/img/'.$photo) ?>" />
                              </div>
                            </div>
                          <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Create At <?php echo form_error('create_at') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="create_at" id="create_at" placeholder="create_at" value="<?php echo $create_at; ?>" disabled/>
                             </div> 
                          </div>
                          <div style='text-align: right;'>
                              <a href="<?php echo site_url('index.php/customer') ?>" class="btn btn-default">Cancel</a>
                          </div>
                    </div><!-- /.box-body -->
                  </div>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
        <script>
          document.getElementById("create_at").value = moment(document.getElementById("create_at").value).format('D MMM YYYY');
        </script>
        </section><!-- /.content -->