
        <!-- Main content -->
        <section class='content'>
        <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                <div class="row">
                    <div class="col-md-6">
                      <h3 class='card-title'>Change Driver & Delivery Status</h3>                    
                    </div>
                </div>
            </div>

        <div class='card-body'>
        <form method="POST" action="<?php echo $action; ?>">
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Change Driver</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-content-below-status-tab" data-toggle="pill" href="#custom-content-below-status" role="tab" aria-controls="custom-content-below-status" aria-selected="false">Change Status</a>
          </li>
        </ul>  
         <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              <input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
                <label>Driver</label>
                <select class="form-control" name="driver">
                  <option value="" disabled selected>Pilih Driver</option>
                  <?php foreach ($driver_data as $item) {?>
                    <?php if($item->id==$driver_id){ ?>
                         <option value="<?php echo $item->id;  ?>" selected><?php echo $item->name; ?></option>
                    <?php }  ?>
                    <?php if($item->id!=$driver_id){?>
                    <option value="<?php echo $item->id;  ?>"><?php echo $item->name; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
                <br/>
                <label>Truck</label>
                <select class="form-control" name="nopol">
                  <option value="" disabled selected>Pilih Truck</option>
                <?php foreach ($truck_data as $item) {?>
                   <?php if($item->id==$nopol_id){ ?>
                         <option value="<?php echo $item->id;  ?>" selected><?php echo $item->nopol; ?></option>
                    <?php }  ?>
                    <?php if($item->id!=$nopol_id){?>
                    <option value="<?php echo $item->id;  ?>"><?php echo $item->nopol; ?></option>
                    <?php } ?>
                <?php } ?>
                </select>
              </div>
                <br/>

              <div class="tab-pane fade" id="custom-content-below-status" role="tabpanel" aria-labelledby="custom-content-below-status-tab">
                <label>Status</label>
                <?php if($status=='driver'){ ?>
                <select class="form-control" name="status_delivery">
                  <option value="driver" selected>driver</option>
                  <option value="warehouse">warehouse</option>
                </select>
                <?php 
                } ?>
                <?php if($status!='driver'){ ?>
                  <select class="form-control" name="status_delivery" readonly>
                  <option value="<?php echo $status; ?>"selected><?php echo $status; ?></option>
                </select>
                <?php } ?>
               </div> 
        
        </div>
        <br/>
        <br/>
        <input type="submit" class="btn btn-primary">
      </form>  
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
        
         </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
</section><!-- /.content -->