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
        <h2>Tire List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Noseri</th>
		<th>Stock</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($tire_data as $tire)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tire->name ?></td>
		      <td><?php echo $tire->noseri ?></td>
		      <td><?php echo $tire->stock ?></td>
		      <td><?php echo $tire->create_at ?></td>
		      <td><?php echo $tire->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>