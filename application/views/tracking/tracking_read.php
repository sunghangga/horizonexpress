      <section class='content'>
        <div class="container-fluid">
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                
                  <h3 class='card-title'>TRACKING</h3>
                  </div>
                      <div class='card-body'>
                        <form action="<?php echo $action; ?>" method="post">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Data</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Items</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-driver" role="tab" aria-controls="custom-content-below-driver" aria-selected="false">Accept Driver</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="custom-content-below-tabContent">
                          <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Data Pengirim</h4>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name Pengirim <?php echo form_error('name_pengirim') ?></label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="name_pengirim" id="name_pengirim" placeholder="Name Pengirim" value="<?php echo $name_pengirim; ?>" />
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
                                  <label for="staticEmail" class="col-12 col-form-label">Warehouse Pengirim <?php echo form_error('telephone_driver') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" id="wr_pengirim_id" name="wr_pengirim_id">
                                        <?php if($wr_pengirim_id != null){ 
                                             echo '<option value="'.$wr_pengirim_id.'" selected>'.$wr_pengirim_name.'</option>';
                                         } 
                                        foreach ($get_wr as $row)
                                            {
                                              if($wr_pengirim_id != $row->id){
                                                if ($row->name == "RUTENG" && $wr_pengirim_id == null) {
                                                  echo '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
                                                }
                                                else {
                                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                }
                                              }
                                            } ?>
                                        >
                                      </select>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <h4 class="mt-6 ">Data Penerima</h4>
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name Penerima <?php echo form_error('name_penerima') ?></label>
                                  <div class="col-sm">
                                   <input type="text" class="form-control" name="name_penerima" id="name_penerima" placeholder="Name Penerima" value="<?php echo $name_penerima; ?>" />
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
                                        <?php if($wr_penerima_id != null){ 
                                             echo '<option value="'.$wr_penerima_id.'">'.$wr_penerima_name.'</option>';
                                         } 
                                        foreach ($get_wr as $row)
                                            {
                                              if($wr_penerima_id != $row->id){
                                                if ($row->name == "GDG POH GADING" && $wr_penerima_id == null) {
                                                  echo '<option value="'.$row->id.'" selected>'.$row->name.'</option>';
                                                }
                                                else {
                                                  echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                }
                                              }
                                            } ?>
                                        >
                                      </select>
                                  </div>
                                </div>
                                <!--<div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Price (Rp)<?php echo form_error('price') ?></label>
                                  <div class="col-sm">
                                   <input type="number" class="form-control" name="price" id="price" placeholder="Price" value="<?php // echo $price; ?>" />
                                  </div>
                                </div>-->
                              </div>
                            </div> 
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Regencies <?php echo form_error('regencies_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" onchange="districts_list()" name="regencies_id" id="regencies_id" placeholder="Regencies" value="<?php echo $regencies_id; ?>" /></select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Districts <?php echo form_error('districts_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" onchange="villages_list()" name="districts_id" id="districts_id" placeholder="Districts" value="<?php echo $districts_id; ?>" /></select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Villages <?php echo form_error('villages_id') ?></label>
                                  <div class="col-sm">
                                   <select class="form-control select2bs4" name="villages_id" id="villages_id" placeholder="Villages" value="<?php echo $villages_id; ?>" /></select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Data Items</h4>
                              </div>
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row)
                                if ($row->category == 1) {
                              { ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name</label>
                                <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item1" rel="rel_name_item1" placeholder="Name Item" value="<?php echo $row->name;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item" rel="rel_price_item" placeholder="Price Item" value="<?php echo $row->price;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item1" rel="rel_qty_item1" placeholder="Qty" value="<?php echo $row->qty;?>" disabled/>
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
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item1" rel="rel_unit_item1" placeholder="Unit" value="<?php echo $row->unit;?>" disabled/>
                                      </div>
                                      <?php if($iter == 0) { ?>
                                      <!-- <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_item"><i class="fas fa-plus"></i></a>
                                      </div> -->
                                    <?php }?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                                $iter+=1;}}}
                                else if ($button == "Create"){
                              ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Name</label>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item1" rel="rel_name_item1" placeholder="Name Item"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item" rel="rel_price_item" placeholder="Price Item"/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item1" rel="rel_qty_item1" placeholder="Qty"/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="staticEmail" class="col-8 col-form-label">Unit</label>
                                  <div class="col-sm">
                                    <div class="row">
                                      <div class=".col-12 .col-sm-6 .col-lg-8">
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item1" rel="rel_unit_item1" placeholder="Unit"/>
                                      </div>
                                      <div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">
                                        <a href="" class=" btn-sm btn-info" id="add_item"><i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }?>
                              
                            </div>
                              <div class="item_field">
                                
                              </div>

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">KELENGKAPAN</h4>
                              </div>
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row)
                                if ($row->category == 2) {
                              { ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan1" rel="rel_name_kelengkapan1" placeholder="Name Item" value="<?php echo $row->name;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan" rel="rel_price_kelengkapan" placeholder="Price Item" value="<?php echo $row->price;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan1" rel="rel_qty_kelengkapan1" placeholder="Qty" value="<?php echo $row->qty;?>" disabled/>
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
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan1" rel="rel_unit_kelengkapan1" placeholder="Unit" value="<?php echo $row->unit;?>" disabled/>
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
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan1" rel="rel_unit_kelengkapan1" placeholder="Unit" />
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
                                
                              </div>

                            <div class="row">
                              <div class="col-md-12">
                                <h4 class="mt-6 ">Items Other</h4>
                              </div>
                              <?php 
                              $iter = 0;
                              if ($button == "Update") {
                              foreach ($get_delivery_detail_by_id as $row)
                                if ($row->category == 0) {
                              { ?>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Name </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other1" rel="rel_name_other1" placeholder="Name Item" value="<?php echo $row->name;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Price</label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other" rel="rel_price_other" placeholder="Price Other" value="<?php echo $row->price;?>" disabled/>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <?php if($iter == 0){?>
                                  <label for="staticEmail" class="col-12 col-form-label">Qty </label>
                                  <?php }?>
                                  <div class="col-sm">
                                    <input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other1" rel="rel_qty_other1" placeholder="Qty" value="<?php echo $row->qty;?>" disabled/>
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
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other1" rel="rel_unit_other1" placeholder="Unit" value="<?php echo $row->unit;?>" disabled/>
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
                                $iter+=1;}}}
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
                                        <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other1" rel="rel_unit_other1" placeholder="Unit"/>
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
                                     <input type="text" class="form-control" autocomplete="off" spellcheck="false" name="driver" id="driver" placeholder="driver" value="<?php echo $driver ?>" disabled/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="staticEmail" class="col-12 col-form-label">Nopol <?php echo form_error('nopol') ?></label>
                                    <div class="col-sm">
                                     <input type="text" class="form-control" name="nopol" id="nopol" placeholder="nopol" value="<?php echo $nopol ?>" disabled/>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                          <input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
                            <div class="col-sm" style="text-align: right;">
                              <a href="<?php echo site_url('index.php/tracking') ?>" class="btn btn-default">Cancel</a>
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
        if ('<?php echo $button?>' == 'Update') {
          document.getElementById("name_pengirim").disabled = true;
          document.getElementById("address_pengirim").disabled = true;
          document.getElementById("telephone_pengirim").disabled = true;
          document.getElementById("name_penerima").disabled = true;
          document.getElementById("address_penerima").disabled = true;
          document.getElementById("telephone_penerima").disabled = true;
          document.getElementById("regencies_id").disabled = true;
          document.getElementById("districts_id").disabled = true;
          document.getElementById("villages_id").disabled = true;
          document.getElementById("wr_penerima_id").disabled = true;
          document.getElementById("wr_pengirim_id").disabled = true;
        }
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
                  '<input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan'+counterA+'" rel="rel_name_kelengkapan'+counterA+'" placeholder="Name Item" value="<?php //echo $kelengkapan_name; ?>" />'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="col-md-2">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<input type="number" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan'+counterA+'" rel="rel_price_kelengkapan'+counterA+'" placeholder="Price Item" value="<?php //echo $kelengkapan_name; ?>" />'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="col-md-2">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan'+counterA+'" rel="rel_qty_kelengkapan'+counterA+'" placeholder="Qty" value="<?php //echo $kelengkapan_qty; ?>" />'+
                '</div>'+
              '</div>'+

            '</div>'+
            '<div class="col-md-3">'+
              '<div class="form-group">'+
                '<div class="col-sm">'+
                  '<div class="row">'+
                    '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                      '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan'+counterA+'" rel="rel_unit_kelengkapan'+counterA+'" placeholder="Unit" value="<?php //echo $kelengkapan_unit; ?>" />'+
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
          });

          $('.name-kelengkapan').on("focus", function(){
              $("input[rel^='rel_name_kelengkapan']").autocomplete({
                source: "<?php echo base_url()?>delivery/get_item/kelengkapan",
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
            '<div><div class="row"><div class="col-md-4">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item'+counterB+'" rel="rel_name_item'+counterB+'" placeholder="Name Item" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-md-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item'+counterB+'" rel="rel_price_item'+counterB+'" placeholder="Price Item" value="<?php //echo $item_name; ?>" />' +
                '</div>' +
              '</div>' +
            '</div>' +

            '<div class="col-md-2">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item'+counterB+'" rel="rel_qty_item'+counterB+'" placeholder="Qty" value="<?php //echo $item_qty; ?>" />' +
                '</div>' +
              '</div>' +

            '</div>' +
            '<div class="col-md-3">' +
              '<div class="form-group">' +
                '<div class="col-sm">' +
                  '<div class="row">' +
                    '<div class=".col-12 .col-sm-6 .col-lg-8">' +
                      '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item'+counterB+'" rel="rel_unit_item'+counterB+'" placeholder="Unit" value="<?php //echo $item_unit; ?>" />' +
                    '</div>' +
                    '<div class=".col-6 .col-lg-4" style="margin-left: 16px; margin-top: 5px;">' +
                    '<a href="" id="remove_item"><i class="far fa-times-circle"></i></a>'+
                    '</div>' + 
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div></div></div>';
            $('.item_field').append(html_list);
          });

          $('.name-item').on("focus", function(){
              $("input[rel^='rel_name_item']").autocomplete({
                source: "<?php echo base_url()?>delivery/get_item/barang",
                select: function (event, ui) {
                  var tar = event.target.id;
                  tar = tar.substr(tar.length - 1);
                  $("input[rel='rel_name_item"+tar+"']").val(ui.item.label); 
                  $("input[rel='rel_unit_item"+tar+"']").val(ui.item.unit);
                  return false;
                },
              });
            });

          $(".item_field").on('click', '#remove_item', function(e){
              e.preventDefault();
              // masih cari codingan yg lebih efektif
              $(this).parent().parent().parent().parent().parent().parent('div').remove(); //Remove field html
          });

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
                  '<input type="number" class="form-control name-item" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other'+counterB+'" rel="rel_price_other'+counterB+'" placeholder="Price Other" value="<?php //echo $item_name; ?>" />' +
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

            regencies_list();
            districts_list();
            villages_list();
            
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
                  $('#villages_id').html(html);
                }
            });
          }
      </script>