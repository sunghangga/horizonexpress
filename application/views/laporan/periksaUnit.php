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
			<td width="380px" style="padding-bottom: 18px;">
				<p class="form-p"><b><?php echo $name ?></b></p>
				<p class="form-p">Telp. <?php echo $tlp ?></p>
			</td>
			<td width="430px">
				<h3 class="form-p"><b><u>FORM PEMERIKSAAN UNIT MOTOR</u></b></h3>
			</td>
			<td >
				<img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">
			</td>
		</tr>
	</table>
	<div class="row form-p-all" style="margin-top: 20px; margin-left: 50px;">
	  <div class="column" style="height: 50px;">
	  	<table>
	    	<tr>
	    		<td width="90px">
	    			<p class="form-p" style="margin-left: 3px;"><b>No. Pengiriman</b></p>
	    		</td>
	    		<td width="300px">
	    			<p class="form-p">: <?php echo $kode?></p>
	    		</td>
	    		<td width="50px">
	    			<p class="form-p" style="margin-left: 3px;"><b>Supir</b></p>
	    		</td>
	    		<td width="300px">
	    			<p class="form-p">: <?php echo $driver?></p>
	    		</td>
	    		<td width="">
	    			<p class="form-p" style="margin-left: 3px;"><b>Tanggal Periksa</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $date_check?></p>
	    		</td>
	    	</tr>
	    	<tr>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Tanggal</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $create_at?></p>
	    		</td>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Nopol</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $nopol?></p>
	    		</td>
	    		<td>
	    			<p class="form-p" style="margin-left: 3px;"><b>Nama Pemeriksa</b></p>
	    		</td>
	    		<td>
	    			<p class="form-p">: <?php echo $examiner?></p>
	    		</td>
	    	</tr>
	    </table>
	  </div>
	</div>

	<div class="row form-p-all">
	  <div class="column" style="margin-bottom: 5px;">
	  	<table class="table-border">
	  		<tr style="background-color: #add8e6; text-align: center;">
	  			<td width="15px" class="border-td">
	  				<p class="form-p"><b>NO</b></p>
	  			</td>
		        <td width="150px" class="border-td">
		           <p class="form-p"><b>Part Masalah</b></p>
		        </td>
	  			<td width="150px" class="border-td">
	  				<p class="form-p"><b>Ilustrasi Gambar</b></p>
	  			</td>
	  			<td width="100px" class="border-td">
	  				<p class="form-p"><b>Gejala</b></p>
	  			</td>
	  			<td width="100px" class="border-td">
	  				<p class="form-p"><b>Penyebab</b></p>
	  			</td>
	  			<td width="80px" class="border-td"> 
	  				<p class="form-p"><b>No. Engine</b></p>
	  			</td>
	  			<td width="80px" class="border-td"> 
	  				<p class="form-p"><b>No. Frame</b></p>
	  			</td>
	  			<td width="60px" class="border-td"> 
	  				<p class="form-p"><b>Type</b></p>
	  			</td>
	  			<td width="140px" class="border-td"> 
	  				<p class="form-p"><b>Solusi dari Dealer</b></p>
	  			</td>
	  			<td width="100px" class="border-td"> 
	  				<p class="form-p"><b>Keterangan</b></p>
	  			</td>
	  		</tr>
	  		<?php $iter = 0; foreach($get_check_detail_by_id as $row){
		  		  ?>
	  		<tr style="text-align: center;">
	  			<td height="25px" class="border-td">
	  				<f style="margin-left: 3px;font-size:10px;"><?php echo $iter += 1;?></f>
	  			</td>
	            <td class="border-td">
	              <f style="font-size:10px;"><?php echo $row->item;?></f>
	            </td>
	  			<td class="border-td">
	  				<img type="file" style="width: 80px;height: 80px;" name="photo" id="photo" src="./upload/check/<?php echo $row->foto ?>" />
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->gejala;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->penyebab;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->engine;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->frame;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->type;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->solusi;?></f>
	  			</td>
	  			<td class="border-td">
	  				<f style="font-size:10px;"><?php echo $row->keterangan;?></f>
	  			</td>
	  		</tr>
	  		<?php } ?>
	  	</table>
	  </div>
	</div>

	<div class="row form-p-all" style="margin-left:20px; margin-top: 10px;">
	  <div class="column">
	  	<table style="text-align: center; margin-top: 1px;">
	  		<tr>
	  			<td width="600px" style="padding-bottom: 30px;">
	  				<p class="form-p" ><b>Supir</b></p>
	  			</td>
	  			<td width="150px" style="padding-bottom: 30px">
	  				<p class="form-p"><b>Pemeriksa</b></p>
	  			</td>
	  		</tr>
	  		<tr>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $driver?>)</b></p>
	  			</td>
	  			<td width="100px" style="vertical-align: bottom;">
	  				<p style="margin-bottom: 0;"><b>(<?php echo $examiner?>)</b></p>
	  			</td>
	  		</tr>
	  	</table>
	  </div>
	</div>
</body>
</html>