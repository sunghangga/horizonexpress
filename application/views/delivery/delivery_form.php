      <section class='content'>
        <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <style>
                    .motor .col-2{
                      padding-right: 3.5px;
                      padding-left: 3.5px;                    
                    }

                    .motor .col-1{
                      padding-right: 3.5px;
                      padding-left: 3.5px;                    
                    }

                    .motor .faktur{
                      max-width: 10%;                   
                    }

                    .motor .price{
                      max-width: 15%;            
                    }

                    .motor .col-sm{
                      padding-right: 3.5px;
                      padding-left: 3.5px; 
                    }

                    .motor .form-control {
                      padding-right: 4.5px;
                      padding-left: 4.5px; 
                    }

                  </style>
                  <h3 class='card-title'>DELIVERY</h3>
                  </div>
                      <div class='card-body'>
                        <form action="<?php echo $action; ?>" method="post">
                        <!-- <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist"> -->
                          <!-- <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true" onclick="deteksi('data');">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" onclick="deteksi('items');">Items</a>
                          </li> -->
                          <!-- <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-driver" role="tab" aria-controls="custom-content-below-driver" aria-selected="false">Accept Driver</a>
                          </li> -->
                        <!-- </ul> -->
                        <div class="tab-content" id="custom-content-below-tabContent">
                          <div id="custom-content-below-home">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Data Pengirim</h4>
                                <div class="form-group">
                                  
                                  <div class="col-sm">
                                    <input type="hidden" class="form-control" autocomplete="off" spellcheck="false" name="name_pengirim" id="name_pengirim" placeholder="Name Pengirim" value="<?php echo $name_pengirim; ?>" />
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Nama Pengirim <?php echo form_error('pengirim_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" onchange="fill_data_pengirim()" id="pengirim_id" name="pengirim_id" >
                                        <?php 
                                          if($pengirim_id != null){
                                            echo '<option value="'.$pengirim_id.'" selected>'.$pengirim_name.'</option>';
                                              
                                          }
                                          else{
                                            echo '<option value="" selected></option>';        
                                          } 
                                          foreach ($get_cutomer as $row){
                                                echo '<option value="'.$row->id.'">'.$row->name.'|'.$row->no_identitas.'</option>';
                                              }

                                          
                                           
                                        ?>
                                      </select>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Address Pengirim <?php echo form_error('address_pengirim') ?></label>
                                  <div class="col-sm">
                                   <textarea class="form-control" rows="3" name="address_pengirim" id="address_pengirim" placeholder="Address Pengirim"><?php echo $address_pengirim; ?></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Telephone Pengirim <?php echo form_error('telephone_driver') ?></label>
                                  <div class="col-sm">
                                   <input type="text" class="form-control" name="telephone_pengirim" id="telephone_pengirim" placeholder="Telephone Pengirim" value="<?php echo $telephone_pengirim; ?>" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Warehouse Pengirim <?php echo form_error('wr_pengirim_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" id="wr_pengirim_id" name="wr_pengirim_id">
                                        <?php 
                                          if($wr_pengirim_id != null){
                                             echo '<option value="'.$wr_pengirim_id.'" selected>'.$wr_pengirim_name.'</option>';
                                          }
                                          else{
                                            echo '<option value="" selected></option>';
                                          }
                                          foreach ($get_wr as $row){
                                                echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                          }                             
                                           
                                        ?>
                                      </select>
                                  </div>
                                </div>
                                
                              </div>

                              <div class="col-md-12">
                                <h4 class="mt-6 ">Data Penerima</h4>
                                <div class="form-group">
                                 
                                  <div class="col-sm">
                                   <input type="hidden" class="form-control" name="name_penerima" id="name_penerima" placeholder="Name Penerima" value="<?php echo $name_penerima; ?>" />
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Nama Penerima <?php echo form_error('penerima_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" onchange="fill_data_penerima()" id="penerima_id" name="penerima_id">
                                        <?php 
                                          if($penerima_id != null){
                                              echo '<option value="'.$penerima_id.'" selected>'.$penerima_name.'</option>';
                                          }
                                          else{
                                              echo '<option value="" selected></option>';
                                              
                                          } 
                                          foreach ($get_cutomer as $row){
                                        echo '<option value="'.$row->id.'">'.$row->name.'|'.$row->no_identitas.'</option>';
                                          }

                                          
                                           
                                        ?>
                                      </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Address Penerima <?php echo form_error('address_customer') ?></label>
                                  <div class="col-sm">
                                   <textarea class="form-control" rows="3" name="address_penerima" id="address_penerima" placeholder="Address Penerima"><?php echo $address_penerima; ?></textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Telephone Penerima <?php echo form_error('telephone_penerima') ?></label>
                                  <div class="col-sm">
                                   <input type="text" class="form-control" name="telephone_penerima" id="telephone_penerima" placeholder="Telephone Penerima" value="<?php echo $telephone_penerima; ?>" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Warehouse Penerima <?php echo form_error('telephone_driver') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" id="wr_penerima_id" name="wr_penerima_id">
                                        <?php 
                                        if($wr_penerima_id != null){ 
                                              echo '<option value="'.$wr_penerima_id.'">'.$wr_penerima_name.'</option>';
                                         } 
                                         else{
                                              echo '<option value=""></option>';
                                         }
                                        foreach ($get_wr as $row){
                                              echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                             }  
                                        ?>
                                      </select>
                                  </div>
                                </div>
                                <!---->
                              </div>
                            </div> 
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Regencies <?php echo form_error('regencies_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs42" onchange="districts_list()" name="regencies_id" id="regencies_id" placeholder="Regencies" value="<?php echo $regencies_id; ?>" />
                                    <?php 
                                    if($regencies_id != "null" || $regencies_id!= "" ){ 
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
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Districts <?php echo form_error('districts_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs42" onchange="villages_list()" name="districts_id" id="districts_id" placeholder="Districts" value="<?php echo $districts_id; ?>" />   
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
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Villages <?php echo form_error('villages_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs42" name="villages_id" id="villages_id" placeholder="Villages" value="<?php echo $villages_id; ?>" />
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
                              </div>
                            </div>
                          </div>

                          <div style="display: none;" id="custom-content-below-profile">

                            <div class="row" style="padding-left: 15.0px; margin-bottom: 20px;">
                             <div class="row" >
                                <h4 class="mt-6 ">Data Unit Sepeda Motor</h4>
                              </div>
                              <div class="container" style="padding-left: 0px; margin-left: 0px;">
                                    <!--<h2>Modal Example</h2>-->
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Unit Sepeda Motor</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                      <div class="modal-dialog">
                                      
                                        <!-- Modal content-->
                                        <div class="modal-content" style="width: 500px;">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Available Unit List</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            
                                          </div>
                                          <div class="modal-body" style=" max-height: 450px;overflow: auto;">
                                            <?php foreach($get_pending_bike_model as $rows){
                                              $no=1;
                                              //$bike_id=1;
                                            ?>

                                            <div class="pending_bike" style="border:solid; border-width: 1px; border-radius: 10px; padding: 5px;margin:10px;"><?php echo $rows->bike_code."-".$rows->bike_color; ?>
                                                  <?php foreach($get_pending_bike as $rows_detail){ 

                                                      if($rows_detail->bike_code==$rows->bike_code && $rows_detail->bike_color==$rows->bike_color){

                                                        if($rows_detail->status=='booked'){
                                                          $display='none';
                                                        }else{
                                                          $display='block';
                                                        }


                                                    ?>

                                                      <p id="<?php echo 'databike_'.$rows_detail->bike_id; ?>" style="display: <?php echo $display; ?>">
                                                        <input type="checkbox" name="<?php echo 'bike_'.$rows_detail->bike_id; ?>" id="<?php echo 'bike_'.$rows_detail->bike_id; ?>" onclick="add_item_row(this.id)" value="<?php echo $rows_detail->bike_faktur."|".$rows_detail->bike_code."-".$rows_detail->bike_color."|".$rows_detail->bike_no_mesin."|".$rows_detail->bike_no_rangka."|".$rows_detail->bike_id; ?>">
                                                        <?php echo ($display != 'none' ? $no : '**').". (".$rows_detail->bike_faktur.")-".$rows_detail->bike_no_mesin."|".$rows_detail->bike_no_rangka; ?>
                                                          
                                                      </p>
                                                  <?php
                                                      
                                                      $no++; }
                                                      //$bike_id++ ;
                                                     }
                                                  ?>
                                                </div>
                                            <?php }?>
                                          </div>
                                          <div class="modal-footer">
                                            <div style="float: left";>
                                              <p id="jumlah_unit" ></p>
                                            </div>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    
                                  </div>
                               <div class="row motor">
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row) {
                                if ($row->category == 1) {
                               ?>
                              <?php if ($iter == 0) { ?>

                              <div class="col-2 faktur" style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Faktur</label>
                                <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control faktur-item" autocomplete="off" spellcheck="false" name="faktur_item[]" id="faktur_item1" rel="rel_faktur_item1" placeholder="Faktur" value="<?php echo $row->faktur;?>" />

                                  </div>
                                </div>
                              </div>
                                
                              <div class="col-2"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name</label>
                                <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item1" rel="rel_name_item1" placeholder="Name Item" value="<?php echo $row->name;?>" />
                                    
                                    <input type="hidden" name="id_item[]" id="id_item1" rel="rel_id_item1"value="<?php echo $row->id; 
                                    ?>" />
                                    <input type="hidden" name="bike_id_item[]" id="bike_id_item1" rel="rel_bike_id_id_item1"value="<?php echo $row->bike_id; 
                                    ?>" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-2"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">No. Mesin</label>
                                <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control nomesin-item" autocomplete="off" spellcheck="false" name="nomesin_item[]" id="nomesin_item1" rel="rel_nomesin_item1" placeholder="no. Mesin" value="<?php echo $row->no_mesin;?>" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-2"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">No Rangka</label>
                                <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control norangka-item" autocomplete="off" spellcheck="false" name="norangka_item[]" id="norangka_item1" rel="rel_norangka_item1" placeholder="No. rangka" value="<?php echo $row->no_rangka;?>" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-2 price"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item" rel="rel_price_item" placeholder="Price Item" value="<?php echo $row->price;?>"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-1"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item1" rel="rel_qty_item1" placeholder="Qty" value="<?php echo $row->qty;?>" readonly/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-2"  style="display: none;">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class="col-6">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item1" rel="rel_unit_item1" placeholder="Unit" value="<?php echo $row->unit;?>" readonly/>
                                      </div>
                                      <div class="col-4" style="margin-left: 0px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_item"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                              <?php
                                $iter+=1;}}}
                                else if ($button == "Create"){
                              ?>
                              <div class="col-2 faktur" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Faktur</label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control faktur-item" spellcheck="false" name="faktur_item[]" id="faktur_item1" rel="rel_faktur_item1" placeholder="Faktur" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-2" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name</label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item1" rel="rel_name_item1" placeholder="Name Item" />
                                    <input type="hidden" name="bike_id_item[]" id="bike_id_item1" rel="rel_bike_id_id_item1"/>
                                  </div>
                                </div>
                              </div>


                              <div class="col-2" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">No. Mesin</label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control nomesin-item" 
                                     spellcheck="false" name="nomesin_item[]" id="nomesin_item1" rel="rel_nomesin_item1" placeholder="No. Mesin"/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-2" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">no. Rangka</label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control norangka-item"
                                     spellcheck="false" name="norangka_item[]" id="norangka_item1" rel="rel_norangka_item1" placeholder="No. Rangka"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-2 price" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item" rel="rel_price_item" placeholder="Price Item" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-1" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item1" rel="rel_qty_item1" readonly/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-2" style="display: none;">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class="col-6">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item1" rel="rel_unit_item1" placeholder="Unit" readonly/>
                                      </div>
                                      <div class="col-4" style="margin-left: 0px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_item"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
 
                                
                           
                              
                            <?php }?>
                              
                            </div>
                          </div>
                              <div class="item_field row" style="padding-left: 15px;">
                              
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row) {
                                if ($row->category == 1) {
                               ?>
                              <?php if ($iter != 0) { ?>
                                 <div id="<?php echo 'rowbike_'.$row->bike_id?>"><div class="row motor">
                                  <div class="col-2 faktur">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="text" class="form-control faktur-item" autocomplete="off" spellcheck="false" name="faktur_item[]" id="<?php echo 'faktur_item'.($iter+1); ?>" rel="<?php echo 'rel_faktur_item'.($iter+1); ?>" placeholder="Faktur" value="<?php echo $row->faktur; ?>" />

                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-2">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="<?php echo 'name_item'.($iter+1); ?>" rel="<?php echo 'rel_name_item'.($iter+1); ?>" placeholder="Name Item" value="<?php echo $row->name; ?>" />

                                         <input type="hidden" name="id_item[]" id="<?php echo 'id_item'.($iter+1); ?>" rel="<?php echo 'rel_id_item'.($iter+1); ?>" value="<?php echo $row->id; ?>" />
                                         <input type="hidden" name="bike_id_item[]" id="<?php echo 'bike_id_item'.($iter+1); ?>" rel="<?php echo 'rel_bike_id_item'.($iter+1); ?>" value="<?php echo $row->bike_id; ?>" />
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-2">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="text" class="form-control nomesin-item" autocomplete="off" spellcheck="false" name="nomesin_item[]" id="<?php echo 'nomesin_item'.($iter+1); ?>" rel="<?php echo 'rel_nomesin_item'.($iter+1); ?>" placeholder="No. Mesin" value="<?php echo $row->no_mesin; ?>" />
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-2">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="text" class="form-control norangka-item" autocomplete="off" spellcheck="false" name="norangka_item[]" id="<?php echo 'norangka_item'.($iter+1); ?>" rel="<?php echo 'rel_norangka_item'.($iter+1); ?>" placeholder="No. Rangka" value="<?php echo $row->no_rangka; ?>" />
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-2 price">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_item[]" id="<?php echo 'price_item'.($iter+1); ?>" rel="<?php echo 'rel_price_item'.($iter+1); ?>" placeholder="Price Item" value="<?php echo $row->price; ?>" />
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-1">
                                    <div class="form-group">
                                      <div class="col-sm">
                                        <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="<?php echo 'qty_item'.($iter+1); ?>" rel="<?php echo 'rel_qty_item'.($iter+1); ?>" placeholder="Qty" value="<?php echo $row->qty; ?>" readonly/>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-2"> 
                                    <div class="form-group"> 
                                      <div class="col-sm">
                                        <div class="row">
                                          <div class="col-6"> 
                                            <input type="text"  class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="<?php echo 'unit_item'.($iter+1); ?>" rel="<?php echo 'rel_unit_item'.($iter+1); ?>" placeholder="Unit" value="<?php echo $row->unit; ?>" readonly/>
                                          </div>
                                          <div class="col-4" style="margin-left: 0px; margin-top: 5px;">
                                          <a href="#" id="remove_item_add" onclick="remove_row('<?php echo 'bike_'.$row->bike_id; ?>')" ><i class="far fa-times-circle"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div> 
                                  </div></div></div>
                              <?php } ?>
                              <?php
                                $iter+=1;}}}?>
                              </div>

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">KELENGKAPAN</h4>
                              </div>
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row) {
                                if ($row->category == 2) { 
                                  if($iter == 0){?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan1" rel="rel_name_kelengkapan1" placeholder="Name Item" value="<?php echo $row->name;?>"/>

                                    <input type="hidden" name="id_kelengkapan[]" id="id_kelengkapan1" rel="rel_id_kelengkapan1" value="<?php echo $row->id; ?>" />

                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan" rel="rel_price_kelengkapan" placeholder="Price Item" value="<?php echo $row->price;?>"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan1" rel="rel_qty_kelengkapan1" placeholder="Qty" value="<?php echo $row->qty;?>"/>
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan1" rel="rel_unit_kelengkapan1" placeholder="Unit" value="<?php echo $row->unit;?>"readonly/>
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_kelengkapan"><i class="fas fa-plus"></i></a>
                                      </div>
                                      <?php if($iter == 0) { ?>
                                      <!-- <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_kelengkapan"><i class="fas fa-plus"></i></a>
                                      </div> -->
                                    <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                              <?php
                                $iter+=1;}}}
                                else if ($button == "Create"){
                              ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan1" rel="rel_name_kelengkapan1" placeholder="Name Item" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan" rel="rel_price_kelengkapan" placeholder="Price Item"  />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan1" rel="rel_qty_kelengkapan1" placeholder="Qty" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan1" rel="rel_unit_kelengkapan1" placeholder="Unit"  readonly/>
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_kelengkapan"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }?>
                            </div>
                            <div class="kelengkapan_field">
                            <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row) {
                                if ($row->category == 2) { 
                                  if($iter > 0){?>

                              <div><div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan'+counterA+'" rel="rel_name_kelengkapan'+counterA+'" placeholder="Name Item" value="<?php echo $row->name; ?>" />

                                     <input type="hidden" name="id_kelengkapan[]" id="name_kelengkapan'+counterA+'" rel="rel_id_kelengkapan'+counterA+'" value="<?php echo $row->id; ?>" />
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="number" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan'+counterA+'" rel="rel_price_kelengkapan'+counterA+'" placeholder="Price Item" value="<?php echo $row->price; ?>" />
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan'+counterA+'" rel="rel_qty_kelengkapan'+counterA+'" placeholder="Qty" value="<?php echo $row->qty; ?>" />
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <div class="row">
                                        <div class=".col-12 .col-sm-6 .col-lg-8">
                                          <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan'+counterA+'" rel="rel_unit_kelengkapan'+counterA+'" placeholder="Unit" value="<?php echo $row->unit; ?>" readonly/>
                                        </div>
                                        <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                          <a href="" id="remove_kelengkapan"><i class="far fa-times-circle"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div></div>
                                <?php } ?>
                              <?php
                                $iter+=1;}}}?>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Items Other</h4>
                              </div>
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row){ 
                                if ($row->category == 0) {
                                  if($iter == 0){?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other1" rel="rel_name_other1" placeholder="Name Item" value="<?php echo $row->name;?>"/>

                                    <input type="hidden" name="id_other[]" id="id_other1" rel="rel_id_other1" value="<?php echo $row->id; ?>" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other" rel="rel_price_other" placeholder="Price Other" value="<?php echo $row->price;?>"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other1" rel="rel_qty_other1" placeholder="Qty" value="<?php echo $row->qty;?>"/>
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <?php }?>
                                  <div class="col-sm">
                                   <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other1" rel="rel_unit_other1" placeholder="Unit" value="<?php echo $row->unit;?>"/>
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_other"><i class="fas fa-plus"></i></a>
                                      </div>
                                      <?php if($iter == 0) { ?>
                                      <!-- <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_other"><i class="fas fa-plus"></i></a>
                                      </div> -->
                                    <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                                $iter+=1;}}}}
                                else if ($button == "Create"){
                              ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other1" rel="rel_name_other1" placeholder="Name Item" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other" rel="rel_price_other" placeholder="Price Other" />
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other1" rel="rel_qty_other1" placeholder="Qty" />
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <div class="col-sm">
                                   <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other1" rel="rel_unit_other1" placeholder="Unit" />
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_other"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                            </div>
                            <div class="other_field">
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row) {
                                if ($row->category == 0) { 
                                  if($iter > 0){?>
                              <div><div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other'+counterC+'" rel="rel_name_other'+counterC+'" placeholder="Name Item" value="<?php echo $row->name; ?>"/>

                                      <input type="hidden" name="id_other[]" id="id_other'+counterC+'" rel="rel_id_other'+counterC+'" value="<?php echo $row->id; ?>" />
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other'+counterB+'" rel="rel_price_other'+counterB+'" placeholder="Price Other" value="<?php echo $row->price; ?>"/>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other'+counterC+'" rel="rel_qty_other'+counterC+'" placeholder="Qty" value="<?php echo $row->qty; ?>"/>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <div class="col-sm">
                                     <div class="row">
                                        <div class=".col-12 .col-sm-6 .col-lg-8">
                                          <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other'+counterC+'" rel="rel_unit_other'+counterC+'" placeholder="Unit" value="<?php echo $row->unit; ?>"/>
                                        </div>
                                        <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                          <a href="" id="remove_other"><i class="far fa-times-circle"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div></div>
                              <?php } ?>
                              <?php
                                $iter+=1;}}}?>
                               </div>
                          </div>                        

                          <div class="tab-pane fade" id="custom-content-below-driver" role="tabpanel" aria-labelledby="custom-content-below-driver-tab">

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Accept Driver</h4>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Driver<?php echo form_error('driver') ?></label>
                                    <div class="col-sm">
                                     <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="driver" id="driver" placeholder="driver" value="<?php echo $driver ?>" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="staticEmail" class="col-12 col-form-label">Nopol <?php echo form_error('nopol') ?></label>
                                    <div class="col-sm">
                                     <input type="text" class="form-control" name="nopol" id="nopol" placeholder="nopol" value="<?php echo $nopol ?>"/>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    	    <input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
                            <div id="daerahData" class="col-sm" style="text-align: right;">
                              <a style="color: white;" class="btn btn-primary" onclick="deteksi('items');">Next</a> 
                              <a href="<?php echo site_url('index.php/delivery') ?>" class="btn btn-default">Cancel</a>
                            </div>
                            <div style="display: none;" id="daerahItem" class="col-sm" style="text-align: right;">
                              <a style="color: white;" class="btn btn-primary" onclick="deteksi('data');">Prev</a> 
                              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                              <a href="<?php echo site_url('index.php/delivery') ?>" class="btn btn-default">Cancel</a>
                            </div>
                    </form>
              </div><!-- /.box-body -->
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div>
    </div>
  </section>
      <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

      <script>
        $(function () {
            //Initialize Select2 Elements
             $('.select2bs4').select2({
              theme: 'bootstrap4'
            })          
           })
        //if ('<?php //echo $button?>' == 'Update') {
          // document.getElementById("name_pengirim").disabled = true;
          // document.getElementById("address_pengirim").disabled = true;
          // document.getElementById("telephone_pengirim").disabled = true;
          // document.getElementById("name_penerima").disabled = true;
          // document.getElementById("address_penerima").disabled = true;
          // document.getElementById("telephone_penerima").disabled = true;
          // document.getElementById("regencies_id").disabled = true;
          // document.getElementById("districts_id").disabled = true;
          // document.getElementById("villages_id").disabled = true;
          // document.getElementById("wr_penerima_id").disabled = true;
          // document.getElementById("wr_pengirim_id").disabled = true;
        //}
      </script>
      <script>
        $(document).ready(function(){
          var counterA = 1;
          $("#add_kelengkapan").on("click", function(e) {
            e.preventDefault();
            counterA += 1;
            var html_list = '';
            html_list += '<div><div class="row">'+
            '<div class="col-md-4">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan'+counterA+'" rel="rel_name_kelengkapan'+counterA+'" placeholder="Name Item" value="<?php //echo $kelengkapan_name; ?>"  />'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="col-md-2">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<input type="number" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan'+counterA+'" rel="rel_price_kelengkapan'+counterA+'" placeholder="Price Item" value="<?php //echo $kelengkapan_name; ?>"  />'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="col-md-2">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan'+counterA+'" rel="rel_qty_kelengkapan'+counterA+'" placeholder="Qty" value="<?php //echo $kelengkapan_qty; ?>"  />'+
                '</div>'+
              '</div>'+

            '</div>'+
            '<div class="col-md-3">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<div class="row">'+
                    '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                      '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan'+counterA+'" rel="rel_unit_kelengkapan'+counterA+'" placeholder="Unit" value="<?php //echo $kelengkapan_unit; ?>"  />'+
                    '</div>'+
                    '<div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">'+
                      '<a href="" id="remove_kelengkapan"><i class="far fa-times-circle"></i></a>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '</div></div>';
            $('.kelengkapan_field').append(html_list);

            $('.name-kelengkapan').on("focus", function(){
              $("input[rel^='rel_name_kelengkapan']").autocomplete({
                source: "<?php echo base_url()?>index.php/delivery/get_item/kelengkapan",
                select: function (event, ui) {
                  var tar = event.target.id;
                  tar = tar.substr(tar.length - 1);
                  $("input[rel='rel_name_kelengkapan"+tar+"']").val(ui.item.label); 
                  $("input[rel='rel_unit_kelengkapan"+tar+"']").val(ui.item.unit);
                  return false;
                },
              });
            });

          });

          $('.name-kelengkapan').on("focus", function(){
              $("input[rel^='rel_name_kelengkapan']").autocomplete({
                source: "<?php echo base_url()?>index.php/delivery/get_item/kelengkapan",
                select: function (event, ui) {
                  var tar = event.target.id;
                  tar = tar.substr(tar.length - 1);
                  $("input[rel='rel_name_kelengkapan"+tar+"']").val(ui.item.label); 
                  $("input[rel='rel_unit_kelengkapan"+tar+"']").val(ui.item.unit);
                  return false;
                },
              });
            });

          $(".kelengkapan_field").on('click', '#remove_kelengkapan', function(e){
              e.preventDefault();
              // masih cari codingan yg lebih efektif
              $(this).parent().parent().parent().parent().parent().parent('div').remove(); //Remove field html
          });

          var counterB = 1;
          $("#add_item").on("click", function(e) {
            e.preventDefault();
            counterB += 1;
            var html_list = '';
            html_list += 
            '<div><div class="row motor"><div class="col-2 faktur">' +

            '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control faktur-item" autocomplete="off" spellcheck="false" name="faktur_item[]" id="faktur_item'+counterB+'" rel="rel_faktur_item'+counterB+'" placeholder="Faktur" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item'+counterB+'" rel="rel_name_item'+counterB+'" placeholder="Name Item" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control nomesin-item" spellcheck="false" name="nomesin_item[]" id="nomesin_item'+counterB+'" rel="rel_nomesin_item'+counterB+'" placeholder="No. Mesin" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

             '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control norangka-item" spellcheck="false" name="norangka_item[]" id="norangka_item'+counterB+'" rel="rel_norangka_item'+counterB+'" placeholder="No. Mesin" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-2 price">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item'+counterB+'" rel="rel_price_item'+counterB+'" placeholder="Price Item" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-1">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item'+counterB+'" rel="rel_qty_item'+counterB+'" placeholder="Qty" value="1" readonly/>' +
                '</div>' +
              '</div>' +
            

            '</div>' +
            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<div class="row">' +
                      '<div class="col-6">' +
                      '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item'+counterB+'" rel="rel_unit_item'+counterB+'" placeholder="Unit" value="<?php //echo $item_unit; ?>" readonly/>' +
                      '</div>' +
                      '<div class="col-4" style="margin-left: 0px; margin-top: 5px;">' +
                      '<a href="" id="remove_item_add"><i class="far fa-times-circle"></i></a>'+
                      '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div></div></div>';
            $('.item_field').append(html_list);

            $('.name-item').on("focus", function(){
              $("input[rel^='rel_name_item']").autocomplete({
                source: "<?php echo base_url()?>index.php/delivery/get_item/motor",
                select: function (event, ui) {
                  var tar = event.target.id;
                  tar = tar.substr(tar.length - 1);
                  $("input[rel='rel_name_item"+tar+"']").val(ui.item.label); 
                  $("input[rel='rel_unit_item"+tar+"']").val(ui.item.unit);
                  $("input[rel='rel_qty_item"+tar+"']").val('1');
                  return false;
                },
              });
            });



          });

          $('.name-item').on("focus", function(){
              $("input[rel^='rel_name_item']").autocomplete({
                source: "<?php echo base_url()?>index.php/delivery/get_item/motor",
                select: function (event, ui) {
                  var tar = event.target.id;
                  tar = tar.substr(tar.length - 1);
                  $("input[rel='rel_name_item"+tar+"']").val(ui.item.label); 
                  $("input[rel='rel_unit_item"+tar+"']").val(ui.item.unit);
                  $("input[rel='rel_qty_item"+tar+"']").val('1');
                  return false;
                },
              });
            });

          $('.name-item').on("keyup", function(){
              
                  var nama_motor=document.getElementById("name_item1").value;  
                  var qty_motor =0;
                  if(nama_motor==""){
                     $("input[rel='rel_qty_item1']").val('0');
                  }
            });

          //$(".item_field").on('click', '#remove_item_add', function(e){
          //    e.preventDefault();
          //    // masih cari codingan yg lebih efektif
         //     $(this).parent().parent().parent().parent().parent().parent('div').remove(); //Remove field html
         // });



          var counterC = 1;
          $("#add_other").on("click", function(e) {
            e.preventDefault();
            counterC += 1;
            var html_list = '';
            html_list += '<div><div class="row">'+
              '<div class="col-md-4">'+
                '<div class="form-group">'+
                  '<div class="col-sm">'+
                    '<input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other'+counterC+'" rel="rel_name_other'+counterC+'" placeholder="Name Item" value="<?php //echo $other_name; ?>" />'+
                  '</div>'+
                '</div>'+
              '</div>'+

              '<div class="col-md-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other'+counterB+'" rel="rel_price_other'+counterB+'" placeholder="Price Other" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

              '<div class="col-md-2">'+
                '<div class="form-group">'+
                  '<div class="col-sm">'+
                    '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other'+counterC+'" rel="rel_qty_other'+counterC+'" placeholder="Qty" value="<?php //echo $other_qty; ?>" />'+
                  '</div>'+
                '</div>'+

              '</div>'+
              '<div class="col-md-3">'+
                '<div class="form-group">'+
                  '<div class="col-sm">'+
                   '<div class="row">'+
                      '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                        '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other'+counterC+'" rel="rel_unit_other'+counterC+'" placeholder="Unit" value="<?php //echo $other_unit; ?>" />'+
                      '</div>'+
                      '<div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">'+
                        '<a href="" id="remove_other"><i class="far fa-times-circle"></i></a>'+
                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div></div>';
            $('.other_field').append(html_list);
          });

          $(".other_field").on('click', '#remove_other', function(e){
              e.preventDefault();
              // masih cari codingan yg lebih efektif
              $(this).parent().parent().parent().parent().parent().parent('div').remove(); //Remove field html
          });

            $( "#name_pengirim" ).autocomplete({
              source: "<?php echo base_url()?>index.php/customer/get_all_customer/",

              select: function (event, ui) {
                $('[name="name_pengirim"]').val(ui.item.label); 
                $('[name="address_pengirim"]').val(ui.item.address); 
                $('[name="telephone_pengirim"]').val(ui.item.telephone); 
                return false;
              },
            });

            $( "#name_penerima" ).autocomplete({
              source: "<?php echo base_url()?>index.php/customer/get_all_customer/",

              select: function (event, ui) {
                $('[name="name_penerima"]').val(ui.item.label); 
                $('[name="address_penerima"]').val(ui.item.address); 
                $('[name="telephone_penerima"]').val(ui.item.telephone);
                return false;
              },
            });

            $( "#driver" ).autocomplete({
              source: "<?php echo base_url()?>index.php/driver/get_all_driver/",

              select: function (event, ui) {
                $('[name="driver"]').val(ui.item.label); 
                return false;
              },
            });

            $( "#nopol" ).autocomplete({
              source: "<?php echo base_url()?>index.php/truck/get_all_nopol/",

              select: function (event, ui) {
                $('[name="nopol"]').val(ui.item.label); 
                return false;
              },
            });

            if ('<?php echo $button?>' != 'Update') {
             // regencies_list();
             // districts_list();
             // villages_list();
            }
            else{

            }
            
            // var val_regencies = document.getElementById("regencies_id").getAttribute('value');
            // var val_districts = document.getElementById("districts_id").getAttribute('value');
            // var val_villages = document.getElementById("villages_id").getAttribute('value');

            var val_regencies = document.getElementById("regencies_id").value;
            var val_districts = document.getElementById("districts_id").value;
            var val_villages = document.getElementById("villages_id").value;

            if (val_regencies != '') {
                document.getElementById("regencies_id").value = val_regencies;
            } else if (val_districts != '') {
              document.getElementById("districts_id").value = val_districts;
            } else if (val_villages != '') {
              document.getElementById("villages_id").value = val_villages;
            }
        });

        function add_item_row(id) {
          var checkBox = document.getElementById(id);
          var x=checkBox.value;
          var jumlah=0;
          var counterB=1;
          var html_jumlah="";
          var res = x.split("|");

          if (checkBox.checked == true){
            jumlah=document.querySelectorAll('input[type="checkbox"]:checked').length
            html_jumlah+="jumlah total motor terpilih: "+jumlah+" Unit";
            counterB += 1;
            remove_id="remove_row('"+id+"')"
            var html_list = '';
            html_list += 
            '<div id="row'+id+'"><div class="row motor"><div class="col-2 faktur">' +

            '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control faktur-item" autocomplete="off" spellcheck="false" name="faktur_item[]" id="faktur_item'+counterB+'" rel="rel_faktur_item'+counterB+'" placeholder="Faktur" value="'+res[0]+'" />' +
                   '<input type="hidden" name="bike_id_item[]" id="bike_id_item'+counterB+'" rel="rel_bike_id_item'+counterB+'" value="'+res[4]+'"/>'+ 
                '</div>' +
              '</div>' +
            '</div>' +



            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item'+counterB+'" rel="rel_name_item'+counterB+'" placeholder="Name Item" value="'+res[1]+'" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control nomesin-item" spellcheck="false" name="nomesin_item[]" id="nomesin_item'+counterB+'" rel="rel_nomesin_item'+counterB+'" placeholder="No. Mesin" value="'+res[3]+'" />' +
                '</div>' +
              '</div>' +
            '</div>' +

             '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control norangka-item" spellcheck="false" name="norangka_item[]" id="norangka_item'+counterB+'" rel="rel_norangka_item'+counterB+'" placeholder="No. Mesin" value="'+res[2]+'" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-2 price">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item'+counterB+'" rel="rel_price_item'+counterB+'" placeholder="Price Item" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-1">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item'+counterB+'" rel="rel_qty_item'+counterB+'" placeholder="Qty" value="1" readonly/>' +
                '</div>' +
              '</div>' +
            

            '</div>' +
            '<div class="col-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<div class="row">' +
                      '<div class="col-6">' +
                      '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item'+counterB+'" rel="rel_unit_item'+counterB+'" placeholder="Unit" value="UNIT" readonly/>' +
                      '</div>' +
                      '<div class="col-4" style="margin-left: 0px; margin-top: 5px;">' +
                      '<a href="#" id="remove_item_add" onclick="'+remove_id+'"><i class="far fa-times-circle"></i></a>'+
                      '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div></div></div>';
            $('.item_field').append(html_list);
            document.getElementById("jumlah_unit").innerHTML=html_jumlah;
            

          } else {
            jumlah=document.querySelectorAll('input[type="checkbox"]:checked').length
            html_jumlah+="jumlah total motor terpilih: "+jumlah+" Unit";
            document.getElementById("jumlah_unit").innerHTML=html_jumlah;
            document.getElementById("row"+id).remove();
          }
        }

        function remove_row(id) {
          var jumlah=0;
          var html_jumlah="";
          document.getElementById("data"+id).style.display = 'block';
          document.getElementById("row"+id).remove();
          document.getElementById(id).checked = false;
           
          jumlah=document.querySelectorAll('input[type="checkbox"]:checked').length
            html_jumlah+="jumlah total motor terpilih: "+jumlah+" Unit";
            document.getElementById("jumlah_unit").innerHTML=html_jumlah;
        }


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



          function fill_data_pengirim(){
            var elem = document.getElementById("pengirim_id");
            var id = elem.options[elem.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_cutomer/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var i=0;
                  var address = data.address;
                  var telephone= data.telephone;
                  var nama=data.name;
                  $('#address_pengirim').val(address);
                  $('#telephone_pengirim').val(telephone);
                  $('#name_pengirim').val(nama);
                  

                }
            });
          }


          function fill_data_penerima(){
            var elem = document.getElementById("penerima_id");
            var id = elem.options[elem.selectedIndex].value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_cutomer/'+id,
                async : false,
                dataType : 'json',
                success : function(data){
                  var i=0;
                  var address = data.address;
                  var telephone= data.telephone;
                  var nama=data.name;
                  var regencies_id = data.regencies_id;              
                  var districts_id = data.districts_id;                 
                  var villages_id = data.villages_id;
                  

                  $('#address_penerima').val(address);
                  $('#telephone_penerima').val(telephone);
                  $('#name_penerima').val(nama);
                  $('#regencies_id').val(regencies_id);
                  districts_list(regencies_id);
                  $('#districts_id').val(districts_id);
                  villages_list(districts_id)
                  $('#villages_id').val(villages_id);
                            
                  

                }
            });
          }
      </script>

      <script type="text/javascript">
        var pilihDaerah = 'data';
        function deteksi(daerah){
          pilihDaerah = daerah;
          if(pilihDaerah.localeCompare('data')==0){
            document.getElementById('daerahData').style.display = 'block';
            document.getElementById('daerahItem').style.display = 'none';

            document.getElementById('custom-content-below-home').style.display = 'block';
            document.getElementById('custom-content-below-profile').style.display = 'none';
          }
          else{
            var elem = document.getElementById("penerima_id");
            var elem2 = document.getElementById("pengirim_id");
            var elem3 = document.getElementById("wr_penerima_id");
            var elem4 = document.getElementById("wr_pengirim_id");
            var elem5 = document.getElementById("regencies_id");
            var elem6 = document.getElementById("districts_id");
            var elem7 = document.getElementById("villages_id");
            var penerima = elem.options[elem.selectedIndex].value;
            var pengirim = elem2.options[elem2.selectedIndex].value;
            var wr_penerima = elem3.options[elem3.selectedIndex].value;
            var wr_pengirim = elem4.options[elem4.selectedIndex].value;
            var regencies = elem5.options[elem5.selectedIndex].value;
            var districts = elem6.options[elem6.selectedIndex].value;
            var villages = elem7.options[elem7.selectedIndex].value;

            
            if(pengirim==''){
              alert('Data Pengirim Tidak Boleh Kosong');
            }
            else if(wr_pengirim==''){
              alert('Warehouse Pengirim Tidak Boleh Kosong');              
            }
            else if(penerima==''){
              alert('Data Penerima Tidak Boleh Kosong');
            }
            else if(wr_penerima==''){
              alert('Warehouse Penerima Tidak Boleh Kosong');              
            } 
            else if(pengirim==penerima){
                alert('Data Penerima Dan Pengirim Harus Berbeda');
                $('#address_penerima').val('');
                $('#telephone_penerima').val('');
                $('#name_penerima').val('');
            }
            else if(wr_pengirim==wr_penerima){
              alert('Warehouse Penerima Dan Warehouse pengirim Harus Berbeda');
            }
            else if(regencies==''){
              alert('Kota / Kabupaten Penerima Tidak Boleh Kosong');              
            }
            else if(districts==''){
              alert('Kecamatan Penerima Tidak Boleh Kosong');              
            }
            else if(villages==''){
              alert('Desa Penerima Tidak Boleh Kosong');              
            }
            
            else{    
                document.getElementById('daerahData').style.display = 'none';
                document.getElementById('daerahItem').style.display = 'block';
                document.getElementById('custom-content-below-home').style.display = 'none';
                document.getElementById('custom-content-below-profile').style.display = 'block';
           }

          }
        }
      </script>