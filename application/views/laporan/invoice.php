<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <style type="text/css">
    @page {
       
       margin-left: 0.5cm;
       margin-right: 0.5cm;
       
    }
    body{
      font-family: font-family: Arial, Helvetica, sans-serif !important;
      font-size: 11;
    }

    .header{
      font-size: 14;
    }
    .content_desc td, .content_desc th {
      border: solid;
      border-width: 1px; 
      border-color:#000000;
      padding: 5px;
    }
    .content_desc table {
      border-collapse: collapse;
      width: 100%;
    }

    .content_desc th {
      font-size: 11;
      text-align: center;
      height: 10px !important;
      background-color :#e1e1e1;
    }

    .content_detail {
      font-size: 10;
    }
    .content_bill{
      font-size: 10;
    }
  </style>
  <title>Invoice No: <?php echo $kode."/".$kode_month."/".$kode_year ?></title>
</head>
<div class="page-terima">
  <div class="row header ">
     <div class="col-md-12"> 
      <div class="col-md-6" style="float: left;">
          <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo-inv"> 
      </div>
      <div class="col-md-6" style="float: right; width: 300px; text-align: right;">
          <p class="form-p" style="font-weight: bold;"><?php echo $name ?></p>  
          <p class="form-p" style="font-size: 11;">Telp. <?php echo $tlp ?></p>
      </div>
    </div>
</div>
<div class="row header-border" style="height: 15px; background-color :#e1e1e1;">
</div> 

<div class="row header-bottom" style="margin-bottom: 10px;">
   <p class="form-p" style="font-size: 10; text-align: center;">
    <f style="padding: 5px; font-weight: bold;" >Invoice : <?php echo $kode."/".$kode_month."/".$kode_year ?></f>
    <f style="padding: 5px; font-weight: bold;">Date: <?php echo $create_at?></f>
   </p>
</div>

  <div class="row form-p-all content_bill" style="margin-bottom: 15px;">
    <div class="col-md-12">
    <div class="column  col-md-6" style="width: 50%; margin-top: 10px;">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px; font-weight: bold;">Tagihan Ke</p>
      <table style="table-layout: fixed; width: 100%;">
        <tr>
          <td><?php echo $name_pengirim?></td>
        </tr>
        <tr>
          <td style="text-wrap:normal;word-wrap:break-word"><?php echo $address_pengirim?></td>
        </tr>
        <tr>
          <td><?php echo $telephone_pengirim?></td>
        </tr>
      </table>
    </div>
    <div class="column  col-md-6" style="width: 48%; margin-left: 6px">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px; font-weight: bold;">Dikirim Ke</p>
      <table style="table-layout: fixed; width: 100%;">
        <tr>
          <td><?php echo $name_penerima?></td>
        </tr>
        <tr>
          <td style="word-wrap:break-word">
           <?php echo $address_penerima.'<br/> Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo $telephone_penerima?>
          </td>
        </tr>
      </table>
    </div>
   </div>
 </div>


<div class="row">     
        <div class="column col-md-12 class content_desc" style="width: 100%; margin-top: 2px;">
            <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
              <tr>
                <th style="width: 10%"  class="content_head">Qty</th>
                <th style="width: 10%"  class="content_head">Satuan</th>
                <th style="width: 40%" class="content_head">Deskripsi</th>
                <th style="width: 20%" class="content_head">Harga per Satuan</th>                
                <th style="width: 20%" class="content_head">Total</th>
              </tr>
              <?php foreach($get_delivery_detail_invoice as $row){
              if( $row->name !=""){?> 
                
                <tr>
                  <td style="text-align: center;"  class="content_detail">
                    <?php echo $row->jumlah?>
                  </td>
                  <td style="text-align: center;"  class="content_detail">
                    <?php echo $row->unit?>
                  </td>
                  <td class="content_detail">
                    <?php echo $row->name?>
                  </td>
                  <td style="text-align: right;" class="content_detail"> 
                      <f style="float:left; text-align:left;" >
                        Rp.
                      </f>
                      <f style="float:right; text-align: right;">
                       <?php echo number_format($row->price,0,',','.')?>
                      </f>
                  </td>  
                  <td   class="content_detail">
                      <f style="float:left; text-align:left;" >
                        Rp.
                      </f>
                      <f style="float:right; text-align: right;">
                        <?php echo number_format($row->harga_total,0,',','.')?>
                      </f>
                  </td>
                </tr>
              <?php } }?>
                <tr>
                    <td colspan="3" style="text-align: right ; border-left:0; border-bottom:0;" class="content_detail">
                    </td>
                    <td style="text-align: right ; font-weight: bold;" class="content_detail">
                     Jumlah Total
                    </td>
                    
                    <td style="text-align: right;" class="content_detail">
                      <f style="float:left; text-align:left; font-weight: bold;" >
                        Rp.
                      </f>
                      <f style="float:right; text-align: right; font-weight: bold;">
                      <?php echo number_format($totalprice,0,',','.') ?>
                      </f>
                  </td>
                </tr>
            </table>
        </div>  
</div>
<div style="border:solid; border-width: 1px; width: 350px; padding: 5px; word-wrap:break-word; margin-top: -15px;">
<f>Metode Pembayaran:</f><br/>
<f>Tunai / Bank Transfer</f>
</div>
<div style="border:solid; border-width: 1px; width: 350px; padding: 5px; word-wrap:break-word;  margin-top: 10px;">
<f>Saya setuju untuk membayar kepada <?php echo $name ?> dengan Jumlah Total yang tertera pada Invoice No. <?php echo $kode."/".$kode_month."/".$kode_year ?></f><br/>
</div>
<div style="border:solid; border-width: 1px; width: 350px; padding: 5px; word-wrap:break-word;  margin-top: 10px; text-align: center;">
<br/>
<br/>
<br/>
  <div style="border-top:solid; border-width: 1px;">
  ( <?php echo $name_pengirim?> )
  </div>
</div>







</div>

</body>
</html>