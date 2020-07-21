
        <!-- Main content -->
        <section class='content'>
        <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                    <div class="row">
                    <div class="col-md-6">
                  <h3 class='card-title'>DELIVERY LIST <?php echo anchor('index.php/delivery/create/','Create',array('class'=>'btn btn-primary btn-sm'));?>
        <?php //echo anchor(site_url('delivery/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?></h3>
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
            <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th>Date</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Price</th>
                <th>Name Pengirim</th>
                <th>Address Pengirim</th>
                <th>Telephone Pengirim</th>
                <th>Warehouse Pengirim</th>
                <th>Name Penerima</th>
                <th>Address Penerima</th>
                <th>Telephone Penerima</th>
                <th>Warehouse Penerima</th>
                <th>Created by</th>
                <th>Action</th>
                </tr>
            </thead>
        </table>
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
        
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

        </script>
        <script type="text/javascript">
          function wr_name(id){
            var temp = null;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_wr_name/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  temp = data;
                }
            });
            return temp;
          }
        function data_range(first,last){
              var name_wr = "";              
              var table = $('#mytable').DataTable( {
                  scrollY: "400px",
                  scrollX: true,
                  scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                  "ajax": {
                    "url": "<?php echo base_url()?>index.php/delivery/range/",
                    "dataSrc": "",
                    "data": function(data) {
                      data.first = first;
                      data.last = last;
                    },
                  },
                  "columns": [
                      { "data": "create_at" },
                      { "data": "kode" },
                      { "data": null,
                        render: function ( data, type, row ) {
                          if (data.status == "received") {
                            return data.status + " in " + wr_name(data.wr_penerima_id);
                          }
                          else {
                            return data.status;
                          }
                        }
                       },
                      { "data": "price" },
                      { "data": "name_pengirim" },
                      { "data": "address_pengirim" },
                      { "data": "telephone_pengirim" },
                      { "data": null,
                        render: function ( data, type, row ) {
                          return wr_name(data.wr_pengirim_id);
                        }
                       },
                      { "data": "name_penerima" },
                      { "data": "address_penerima" },
                      { "data": "telephone_penerima" },
                      { "data": null,
                        render: function ( data, type, row ) {
                          return wr_name(data.wr_penerima_id);
                        }
                       },
                      { "data": "admin" },
                      
                      /*{ "data": "driver" },
                      { "data": "nopol" },*/
                      { "data": null,
                        render: function ( data, type, row ) {
                          // console.log(data.sv_no);
                          return '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="flex-wrap: nowrap;">'+
                          '<div class="btn-group" title="view" role="group" aria-label="First group">'+
                            '<button id="info" style="margin-left: 5px;" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></div>'+
                          '<div class="btn-group" title="edit"role="group" aria-label="Second group">'+
                            '<button id="update" style="margin-left: 5px;" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></div>'+
                          '<div class="btn-group" role="group" aria-label="Third group">'+
                            '<button id="print-kirim" title="print bukti tanda pengiriman" style="margin-left: 5px;" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></i></button></div>'+  
                          '<div class="btn-group" role="group" aria-label="Third group">'+
                            '<button id="printdetail" title="print detail" style="margin-left: 5px;" class="btn btn-primary btn-sm"><i class="fas fa-book"></i></i></button></div>'+
                          '<div class="btn-group" role="group" aria-label="fourth group">'+
                            '<button id="delete" title="delete" style="margin-left: 5px;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></i></button></div>'+
                        '</div>';
                      } }
                  ],
                  "columnDefs": [
                      { targets: 0, "width": "90", render: function(data){return moment(data).format('D MMM YYYY'); }},
                      { targets: [4,5,6,7,8,9,10], "width": "150"},
                      { targets: 3, "width": "100px", render: function(data){return new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(data); }},
                      // { targets: [6,10], render: function(data){return wr_name(data); }},
                      { targets: -1, "width": "150px" },
                      { targets: 1, "width": "80px" },
                      { targets: 2, "width": "80px" },
                  ]
              } );

              $('#mytable').on( 'click', '#info', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>index.php/delivery/read/'+data.kode;
                  }
              } );
              $('#mytable').on( 'click', '#update', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>index.php/delivery/update/'+data.kode;
                  }
              } );
              $('#mytable').on( 'click', '#print-kirim', function (e) {
                e.preventDefault();
                var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.open('<?php echo base_url()?>index.php/delivery/pdfKirim/'+data.kode,'_blank');
                  }
              } );
              $('#mytable').on( 'click', '#printdetail', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.open('<?php echo base_url()?>index.php/delivery/pdfTerimaDetail/'+data.kode,'_blank');
                  }
              } );
              $('#mytable').on( 'click', '#delete', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location= '<?php echo base_url()?>index.php/delivery/deleteAll/'+data.kode;
                  }
              } );
            
            }
            </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div>
        </section><!-- /.content -->