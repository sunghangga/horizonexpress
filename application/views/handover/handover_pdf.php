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
        <h2>Receive List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Receiver</th>
		<th>Pdi</th>
		<th>Pic</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($receive_data as $receive)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $receive->kode ?></td>
		      <td><?php echo $receive->receiver ?></td>
		      <td><?php echo $receive->pdi ?></td>
		      <td><?php echo $receive->pic ?></td>
		      <td><?php echo $receive->create_at ?></td>
		      <td><?php echo $receive->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>