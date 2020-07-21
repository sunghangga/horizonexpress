
        <!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                    <div class="row">
                    <div class="col-md-6">
                  <h3 class='card-title'>LIST BUKTI TANDA TERIMA <?php echo anchor('index.php/handover/create/','Create',array('class'=>'btn btn-primary btn-sm'));?></h3>
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
		    <th>Kode</th>
        <th>Status</th>
		    <th>Penerima</th>
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
          var table = $('#mytable').DataTable( {
              scrollY: "800px",
              scrollX: true,
              scrollCollapse: true,
              destroy: true,
              paging: true,
              searching: true,
              "ajax": {
                "url": "<?php echo base_url()?>index.php/handover/range/",
                "dataSrc": "",
                "data": function(data) {
                  data.first = first;
                  data.last = last;
                },
              },
              "columns": [
                  
                  { "data": null,
                    render: function ( data, type, row ) {
                    
                        return data.kode + "/" + data.bulan + "/" + data.tahun;
                      
                    }
                   },
                  { "data": "status_receipt" },
                  { "data": "name_penerima" },
                  { "data": "create_at" },
                  { "data": null,
                    render: function ( data, type, row ) {
                      // console.log(data.sv_no);
                      return '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">'+
                      '<div class="btn-group" role="group" aria-label="Third group">'+
                        '<button id="print" style="margin-left: 5px;" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></button></div>'+
                      '<div class="btn-group" role="group" aria-label="fourth group">'+
                          '<button id="delete" style="margin-left: 5px;" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></i></button></div>'+
                    '</div>';
                  } }
              ],
              "columnDefs": [
                 { targets: 0, "width": "175px"},
                  { targets: [1,2,3], "width": "175px"},
                  { targets: 4, "width": "125px", render: function(data){return moment(data).format('D MMM YYYY'); }},
              //    { targets: -1, "width": "150px" },
              ]
          } );

          $('#mytable').on( 'click', '#info', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                window.location = '<?php echo base_url()?>index.php/handover/read/'+data.id;
              }
          } );
          $('#mytable').on( 'click', '#print', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                window.open('<?php echo base_url()?>index.php/delivery/pdfTerima/'+data.kode,'_blank');
              }
          } );
          $('#mytable').on( 'click', '#delete', function (e) {
            e.preventDefault();
              var data = table.row( $(this).parents('tr') ).data();
              if (data != null) {
                //var choice = confirm('Are you sure you want to delete this item?');
                //if (choice) {
                //  window.location= '<?php echo base_url()?>index.php/handover/deleteAll/'+data.kode;
                //}   
                swal({
                  title: "Confirmation",
                  text: "Are your sure want to delete Receipt No."+data.kode + "/" + data.bulan + "/" + data.tahun+ " ?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {

                    swal("Your receipt has been deleted!", {
                      icon: "success",
                    });
                    window.location= '<?php echo base_url()?>index.php/handover/deleteAll/'+data.kode;
                  } else {
                    swal("Your request has been canceled");
                  }
                });
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