<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<title></title>
</head>
<body>
	<table class="form-p-all">
		<tr>
			<td style="padding-bottom: 18px;">
				<p class="form-p"><b>PT. Horison Nusa Jaya Transport</b></p>
				<!-- <p class="form-p">Jl. Pohgading Timur Lingk. Perarudan</p>
				<p class="form-p">Jimbaran - Kuta Selatan</p> -->
				<p class="form-p">Telp. 085253703818</p>
				<!-- <p class="form-p">NPWP 94.206.799.2-905.000</p> -->
			</td>
			<td class="center-text" width="350px">
				<p class="form-p"><b><u>BUKTI TANDA TERIMA PENGIRIMAN</u></b></p>
				<!-- <hr class="line-title"> -->
				<p class="form-p"><b>No. : <?php echo $kode?></b></p>
			</td>
			<td >
				<img src="template/dist/img/logo-red.png" alt="Logo" class="form-logo">
			</td>
		</tr>
	</table>
	<div class="row form-p-all" style="margin-top: 10px;">
	  <div class="column" style="border-style: solid; width: 150px">
	    <p class="form-p" style="margin-left: 3px;" id="create_at"><b>TGL :</b> <?php echo $create_at?></p>
	  </div>
	  <!-- <div class="column" style="border-style: solid; width: 200px; margin-left: 125px;">
	    <p class="form-p" style="margin-left: 3px;"><b>Supir :</b> <?php echo $driver?></p>
	  </div>
	  <div class="column" style="border-style: solid; width: 200px; margin-left: 20px;">
	    <p class="form-p" style="margin-left: 3px;"><b>Nopol :</b> <?php echo $nopol?></p>
	  </div> -->
	</div>

	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 265px; height: 85px; margin-top: 2px;">
	    <p class="form-p" style="margin-left: 5px; margin-top: 2px;"><b>PENGIRIM</b></p>
	    <table>
	    	<tr>
	    		<td>
	    			<f style="margin-bottom: 0; margin-left: 3px;"><b>Nama</b></f>
	    		</td>
	    		<td>
	    			<f style="margin-bottom: 0;font-size:10px;">: <?php echo $name_pengirim?></f>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<f class="form-p" style="margin-left: 3px;"><b>Alamat</b></f>
	    		</td>
	    		<td>
	    			<f style="font-size:10px;">: <?php echo $address_pengirim?></f>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<f class="form-p" style="margin-left: 3px;"><b>No. HP</b></f>
	    		</td>
	    		<td>
				    <f style="font-size:10px;">: <?php echo $telephone_pengirim?></f>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	  <div class="column" style="margin-left:10px; border-style: solid; height: 85px;">
	  	<table>
	  		<tr>
	  			<td width="210px">
	  				<p class="form-p" style="margin-left: 3px;"><b>NAMA BARANG</b></p>
	  			</td>
          <td width="100px">
            <p class="form-p"><b>Harga</b></p>
          </td>
	  			<td width="50px" style="text-align: center;">
	  				<p class="form-p"><b>Qty</b></p>
	  			</td>
	  			<td width="50px" style="text-align: center;">
	  				<p class="form-p"><b>Satuan</b></p>
	  			</td>
	  		</tr>
	  		<?php foreach($get_delivery_detail_by_id as $row){ 
	  			if($row->category == 1){?>
		  		<tr>
		  			<td width="210px">
		  				<f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
		  			</td>
            <td width="100px">
              <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
            </td>
		  			<td width="50px" style="text-align: center;">
		  				<f style="font-size:10px;"><?php echo $row->qty?></f>
		  			</td>
		  			<td width="50px" style="text-align: center;">
		  				<f style="font-size:10px;"><?php echo $row->unit?></f>
		  			</td>
		  		</tr>
	  		<?php }} ?>
	  	</table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 265px; height: 100px; margin-top: 2px;">
	    <p class="form-p" style="margin-left: 5px; margin-top: 2px;"><b>PENERIMA</b></p>
	   <table>
	    	<tr>
	    		<td>
	    			<f style="margin-bottom: 0; margin-left: 5px;"><b>Nama</b></f>
	    		</td>
	    		<td>
	    			<f style="margin-bottom: 0;font-size:10px;">: <?php echo $name_penerima?></f>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<f class="form-p" style="margin-left: 5px;"><b>Alamat</b></f>
	    		</td>
	    		<td>
	    			<f style="font-size:10px;">: <?php echo $address_penerima.', Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></f>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<f class="form-p" style="margin-left: 5px;"><b>No. HP</b></f>
	    		</td>
	    		<td>
				    <f style="font-size:10px;">: <?php echo $telephone_penerima?></f>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	  <div class="column" style="margin-left:10px; border-style: solid; height: 100px;">
	  	<table>
	  		<tr>
	  			<td width="210px">
	  				<p class="form-p" style="margin-left: 3px;"><b>KELENGKAPAN</b></p>
	  			</td>
	  			<td width="100px">
            <p class="form-p"><b>Harga</b></p>
          </td>
          <td width="50px" style="text-align: center;">
            <p class="form-p"><b>Qty</b></p>
          </td>
          <td width="50px" style="text-align: center;">
            <p class="form-p"><b>Satuan</b></p>
          </td>
	  		</tr>
	  		<?php foreach($get_delivery_detail_by_id as $row){ 
	  			if($row->category == 2){?>
		  		<tr>
		  			<td width="210px">
              <f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
            </td>
            <td width="100px">
              <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
            </td>
            <td width="50px" style="text-align: center;">
              <f style="font-size:10px;"><?php echo $row->qty?></f>
            </td>
            <td width="50px" style="text-align: center;">
              <f style="font-size:10px;"><?php echo $row->unit?></f>
            </td>
		  		</tr>
	  		<?php }} ?>
	  	</table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 265px; height: 60px; margin-top: 2px;">
	    <p class="form-p" style="margin-left: 5px; margin-top: 2px;"><b>BIAYA</b></p>
	    <p style="margin-bottom: 0; margin-left: 5px;"><?php echo "Rp ".number_format($price,2,',','.') ?></p>
	  </div>
	  <div class="column" style="margin-left:10px; border-style: solid; height: 60px;">
	  	<table>
	  		<tr>
	  			<td width="210px">
	  				<p class="form-p" style="margin-left: 3px;"><b>BARANG LAINNYA</b></p>
	  			</td>
	  			<td width="100px">
            <p class="form-p" ><b>Harga</b></p>
          </td>
          <td width="50px" style="text-align: center;">
            <p class="form-p"><b>Qty</b></p>
          </td>
          <td width="50px" style="text-align: center;">
            <p class="form-p"><b>Satuan</b></p>
          </td>
	  		</tr>
	  		<?php foreach($get_delivery_detail_by_id as $row){ 
	  			if($row->category == 0){?>
		  		<tr>
		  			<td width="210px">
              <f style="margin-left: 3px;font-size:10px;"><?php echo $row->name?></f>
            </td>
            <td width="100px">
              <f style="font-size:10px;"><?php echo "Rp ".number_format($row->price,2,',','.')?></f>
            </td>
            <td width="50px" style="text-align: center;">
              <f style="font-size:10px;"><?php echo $row->qty?></f>
            </td>
            <td width="50px" style="text-align: center;">
              <f style="font-size:10px;"><?php echo $row->unit?></f>
            </td>
		  		</tr>
	  		<?php }} ?>
	  	</table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 265px; height: 65px; margin-top: 2px;">
	    <p class="form-p" style="margin-left: 5px; margin-top: 2px;"><b>TERBILANG</b></p>
	    <p style="margin-bottom: 0; margin-left: 5px;"><?php echo $terbilang ?></p>
	  </div>
	  <div class="column" style="margin-left:10px;">
	  	<table style="height: 68px; text-align: center; margin-top: 1px;">
	  		<tr>
	  			<td width="100px">
	  				<p class="form-p" ><b>Pengirim</b></p>
	  			</td>
	  			<!--<td width="100px">
	  				<p class="form-p"><b>Supir</b></p>
	  			</td>
	  			<td width="100px">
	  				<p class="form-p"><b>Admin</b></p>
	  			</td>
	  			<td width="100px">
	  				<p class="form-p"><b>Penerima</b></p>
	  			</td>-->
	  		</tr>
	  		<tr>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $name_pengirim ?>)</b></p>
	  			</td>
	  			<!--<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $driver ?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $admin ?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $name_penerima ?>)</b></p>
	  			</td>-->
	  		</tr>
	  	</table>
	  </div>
	</div>
</body>
</html>