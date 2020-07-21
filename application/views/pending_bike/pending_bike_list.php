
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>PENDING BIKE LIST <?php //echo anchor('pending_bike/create/','UPLOAD',array('class'=>'btn btn-primary btn-sm'));?>
                  </h3>
                </div><!-- /.card-header -->
                <div class='card-header'>
                  <?php echo form_open_multipart($action); ?>
                          <p>Upload Data UMSL</p>
                          <input  type="file" name="umsl" accept="text/csv">
                          <button class="btn btn-primary btn-sm" type="submit" name="import">Upload Data</button>
                          <?php echo $info_upload ?>
                          <? 
                          if(isset($_SESSION['messageumsl'])){
                            echo $_SESSION['messageumsl'];
                            unset($_SESSION['messageumsl']);
                          }
                           ?>
                  <?php echo form_close(); ?>
                </div>
                <div class='card-header'>
                  <?php echo form_open_multipart($actionmpm); ?>
                          <p>Upload Data MPM</p>
                          <input  type="file" name="uploadFile"/>
                          <button class="btn btn-primary btn-sm" type="submit" name="importmpm">Upload Data</button>
                          <?php echo $info_upload ?>
                          <? 
                          if(isset($_SESSION['messagempm'])){
                            echo $_SESSION['messagempm'];
                            unset($_SESSION['messagempm']);
                          }
                           ?>
                   <?php echo form_close(); ?>
                </div>
                <div class='card-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Bike Code</th>
		    <th>Bike Color</th>
		    <th>Bike No Rangka</th>
		    <th>Bike No Mesin</th>
		    <th>Bike Year</th>
		    <th>Bike Faktur</th>
        <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pending_bike_data as $pending_bike)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pending_bike->bike_code ?></td>
		    <td><?php echo $pending_bike->bike_color ?></td>
		    <td><?php echo $pending_bike->bike_no_rangka ?></td>
		    <td><?php echo $pending_bike->bike_no_mesin ?></td>
		    <td><?php echo $pending_bike->bike_year ?></td>
		    <td><?php echo $pending_bike->bike_faktur ?></td>
        <td><?php echo $pending_bike->status ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('pending_bike/read/'.$pending_bike->bike_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pending_bike/update/'.$pending_bike->bike_id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pending_bike/delete/'.$pending_bike->bike_id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->