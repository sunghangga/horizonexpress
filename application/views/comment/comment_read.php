
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Comment Read</h3>
        <table class="table table-bordered">
	    <tr><td>Create At</td><td><?php echo $create_at; ?></td></tr>
	    <tr><td>Suryvey Id</td><td><?php echo $suryvey_id; ?></td></tr>
	    <tr><td>Text</td><td><?php echo $text; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->