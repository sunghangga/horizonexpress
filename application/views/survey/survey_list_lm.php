
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <div class='col-sm-2'>
                    <div class="form-group">
                  <h3 class='box-title'>Survey List <?php echo anchor('#','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
                    </div>
                </div>
                </div>
                
                <!-- /.box-header -->
                <div class='box-body'>
                  <div class='col-sm-1'>
                  <h4 class="col-sm-1 box-title">Periode:</h4>
                  </div>
                  <div class='col-sm-2'>
                      <div class="form-group">
                          <div class='input-group date' id='date1'>
                              <input type='text' id='first' value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="Start Date"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class='col-sm-2'>
                      <div class="form-group">
                          <div class='input-group date' id='date2'>
                              <input type='text' id='last' value="<?php echo date('Y-m-d');?>" class="form-control" placeholder="End Date"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group row">
                          <h4 for="exampleFormControlSelect1" class="col-sm-2 box-title">Status</h4>
                          <div class="col-sm-2" style="padding-left: 1px; padding-right: 1px;">
                          <select id="status" name="status" class="form-control col-sm-2">
                            <?php if($status != null){ echo'<option value="'.$status.'">'.$status.'</option>'; }?>
                            <option value="ALL">ALL</option>
                            <option value="PENDING">PENDING</option>
                            <option value="DITOLAK">DITOLAK</option>
                            <option value="ACC">ACC</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                            <button onclick="mySearch()" class="btn btn-info"><i class="fa fa-search"></i></button>
                        </div>
                        
                    </div>
                  </div>
                  <div class='col-sm-12'>
                    <div class="table-responsive no-padding">
                    <table class="table table-bordered table-striped" id="mydata">
                        <thead>
                            <tr>
                            <th >Tanggal</th>
                            <th >Status</th>
                            <th >Customer</th>
                            <th >Salesman</th>
                            <th >Motor</th>
                            <th >Warna</th>
                            <th >DP</th>
                            <th >Fincoy</th>
                            <th style="text-align:center ">Survey No</th>
                            <th >Tanggal Survey</th>
                           <!-- <th rowspan="2">Action</th>-->
                          </tr>
                        </thead>
            	         <tbody id="show_data"> </tbody>
                  </table>
      </div>
      </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('template/plugin/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('template/plugin/datatables/dataTables.bootstrap.js') ?>"></script>

        <!-- page script -->
        <script>
            $(function () {
                $('#date1').datetimepicker();
                $('#date2').datetimepicker({
                    useCurrent: false //Important! See issue #1075
                });
                $("#date1").on("dp.change", function (e) {
                    $('#date2').data("DateTimePicker").minDate(e.date);
                });
                $("#date2").on("dp.change", function (e) {
                    $('#date1').data("DateTimePicker").maxDate(e.date);
                });
            });
            
        </script>
<script type="text/javascript">
  function mySearch() {
      var first = document.getElementById("first").value;  
      var last = document.getElementById("last").value;
      var status = document.getElementById("status").value;

      $('#mydata').dataTable();
      
      $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>survey/data_survey/'+first+'/'+last+'/'+status,
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                          '<td>'+data[i].sv_date+'</td>'+
                          '<td>'+data[i].sv_result+'</td>'+
                          '<td>'+data[i].cust_name+'</td>'+
                          '<td>'+data[i].slm_name+'</td>'+
                          '<td>'+data[i].itm_name+'</td>'+
                          '<td>'+data[i].cl_name+'</td>'+
                          '<td>'+data[i].sv_dpsetor+'</td>'+
                          '<td>'+data[i].fc_code+'</td>'+
                          '<td>'+data[i].sv_no+'</td>'+
                          '<td>'+data[i].sv_plandate+'</td>'+
                          '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

  $(document).ready(function(){
    var first = document.getElementById("first").value;  
    var last = document.getElementById("last").value;
    var status = document.getElementById("status").value;
    tampil_data_barang(first,last,status); //pemanggilan fungsi tampil barang.
    
    $('#mydata').dataTable();
     
    //fungsi tampil barang
    function tampil_data_barang(first,last,status){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>survey/data_survey/'+first+'/'+last+'/'+status,
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                          '<td>'+data[i].sv_date+'</td>'+
                          '<td>'+data[i].sv_result+'</td>'+
                          '<td>'+data[i].cust_name+'</td>'+
                          '<td>'+data[i].slm_name+'</td>'+
                          '<td>'+data[i].itm_name+'</td>'+
                          '<td>'+data[i].cl_name+'</td>'+
                          '<td>'+data[i].sv_dpsetor+'</td>'+
                          '<td>'+data[i].fc_code+'</td>'+
                          '<td>'+data[i].sv_no+'</td>'+
                          '<td>'+data[i].sv_plandate+'</td>'+
                          '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

  });
</script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->