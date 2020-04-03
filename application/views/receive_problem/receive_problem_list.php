
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>RECEIVE_PROBLEM LIST <?php echo anchor('receive_problem/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
		<?php echo anchor(site_url('receive_problem/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.card-header -->
                <div class='card-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Kode</th>
		    <th>Item</th>
		    <th>Foto</th>
		    <th>Gejala</th>
		    <th>Penyebab</th>
		    <th>Engine</th>
		    <th>Frame</th>
		    <th>Type</th>
		    <th>Solusi</th>
		    <th>Keterangan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($receive_problem_data as $receive_problem)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $receive_problem->kode ?></td>
		    <td><?php echo $receive_problem->item ?></td>
		    <td><?php echo $receive_problem->foto ?></td>
		    <td><?php echo $receive_problem->gejala ?></td>
		    <td><?php echo $receive_problem->penyebab ?></td>
		    <td><?php echo $receive_problem->engine ?></td>
		    <td><?php echo $receive_problem->frame ?></td>
		    <td><?php echo $receive_problem->type ?></td>
		    <td><?php echo $receive_problem->solusi ?></td>
		    <td><?php echo $receive_problem->keterangan ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('receive_problem/read/'.$receive_problem->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('receive_problem/update/'.$receive_problem->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('receive_problem/delete/'.$receive_problem->id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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