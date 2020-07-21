<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="delivery_count"></h3>

                <p>Delivery</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="<?php echo base_url()?>index.php/delivery/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="customer_count"><sup style="font-size: 20px">%</sup></h3>

                <p>Customer</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="<?php echo base_url()?>index.php/customer/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="driver_count"></h3>

                <p>Driver</p>
              </div>
              <div class="icon">
                <i class="fas fa-people-carry"></i>
              </div>
              <a href="<?php echo base_url()?>index.php/driver/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->

          <div class='row'>
            <div class='col-md-6'>
              <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Review Table</h3>
                </div>
              </div>
              <div class="card-body">

                <div class="position-relative mb-4">
                  <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <th>Day</th>
                        <th>Delivery</th>
                      </tr>
                    </thead>
                    <tbody id="isi_table">
                      <!-- <tr id="1"></tr>
                      <tr id="2"></tr>
                      <tr id="3"></tr>
                      <tr id="4"></tr>
                      <tr id="5"></tr>
                      <tr id="6"></tr>
                      <tr id="7"></tr> -->
                    </tbody>
                </table>
                </div>

              </div>
            </div>
            </div><!-- /.col -->
            <div class='col-md-6'>
              <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">Review Chart</h3>
              </div>
              <div class="card-body">
                  <canvas id="chart" height="200"></canvas>

              </div>
            </div>
            </div><!-- /.col -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </section>
  <!-- /.content-wrapper -->
<!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/chart.js/dist/utils.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>

<script>
  $.ajax({
        type : 'ajax',
        url : '<?php echo base_url()?>index.php/beranda/get_count/',
        async : false,
        dataType : 'json',
        success : function(data){
          document.getElementById("delivery_count").innerHTML = data.delivery;
          document.getElementById("customer_count").innerHTML = data.customer;
          document.getElementById("driver_count").innerHTML = data.driver;
        }
    });
  
</script>
<script>
  var list_deliver = [];
  var tgl = [];

  $.ajax({
      type : 'ajax',
      url : '<?php echo base_url()?>index.php/beranda/data_delivery/',
      async : false,
      dataType : 'json',
      success : function(data){
        var html_list = '';
        var jumlah = 0;
        var tgl_sub = '';
        for ( var i=0 ; i < 7 ; i++ ){
          jumlah = 0;
          tgl_sub = moment().subtract(i, 'days').format('D MMM YYYY');
          html_list += 
          '<tr>'+
          '<td>'+tgl_sub+'</td>';
          for ( var j=0 ; j<data.length ; j++){
            if (moment().subtract(i, 'days').format('YYYY-MM-DD') == data[j].tanggal) {
              jumlah = data[j].jumlah_harian;
              break;
            }
          }
          html_list +=
          '<td>'+jumlah+'</td>'+
          '</tr>';
          $('#isi_table').html(html_list);
          list_deliver.push(jumlah);
          tgl.push(moment(tgl_sub,'D MMM YYYY').format('D MMM'));
        }
        tgl.reverse();
        list_deliver.reverse();
      }
  });

  var lineChartData = {
      labels: tgl,
      datasets: [{
        label: 'Delivery',
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: list_deliver,
        yAxisID: 'y-axis-1',
      }
      // , {
      //   label: 'My Second dataset',
      //   borderColor: window.chartColors.blue,
      //   backgroundColor: window.chartColors.blue,
      //   fill: false,
      //   data: [
      //     10,20,30,40,20
      //   ],
      //   yAxisID: 'y-axis-2'
      // }
      ]
    };

    window.onload = function() {
      var ctx = document.getElementById('chart').getContext('2d');
      window.myLine = Chart.Line(ctx, {
        data: lineChartData,
        options: {
          responsive: true,
          hoverMode: 'index',
          stacked: false,
          title: {
            display: true,
            text: ''
          },
          scales: {
            yAxes: [{
              type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
              display: true,
              position: 'left',
              id: 'y-axis-1',
            }
            // , {
            //   type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
            //   display: true,
            //   position: 'right',
            //   id: 'y-axis-2',

            //   // grid line settings
            //   gridLines: {
            //     drawOnChartArea: false, // only want the grid lines for one axis to show up
            //   },
            // }
            ],
          }
        }
      });
    };
</script>