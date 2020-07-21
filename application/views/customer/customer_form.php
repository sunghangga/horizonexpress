<!-- Main content -->
        <section class='content'>
          <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                
                  <h3 class='card-title'>CUSTOMER</h3>
                </div>
                      <div class='card-body'>
                        <div class="row">
                          <div class="col-12">
                            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Name <?php echo form_error('name') ?></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile Address <?php echo form_error('address') ?></label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="address" id="address" placeholder="Domicile Address"><?php echo $address; ?></textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile Regency <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                <select class="form-control select2bs4" onchange="districts_list()" name="regencies_id" id="regencies_id" placeholder="Regencies" value="<?php echo $regencies_id; ?>" />
                                    <?php 
                                    if($regencies_id != "null"){ 
                                         echo '<option value="'.$regencies_id.'" selected>'.$regencies_name.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_regencies as $row)
                                        {
                                          
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                         
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile District <?php echo form_error('regency') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" onchange="villages_list()" name="districts_id" id="districts_id" placeholder="Districts" value="<?php echo $districts_id; ?>" />   
                                        <?php 
                                        if($districts_id != null){ 
                                             echo '<option value="'.$districts_id.'" selected>'.$districts_name.'</option>';
                                        } 
                                        else{
                                            echo '<option value=""></option>';
                                        }
                                        foreach ($get_districts as $row)
                                            {
                                              
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                            
                                            } 
                                        ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Domicile Village <?php echo form_error('village') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4" name="villages_id" id="villages_id" placeholder="Villages" value="<?php echo $villages_id; ?>" />
                                    <?php 
                                    if($villages_id != null){ 
                                         echo '<option value="'.$villages_id.'" selected>'.$villages_name.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_villages as $row)
                                        {
                                         
                                            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                          
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">No. Identitas (KTP/NIP) <?php echo form_error('No. Indentitas') ?></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="KTP / NIP" value="<?php echo $no_identitas; ?>" />
                              </div>
                            </div>

                             <div class="form-group row">
                               <label for="staticEmail" class="col-sm-2 col-form-label">KTP Address <?php echo form_error('address') ?></label>
                             <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="address_ktp" id="address_ktp" placeholder="KTP Address"><?php echo $address_ktp; ?></textarea>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP Regency <?php echo form_error('regencies_ktp') ?></label>
                              <div class="col-sm-10">
                                <select class="form-control select2bs4ktp" onchange="districts_list_ktp()" name="regencies_ktp" id="regencies_ktp" placeholder="KTP Regencies" value="<?php echo $regencies_ktp; ?>"/>
                                    <?php 
                                    if($regencies_ktp != "null"){ 
                                         echo '<option value="'.$regencies_ktp.'" selected>'.$regencies_name_ktp.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_regencies_ktp as $rows)
                                        {
                                          
                                            echo '<option value="'.$rows->id.'">'.$rows->name.'</option>';
                                         
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP District <?php echo form_error('districts_ktp') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4ktp" onchange="villages_list_ktp()" name="districts_ktp" id="districts_ktp" placeholder="KTP Districts" value="<?php echo $districts_ktp; ?>" />   
                                        <?php 
                                        if($districts_ktp != null){ 
                                             echo '<option value="'.$districts_ktp.'" selected>'.$districts_name_ktp.'</option>';
                                        } 
                                        else{
                                            echo '<option value=""></option>';
                                        }
                                        foreach ($get_districts_ktp as $rows)
                                            {
                                              
                                                echo '<option value="'.$rows->id.'">'.$rows->name.'</option>';
                                            
                                            } 
                                        ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">KTP Village <?php echo form_error('villages_ktp') ?></label>
                              <div class="col-sm-10">
                                   <select class="form-control select2bs4ktp" name="villages_ktp" id="villages_ktp" placeholder="KTP Villages" value="<?php echo $villages_ktp; ?>"/>
                                    <?php 
                                    if($villages_ktp != null){ 
                                         echo '<option value="'.$villages_ktp.'" selected>'.$villages_name_ktp.'</option>';
                                    } 
                                    else{
                                       echo '<option value=""></option>';
                                    }
                                    foreach ($get_villages_ktp as $rows)
                                        {
                                         
                                            echo '<option value="'.$rows->id.'">'.$rows->name.'</option>';
                                          
                                        } 
                                    ?>
                                   </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Telephone <?php echo form_error('telephone') ?></label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>" />
                              </div>
                            </div>
                                <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Customer Type <?php echo form_error('cust_type') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control select2bs4" id="cust_type" name="cust_type">
                                        <?php if($cust_type != null){ 
                                             echo '<option value="'.$cust_type.'">'.strtoupper($cust_type).'</option>';
                                         } ?>
                                        <option value="PERUSAHAAN">PERUSAHAAN</option>
                                        <option value="PERORANGAN">PERORANGAN</option>
                                      </select>
                                   </div> 
                                </div>
                            
                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Photo <?php echo form_error('photo') ?></label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" id="photo" src="<?php echo $photo; ?>" />
                              </div>
                            </div>
                    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    	    <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('index.php/customer') ?>" class="btn btn-default">Cancel</a>
                          </div>
                      </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

        <script type="text/javascript">
           

           $(function () {
            //Initialize Select2 Elements
             $('.select2bs4').select2({
              theme: 'bootstrap4'
            })   ;       
           });

            $(function () {
            //Initialize Select2 Elements
             $('.select2bs4ktp').select2({
              theme: 'bootstrap4'
            })   ;       
           });

          function regencies_list(){
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_regencies/',
                async : false,
                dataType : 'json',
                success : function(data){

                  var html = '';
                  var i;
                  
                  for(i=0; i<data.length; i++){
                    if(i == 0){
                      html += 
                     '<option selected="selected" value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    else {
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                  }
                  $('#regencies_id').html(html);
                }
            });
          }

          function districts_list(){
            var elem = document.getElementById("regencies_id");
            var id = elem.options[elem.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_districts/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                   html += 
                     '<option selected="selected" value=""></option>';

                  for(i=0; i<data.length; i++){
                    
                    
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    
                  }
                  $('#districts_id').html(html);
                }
            });
            villages_list(); 
          }

          function villages_list(){
            var elem1 = document.getElementById("districts_id");
            var id = elem1.options[elem1.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_villages/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                  html += 
                     '<option selected="selected" value=""></option>';
                  for(i=0; i<data.length; i++){
                   
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    
                  }
                  $('#villages_id').html(html);
                }
            });
          }



          function regencies_list_ktp(){
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_regencies/',
                async : false,
                dataType : 'json',
                success : function(data){

                  var html = '';
                  var i;
                  
                  for(i=0; i<data.length; i++){
                    if(i == 0){
                      html += 
                     '<option selected="selected" value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    else {
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                  }
                  $('#regencies_ktp').html(html);
                }
            });
          }

          function districts_list_ktp(){
            var elem = document.getElementById("regencies_ktp");
            var id = elem.options[elem.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_districts/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                   html += 
                     '<option selected="selected" value=""></option>';

                  for(i=0; i<data.length; i++){
                    
                    
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    
                  }
                  $('#districts_ktp').html(html);
                }
            });
            villages_list_ktp(); 
          }

          function villages_list_ktp(){
            var elem1 = document.getElementById("districts_ktp");
            var id = elem1.options[elem1.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_villages/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                  html += 
                     '<option selected="selected" value=""></option>';
                  for(i=0; i<data.length; i++){
                   
                      html += 
                     '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    
                  }
                  $('#villages_ktp').html(html);
                }
            });
          }

        </script>
        </section><!-- /.content -->