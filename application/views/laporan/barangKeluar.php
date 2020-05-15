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
				<p class="form-p"><b><?php echo $name ?></b></p>
				<!-- <p class="form-p">Jl. Pohgading Timur Lingk. Perarudan</p>
				<p class="form-p">Jimbaran - Kuta Selatan</p> -->
				<p class="form-p">Telp. <?php echo $tlp ?></p>
				<!-- <p class="form-p">NPWP 94.206.799.2-905.000</p> -->
			</td>
			<td class="center-text" width="350px">
				<h3 class="form-p"><b><u>FORM PENGELUARAN BARANG</u></b></h3>
				<!-- <hr class="line-title"> -->
				<!-- <p class="form-p"><b>No. : <?php echo $kode?></b></p> -->
			</td>
			<td >
				<img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">
			</td>
		</tr>
	</table>
	<div class="row form-p-all" style="margin-top: 10px;">
	  <div class="column" style="width: 345px; margin-top: 2px;">
	    <table>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-bottom: 0; margin-left: 3px; margin-right: 40px;"><b>TGL</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p" style="margin-bottom: 0;">: <?php echo $create_at ?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px; margin-right: 40px;"><b>Supir</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $driver ?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px; margin-right: 40px;"><b>Nopol</b></p>
	    		</td>
	    		<td>
				    <p class="form-p">: <?php echo $nopol ?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	  <div class="column" style="width: 344px; margin-left:10px;">
	    <table>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-bottom: 0; margin-left: 3px; margin-right: 40px;"><b>KM sebelumnya</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p" style="margin-bottom: 0;">: <?php echo $km_before ?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px; margin-right: 40px;"><b>KM saat ini</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $km_after ?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px; margin-right: 40px;"><b>Selisih KM</b></p>
	    		</td>
	    		<td>
				    <p class="form-p">: <?php echo $km_after - $km_before ?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all" style="margin-top: 10px;">
	  <div class="column" style="width: 703px; height: 150px; margin-top: 2px;">
	    <table>
	    	<?php for($i=0;$i<$amount;$i++){
	    		if ($i<1) { ?>
	    			<tr>
			    		<td>
			    			<p style="margin-bottom: 0; margin-top: 0; margin-left: 3px;"><b>Nama Barang</b></p>
			    		</td>
			    		<td>
			    			<p style="margin-bottom: 0; margin-top: 0;">: <?php echo $tire_name ?></p>
			    		</td>
			    	</tr>
	    		<?php } else{ ?>
		    	<tr>
		    		<td>
		    			<!-- <p style="margin-bottom: 0; margin-top: 0; margin-left: 3px;"><b>Nama Barang</b></p> -->
		    		</td>
		    		<td>
		    			<p style="margin-bottom: 0; margin-top: 0; margin-left: 6.5px;"> <?php echo $tire_name ?></p>
		    		</td>
		    	</tr>
		    <?php }} ?>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="width: 703px; height: 45px; margin-top: 2px;">
	    <table>
	    	<tr>
	    		<td>
	    			<p style="margin-bottom: 0; margin-top: 0; margin-left: 3px;"><b>Keterangan</b></p>
	    		</td>
	    		<td>
	    			<p style="margin-bottom: 0; margin-top: 0;">: <?php echo $keterangan ?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="margin-left:10px;">
	  	<table style="height: 82px; text-align: center; margin-top: 2px;">
	  		<tr>
	  			<td width="100px">
	  				<p class="form-p" ><b>Pemohon</b></p>
	  			</td>
	  			<td width="100px">
	  				<p class="form-p" style="margin-left: 120px;"><b>Diketahui</b></p>
	  			</td>
	  			<td width="100px">
	  				<p class="form-p" style="margin-left: 120px;"><b>Disetujui</b></p>
	  			</td>
	  			<td width="100px">
	  				<p class="form-p" style="margin-left: 120px;"><b>Diperiksa</b></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $driver ?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0; margin-left: 120px;"><b>(Emila)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0; margin-left: 120px;"><b>(Arisna)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0; margin-left: 120px;"><b>(Security)</b></p>
	  			</td>
	  		</tr>
	  	</table>
	  </div>
	</div>

</body>
</html>