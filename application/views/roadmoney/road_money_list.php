
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                    <div class="row">
                    <div class="col-md-6">
                  <h3 class='card-title'>ROAD MONEY LIST <?php echo anchor('index.php/road_money/create/','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
                    </div>
                    <div class="col-md-6">
                    <div class="input-group">
                        <label style="margin-right: 15px;">Period:</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                </div>
            </div>
                <div class='card-body'>
        <table class="table table-bordered table-striped" style="width:100%;" id="mytable">
            <thead>
                <tr>
		    <th>Kode</th>
		    <th>Table Money</th>
		    <th>Pulse</th>
		    <th>Create At</th>
		    <th>Action</th>
                </tr>
            </thead>
        </table>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
        <script type="text/javascript">
        function data_range(first,last){
          var table = $('#mytable').DataTable( {
              scrollY: "400px",
              scrollX: true,
              scrollCollapse: true,
              destroy: true,
              paging: true,
              searching: true,
              "ajax": {
                "url": "<?php echo base_url()?>index.php/road_money/range/",
                "dataSrc": "",
                "data": function(data) {
                  data.first = first;
                  data.last = last;
                },
              },
              "columns": [
                  
                  { "data": "kode" },
                  { "data": "table_money" },
                  { "data": "pulse" },
                  { "data": "create_at" },
                  { "data": null,
                    render: function ( data, type, row ) {
                      // console.log(data.sv_no);
                      return '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">'+
                      '<div class="btn-group" role="group" aria-label="First group">'+
                        '<button id="info" style="margin-left: 5px;" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></div>'+
                      '<div class="btn-group" role="group" aria-label="Second group">'+
                        '<button id="update" style="margin-left: 5px;" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></div>'+
                        '<div class="btn-group" role="group" aria-label="Third group">'+
                        '<button id="print" style="margin-left: 5px;" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></i></button></div>'+
                    '</div>';
                  } }
              ],
              "columnDefs": [
                  { targets: -2, "width": "90px", render: function(data){return moment(data).format('D MMM YYYY'); }},
                  { targets: 0, "width": "150px"},
                  { targets: [1,2], "width": "30%", render: function(data){return new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(data); }},
                  { targets: -1, "width": "100px" },
              ]
          } );

          $('#mytable').on( 'click', '#info', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                window.location = '<?php echo base_url()?>index.php/road_money/read/'+data.id;
              }
          } );
          $('#mytable').on( 'click', '#update', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                window.location = '<?php echo base_url()?>index.php/road_money/update/'+data.id;
              }
          } );
          $('#mytable').on( 'click', '#print', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                window.open('<?php echo base_url()?>index.php/road_money/pdfJalan/'+data.id,'_blank');
              }
          } );
        
        }
        </script>
        <script type="text/javascript">
            $(function() {
                data_range(moment().format('YYYY-MM-DD'),moment().format('YYYY-MM-DD'));
              $('input[id="reservation"]').daterangepicker({
                opens: 'left',
                locale: {
                  format: 'D MMM YYYY'
                }
              }, function(start, end, label) {
                data_range(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));

              });
            });
            // $(document).ready(function () {
            //     $("#mytable").dataTable();
            // });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->