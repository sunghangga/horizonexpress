
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>TIRE IN LIST <?php echo anchor('index.php/tire_in/create/','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
                </div><!-- /.card-header -->
                <div class='card-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Tire Name</th>
		    <th>Amount</th>
		    <th>Create At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tire_in_data as $tire_in)
            {
                ?>
                <tr>
		    <td style="text-align: center;"><?php echo ++$start ?></td>
		    <td><?php echo $tire_in->tire_name ?></td>
		    <td style="text-align: center;"><?php echo $tire_in->amount ?></td>
		    <td><?php echo $tire_in->create_at ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('index.php/tire_in/read/'.$tire_in->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/tire_in/update/'.$tire_in->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/tire_in/delete/'.$tire_in->id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                    scrollY: "1500px",
                      scrollX: true,
                      scrollCollapse: true,
                      destroy: true,
                      paging: true,
                      searching: true,
                      "columnDefs": [
                      { targets: -2, "width": "90px", render: function(data){return moment('<?php echo $tire_in->create_at ?>').format('D MMM YYYY'); }},
                      { targets: -1, "width": "150px" },
                      { targets: 1, "width": "400px" },
                      { targets: 3, "width": "200px" },
                      { targets: 2, "width": "80px" },
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