<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/printdetail.css">

  <title>Detail Invoice No: <?php echo $kode?></title>
</head>
<body>
<?php foreach($get_delivery_detail_by_id as $row){ 
              if($row->category == 1 && $row->name !=""){?>
<div class="header">
    <div class="head-logo"; >
      <div class="title-logo">HORIZON TRANSPORT</div>
      <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">    
    </div>
    <div class="head-title">
    <p class="head-subtitle">ITEM DETAIL</p>
    </div>
</div>

<div class="content-detail">
  <div class="item-detail">
    <div class="item-detail-content">
      No. Invoice:
      <p><?php echo $kode."/".$kode_month."/".$kode_year ?></p>
    </div>
    <div class="item-detail-content">
      Item:
      <p><?php echo $row->name?>
      <br/>No. Faktur:<?php echo " ".$row->faktur?>
      </p>
    </div>
    <div class="item-detail-content">
      Jumlah:
      <p><?php echo $row->qty?></p>
    </div>
    <div class="item-detail-content">
      Satuan:
      <p><?php echo $row->unit?></p>
    </div>
  </div>

  <div class="customer-detail">
    <div class="customer-detail-content">
      Pengirim:
      <p><?php echo $name_pengirim?></p>
      <p><?php echo $address_pengirim?></p>
    </div>
    <div class="customer-detail-content">
      Penerima:
      <p><?php echo $name_penerima?><br/>
      <?php echo $address_penerima.'<br/> Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></p>
    </div>
  </div>
</div>

<div class="footer">
  <div class="barcode-detail">
    <img type="file" name="barcode" id="barcode" src="<?php echo base_url('assets/img/barcode/'.$row->barcode) ?>" />
  </div>
</div>
<?php }} ?>

<?php foreach($get_delivery_detail_by_id as $row){ 
              if($row->category == 2 && $row->name !=""){?>
<div class="header">
    <div class="head-logo"; >
      <div class="title-logo">HORIZON TRANSPORT</div>
      <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">    
    </div>
    <div class="head-title">
    <p class="head-subtitle">ITEM DETAIL</p>
    </div>
</div>

<div class="content-detail">
  <div class="item-detail">
    <div class="item-detail-content">
      No. Invoice:
      <p><?php echo $kode."/".$kode_month."/".$kode_year ?></p>
    </div>
    <div class="item-detail-content">
      Item:
      <p><?php echo $row->name?></p>
    </div>
    <div class="item-detail-content">
      Jumlah:
      <p><?php echo $row->qty?></p>
    </div>
    <div class="item-detail-content">
      Satuan:
      <p><?php echo $row->unit?></p>
    </div>
  </div>

  <div class="customer-detail">
    <div class="customer-detail-content">
      Pengirim:
      <p><?php echo $name_pengirim?></p>
      <p><?php echo $address_pengirim?></p>
    </div>
    <div class="customer-detail-content">
      Penerima:
      <p><?php echo $name_penerima?><br/>
      <?php echo $address_penerima.'<br/> Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></p>
    </div>
  </div>
</div>

<div class="footer">
  <div class="barcode-detail">
     <img type="file" name="barcode" id="barcode" src="<?php echo base_url('assets/img/barcode/'.$row->barcode) ?>" />
  </div>
</div>
<?php }} ?>

<?php foreach($get_delivery_detail_by_id as $row){ 
              if($row->category == 0 && $row->name !=""){?>
<div class="header">
    <div class="head-logo"; >
      <div class="title-logo">HORIZON TRANSPORT</div>
      <img type="file" src="./upload/logo/<?php echo $logo ?>" alt="Logo" class="form-logo">    
    </div>
    <div class="head-title">
    <p class="head-subtitle">ITEM DETAIL</p>
    </div>
</div>

<div class="content-detail">
  <div class="item-detail">
    <div class="item-detail-content">
      No. Invoice:
      <p><?php echo $kode."/".$kode_month."/".$kode_year ?></p>
    </div>
    <div class="item-detail-content">
      Item:
      <p><?php echo $row->name?></p>
    </div>
    <div class="item-detail-content">
      Jumlah:
      <p><?php echo $row->qty?></p>
    </div>
    <div class="item-detail-content">
      Satuan:
      <p><?php echo $row->unit?></p>
    </div>
  </div>

  <div class="customer-detail">
    <div class="customer-detail-content">
      Pengirim:
      <p><?php echo $name_pengirim?></p>
      <p><?php echo $address_pengirim?></p>
    </div>
    <div class="customer-detail-content">
      Penerima:
      <p><?php echo $name_penerima?><br/>
      <?php echo $address_penerima.'<br/> Desa '.ucfirst(strtolower($name_village)).', Kecamatan '.ucfirst(strtolower($name_district)).', '.ucwords(strtolower($name_regency)) ?></p>
    </div>
  </div>
</div>

<div class="footer">
  <div class="barcode-detail">
     <img type="file" name="barcode" id="barcode" src="<?php echo base_url('assets/img/barcode/'.$row->barcode) ?>" />
  </div>
</div>
<?php }} ?>

</body>
</html>