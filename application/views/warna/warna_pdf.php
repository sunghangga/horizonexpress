<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Warna List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Create At</th>
		<th>Kd Tl</th>
		<th>Kode</th>
		<th>Name</th>
		<th>User Id</th>
		
            </tr><?php
            foreach ($warna_data as $warna)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $warna->create_at ?></td>
		      <td><?php echo $warna->kd_tl ?></td>
		      <td><?php echo $warna->kode ?></td>
		      <td><?php echo $warna->name ?></td>
		      <td><?php echo $warna->user_id ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>