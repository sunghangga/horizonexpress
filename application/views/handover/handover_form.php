<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>BUKTI TANDA TERIMA</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post">
	                         <div class='form-group row'><label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
                                    <div class='col-sm-10'>
                                      <select class="form-control select2bs4" id="kode" name="kode" onchange="show_data()">
                                        <?php if($kode != null){ 
                                             echo '<option value="'.$kode.'">'.$kode.'/'.date('m', strtotime($row->create_at)).'/'.date('Y', strtotime($row->create_at)).'</option>';
                                         } 
                                        foreach ($get_all_kode as $row)
                                            {
                                              if($kode != $row->kode){
                                                echo '<option value="'.$row->kode.'">'.$row->kode.'/'.date('m', strtotime($row->create_at)).'/'.date('Y', strtotime($row->create_at)).'</option>';
                                              }
                                            } ?>
                                        
                                      </select>

                                   </div> 
                                </div>
                                <div id="show_detail">
                                  
                                </div>

                        	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        	 <div style='text-align: right;'> 
                            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        	    <a href="<?php echo site_url('index.php/handover') ?>" class="btn btn-default">Cancel</a>
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
            //Initialize Select2 Elements
             $('.select2bs4').select2({
              theme: 'bootstrap4'
            })  
            if ('<?php echo $button?>' == 'Update') {
              show_data();
              document.getElementById("kode").disabled = true;
            }        
           })

          function show_data(){
            var x = document.getElementById("kode").value;
            var datas = [];
            var uri='url';
            if('<?php echo $button?>' == 'Update'){
              uri='index.php/handover/read_receive/';
            }
            else{
               uri='index.php/delivery/get_delivery_by_id/';
            }
            if('<?php echo $button?>' == 'Update'){
                $.ajax({
                  type : 'ajax',
                  url : '<?php echo base_url()?>'+uri+x,
                  async : false,
                  dataType : 'json',
                  success : function(data){
                    datas = data;
                  }
              });
            
            }

            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>'+uri+x,
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
                        html += '<div class="col-md-6">'+
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
                        html += '<div class="col-md-6">'+
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
                        html += '<div class="col-md-6">'+
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