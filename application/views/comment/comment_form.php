<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>COMMENT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Create At <?php echo form_error('create_at') ?></td>
            <td><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" />
        </td>
	    <tr><td>Suryvey Id <?php echo form_error('suryvey_id') ?></td>
            <td><input type="text" class="form-control" name="suryvey_id" id="suryvey_id" placeholder="Suryvey Id" value="<?php echo $suryvey_id; ?>" />
        </td>
	    <tr><td>Text <?php echo form_error('text') ?></td>
            <td><input type="text" class="form-control" name="text" id="text" placeholder="Text" value="<?php echo $text; ?>" />
        </td>
	    <tr><td>Update At <?php echo form_error('update_at') ?></td>
            <td><input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('comment') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->