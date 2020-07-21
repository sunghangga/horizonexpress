<!--Main content -->

<style type="text/css">
    
    #map {
      height: 500px;
    }
     .btn-save {
      background-color: #1d84d6;
      border-radius: 5px;
      color: white;
      padding: .5em;
      text-decoration: none;
      position: absolute;
      z-index: 6;
      bottom: 5px;
      left: 7px;
      width: 10%;
      height: 30px;
      text-align: center;
    }

    /*.btn-save:focus,
    .btn-save:hover {
      background-color: #356992;
      color: White;
    }*/

    #floating-panel {
      position: absolute;
      top: 10px;
      left: 2%;
      z-index: 5;
      background-color: #fff;
      border: 1px solid #999;
      text-align: center;
    }

    .float-button{
      position: absolute;
      bottom: 10px;
      left: 2%;
      z-index: 5;
      /*background-color: #fff;
      border: 1px solid #999;*/
      text-align: center;
    }

    #start {
      display: none;
    }

    #end {
      height: 25px;
      width: 26em;
      
    }

  </style>

        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

        <section class='content'>
          <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <div class="row">
                    <div class="col-md-12">    
                      <h3 class='card-title'>Tracking/ Map</h3>
                      <div class="col-sm" style="text-align: right;">
                              <a href="<?php echo site_url('index.php/tracking/Pengiriman') ?>" class="btn btn-default">Back to List Pengiriman</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='card-body'>
                  <div class="row">
                    <div class="col-6">
                      <h5>Estimasi Jarak:</h5>
                      <p id="jarak"></p>
                    </div>
                    <div class="col-6">
                      <h5>Estimasi Waktu:</h5>
                      <p id="waktu"></p>
                    </div>
                    <div class="col-12">
                      <div id="floating-panel">
                      <form>
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none" id="token">
                        <!-- <input tye="text" id="start" value="CV. Mitra Krida Mandiri, Jalan By Pass Ngurah Rai, Jimbaran, Kabupaten Badung, Bali"> --><!-- Starting Location -->
                        <!-- <input type="text" id="end" value="<?= $this->input->get('tujuan');  ?>"> -->
                      <?php foreach ($address_data as $item) {?>
                        <input type="hidden" name="kode" id="kode"value="<?php echo $item->kode; ?>">
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
                         <input type="hidden" name="driver_location"  id="driver_location" value="<?php echo $item->driver_location; ?>">
                        <input type="hidden" id="start" name="start" value="<?php echo $item->address_pengirim; ?>">
                        <b>Tujuan Pengiriman: </b>
                        <input type="text" id="end" name="end" value="<?php echo $item->address_penerima; ?>"disabled><!-- Ending Location -->
                      <?php } ?>
                      </div>
                      <div id="map"></div>
                      <div class="col-sm" style="text-align: right;">
                              <a href="<?php echo site_url('index.php/tracking/Pengiriman') ?>" class="btn btn-default">Back to List Pengiriman</a>
                      </div>
                      
                      <!--<button type="Submit" class="btn btn-primary">Simpan Alamat</button>-->
                      </form>
                      <!-- <a href="javascript:void(0)" class="btn btn-primary" onclick="save()">Simpan Alamat</a> -->
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>

  <!--=========================================================================-->
  <script type="text/javascript">

    var x = -8.7830633;
    var y = 115.179433;
    var shipment_address = "";
    var estimasi_jarak = "";
    var estimasi_waktu = "";
    var latArr = [-8.7830557,-8.690073600000002];
    var lngArr = [115.1815728, 115.2385024];
    var markersArr = [];
    var base_url= $("#base_url").val();
    var map;
    var kode = $("#kode").val();

    function initMap(){
      map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: false,
        center: {lat: x, lng: y},
        zoom: 16
      });

      var autocomplete = new google.maps.places.Autocomplete(document.getElementById('end'));

      var directionsService = new google.maps.DirectionsService;
      var directionsDisplay = new google.maps.DirectionsRenderer({
        //draggable: true,
        polylineOptions: {strokeColor: "blue"},
        map: map
      });

      directionsDisplay.addListener('directions_changed', function() {
        computeTotalDistance(directionsDisplay.getDirections());
        // console.log(directionsDisplay.getPosition())

      });

      directionsDisplay.setMap(map);

      
      var geocoder = new google.maps.Geocoder();
      var address = $("#end").val();
      var awal = $("#start").val();
      
      var iconBase = base_url+'template/dist/img/truck.png';
      var driver_location = $("#driver_location").val();
      var driver_loc=driver_location.split(",");
      

      marker1 = new google.maps.Marker({
          draggable: true,
          map: map,
          icon: iconBase,
          title: 'Driver'
      });
      
       
      markersArr.push(marker1);



       console.log("driver_location : "+driver_loc[0])

      // untuk mendapatkan coordinate dari alamat yang di inputkan
      geocoder.geocode( { 'address': address}, function(results, status) {

      if (status == google.maps.GeocoderStatus.OK) {
          var latitude = results[0].geometry.location.lat();
          var longitude = results[0].geometry.location.lng();
          // alert(latitude);
          console.log("latitude tujuan : "+latitude+", longitude tujuan : "+longitude)
          } 
      });

      geocoder.geocode( { 'address': awal}, function(results, status) {

      if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        } 
      });

      var onChangeHandler = function(){
        calculateAndDisplayRoute(directionsService, directionsDisplay, $('#start'), $('#end'));
      }

      if($("#end").val()!=''){
        calculateAndDisplayRoute(directionsService, directionsDisplay, $('#start'), $('#end'));
        $('#end').change(onChangeHandler)
      }else{
        $('#end').change(onChangeHandler)  
      }      
    }

    function renewMarkers(){
        var url=base_url+'index.php/tracking/get_driver_location/'+kode;
        var loginString ="kode="+kode;
                $.ajax({
                    type : 'ajax',
                    url : url,
                    dataType : 'json',
                    success : function(data){                       
                        if(data != "") {
                            //var driver_location = "-8.7830557,115.1815728";
                            var driver_location=data[0].driver_location;
                            var driver_loc=driver_location.split(",");
                            
                           // markersArr.setPosition({lat: +driver_loc[0], lng: +driver_loc[1]})
                           markersArr[0].setPosition({lat: +driver_loc[0], lng: +driver_loc[1]})
                        }
                    }
                });
        
      }

      setInterval(renewMarkers, 1000);

    function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end){
      directionsService.route({
        origin: start.val(),
        destination: end.val(),
        travelMode: 'DRIVING',

      }, function(response, status){
        if(status==="OK"){
          directionsDisplay.setDirections(response);
        }else{
          window.alert('Directions request failed due to '+status);
        }
      })
    }

    function computeTotalDistance(result) {
      var myroute = result.routes[0];
      for (var i = 0; i < myroute.legs.length; i++) {
        $('#end').val(myroute.legs[0].end_address)
        estimasi_waktu = myroute.legs[0].duration.value;
        estimasi_jarak = myroute.legs[0].distance.value;        
      }

      document.getElementById('waktu').innerHTML = konversiWaktu(estimasi_waktu);
      document.getElementById('jarak').innerHTML = konversiJarak(estimasi_jarak);
    }

    function konversiWaktu(d){
      d = Number(d);
      var h = Math.floor(d / 3600);
      var m = Math.floor(d % 3600 / 60);
      var s = Math.floor(d % 3600 % 60);

      var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
      var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
      var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
      return hDisplay + mDisplay + sDisplay;
    }

    function konversiJarak(d){
      d =  Number(d);
      var km = Math.floor(d/1000);
      var m = d%1000;

      var kmDisplay = km > 0 ? km + " km, " : "";
      var mDisplay = m > 0 ? m + " m" : "";
      return kmDisplay + mDisplay;
    }

    // function save(){
      
    //   var sm_no = "<?php echo $this->input->get('sm_no'); ?>";
    //   var token = $("#token").val()

      // $.ajax({
      //   url: "<?php echo site_url("index.php/tracking/simpan_alamat") ?>",
      //   type: "post",
      //   data: {
      //           sm_no: sm_no,
      //           shipment_address: $("#end").val(), 
      //           estimasi_jarak: estimasi_jarak, 
      //           estimasi_waktu: estimasi_waktu,
      //           csrf_sess_name: token
      //         },
      //   dataType: "json",
      //   success: function(data){
      //     if(data){
      //       if("<?= $this->session->userdata("user_name")?>"){
      //         document.location.replace("lists");
      //       }else{
      //         document.location.replace("list_motor");  
      //       }
      //     }else{
      //       alert("Terjadi kesalahan, silahkan coba lagi!!!")
      //     }
      //   }
      // })

    //}
  </script>
  <!--=======================================================================-->

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrhdvZDWKYeeQALfZSFbRH1GvWL2QfnhY&callback=initMap&libraries=places,geometry"></script>

</section>