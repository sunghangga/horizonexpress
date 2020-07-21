
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
                          <label for='label' class='col-sm-2 col-form-label'>Domicile Address <?php echo form_error('address') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?php echo $address; ?>" disabled/>
                             </div> 
                          </div>

                          <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile Regency <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                <select class="form-control select2bs4" onchange="districts_list()" name="regencies_id" id="regencies_id" placeholder="Regencies" value="<?php echo $regencies_id; ?>" disabled/>
                                    <?php 
                                    if($regencies_id != "null"){ 
                                         echo '<option value="'.$regencies_id.'" selected>'.$regencies_name.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_regencies as $row)
                                        {
                                          
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                         
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile District <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" onchange="villages_list()" name="districts_id" id="districts_id" placeholder="Districts" value="<?php echo $districts_id; ?>" disabled/>   
                                        <?php 
                                        if($districts_id != null){ 
                                             echo '<option value="'.$districts_id.'" selected>'.$districts_name.'</option>';
                                        } 
                                        else{
                                            echo '<option value=""></option>';
                                        }
                                        foreach ($get_districts as $row)
                                            {
                                              
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                            
                                            } 
                                        ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile Village <?php echo form_error('village') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" name="villages_id" id="villages_id" placeholder="Villages" value="<?php echo $villages_id; ?>" disabled/>
                                    <?php 
                                    if($villages_id != null){ 
                                         echo '<option value="'.$villages_id.'" selected>'.$villages_name.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_villages as $row)
                                        {
                                         
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                          
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            
                           <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">No. Identitas (KTP/NIP) <?php echo form_error('No. Indentitas') ?></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="KTP / NIP" value="<?php echo $no_identitas; ?>" disabled/>
                              </div>
                            </div>

                             <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP Address <?php echo form_error('address') ?></label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="address_ktp" id="address_ktp" placeholder="KTP Address" disabled><?php echo $address_ktp; ?></textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP Regency <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                <select class="form-control select2bs4" onchange="districts_list_ktp()" name="regencies_ktp" id="regencies_ktp" placeholder="KTP Regencies" value="<?php echo $regencies_ktp; ?>" disabled/>
                                    <?php 
                                    if($regencies_ktp != "null"){ 
                                         echo '<option value="'.$regencies_ktp.'" selected>'.$regencies_name_ktp.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_regencies_ktp as $row)
                                        {
                                          
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                         
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP District <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" onchange="villages_list_ktp()" name="districts_ktp" id="districts_ktp" placeholder="KTP Districts" value="<?php echo $districts_ktp; ?>" disabled/>   
                                        <?php 
                                        if($districts_ktp != null){ 
                                             echo '<option value="'.$districts_ktp.'" selected>'.$districts_name_ktp.'</option>';
                                        } 
                                        else{
                                            echo '<option value=""></option>';
                                        }
                                        foreach ($get_districts_ktp as $row)
                                            {
                                              
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                            
                                            } 
                                        ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP Village <?php echo form_error('village') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" name="villages_ktp" id="villages_ktp" placeholder="KTP Villages" value="<?php echo $villages_ktp; ?>" disabled/>
                                    <?php 
                                    if($villages_ktp != null){ 
                                         echo '<option value="'.$villages_ktp.'" selected>'.$villages_name_ktp.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_villages_ktp as $row)
                                        {
                                         
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                          
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                           
                          <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Telephone <?php echo form_error('telephone') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" value="<?php echo $telephone; ?>" disabled/>
                             </div> 
                          </div>
                          <div class='form-group row'>
                          <label for='label' class='col-sm-2 col-form-label'>Jenis Customer <?php echo form_error('Jenis Customer') ?></label>
                              <div class='col-sm-10'>
                                <input type="text" class="form-control" name="cust_type" id="cust_type" placeholder="Customer Type" value="<?php echo $cust_type; ?>" disabled/>
                             </div> 
                          </div>
                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Photo <?php echo form_error('photo') ?></label>
                              <div class="col-sm-10">
                                <img type="file" style="width: 200px;height: 200px;" name="photo" id="photo" src="<?php echo base_url('assets/img/'.$photo) ?>" />
                                <div class="download">
                                  <a href="<?php echo base_url('assets/img/'.$photo) ?>" download>
                                  <button class="btn-success"><i class="fa fa-download"></i> Download</button>
                                  </a>
                                </div>
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