<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>RECEIVE</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control select2bs4" id="kode" name="kode" onchange="show_data()">
                                        <?php if($kode != null){ 
                                             echo '<option value="'.$kode.'">'.$kode.'</option>';
                                         } 
                                        foreach ($get_all_kode as $row)
                                            {
                                              if($kode != $row->kode){
                                                echo '<option value="'.$row->kode.'">'.$row->kode.'</option>';
                                              }
                                            } ?>
                                        
                                      </select>

                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Receiver <?php echo form_error('receiver') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="receiver" id="receiver" placeholder="Receiver" value="<?php echo $receiver; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>PDI <?php echo form_error('pdi') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="pdi" id="pdi" placeholder="Pdi" value="<?php echo $pdi; ?>" />
                                   </div> 
                                </div>
    <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>PIC <?php echo form_error('pic') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="pic" id="pic" placeholder="Pic" value="<?php echo $pic; ?>" />
                                   </div> 
                                </div>
                                <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Catatan <?php echo form_error('pic') ?></label>
                                    <div class='col-sm-10'><textarea type="text" class="form-control" name="catatan" id="catatan" placeholder="Catatan"/><?php echo $catatan; ?></textarea>
                                   </div> 
                                </div>

                                <div id="show_detail">
                                  
                                </div>

                              <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                           <div style='text-align: right;'>
                              <a href="<?php echo site_url('index.php/receive') ?>" class="btn btn-default">Cancel</a>
                          </div>
                          </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
          <!-- jQuery -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url() ?>template/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
          $(function () {
            show_data();
            document.getElementById("kode").disabled = true;
            document.getElementById("receiver").disabled = true;
            document.getElementById("pic").disabled = true;
            document.getElementById("pdi").disabled = true;
            document.getElementById("catatan").disabled = true;
            //Initialize Select2 Elements
             $('.select2bs4').select2({
              theme: 'bootstrap4'
            })          
           })

          function show_data(){
            var x = document.getElementById("kode").value;
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/receive/read_receive/'+x,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                  
                  
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) {
                      if(data[i].category == 1 && data[i].qty != 0){
                        if(iter == 0){
                          html = '<div class="row">'+
                            '<div class="col-md-12">'+
                              '<h4 class="mt-6 ">Data Items</h4>'+
                            '</div>';
                          }
                        html += '<div class="col-md-4">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Name</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<input type="hidden" class="form-control" name="id_detail[]" value="'+data[i].id+'"/>'+
                              '<input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item'+data[i].id+'" rel="rel_name_item1" placeholder="Name Item" value="'+data[i].name+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                        '<div class="col-md-2">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Price</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<input type="number" class="form-control price-item" autocomplete="off" spellcheck="false" name="price_item[]" id="price_item'+data[i].id+'" rel="rel_price_item" placeholder="Price Item" value="'+data[i].price+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                        '<div class="col-sm-1">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Qty </label>';
                            }
                            html += '<div class="col-sm">'+
                              '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_item[]" id="qty_item'+data[i].id+'" rel="rel_qty_item1" placeholder="Qty" value="'+data[i].qty+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-8 col-form-label">Unit</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_item[]" id="unit_item'+data[i].id+'" rel="rel_unit_item1" placeholder="Unit" value="'+data[i].unit+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Qty Received</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty[]" id="qty_items'+data[i].id+'" rel="rel_unit_item1" placeholder="Qty Receive" value="'+data[i].qty_received+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Description</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="keterangan[]" id="keterangan_item'+data[i].id+'" rel="rel_unit_item1" placeholder="Description" value="'+data[i].keterangan+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                      iter += 1;
                      }
                    }
                    html += '</div>';

                    
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) {
                      if(data[i].category == 2 && data[i].qty != 0){
                        if(iter == 0){
                         html += '<div class="row">'+
                          '<div class="col-md-12">'+
                            '<h4 class="mt-6 ">KELENGKAPAN</h4>'+
                          '</div>';
                        }
                        html += '<div class="col-md-4">'+
                      '<div class="form-group">';
                        if(iter == 0){
                         html += '<label for="staticEmail" class="col-12 col-form-label">Name </label>';
                        }
                        html += '<div class="col-sm">'+
                        '<input type="hidden" class="form-control" name="id_detail[]" value="'+data[i].id+'"/>'+
                          '<input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_kelengkapan[]" id="name_kelengkapan'+data[i].id+'" rel="rel_name_kelengkapan1" placeholder="Name Item" value="'+data[i].name+'" disabled/>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+

                    '<div class="col-md-2">'+
                      '<div class="form-group">';
                        if(iter == 0){
                        html += '<label for="staticEmail" class="col-12 col-form-label">Price</label>';
                        }
                        html += '<div class="col-sm">'+
                          '<input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_kelengkapan[]" id="price_kelengkapan'+data[i].id+'" rel="rel_price_kelengkapan" placeholder="Price Item" value="'+data[i].price+'" disabled/>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+

                    '<div class="col-sm-1">'+
                      '<div class="form-group">';
                        if(iter == 0){
                         html += '<label for="staticEmail" class="col-12 col-form-label">Qty </label>';
                        }
                        html += '<div class="col-sm">'+
                          '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_kelengkapan[]" id="qty_kelengkapan'+data[i].id+'" rel="rel_qty_kelengkapan1" placeholder="Qty" value="'+data[i].qty+'" disabled/>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-sm">'+
                      '<div class="form-group">';
                        if(iter == 0){
                        html += '<label for="staticEmail" class="col-8 col-form-label">Unit</label>';
                        }
                        html += '<div class="col-sm">'+
                          '<div class="row">'+
                            '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                              '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_kelengkapan[]" id="unit_kelengkapan'+data[i].id+'" rel="rel_unit_kelengkapan1" placeholder="Unit" value="'+data[i].unit+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        '</div>'+
                      '</div>';

                      html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Qty Received</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty[]" id="qty_received_item'+data[i].id+'" rel="rel_qty_received_kelengkapan1" placeholder="Qty Receive" value="'+data[i].qty_received+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Description</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="keterangan[]" id="keterangan_kelengkapan'+data[i].id+'" rel="rel_keterangan_kelengkapan1" placeholder="Description" value="'+data[i].keterangan+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                      iter += 1;
                      }
                    }
                    html += '</div>';
                    

                 
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) {
                      if(data[i].category == 0 && data[i].qty != 0){
                        if(iter == 0){
                             html += '<div class="row">'+
                            '<div class="col-md-12">'+
                              '<h4 class="mt-6 ">Item Other</h4>'+
                            '</div>';
                            }
                        html += '<div class="col-md-4">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Name </label>';
                            }
                            html += '<div class="col-sm">'+
                            '<input type="hidden" class="form-control" name="id_detail[]" value="'+data[i].id+'"/>'+
                              '<input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_other[]" id="name_other'+data[i].id+'" rel="rel_name_other1" placeholder="Name Item" value="'+data[i].name+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                        '<div class="col-md-2">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Price</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<input type="number" class="form-control price-kelengkapan" autocomplete="off" spellcheck="false" name="price_other[]" id="price_other'+data[i].id+'" rel="rel_price_other" placeholder="Price Other" value="'+data[i].price+'" disabled/>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                        '<div class="col-sm-1">'+
                          '<div class="form-group">';
                            if(iter == 0){
                             html += '<label for="staticEmail" class="col-12 col-form-label">Qty </label>';
                            }
                            html += '<div class="col-sm">'+
                              '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty_other[]" id="qty_other'+data[i].id+'" rel="rel_qty_other1" placeholder="Qty" value="'+data[i].qty+'" disabled/>'+
                            '</div>'+
                          '</div>'+

                        '</div>'+
                        '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                             html += '<label for="staticEmail" class="col-8 col-form-label">Unit</label>';
                            }
                            html += '<div class="col-sm">'+
                             '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="unit_other[]" id="unit_other'+data[i].id+'" rel="rel_unit_other1" placeholder="Unit" value="'+data[i].unit+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                      '</div>';
                      html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Qty Received</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="number" class="form-control" autocomplete="off" spellcheck="false" name="qty[]" id="qty_received_other'+data[i].id+'" rel="rel_qty_received_other1" placeholder="Qty Receive" value="'+data[i].qty_received+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        html += '<div class="col-sm">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-12 col-form-label">Description</label>';
                            }
                            html += '<div class="col-sm">'+
                              '<div class="row">'+
                                '<div class=".col-12 .col-sm-6 .col-lg-8">'+
                                  '<input type="text" class="form-control" autocomplete="off" spellcheck="false" name="keterangan[]" id="keterangan_other'+data[i].id+'" rel="rel_keterangan_other1" placeholder="Description" value="'+data[i].keterangan+'" disabled/>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                      iter += 1;
                      }
                    }
                    html += '</div>';

                  $('#show_detail').html(html);
                }
            });
          } 
        </script>
        </section><!-- /.content -->