
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <div class='col-sm-2'>
                    <div class="form-group">
                  <h3 class='box-title'>Survey List <?php // echo anchor('#','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
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
                              <input type='text' id='first' value="<?php echo "2020-03-01" ?>" class="form-control" placeholder="Start Date"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class='col-sm-2'>
                      <div class="form-group">
                          <div class='input-group date' id='date2'>
                              <input type='text' id='last' value="<?php echo date('Y-m-d')?>" class="form-control" placeholder="End Date"/>
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
                            <option value="PROGRESS">PROGRESS</option>
                            <option value="DITOLAK">DITOLAK</option>
                            <option value="ACC">ACC</option>
                            <option value="DO">DO</option>
                            <option value="CANCEL">CANCEL</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                            <button onclick="mySearch()" class="btn btn-info"><i class="fa fa-search"></i></button>
                        </div>
                        
                    </div>
                  </div>
                  <div class='col-sm-12'>
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
                            <th >Action</th>
                          </tr>
                        </thead>
            	         <!-- <tbody id="show_data"></tbody> -->

                  </table>
      </div>
      <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body text-center">
              <div class="loader"></div>
              <div clas="loader-txt">
                <p>This proses take view seconds</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>

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
        $.fn.dataTable.ext.errMode = 'throw';
          function mySearch() {
              setTimeout(function() {setTime(); }, 1000);
            }

            function setTime() {
                $("#loadMe").modal({
                  backdrop: "static", //remove ability to close modal with click
                  keyboard: false, //remove option to close with keyboard
                  show: true //Display loader!
                });

                x1 = 5000;
                setTimeout(function() {
                var first = document.getElementById("first").value;  
                var last = document.getElementById("last").value;
                var status = document.getElementById("status").value;

                //pemanggilan fungsi tampil barang.
                tampil_data_barang(first,last,status); 
                $("#loadMe").modal("hide"); 
               }, x1);  
            }

            setTimeout(function() {setTime(); }, 1000);
          
            // fungsi tampil barang
            function tampil_data_barang(first,last,status){
              
              var table = $('#mydata').DataTable( {
                  scrollY: "300px",
                  scrollX: true,
                  scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                  "ajax": {
                    "url": "<?php echo base_url()?>survey/data_survey/",
                    "dataSrc": "",
                    "data": function(data) {
                      data.first = first;
                      data.last = last;
                      data.status = status;
                    },
                  },
                  "columns": [
                      { "data": "sv_date" },
                      { "data": "sv_result" },
                      { "data": "cust_name" },
                      { "data": "slm_name" },
                      { "data": "itm_name" },
                      { "data": "cl_name" },
                      { "data": "sv_dpsetor" },
                      { "data": "fc_code" },
                      { "data": "sv_no" },
                      { "data": "sv_plandate" },
                      { "data": null,
                        render: function ( data, type, row ) {
                          // console.log(data.sv_no);
                          return '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">'+
                          '<div class="btn-group" role="group" aria-label="First group">'+
                            '<button id="info" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></div>'+
                          '<div class="btn-group" role="group" aria-label="Second group">'+
                            '<button id="update" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></button></div>'+
                        '</div>';
                      } }
                  ],
                  "columnDefs": [
                      { targets: 0, render: function(data){return moment(data).format('D MMMM YYYY'); }},
                      { targets: [2,3,4,5], "width": "20%"},
                      { targets: 6, render: function(data){return new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(data); }},
                      { targets: 9, render: function(data){return moment(data).format('D MMMM YYYY'); }},
                      { targets: -1, "width": "7%" },
                  ]
              } );

              table.ajax.reload( function ( json ) {
                  $('#myInput').val( json.lastInput );
              } );

              $('#mydata').on( 'click', '#info', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>survey/read/'+data.sv_no;
                  }
              } );
              $('#mydata').on( 'click', '#update', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>survey/update/'+data.sv_no;
                  }
              } );
            
            }
            
              
              
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->