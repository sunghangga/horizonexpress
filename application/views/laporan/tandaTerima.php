<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <title>Invoice No: <?php echo $kode."/".$kode_month."/".$kode_year ?></title>
</head>
<body>
<div class="page-terima">
<table class="form-p-all">
    <tr>
      <td style="padding-bottom: 18px;">
        <p class="form-p"><b><?php echo $name ?></b></p>
        <!-- <p class="form-p">Jl. Pohgading Timur Lingk. Perarudan</p>
        <p class="form-p">Jimbaran - Kuta Selatan</p> -->
        <p class="form-p">Telp. <?php echo $tlp ?></p>
        <!-- <p class="form-p">NPWP 94.206.799.2-905.000</p> -->
      </td>
      <td class="center-text" width="350px">
        <p class="form-p"><b><u>BUKTI TANDA TERIMA</u></b></p>
        <!-- <hr class="line-title"> -->
        <p class="form-p"><b>No. : <?php echo $kode."/".$kode_month."/".$kode_year ?></b></p>
      </td>
      <td >
        <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">
      </td>
    </tr>
  </table>
  <div class="row form-p-all" style="margin-top: 10px;">
    <div class="column" style="border-style: solid; width: 150px">
      <p class="form-p" style="margin-left: 3px;" id="create_at"><b>TGL :</b> <?php echo $received_date?></p>
    </div>
  </div>

  <div class="row form-p-all">
    <div class="col-md-12">
    <div class="column  col-md-6" style="border-style: solid; width: 50%; height: 115px; margin-top: 2px;">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>PENGIRIM</b></p>
      <table>
        <tr>
          <td>
            <f class="htitle"><b>Nama</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $name_pengirim?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>Alamat</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $address_pengirim?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>No. HP</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $telephone_pengirim?></f>
          </td>
        </tr>
      </table>
    </div>
    <div class="column  col-md-6" style="border-style: solid; width: 48%; height: 115px; margin-left: 6px">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>PENERIMA</b></p>
      <table>
        <tr>
          <td>
            <f class="htitle"><b>Nama</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $name_penerima?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>Alamat</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $address_penerima.'<br/> Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>No. HP</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $telephone_penerima?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>NIK</b></f>
          </td>
          <td>
            <f class="hcontent">: </f>
          </td>
          <td>
            <f class="hcontent"><?php echo $no_identitas?></f>
          </td>
        </tr>
      </table>
    </div>
   </div>
 </div>

 <div class="row form-p-all">
    <div class="col-md-12">      
        <div class="column col-md-6" style="border-style: solid; width: 50%; height: 75px; margin-top: 2px;">
          <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>BIAYA</b></p>
          <p style="margin-bottom: 0; margin-left: 3px;"><?php echo "Rp ".number_format($price,2,',','.') ?></p>
        </div>
        <div class="column col-md-6" style="border-style: solid; width: 48%; height: 75px; margin-left: 6px">
          <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>TERBILANG</b></p>
          <p style="margin-bottom: 0; margin-left: 3px;"><?php echo $terbilang ?></p>
        </div>
    </div>
   </div>

<?php if($get_count_motor>0){?>
<div class="row form-p-all">
    <div class="col-md-12">      
        <div class="column col-md-12" style="border-style: solid; width: 100%; margin-top: 2px;">
            <table>
              <tr>
                <td width="350px">
                  <p class="form-p" style="margin-left: 3px;"><b>NAMA UNIT MOTOR</b></p>
                </td>
                <td width="150px">
                  <p class="form-p"><b>Harga</b></p>
                </td>
                <td width="75px" style="text-align: center;">
                  <p class="form-p"><b>Qty</b></p>
                </td>
                <td width="75px" style="text-align: center;">
                  <p class="form-p"><b>Satuan</b></p>
                </td>
              </tr>
              <?php foreach($get_delivery_detail_motor as $row){ 
                if($row->category == 1 && $row->name !=""){?>
                <tr>
                  <td width="350px">
                    <f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
                  </td>
                  <td width="150px">
                    <f style="font-size:10px;"><?php echo "Rp ".number_format($row->harga,2,',','.')?></f>
                  </td>
                  <td width="75px" style="text-align: center;">
                    <f style="font-size:10px;"><?php echo $row->jumlah?></f>
                  </td>
                  <td width="75px" style="text-align: center;">
                    <f style="font-size:10px;"><?php echo $row->unit?></f>
                  </td>
                </tr>
              <?php }} ?>
            </table>
        </div>  
    </div>
</div>
<?php } ?>

