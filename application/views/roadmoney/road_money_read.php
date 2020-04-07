<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>ROAD MONEY</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
                             <div class='form-group row'>
                              <label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control select2bs4" id="kode" name="kode" onchange="show_data()" disabled>
                                        <?php if($kode != null){ 
                                             echo '<option value="'.$kode.'">'.$kode.'</option>';
                                         } 
                                        foreach ($get_all_kode as $row)
                                            {
                                              if($kode != $row->kode){
                                                echo '<option value="'.$row->kode.'">'.$row->kode.'</option>';
                                              }
                                            } ?>
                                        
                                      </select>
                                   </div> 
                                </div>
                               <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Table Money <?php echo form_error('table_money') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="table_money" id="table_money" placeholder="Table Money" value="<?php echo $table_money; ?>" disabled/>
                                   </div> 
                                </div>
                               <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Pulse Money<?php echo form_error('pulse') ?></label>
                                    <div class='col-sm-10'><input type="number" class="form-control" name="pulse" id="pulse" placeholder="Pulse Money" value="<?php echo $pulse; ?>" disabled/>
                                   </div> 
                                </div>

                             <div class="row road_money_init">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Postage Moneys</h4>
                              </div>
                              <?php $iter = 0; foreach ($get_roadmoney_detail_by_id as $row) { ?>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <?php if ($iter == 0) { ?>
                                  <label for="staticEmail" class="col-12 col-form-label">Postage (Kota Asal - Kota Tujuan)</label>
                                <?php } ?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="postage[]" id="postage" rel="rel_postage" placeholder="Postage" value="<?php echo $row->postage; ?>" disabled/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if ($iter == 0) { ?>
                                  <label for="staticEmail" class="col-8 col-form-label">Money</label>
                                  <?php } ?>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="money[]" id="money" rel="rel_money" placeholder="Money" value="<?php echo $row->price; ?>" disabled/>
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <?php if ($button == 'Create') { ?>
                                        <a href="" class=" btn-sm btn-info" id="add_postage_money"><i class="fas fa-plus"></i></a>
                                      <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php $iter+=1; } ?>
                            </div>
                              <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                           <div style='text-align: right;'>
                              <a href="<?php echo site_url('index.php/road_money') ?>" class="btn btn-default">Cancel</a>
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
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>