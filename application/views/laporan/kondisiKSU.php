<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<style type="text/css">
		.table-border {
		  border-collapse: collapse;
		}
		.border-td {
		  border: 1px solid black;
		  padding: 2px;
		}
	</style>
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
				<h3 class="form-p"><b><u>LAPORAN KONDISI KSU</u></b></h3>
				<!-- <hr class="line-title"> -->
				<p class="form-p"><b>No. : <?php echo $kode."/".$kode_month."/".$kode_year ?></b></p>
			</td>
			<td >
				<img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">
			</td>
		</tr>
	</table>
	<div class="row form-p-all" style="margin-top: 20px;">
	  <div class="column" style="height: 85px;">
	  	<table>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>DEALER</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $dealer?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>NOMOR POLISI TRUCK</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $nopol?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>NAMA EKSPEDISI/SOPIR</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $supir?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>TANGGAL UNLOADING/PENERIMAAN KSU</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $create_at?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all" style="margin-top: 20px;">
	  <div class="column" style="margin-bottom: 5px;">
	  	<table class="table-border">
	  		<tr style="background-color: #add8e6; text-align: center;">
	  			<td width="25px" class="border-td">
	  				<p class="form-p"><b>NO</b></p>
	  			</td>
		        <td width="200px" class="border-td">
		           <p class="form-p"><b>NAMA KSU</b></p>
		        </td>
	  			<td width="80px" class="border-td">
	  				<p class="form-p"><b>JML UNIT</b></p>
	  			</td>
	  			<td width="80px" class="border-td">
	  				<p class="form-p"><b>JML KSU DITERIMA</b></p>
	  			</td>
	  			<td width="100px" class="border-td">
	  				<p class="form-p"><b>SELISIH JML KSU</b></p>
	  			</td>
	  			<td width="180px" class="border-td"> 
	  				<p class="form-p"><b>KETERANGAN</b></p>
	  			</td>
	  		</tr>
	  		<?php $iter = 0; foreach($get_delivery_detail_by_id as $row){
		  		if ($row->qty > 0) {
		  		  ?>
		  		<tr>
		  			<td width="25px" height="25px" class="border-td" style="text-align: center;">
		  				<f style="margin-left: 3px;font-size:10px;"><?php echo $iter += 1;?></f>
		  			</td>
		            <td width="200px" class="border-td">
		              <f style="font-size:10px;"><?php echo $row->name?></f>
		            </td>
		  			<td width="80px" style="text-align: center;" class="border-td">
		  				<f style="font-size:10px;"><?php echo $row->qty?></f>
		  			</td>
		  			<td width="80px" style="text-align: center;" class="border-td">
		  				<f style="font-size:10px;"><?php echo $row->qty_received?></f>
		  			</td>
		  			<td width="100px" style="text-align: center;" class="border-td">
		  				<f style="font-size:10px;"><?php echo $row->qty - $row->qty_received?></f>
		  			</td>
		  			<td width="180px" style="text-align: center;" class="border-td">
		  				<f style="font-size:10px;"><?php echo $row->keterangan?></f>
		  			</td>
		  		</tr>
		  	<?php }} ?>
	  	</table>
	  </div>
	</div>

	<div class="row form-p-all" style="margin-top: 5px;">
	  <div class="column" style="margin-bottom: 35px;">
	  	<table>
	    	<tr>
	    		<td>
	    			<p class="form-p"><b><u>CATATAN</u></b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $catatan?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all" style="margin-left:40px;">
	  <div class="column">
	  	<table style="text-align: center; margin-top: 1px;">
	  		<tr>
	  			<td width="150px" style="padding-bottom: 30px">
	  				<p class="form-p" ><b>Yang Menerima</b></p>
	  			</td>
	  			<td width="150px" style="padding-bottom: 30px">
	  				<p class="form-p"><b>Mek PDI</b></p>
	  			</td>
	  			<td width="150px" style="padding-bottom: 30px">
	  				<p class="form-p"><b>Ekspedisi</b></p>
	  			</td>
	  			<td width="150px" style="padding-bottom: 30px">
	  				<p class="form-p"><b>Mengetahui PIC</b></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $receiver?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $pdi?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $supir?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $pic?>)</b></p>
	  			</td>
	  		</tr>
	  	</table>
	  </div>
	</div>
</body>
</html>