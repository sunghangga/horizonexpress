
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>TRUCK LIST <?php echo anchor('index.php/truck/create/','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
                </div><!-- /.card-header -->
                <div class='card-body'>
        <table class="table table-bordered table-striped scroll-table" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Nopol</th>
		    <th>Nosin</th>
		    <th>Norangka</th>
		    <th>Production Year</th>
		    <th>Jto Samsat</th>
		    <th>Kir</th>
		    <th>Km</th>
		    <th>Date</th>
		    <th>Last Update</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($truck_data as $truck)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $truck->name ?></td>
		    <td><?php echo $truck->nopol ?></td>
		    <td><?php echo $truck->nosin ?></td>
		    <td><?php echo $truck->norangka ?></td>
		    <td><?php echo $truck->production_year ?></td>
		    <td><?php echo $truck->jto_samsat ?></td>
		    <td><?php echo $truck->kir ?></td>
		    <td><?php echo $truck->km ?></td>
		    <td><?php echo $truck->create_at ?></td>
		    <td><?php echo $truck->update_at ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('index.php/truck/read/'.$truck->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/truck/update/'.$truck->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/truck/delete/'.$truck->id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                    scrollY: "400px",
                  scrollX: true,
                  scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                });
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->