<?php if($get_count_kelengkapan>0){?>
<div class="row form-p-all">
    <div class="col-md-12">      
        <div class="column col-md-12" style="border-style: solid; width: 100%; margin-top: 2px;">
          <table>
            <tr>
              <td width="350px">
                <p class="form-p" style="margin-left: 3px;"><b>KELENGKAPAN</b></p>
              </td>
              <td width="150px">
                <p class="form-p"><b>Harga</b></p>
              </td>
              <td width="75px" style="text-align: center;">
                <p class="form-p"><b>Qty</b></p>
              </td>
              <td width="75px" style="text-align: center;">
                <p class="form-p"><b>Satuan</b></p>
              </td>
            </tr>
            <?php foreach($get_delivery_detail_by_id as $row){ 
              if($row->category == 2 && $row->name !=""){?>
              <tr>
                <td width="350px">
                  <f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
                </td>
                <td width="150px">
                  <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
                </td>
                <td width="75px" style="text-align: center;">
                  <f style="font-size:10px;"><?php echo $row->qty?></f>
                </td>
                <td width="75px" style="text-align: center;">
                  <f style="font-size:10px;"><?php echo $row->unit?></f>
                </td>
              </tr>
            <?php }} ?>
          </table>
        </div>  
    </div>
</div>
<?php } ?>

<?php if($get_count_other>0){?>
<div class="row form-p-all">
    <div class="col-md-12">      
        <div class="column col-md-12" style="border-style: solid; width: 100%; margin-top: 2px;">
            <table>
              <tr>
                <td width="350px">
                  <p class="form-p" style="margin-left: 3px;"><b>BARANG LAINNYA</b></p>
                </td>
                <td width="150px">
                  <p class="form-p" ><b>Harga</b></p>
                </td>
                <td width="75px" style="text-align: center;">
                  <p class="form-p"><b>Qty</b></p>
                </td>
                <td width="75px" style="text-align: center;">
                  <p class="form-p"><b>Satuan</b></p>
                </td>
              </tr>
              <?php foreach($get_delivery_detail_by_id as $row){ 
                if($row->category == 0 && $row->name !=""){?>
                <tr>
                  <td width="350px">
                    <f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
                  </td>
                  <td width="150px">
                    <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
                  </td>
                  <td width="75px" style="text-align: center;">
                    <f style="font-size:10px;"><?php echo $row->qty?></f>
                  </td>
                  <td width="75px" style="text-align: center;">
                    <f style="font-size:10px;"><?php echo $row->unit?></f>
                  </td>
                </tr>
              <?php }} ?>
            </table>
        </div>  
    </div>
</div>
<?php } ?>


<div class="row form-p-all">
     <div class="column col-md-12" style=" float:right; width: 30%; margin-top:25px;"> 
        <table>
        <tr>
          <td width="100px" style="text-align: center;">
            <p class="form-p" ><b>Penerima</b></p>
            <br?/>
            <br?/>
          </td>
        </tr>
        <tr>
          <td width="100px" style="vertical-align: bottom; text-align: center;">
            <p><b>(<?php echo $name_penerima ?>)</b></p>
          </td>
        </tr>
      </table>
    </div>
</div>
</div>

</body>
</html>