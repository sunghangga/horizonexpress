<!-- Main content -->
      <section class='content'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-header'>
                  <h3 class='card-title'>CHECK</h3>
                </div>
                  <div class='card-body'>
                    <div class='row'>
                      <div class='col-12'>
                          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                                <div class='form-group row'>
                                  <label for='label' class='col-sm-2 col-form-label'>Kode <?php echo form_error('kode') ?></label>
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
                                <div class='form-group row'>
                                  <label for='label' class='col-sm-2 col-form-label'>Examiner <?php echo form_error('examiner') ?></label>
                                    <div class='col-sm-10'><input type="text" class="form-control" name="examiner" id="examiner" placeholder="Examiner" value="<?php echo $examiner; ?>" />
                                   </div> 
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-sm-2 col-form-label">Date Check</label>
                                    <div class="col-sm-4 input-group date" data-target-input="nearest" id="inputDate">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#inputDate" placeholder="Date Check"  name="date_item" id="date_item" value="<?php echo $date_check; ?>" />
                                      <div class="input-group-append" data-target="#inputDate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                      </div>
                                    </div>
                                  </div>

                                <div id="show_detail">
                                  
                                </div>

                              <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                              <?php
                                if($button == 'Update'){
                              ?>
                                <input type="hidden" name="kode" value="<?php echo $kode;?>">
                              <?php    
                                }
                              ?>
                           <div style='text-align: right;'> 
                                                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                              <a href="<?php echo site_url('index.php/check') ?>" class="btn btn-default">Cancel</a>
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
            $('.date').datetimepicker({
                  format: 'YYYY-MM-DD'
            })    
            if ('<?php echo $button?>' == 'Update') {
              document.getElementById("kode").disabled = true;
            }   
           })

          function show_data(){
            var x = document.getElementById("kode").value;

            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>index.php/delivery/get_check_item_read/'+x,
                async : false,
                dataType : 'json',
                success : function(data){
                  var html = '';
                  var i;
                  
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) {
                      if(data[i].category == 1){
                      //  for (var j = 0; j < data[i].qty; j++) {
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
                              '<input type="hidden" class="form-control" name="id_detail[]" value="'+data[i].id+'" disabled/>'+
                              '<input type="hidden" class="form-control" name="category_item[]" value="'+data[i].category+'"/>'+
                              '<input type="text" class="form-control name-item" autocomplete="off" spellcheck="false" name="name_item[]" id="name_item'+data[i].id+iter.toString()+'" rel="rel_name_item1" placeholder="Name Item" value="'+data[i].name+'"/>'+
                            '</div>'+
                          '</div>'+
                        '</div>';

                        html += '<div class="col-2">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-form-label">Status</label>';
                            }

                            // html += '<select class="form-control select2bs4" id="status_item'+data[i].id+iter.toString()+'" name="status_item[]">'+
                            //             '<option value="0">TIDAK RUSAK</option>'+
                            //             '<option value="1">RUSAK</option>'+
                            //           '</select>'+
                          if('<?php echo $button?>' == 'Update'){
                              html += '<select class="form-control select2bs4" value='+data[i].status+' id="status_item'+data[i].id+iter.toString()+'" name="status_item[]">';
                                        if(data[i].status == 1){
                                           html +='<option value="1" selected>RUSAK</option>'+
                                          '<option value="0" >TIDAK RUSAK</option>';  
                                        }
                                        else{
                                           html +='<option value="0" selected>TIDAK RUSAK</option>'+
                                          '<option value="1" > RUSAK</option>'; 
                                        }
                                       html +='</select>';
                            }
                          else{
                            html += '<select class="form-control select2bs4" id="status_item'+data[i].id+iter.toString()+'" name="status_item[]">'+
                                        '<option value="0">TIDAK RUSAK</option>'+
                                        '<option value="1">RUSAK</option>'+
                                      '</select>';
                          }
                          html += '</div>'+
                        '</div>';

                        html += '<div class="col-6">'+
                          '<div class="form-group">';
                          html += '<div class="col-sm">'+
                              '<div class="row">';
                              if (iter == 0) {
                                html += '<div class=".col-6 .col-lg-4" style="margin-top: 38px;">';
                              }
                              else{
                                html += '<div class=".col-6 .col-lg-4">';
                              }
                                    html += '<a class=" btn btn-warning" data-id="add_data_item'+data[i].id+iter.toString()+'" data-toggle="modal" data-target="#ModalItem'+data[i].id+iter.toString()+'"><i class="fas fa-wrench"></i></a>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>'+
                        // start modal
                        '<div class="modal fade" id="ModalItem'+data[i].id+iter.toString()+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                          '<div class="modal-dialog" role="document">'+
                            '<div class="modal-content">'+
                              '<div class="modal-header">'+
                                '<h5 class="modal-title" id="exampleModalLabel">Form Detail Check</h5>'+
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                  '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                              '</div>'+
                              '<div class="modal-body">'+
                                  '<div class="form-group">'+
                                  '<input type="hidden" name="itemID[]" value='+data[i].id+">";
                                    if('<?php echo $button?>' == 'Update'){ 
                                      html += '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                      '<br><img style="max-width: 450px; max-height: 450px" src="<?php echo base_url() ?>upload/check/'+data[i].foto+'"/>'+
                                    '<input type="file" class="form-control" name="foto[]" id="foto'+data[i].id+iter.toString()+'" value="'+data[i].foto+'" />'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_item'+data[i].id+iter.toString()+'" name="gejala_item[]" value="'+data[i].gejala+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_item'+data[i].id+iter.toString()+'" name="penyebab_item[]" value="'+data[i].penyebab+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_item'+data[i].id+iter.toString()+'" name="engine_item[]" value="'+data[i].engine+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_item'+data[i].id+iter.toString()+'" name="frame_item[]" value="'+data[i].frame+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_item'+data[i].id+iter.toString()+'" name="type_item[]" value="'+data[i].type+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_item'+data[i].id+iter.toString()+'" name="solusi_item[]" value="'+data[i].solusi+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_item'+data[i].id+iter.toString()+'" name="keterangan_item[]" >'+data[i].keterangan+'</textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                                    }
                                    else{
                                      html += '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                    '<input type="file" class="form-control" name="foto[]" id="foto'+data[i].id+iter.toString()+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_item'+data[i].id+iter.toString()+'" name="gejala_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_item'+data[i].id+iter.toString()+'" name="penyebab_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_item'+data[i].id+iter.toString()+'" name="engine_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_item'+data[i].id+iter.toString()+'" name="frame_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_item'+data[i].id+iter.toString()+'" name="type_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_item'+data[i].id+iter.toString()+'" name="solusi_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_item'+data[i].id+iter.toString()+'" name="keterangan_item[]"></textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';  
                                    }
                                    
                        // end modal
                        
                      iter += 1;
                       // }
                      }
                    }
                    html += '</div>';

                    
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) {
                      if(data[i].category == 2){
                       // for (var j = 0; j < data[i].qty; j++) {
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
                        '<input type="hidden" class="form-control" name="category_item[]" value="'+data[i].category+'"/>'+
                          '<input type="text" class="form-control name-kelengkapan" autocomplete="off" spellcheck="false" name="name_item[]" id="name_kelengkapan'+data[i].id+iter.toString()+'" rel="rel_name_kelengkapan1" placeholder="Name Item" value="'+data[i].name+'"/>'+
                        '</div>'+
                      '</div>'+
                    '</div>';

                        html += '<div class="col-2">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-form-label">Status</label>';
                            }
                            // html += '<select class="form-control select2bs4" id="status_kelengkapan'+data[i].id+iter.toString()+'" name="status_item[]">'+
                            //             '<option value="0">TIDAK RUSAK</option>'+
                            //             '<option value="1">RUSAK</option>'+
                            //           '</select>'+
                            if('<?php echo $button?>' == 'Update'){
                              html += '<select class="form-control select2bs4" value='+data[i].status+' id="status_kelengkapan'+data[i].id+iter.toString()+'" name="status_item[]">';
                                        if(data[i].status == 1){
                                           html +='<option value="1" selected>RUSAK</option>'+
                                          '<option value="0" >TIDAK RUSAK</option>';  
                                        }
                                        else{
                                           html +='<option value="0" selected>TIDAK RUSAK</option>'+
                                          '<option value="1" > RUSAK</option>'; 
                                        }
                                       html +='</select>';
                            }
                            else{
                            html += '<select class="form-control select2bs4" id="status_kelengkapan'+data[i].id+iter.toString()+'" name="status_item[]">'+
                                        '<option value="0">TIDAK RUSAK</option>'+
                                        '<option value="1">RUSAK</option>'+
                                      '</select>';
                            }
                          html +='</div>'+
                        '</div>';

                        html += '<div class="col-6">'+
                          '<div class="form-group">';
                            html += '<div class="col-sm">'+
                              '<div class="row">';
                              if (iter == 0) {
                                html += '<div class=".col-6 .col-lg-4" style="margin-top: 38px;">';
                              }
                              else{
                                html += '<div class=".col-6 .col-lg-4">';
                              }
                                    html += '<a class=" btn btn-warning" data-id="add_data_kelengkapan'+data[i].id+iter.toString()+'" data-toggle="modal" data-target="#ModalKelengkapan'+data[i].id+iter.toString()+'"><i class="fas fa-wrench"></i></a>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>'+
                        // start modal
                        '<div class="modal fade" id="ModalKelengkapan'+data[i].id+iter.toString()+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                          '<div class="modal-dialog" role="document">'+
                            '<div class="modal-content">'+
                              '<div class="modal-header">'+
                                '<h5 class="modal-title" id="exampleModalLabel">Form Detail Check</h5>'+
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                  '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                              '</div>'+
                              '<div class="modal-body">'+
                                  '<div class="form-group">'+
                                    '<input type="hidden" name="itemID[]" value='+data[i].id+">";
                                    if('<?php echo $button?>' == 'Update'){
                                    html += '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                    '<br><img style="max-width: 450px; max-height: 450px" src="<?php echo base_url() ?>upload/check/'+data[i].foto+'"/>'+ 
                                    '<input type="file" class="form-control" name="foto[]" id="foto_kelengkapan'+data[i].id+iter.toString()+'" value="'+data[i].foto+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_kelengkapan'+data[i].id+iter.toString()+'" name="gejala_item[]" value="'+data[i].gejala+'"/> '+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_kelengkapan'+data[i].id+iter.toString()+'" name="penyebab_item[]" value="'+data[i].penyebab+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_kelengkapan'+data[i].id+iter.toString()+'" name="engine_item[]" value="'+data[i].engine+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_kelengkapan'+data[i].id+iter.toString()+'" name="frame_item[]" value="'+data[i].frame+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_kelengkapan'+data[i].id+iter.toString()+'" name="type_item[]" value="'+data[i].type+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_kelengkapan'+data[i].id+iter.toString()+'" name="solusi_item[]" value="'+data[i].solusi+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_kelengkapan'+data[i].id+iter.toString()+'" name="keterangan_item[]">'+data[i].keterangan+'</textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                                    }
                                    else{
                                    html += '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                    '<input type="file" class="form-control" name="foto[]" id="foto_kelengkapan'+data[i].id+iter.toString()+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_kelengkapan'+data[i].id+iter.toString()+'" name="gejala_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_kelengkapan'+data[i].id+iter.toString()+'" name="penyebab_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_kelengkapan'+data[i].id+iter.toString()+'" name="engine_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_kelengkapan'+data[i].id+iter.toString()+'" name="frame_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_kelengkapan'+data[i].id+iter.toString()+'" name="type_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_kelengkapan'+data[i].id+iter.toString()+'" name="solusi_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_kelengkapan'+data[i].id+iter.toString()+'" name="keterangan_item[]"></textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                                    }
                                    
                        // end modal
                        
                      iter += 1;
                     //   }
                      }
                    }
                    html += '</div>';
                    
                    var iter = 0;
                    for (var i = 0; i < data.length; i++) { 
                      if(data[i].category == 0){
                       // for (var j = 0; j < data[i].qty; j++) { 
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
                       '<input type="hidden" class="form-control" name="category_item[]" value="'+data[i].category+'"/>'+
                          '<input type="text" class="form-control name-other" autocomplete="off" spellcheck="false" name="name_item[]" id="name_other'+data[i].id+iter.toString()+'" rel="rel_name_other1" placeholder="Name Item" value="'+data[i].name+'"/>'+ 
                        '</div>'+
                      '</div>'+ 
                    '</div>'; 

                        html += '<div class="col-2">'+
                          '<div class="form-group">';
                            if(iter == 0){
                            html += '<label for="staticEmail" class="col-form-label">Status</label>';
                            }
                        //     html += '<select class="form-control select2bs4" id="status_other'+data[i].id+iter.toString()+'" name="status_item[]">'+
                        //                 '<option value="0">TIDAK RUSAK</option>'+
                        //                 '<option value="1">RUSAK</option>'+
                        //               '</select>'+
                        //   '</div>'+
                        // '</div>';
                        if('<?php echo $button?>' == 'Update'){
                              html += '<select class="form-control select2bs4" value='+data[i].status+' id="status_other'+data[i].id+iter.toString()+'" name="status_item[]">';
                                        if(data[i].status == 1){
                                           html +='<option value="1" selected>RUSAK</option>'+
                                          '<option value="0" >TIDAK RUSAK</option>';  
                                        }
                                        else{
                                           html +='<option value="0" selected>TIDAK RUSAK</option>'+
                                          '<option value="1" > RUSAK</option>'; 
                                        }
                                       html +='</select>';
                            }
                          else{
                            html += '<select class="form-control select2bs4" id="status_other'+data[i].id+iter.toString()+'" name="status_item[]">'+
                                        '<option value="0">TIDAK RUSAK</option>'+
                                        '<option value="1">RUSAK</option>'+
                                      '</select>';
                          }
                          html += '</div>'+ 
                        '</div>';

                        html += '<div class="col-6">'+
                          '<div class="form-group">';
                            html += '<div class="col-sm">'+
                              '<div class="row">';
                              if (iter == 0) {
                                html += '<div class=".col-6 .col-lg-4" style="margin-top: 38px;">';
                              }
                              else{
                                html += '<div class=".col-6 .col-lg-4">';
                              }
                                    html += '<a class=" btn btn-warning" data-id="add_data_other'+data[i].id+iter.toString()+'" data-toggle="modal" data-target="#ModalOther'+data[i].id+iter.toString()+'"><i class="fas fa-wrench"></i></a>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>'+
                        // start modal
                        '<div class="modal fade" id="ModalOther'+data[i].id+iter.toString()+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                          '<div class="modal-dialog" role="document">'+
                            '<div class="modal-content">'+
                              '<div class="modal-header">'+
                                '<h5 class="modal-title" id="exampleModalLabel">Form Detail Check</h5>'+
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                  '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                              '</div>'+
                              '<div class="modal-body">'+
                                  '<div class="form-group">'+ 
                                    '<input type="hidden" name="itemID[]" value='+data[i].id+">";
                                    if('<?php echo $button?>' == 'Update'){ 
                                      html +=
                                    '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                    '<br><img style="max-width: 450px; max-height: 450px" src="<?php echo base_url() ?>upload/check/'+data[i].foto+'"/>'+ 
                                    '<input type="file" class="form-control" name="foto[]" id="foto_other'+data[i].id+iter.toString()+'" value="'+data[i].foto+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_other'+data[i].id+iter.toString()+'" name="gejala_item[]" value="'+data[i].gejala+'" >'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_other'+data[i].id+iter.toString()+'" name="penyebab_item[]" value="'+data[i].penyebab+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_other'+data[i].id+iter.toString()+'" name="engine_item[]" value="'+data[i].engine+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_other'+data[i].id+iter.toString()+'" name="frame_item[]" value="'+data[i].frame+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_other'+data[i].id+iter.toString()+'" name="type_item[]" value="'+data[i].type+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_other'+data[i].id+iter.toString()+'" name="solusi_item[]" value="'+data[i].solusi+'">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_other'+data[i].id+iter.toString()+'" name="keterangan_item[]">'+data[i].keterangan+'</textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                                    }
                                    else{
                                      html +=
                                    '<label for="recipient-name" class="col-form-label">Foto Kerusakan</label>'+
                                    '<input type="file" class="form-control" name="foto[]" id="foto_other'+data[i].id+iter.toString()+'"/>'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Gejala</label>'+
                                    '<input type="text" class="form-control" id="gejala_other'+data[i].id+iter.toString()+'" name="gejala_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Penyebab</label>'+
                                    '<input type="text" class="form-control" id="penyebab_other'+data[i].id+iter.toString()+'" name="penyebab_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Engine</label>'+
                                    '<input type="text" class="form-control" id="engine_other'+data[i].id+iter.toString()+'" name="engine_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">No. Frame</label>'+
                                    '<input type="text" class="form-control" id="frame_other'+data[i].id+iter.toString()+'" name="frame_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Type</label>'+
                                    '<input type="text" class="form-control" id="type_other'+data[i].id+iter.toString()+'" name="type_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="recipient-name" class="col-form-label">Solusi dari Dealer</label>'+
                                    '<input type="text" class="form-control" id="solusi_other'+data[i].id+iter.toString()+'" name="solusi_item[]">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                    '<label for="message-text" class="col-form-label">Keterangan</label>'+
                                    '<textarea class="form-control" id="keterangan_other'+data[i].id+iter.toString()+'" name="keterangan_item[]"></textarea>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                                    }
                                    
                        // end modal
                        
                      iter += 1;
                      //  }
                      }
                    }
                    html += '</div>';

                  $('#show_detail').html(html);
                }
            });
          }

        </script>
        </section><!-- /.content