<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <title></title>
</head>
<body>
  <table class="form-p-all">
    <tr>
      <td >
         <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">
      </td>
      <td class="center-text" width="350px">
        <p class="form-p"><b><u>BUKTI TANDA TERIMA PENGIRIMAN</u></b></p>
        
        <p class="form-p"><b>No. : <?php echo $kode?></b></p>
      </td>
      <td >
      </td>
    </tr>
  </table>
  <div class="row form-p-all" style="margin-top: 10px;">
    <div class="column" style="border-style: solid; width: 150px">
      <p class="form-p" style="margin-left: 3px;" id="create_at"><b>TGL :</b> <?php echo $create_at?></p>
    </div>
  </div>

  <div class="row form-p-all">
  	<div class="col-md-12">
    <div class="column  col-md-6" style="border-style: solid; width: 50%; height: 100px; margin-top: 2px;">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>PENGIRIM</b></p>
      <table>
        <tr>
          <td>
            <f class="htitle"><b>Nama</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $name_pengirim?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>Alamat</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $address_pengirim?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>No. HP</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $telephone_pengirim?></f>
          </td>
        </tr>
      </table>
    </div>
  	<div class="column  col-md-6" style="border-style: solid; width: 48%; height: 100px; margin-left: 6px">
      <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>PENERIMA</b></p>
      <table>
        <tr>
          <td>
            <f class="htitle"><b>Nama</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $name_pengirim?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>Alamat</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $address_penerima.', Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></f>
          </td>
        </tr>
        <tr>
          <td>
            <f class="htitle"><b>No. HP</b></f>
          </td>
          <td>
            <f class="hcontent">: <?php echo $telephone_penerima?></f>
          </td>
        </tr>
      </table>
    </div>
   </div>
 </div>

 <div class="row form-p-all">
  	<div class="col-md-12">      
  		  <div class="column col-md-6" style="border-style: solid; width: 50%; height: 50px; margin-top: 2px;">
			    <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>BIAYA</b></p>
			    <p style="margin-bottom: 0; margin-left: 3px;"><?php echo "Rp ".number_format($price,2,',','.') ?></p>
			  </div>
  		  <div class="column col-md-6" style="border-style: solid; width: 48%; height: 50px; margin-left: 6px">
			    <p class="form-p" style="margin-left: 3px; margin-top: 2px;"><b>TERBILANG</b></p>
			    <p style="margin-bottom: 0; margin-left: 3px;"><?php echo $terbilang ?></p>
			  </div>
    </div>
   </div>


<div class="row form-p-all">
  	<div class="col-md-12">      
  		  <div class="column col-md-12" style="border-style: solid; width: 100%; margin-top: 2px;">
  		  		<table>
				  		<tr>
				  			<td width="250px">
				  				<p class="form-p" style="margin-left: 3px;"><b>NAMA BARANG</b></p>
				  			</td>
                <td width="125px">
                  <p class="form-p" style="margin-left: 3px;"><b>No. Mesin</b></p>
                </td>
                <td width="125px">
                  <p class="form-p" style="margin-left: 3px;"><b>No. Rangka</b></p>
                </td>
			          <td width="125px">
			            <p class="form-p"><b>Harga</b></p>
			          </td>
				  			<td width="50px" style="text-align: center;">
				  				<p class="form-p"><b>Qty</b></p>
				  			</td>
				  			<td width="50px" style="text-align: center;">
				  				<p class="form-p"><b>Satuan</b></p>
				  			</td>
                <td width="50px" style="text-align: center;">
                  <p class="form-p"><b>Barcode</b></p>
                </td>
				  		</tr>
				  		<?php foreach($get_delivery_detail_by_id as $row){ 
				  			if($row->category == 1){?>
					  		<tr>
					  			<td width="250px">
					  				<f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
					  			</td>
                  <td width="125px">
                    <f style="margin-left: 3px;font-size:10px;"><?php echo $row->no_mesin?></f>
                  </td>
                  <td width="125px">
                    <f style="margin-left: 3px;font-size:10px;"><?php echo $row->no_rangka?></f>
                  </td>
			            <td width="125px">
			              <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
			            </td>
					  			<td width="50px" style="text-align: center;">
					  				<f style="font-size:10px;"><?php echo $row->qty?></f>
					  			</td>
					  			<td width="50px" style="text-align: center;">
					  				<f style="font-size:10px;"><?php echo $row->unit?></f>
					  			</td>
                  <td width="50px" style="text-align: center;">
                     <img type="file" name="barcode" id="barcode" src="<?php echo base_url('assets/img/barcode/'.$row->barcode) ?>" />
                  </td>
					  		</tr>
				  		<?php }} ?>
				  	</table>
			  </div>  
    </div>
</div>

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
			  			if($row->category == 2){?>
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
				  			if($row->category == 0){?>
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

<div class="row form-p-all">
  	 <div class="column col-md-12" style=" width: 100%; margin-top:25px;"> 
  			<table ">
	  		<tr>
	  			<td width="100px">
	  				<p class="form-p" ><b>Pengirim</b></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p><b>(<?php echo $name_pengirim ?>)</b></p>
	  			</td>
	  		</tr>
	  	</table>
 		</div>
</div>


</body>
</html>