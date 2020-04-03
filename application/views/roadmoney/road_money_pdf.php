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
        <h2>Road_money List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Table Money</th>
		<th>Pulse</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($road_money_data as $road_money)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $road_money->kode ?></td>
		      <td><?php echo $road_money->table_money ?></td>
		      <td><?php echo $road_money->pulse ?></td>
		      <td><?php echo $road_money->create_at ?></td>
		      <td><?php echo $road_money->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>