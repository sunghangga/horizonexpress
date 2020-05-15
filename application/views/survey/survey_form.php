<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SURVEY</h3>
                      <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                          <table class='table table-bordered'>
                	   <tr><td>Tanggal <?php echo form_error('sv_date') ?></td>
                            
                              <td><input type="text" class="form-control" name="sv_date" id="svdate" placeholder="sv_date" value="<?php echo $sv_date; ?>" disabled/>
                        </td></tr>
                	    <tr><td>Status <?php echo form_error('sv_result') ?></td>
                            <td><select class="form-control" style="width: 100%;" name="sv_result" id="sv_result" value="<?php echo $sv_result; ?>">
                            </select>
                        </td></tr>
                      <tr><td>Customer <?php echo form_error('cust_name') ?></td>
                            <td><input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="cust_name" value="<?php echo $cust_name; ?>" disabled/>
                        </td></tr>
                	    <tr><td>Salesman <?php echo form_error('slm_name') ?></td>
                            <td><input type="text" class="form-control" name="slm_name" id="slm_name" placeholder="slm_name" value="<?php echo $slm_name; ?>" disabled/>
                        </td></tr>
                        <tr><td>Motor <?php echo form_error('itm_name') ?></td>
                            <td><input type="text" class="form-control" name="itm_name" id="itm_name" placeholder="itm_name" value="<?php echo $itm_name; ?>" disabled/>
                        </td></tr>
                        <tr><td>Warna <?php echo form_error('cl_name') ?></td>
                            <td><input type="text" class="form-control" name="cl_name" id="cl_name" placeholder="cl_name" value="<?php echo $cl_name; ?>" disabled/>
                        </td></tr>
                        <tr><td>DP <?php echo form_error('sv_dpsetor') ?></td>
                            <td><input type="text" class="form-control" name="sv_dpsetor" id="svdpsetor" placeholder="sv_dpsetor" value="<?php echo $sv_dpsetor; ?>" disabled/>
                        </td></tr>
                        <tr><td>Fincoy <?php echo form_error('fc_code') ?></td>
                            <td><input type="text" class="form-control" name="fc_code" id="fc_code" placeholder="fc_code" value="<?php echo $fc_code; ?>" disabled/>
                        </td></tr>
                        <tr><td>Survey No <?php echo form_error('sv_no') ?></td>
                            <td><input type="text" class="form-control" name="sv_no" id="sv_no" placeholder="sv_no" value="<?php echo $sv_no; ?>" disabled/>
                        </td></tr>
                        <tr><td>Tanggal Survey <?php echo form_error('sv_plandate') ?></td>
                            <td><input type="text" class="form-control" name="sv_plandate" id="svplandate" placeholder="sv_plandate" value="<?php echo $sv_plandate; ?>" disabled/>
                        </td></tr>
                	    <input type="hidden" name="id" value="<?php echo $sv_no; ?>" /> 
                	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                	    <a href="<?php echo site_url('survey') ?>" class="btn btn-default">Cancel</a></td></tr>
                	
                    </table>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
          <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
          
          <script type="text/javascript">
            document.getElementById("svdate").value = moment(document.getElementById("svdate").value).format('D MMMM YYYY');
            document.getElementById("svplandate").value = moment(document.getElementById("svplandate").value).format('D MMMM YYYY');
            document.getElementById("svdpsetor").value = new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(<?php echo $sv_dpsetor; ?>);

              status_list();
                var val = document.getElementById("sv_result").getAttribute('value');
                console.log(val);
                
                if (val == 'PENDING') {
                  document.getElementById("sv_result").selectedIndex = 0;
                }
                else if (val == 'PROGRESS') {
                  document.getElementById("sv_result").selectedIndex = 1;
                }
                else if (val == 'DITOLAK') {
                  document.getElementById("sv_result").selectedIndex = 2;
                }
                else if (val == 'ACC') {
                  document.getElementById("sv_result").selectedIndex = 3;
                }
                else if (val == 'DO') {
                  document.getElementById("sv_result").selectedIndex = 4;
                }
                else {
                  document.getElementById("sv_result").selectedIndex = 5;
                }
               function status_list(){
                  var html = '';
                  html += 
                  '<option selected="selected" value="'+0+'">PENDING</option>'+
                  '<option value="PROGRESS">PROGRESS</option>'+
                  '<option value="DITOLAK">DITOLAK</option>'+
                  '<option value="ACC">ACC</option>'+
                  '<option value="DO" style="background-color: rgba(0, 0, 0, 0.1);" disabled>DO</option>'+
                  '<option value="BATAL">BATAL</option>';
                  $('#sv_result').html(html);
                }
                
          </script>
        </section><!-- /.content