
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Survey Read</h3>
        <table class="table table-bordered">
	    <tr><td>Tanggal</td><td id="svdate"><?php echo $sv_date; ?></td></tr>
	    <tr><td>Status</td><td id="svresult"><?php echo $sv_result; ?></td></tr>
	    <tr><td>Customer</td><td><?php echo $cust_name; ?></td></tr>
	    <tr><td>Salesman</td><td><?php echo $slm_name; ?></td></tr>
	    <tr><td>Motor</td><td><?php echo $itm_name; ?></td></tr>
	    <tr><td>Warna</td><td><?php echo $cl_name; ?></td></tr>
      <tr><td>DP</td><td id="svdpsetor"><?php echo $sv_dpsetor; ?></td></tr>
      <tr><td>Fincoy</td><td><?php echo $fc_code; ?></td></tr>
      <tr><td>Survey No</td><td id="svno"><?php echo $sv_no; ?></td></tr>
      <tr><td>Tanggal Survey</td><td id="svplandate"><?php echo $sv_plandate; ?></td></tr>

      

      <tr><td>Action</td><td>
            <button type="button" class="btn btn-info btn-sm" id="modal_id" data-toggle="modal" data-target="#ModalList"><i class="fa fa-eye"></i></button>
      </td>
    </tr>
	    <tr><td></td><td><a href="<?php echo site_url('survey') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- start ModalListBelumSurvey dan Survey-->
                  <div class="modal fade" id="ModalList" tabindex="-1" role="dialog" aria-labelledby="ModalListLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Details</h4>
                            <h1 class="modal-title" style="color: #6093ca;"><?php echo $sv_no; ?> | <?php echo $sv_result; ?></f></h1>
                            <h4 class="modal-title" style="color: gray;"><f id="createAt"></f></h4>
                          </div>
                          <div class="modal-body">
                                <div style="margin-top: 20px;">
                                  <label class="control-label" style="font-size: 25px;">History</label>
                                  <div id="history_list"></div>
                                </div>
                                <div style="margin-top: 20px;">
                                  <label class="control-label" style="font-size: 25px;">Comments</label>
                                  <div class="badge">
                                    <div style="margin: 20px;">
                                      <!-- start comment design -->
                                      <ul id="cm_list" class="media-list">
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                    </div>
                  </div>
                  <!-- end modal ModalListBelumSurvey dan Survey-->

          <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/bootstrap/js/moment.js"></script>
          <script>
            document.getElementById("svdate").innerHTML = moment(document.getElementById("svdate").value).format('D MMMM YYYY');
            document.getElementById("svplandate").innerHTML = moment(document.getElementById("svplandate").value).format('D MMMM YYYY');
            document.getElementById("svdpsetor").innerHTML = new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(<?php echo $sv_dpsetor; ?>);

            document.getElementById("createAt").innerHTML = 'Created At '+ '<?php echo $ori_by; ?>' + ' on '+ moment('<?php echo $sv_date; ?>').format('D MMMM YYYY');
             
          
          $("#modal_id").on("click", function(e) {
                e.preventDefault();

            history_list('<?php echo $sv_no; ?>','<?php echo $sv_result; ?>');
            comment_list('<?php echo $sv_no; ?>','<?php echo $sv_result; ?>');
          });
          </script>
          <script>
            function comment_list(sv_no,status){
            $.ajax({
                type : 'ajax',
                url : '<?php echo base_url()?>beranda/data_comment/'+sv_no+'/'+status,
                async : false,
                dataType : 'json',
                success : function(data){

                //console.log(data);
                  var html_cm_list = '';
                  var i;
                  for(i=0; i<data.length; i++){
                    if(data[i].foto != null){
                        var img = '<img class="media-object img-circle" src="<?php echo base_url()?>upload/'+data[i].foto+'" alt="profile">';
                    }else{
                      var img =  '<img class="media-object img-circle" src="<?php echo base_url()?>upload/avatar.png" alt="profile">';
                    }
                      html_cm_list += 
                      '<li class="media">'+
                        '<a class="pull-left" href="#">'+img+
                        '</a>'+
                        '<div class="media-body">'+
                        '<h5 class="media-heading text-uppercase reviews">'+data[i].nama+'</h5>'+
                          '<div class="well well-lg" style="padding: 8px;">'+
                              '<p class="media-comment" style="color: black;">'+
                               data[i].text+
                              '</p>'+
                              '<h6 class="media-comment" style="color: gray; margin-bottom: auto;">'+moment(data[i].tgl).format("MMM D, YYYY LT")+' - on '+data[i].category.toUpperCase()+'</h6>'
                          '</div> '+             
                        '</div>'+
                      '</li>';
                  }

                  $('#cm_list').html(html_cm_list);
                  
                }
            });
          }
          function count_comment(svno){
              var count='';
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo base_url()?>beranda/comment_count/'+svno,
                  async : false,
                  dataType : 'json',
                  success : function(data){
                   // console.log(data);
                    return count =data.count;
                  }

              });

              return count;
            }

          function history_list(sv_no,status){
                status = status.toLowerCase();
              $.ajax({
                  type : 'ajax',
                  url : '<?php echo base_url()?>beranda/data_history/'+sv_no,
                  async : false,
                  dataType : 'json',
                  success : function(data){
                  //console.log(data);
                    var html_history_list = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      var textSplit = data[i].text.split(',');
                        html_history_list += 
                         '<div class="badge" style="margin-bottom: 10px;">'+
                          '<div class="row" style="margin-left: 20px; margin-right: 20px; margin-top: 5px; margin-bottom: 5px;">'+
                            '<div class="col-md-6" style="padding: unset;">'+
                              '<label class="control-label label-modal">'+data[i].status.toUpperCase()+'</label><br>'+
                              '<label class="control-label label-gray">'+moment(data[i].create_at).fromNow()+' in this phase</label><br>'+
                              '<label class="text-uppercase" style="color: #99badd;"><span class="glyphicon glyphicon-comment"></span>'+count_comment(data[i].sv_no)+'</label>';
                              if (data[i].status == 'DITOLAK') {
                                html_history_list +='<div class="collapse" id="ModalHistoryDetail'+data[i].id+'">'+
                                '<label class="control-label" style="color: black;">Updated by</label><br>'+
                                  '<p style="color: gray;">'+data[i].username+'</p>'+
                                '<label class="control-label" style="color: black;">Next Step</label><br>'+
                                  '<p style="color: gray;">'+textSplit[2]+'</p>'+
                                  '<label class="control-label" style="color: black;">Description</label><br>'+
                                  '<p style="color: gray;">'+textSplit[1]+'</p>'+
                              '</div>';
                            }
                              else if (data[i].status == 'ACC') {
                               html_history_list += '<div class="collapse" id="ModalHistoryDetail'+data[i].id+'">'+
                               '<label class="control-label" style="color: black;">Updated by</label><br>'+
                                  '<p style="color: gray;">'+data[i].username+'</p>'+
                                '<label class="control-label" style="color: black;">Rencana Tanggal DO</label><br>'+
                                  '<p style="color: gray;">'+textSplit[0]+'</p>'+
                                  '<label class="control-label" style="color: black;">Description</label><br>'+
                                  '<p style="color: gray;">'+textSplit[1]+'</p>'+
                              '</div>';
                            }
                            else if (data[i].status == 'DO') {
                               html_history_list += '<div class="collapse" id="ModalHistoryDetail'+data[i].id+'">'+
                               '<label class="control-label" style="color: black;">Updated by</label><br>'+
                                  '<p style="color: gray;">'+data[i].username+'</p>'+
                                '<label class="control-label" style="color: black;">Tanggal DO (Real)</label><br>'+
                                  '<p style="color: gray;">'+textSplit[0]+'</p>'+
                              '</div>';
                            }
                            else if (data[i].status == 'CANCEL') {
                               html_history_list += '<div class="collapse" id="ModalHistoryDetail'+data[i].id+'">'+
                               '<label class="control-label" style="color: black;">Updated by</label><br>'+
                                  '<p style="color: gray;">'+data[i].username+'</p>'+
                                  '<label class="control-label" style="color: black;">Description</label><br>'+
                                  '<p style="color: gray;">'+textSplit[1]+'</p>'+
                              '</div>';
                            }
                            else if (data[i].status == 'PROGRESS' || data[i].status == 'PENDING') {
                               html_history_list += '<div class="collapse" id="ModalHistoryDetail'+data[i].id+'">'+
                               '<label class="control-label" style="color: black;">Updated by</label><br>'+
                                  '<p style="color: gray;">'+data[i].username+'</p>'+
                              '</div>';
                            }

                            html_history_list +='</div>'+
                            '<div class="col-md-6" style="text-align: right;">'+
                              '<label class="control-label" style="color: black;">'+moment(data[i].create_at).format("MMM D, YYYY")+'</f></label><br>'+
                              '<label class="control-label" style="color: #808080">'+moment(data[i].create_at).format("LT")+'</label><br>'+
                              '<div style="margin-top: 10px;">'+
                              '<button class="btn btn-primary btn-xs" data-toggle="collapse" data-target="#ModalHistoryDetail'+data[i].id+'" >Detail</button>'+
                              '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                    }

                      $('#history_list').html(html_history_list);
                    
                  }
              });
            }
          </script>
        </section><!-- /.content -->