<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<title></title>
</head>
<body>
	<table class="form-p-all">
		<tr>
			<td style="padding-bottom: 7px;">
				<p class="form-p"><b>PT. Horison Nusa Jaya Transport</b></p>
				<!-- <p class="form-p">Jl. Pohgading Timur Lingk. Perarudan</p> -->
				<!-- <p class="form-p">Jimbaran - Kuta Selatan</p> -->
				<p class="form-p">Telp. 085253703818</p>
				<!-- <p class="form-p">NPWP 94.206.799.2-905.000</p> -->
			</td>
			<td class="center-text" width="350px">
				<h2 class="form-p"><b>UANG JALAN</b></h2>
				<hr class="line-title-jalan">
			</td>
			<td >
				<img src="template/dist/img/logo-red.png" alt="Logo" class="form-logo">
			</td>
		</tr>
	</table>

	<div class="row form-p-all" style="margin-top: 20px;">
	  <div class="column" style="width: 265px; height: 85px; margin-top: 2px;">
	    <table>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>No. Tanda Terima</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $kode?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Tanggal</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $create_at?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Supir</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $driver?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Nopol</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $nopol?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Tujuan</b></p>
	    		</td>
	    		<td>
				    <p class="form-p">: <?php echo $kota?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 690px; margin-top: 20px;">
	   <table>
	    	<tr>
	    		<td width="450px">
	    			<p class="form-p" style="margin-left: 3px;"><b>UANG MAKAN</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p"><?php echo "Rp ".number_format($table,2,',','.')?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>
	<?php foreach($get_roadmoney_detail_by_id as $row){ ?>
	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 690px; margin-top: 2px;">
	   <table>
	    	<tr>
	    		<td width="450px">
	    			<p class="form-p" style="margin-left: 3px;"><b><?php echo $row->postage?></b></p>
	    		</td>
	    		<td>
	    			<p class="form-p"><?php echo "Rp ".number_format($row->price,2,',','.')?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>
	<?php } ?>
	<div class="row form-p-all">
	  <div class="column" style="border-style: solid; width: 690px; margin-top: 2px;">
	   <table>
	    	<tr>
	    		<td width="450px">
	    			<p class="form-p" style="margin-left: 3px;"><b>PULSA</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p"><?php echo "Rp ".number_format($pulse,2,',','.')?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>
	<div class="row form-p-all" >
	  <div class="column" style="text-align: right; border-style: solid; width: 340px; margin-top: 2px; margin-left: 350px;">
	   <table>
	    	<tr>
	    		<td width="100px">
	    			<p class="form-p" style="margin-left: 3px;"><b>Total</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p"><?php echo "Rp ".number_format($price,2,',','.')?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>
</body>
</html>