<!--Main content -->
        <style>
        #mapid{
          width: 1025px;
          height: 500px;
          z-index: 1;
        }
        .overlay {     
          width: 250px;
          height: 350px;
          position: absolute;
          top: 1;
          right: 1;
          bottom: 0;      
          background-color: rgba(255, 50, 50, 0.5);     
          z-index: 2;
        }
        .square {
          height: 20px;
          width: 20px;
        }
        </style>

        <link rel="stylesheet" href="<?php echo base_url() ?>map_library/leaflet/leaflet.css">
        <script src="<?php echo base_url() ?>map_library/leaflet/leaflet.js"></script>
        <script src="<?php echo base_url() ?>map_library/leaflet-ajax/dist/leaflet.ajax.min.js"></script>

        <script src="<?php echo base_url() ?>map_library/Control.OSMGeocoder.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>map_library/Control.OSMGeocoder.css">


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
                    <div class="col-md-6">    
                      <h3 class='card-title'>Market Analysis/ Explore</h3>
                    </div>
                  </div>
                </div>
                <div class='card-body'>
                  <div class="row">
                  <div class="col-12">
                    <br>
                    <div id="mapid">  
                    </div>
                  </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>

        <script src="https://unpkg.com/esri-leaflet@2.4.0/dist/esri-leaflet.js"
          integrity="sha512-kq0i5Xvdq0ii3v+eRLDpa++uaYPlTuFaOYrfQ0Zdjmms/laOwIvLMAxh7cj1eTqqGG47ssAcTY4hjkWydGt6Eg=="
          crossorigin=""></script>

        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css"
          integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
          crossorigin="">
        <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js"
          integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ=="
          crossorigin=""></script>

        <script type="text/javascript">
          var map = L.map('mapid').setView([-8.5, 115], 9);

          L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
              attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
              maxZoom: 18,
              id: 'mapbox.streets',
              accessToken: 'pk.eyJ1Ijoia3VybmlhYW1lcnRhIiwiYSI6ImNrOXA3NmFycDA4MXYza28xNDN6cDJpZTIifQ.x9M-0dGMA-9lU6BQ22IfMg'
          }).addTo(map);

          var searchControl = L.esri.Geocoding.geosearch().addTo(map);

          var results = L.layerGroup().addTo(map);

          searchControl.on('results', function (data) {
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
              results.addLayer(L.marker(data.results[i].latlng));
              console.log(data.results[i]);
            }
          });
        </script>
        </section>