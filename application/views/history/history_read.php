
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>History Read</h3>
        <table class="table table-bordered">
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Text</td><td><?php echo $text; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('history') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->