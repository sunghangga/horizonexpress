
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>DRIVER LIST <?php echo anchor('index.php/driver/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php //echo anchor(site_url('driver/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.card-header -->
                <div class='card-body'>
        <table class="table table-bordered table-striped" style="width:100%;" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Name</th>
        <th>Username</th>
		    <th>Address</th>
		    <th>Telephone</th>
		    <th>Name Wife</th>
		    <th>Telephone Wife</th>
		    <th>Sim Expire</th>
		    <th>Create At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($driver_data as $driver)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $driver->name ?></td>
        <td><?php echo $driver->username ?></td>
		    <td><?php echo $driver->address ?></td>
		    <td><?php echo $driver->telephone ?></td>
		    <td><?php echo $driver->name_wife ?></td>
		    <td><?php echo $driver->telephone_wife ?></td>
        <?php $newDate = date('d M Y', strtotime($driver->sim_expire));  ?>
		    <td><?php echo $newDate ?></td>
        <?php $newDate = date('d M Y', strtotime($driver->create_at));  ?>
		    <td><?php echo $newDate ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('index.php/driver/read/'.$driver->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/driver/update/'.$driver->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/driver/delete/'.$driver->id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                $("#mytable").dataTable({
                    scrollY: "500px",
                    scrollX: true,
                    scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                  "columnDefs": [
                      { targets: -1, "width": "100px" },
                      { targets: -2, "width": "80px" },
                      { targets: -3, "width": "80px" },
                    ]
                });
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->