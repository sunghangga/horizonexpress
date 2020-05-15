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
        <h2>History List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Create At</th>
		<th>Status</th>
		<th>Text</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($history_data as $history)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $history->create_at ?></td>
		      <td><?php echo $history->status ?></td>
		      <td><?php echo $history->text ?></td>
		      <td><?php echo $history->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>