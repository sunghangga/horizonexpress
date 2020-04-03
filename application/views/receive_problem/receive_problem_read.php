<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>RECEIVE_PROBLEM</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Item <?php echo form_error('item') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="item" id="item" placeholder="Item" value="<?php echo $item; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Foto <?php echo form_error('foto') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Gejala <?php echo form_error('gejala') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="gejala" id="gejala" placeholder="Gejala" value="<?php echo $gejala; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Penyebab <?php echo form_error('penyebab') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="penyebab" id="penyebab" placeholder="Penyebab" value="<?php echo $penyebab; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Engine <?php echo form_error('engine') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="engine" id="engine" placeholder="Engine" value="<?php echo $engine; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Frame <?php echo form_error('frame') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="frame" id="frame" placeholder="Frame" value="<?php echo $frame; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Type <?php echo form_error('type') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" disabled/>
                                   </div> 
                                </div>
	  <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Solusi <?php echo form_error('solusi') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="solusi" id="solusi" placeholder="Solusi" value="<?php echo $solusi; ?>" disabled/>
                                   </div> 
                                </div>
	    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Keterangan <?php echo form_error('keterangan') ?></label>
                                    <div class='col-sm-10'><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan" disabled><?php echo $keterangan; ?></textarea>
                                    </div>
                                </div>
	 <div style='text-align: left;'>
	    <a href="<?php echo site_url('receive_problem') ?>" class="btn btn-default">Cancel</a>
	</div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section><!-- /.content -->