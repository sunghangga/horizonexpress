
        <!-- Main content -->
        <section class='content'>
            <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>CUSTOMER LIST <?php echo anchor('index.php/customer/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
                </div><!-- /.box-header -->
                <div class='card-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Name</th>
            <th>Photo</th>
		    <th>Address</th>
		    <th>Telephone</th>
		    <th>Create At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $customer->name ?></td>
            <td><img type="file" style="width: 80px;height: 80px;" name="photo" id="photo" src="<?php echo base_url('assets/img/'.$customer->photo) ?>" /></td>
		    <td><?php echo $customer->address ?></td>
		    <td><?php echo $customer->telephone ?></td>
		    <td><?php echo $customer->create_at ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('index.php/customer/read/'.$customer->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/customer/update/'.$customer->id),'<i class="fa fa-edit"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
			echo '  '; 
			echo anchor(site_url('index.php/customer/delete/'.$customer->id),'<i class="fa fa-trash-alt"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable({
                    scrollY: "800px",
                    scrollX: true,
                    scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                  "columnDefs": [
                      { targets: -1, "width": "100px" },
                      { targets: 3, "width": "220px" },
                      { targets: 1, "width": "100px" },
                      { targets: 4, "width": "90px" },
                      { targets: -2, "width": "80px" },
                    ]
                });
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->