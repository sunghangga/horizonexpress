
        <!-- Main content -->
        <section class='content'>
        <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                    <div class="row">
                    <div class="col-md-6">
                      <h3 class='card-title'>TRACKING LIST
                    <?php echo anchor('index.php/tracking/pengiriman/','List Pengiriman',array('class'=>'btn btn-primary btn-sm'));?></h3>
                    </div>
                    <div class="col-md-6">
                    <div class="input-group">
                        <label style="margin-right: 15px;">Date Type:</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipe" id="tipe1" value="create" checked>
                          <label class="form-check-label" for="tipe1">
                            Create
                          </label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipe" id="tipe2" value="update">
                          <label class="form-check-label" for="tipe2">
                            Update
                          </label>
                        </div>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
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
                </div>
                </div>
            </div>

        <div class='card-body'>
        <form method="POST" action="<?php echo base_url() ?>index.php/tracking/update_action_check">  
          <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th>Pilih</th>
                <th>Date Create At</th>
                <th>Date Update At</th>
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
        <br>
        <label>Driver</label>
        <select class="form-control" name="driver">
          <option value="" disabled selected>Pilih Driver</option>
        <?php foreach ($driver_data as $item) {?>
          <option value="<?php echo $item->id;  ?>"><?php echo $item->name; ?></option>
        <?php } ?>
        </select>
        <br>
        <label>Truck</label>
        <select class="form-control" name="truck">
          <option value="" disabled selected>Pilih Truck</option>
        <?php foreach ($truck_data as $item) {?>
          <option value="<?php echo $item->id;  ?>"><?php echo $item->nopol; ?></option>
        <?php } ?>
        </select>
        <br>
        <input type="submit" class="btn btn-primary">
      </form>  
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
                console.log(data_range(moment().format('YYYY-MM-DD'),moment().format('YYYY-MM-DD')));
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
              var tipeDate = 'range';
              if(document.getElementById("tipe2").checked){
                var tipeDate = 'range_update';
              }
              console.log(tipeDate);
              var name_wr = "";              
              var table = $('#mytable').DataTable( {
                  scrollY: "400px",
                  scrollX: true,
                  scrollCollapse: true,
                  destroy: true,
                  paging: true,
                  searching: true,
                  "ajax": {
                    "url": "<?php echo base_url()?>index.php/tracking/"+tipeDate+"/",
                    "dataSrc": "",
                    "data": function(data) {
                      data.first = first;
                      data.last = last;
                    },
                  },
                  "columns": [
                      { "data": null,
                        render: function (data, type, row){
                          return '<input type="checkbox" name="pilihan[]" class="pilihan" value='+data.kode+' id='+data.kode+'>';
                        }
                      },
                      { "data": "create_at" },
                      { "data": "update_at" },
                      { "data": null,
                      render: function ( data, type, row ) {  
                            return data.kode + "/" + data.bulan + "/" + data.tahun;
                        }
                      },
                      { "data": "status" },
                      { "data": "price" },
                      { "data": "name_pengirim" },
                      { "data": "address_pengirim" },
                      { "data": "telephone_pengirim" },
                      { "data": "nama_wr_pengirim" },
                      { "data": "name_penerima" },
                      { "data": "address_penerima" },
                      { "data": "telephone_penerima" },
                      { "data": "nama_wr_penerima" },
                      { "data": "admin" },
                      
                      /*{ "data": "driver" },
                      { "data": "nopol" },*/
                      { "data": null,
                        render: function ( data, type, row ) {
                          // console.log(data.sv_no);
                          return '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">'+
                          '<div class="btn-group" role="group" aria-label="First group">'+
                            '<a id="info" style="margin-left: 5px;" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></div>'+
                          '<div class="btn-group" role="group" aria-label="Second group">'+
                            '<a id="search" style="margin-left: 5px;" class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a></div>'+
                          //   '<div class="btn-group" role="group" aria-label="Third group">'+
                          //   '<button id="print" style="margin-left: 5px;" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></i></button></div>'+
                        '</div>';
                      } }
                  ],
                  "columnDefs": [
                      { targets: [1,2], "width": "90", render: function(data){return moment(data).format('D MMM YYYY'); }},
                      { targets: [6,7,8,9,10,11,12], "width": "150"},
                      { targets: 5, "width": "100px", render: function(data){return new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(data); }},
                      // { targets: [6,10], render: function(data){return wr_name(data); }},
                      { targets: -1, "width": "100px" },
                      { targets: 1, "width": "80px" },
                      { targets: 2, "width": "80px" },
                  ]
              } );

              $('#mytable').on( 'click', '#info', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>index.php/tracking/read/'+data.kode;
                  }
              } );
              $('#mytable').on( 'click', '#search', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>index.php/tracking/search/'+data.kode;
                  }
              } );
              $('#mytable').on( 'click', '#update', function (e) {
                e.preventDefault();
                  var data = table.row( $(this).parents('tr') ).data();
                  if (data != null) {
                    window.location = '<?php echo base_url()?>index.php/tracking/update/'+data.kode;
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