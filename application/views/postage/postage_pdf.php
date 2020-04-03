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
        <h2>Postage List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>First District Id</th>
		<th>Last District Id</th>
		<th>Emount</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($postage_data as $postage)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $postage->first_district_id ?></td>
		      <td><?php echo $postage->last_district_id ?></td>
		      <td><?php echo $postage->emount ?></td>
		      <td><?php echo $postage->create_at ?></td>
		      <td><?php echo $postage->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>