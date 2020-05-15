
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
                              <input type='text' id='first' value="<?php echo $first ?>" class="form-control" placeholder="Start Date"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class='col-sm-2'>
                      <div class="form-group">
                          <div class='input-group date' id='date2'>
                              <input type='text' id='last' value="<?php echo $last?>" class="form-control" placeholder="End Date"/>
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
                    <script>
                    function mySearch() {
                      var first = document.getElementById("first").value;  
                      var last = document.getElementById("last").value;
                      var status = document.getElementById("status").value;
                      var base_url="<?php echo base_url(); ?>";
                    
                      window.location.href = base_url+'survey/range/'+first+'/'+last+'/'+status;
                    }
                    </script>
                    <div class="table-responsive no-padding">
                    <table class="table table-bordered table-striped" id="mytable">
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
            	    <tbody>
                        <?php
                        $start = 0;
                        foreach ($survey_data as $survey)
                        {
                            ?>
                            <tr>
            		          <td><?php echo $survey->sv_date ?></td>
                          <td>
                          <?php $status = $survey->sv_result;
                                if($status == "PENDING"){
                                  if($survey->sv_plandate == NULL){
                                    echo "PENDING";
                                  }else{
                                    echo "PROCESS";
                                  }
                                }else if($status == "DITOLAK"){
                                  echo "DITOLAK";
                                }else if($status == "CANCEL"){
                                  echo "CANCEL";
                                }else if($status == "ACC"){
                                  echo "ACC";
                                }
                           ?>
                             
                           </td>
                          <td><?php echo $survey->cust_name ?></td>
                          <td><?php echo $survey->slm_name ?></td>
                          <td><?php echo $survey->itm_name ?></td>
                          <td><?php echo $survey->cl_name ?></td>
                          <td><?php echo round($survey->sv_dpsetor) ?></td>
                          <td ><?php echo $survey->fc_code ?></td>
                          <td><?php echo $survey->sv_no ?></td>
                          <td ><?php echo $survey->sv_plandate ?></td>
                  		    <!--<td style="text-align:center" width="140px">
                  			<?php 
                  			echo anchor(site_url('survey/read/'.$survey->sv_id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
                  			echo '  '; 
                  			echo anchor(site_url('survey/update/'.$survey->sv_id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
                  			echo '  '; 
                  			echo anchor(site_url('survey/delete/'.$survey->sv_id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                  			?>
                  		    </td>-->
            	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
      </div>
      </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

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

                //$("#mytable").dataTable();
                $('#mytable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                

            });
            
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->