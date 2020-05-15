<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>WARNA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <tr><td>Kode Warna <?php echo form_error('kode') ?></td>
        <td>
          <div class="input-group my-colorpicker2">
            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>">

            <div class="input-group-addon">
              <i></i>
            </div>
          </div>
          </td>
	    <tr><td>User <?php echo form_error('username') ?></td>
            <td><select class="form-control" style="width: 100%;" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
              </select></td>
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('warna') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
      <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          //color picker with addon
          $(".my-colorpicker2").colorpicker();
          $(".select2").select2();
          user_list();
          var val = document.getElementById("user_id").getAttribute('value');
          if (val != '') {
            document.getElementById("user_id").value = val;
          }
        });
        function user_list(){
          $.ajax({
              type : 'ajax',
              url : '<?php echo base_url()?>warna/get_user/',
              async : false,
              dataType : 'json',
              success : function(data){
                var html = '';
                var i;
                var j = 0;
                
                for(i=0; i<data.length; i++){
                  if (data[i].group_id == 2) {
                    if(j == 0){
                      html += 
                     '<option selected="selected" value="'+data[i].id+'">'+data[i].username+'</option>';
                    }
                    else {
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].username+'</option>';
                    }
                    j += 1;
                  }
                }
                $('#user_id').html(html);
              }
          });
        }
      </script>
        </section><!-- /.content -->