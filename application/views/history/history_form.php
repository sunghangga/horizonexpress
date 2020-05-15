<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>HISTORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Create At <?php echo form_error('create_at') ?></td>
            <td><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <tr><td>Text <?php echo form_error('text') ?></td>
            <td><textarea class="form-control" rows="3" name="text" id="text" placeholder="Text"><?php echo $text; ?></textarea>
        </td></tr>
	    <tr><td>Update At <?php echo form_error('update_at') ?></td>
            <td><input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('history') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->