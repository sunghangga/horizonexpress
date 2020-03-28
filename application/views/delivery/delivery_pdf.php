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
        <h2>Delivery List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name Driver</th>
		<th>Address Driver</th>
		<th>Telephone Driver</th>
		<th>Name Customer</th>
		<th>Address Customer</th>
		<th>Telephone Customer</th>
		<th>Regencies Id</th>
		<th>Districts Id</th>
		<th>Villages Id</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($delivery_data as $delivery)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $delivery->name_driver ?></td>
		      <td><?php echo $delivery->address_driver ?></td>
		      <td><?php echo $delivery->telephone_driver ?></td>
		      <td><?php echo $delivery->name_customer ?></td>
		      <td><?php echo $delivery->address_customer ?></td>
		      <td><?php echo $delivery->telephone_customer ?></td>
		      <td><?php echo $delivery->regencies_id ?></td>
		      <td><?php echo $delivery->districts_id ?></td>
		      <td><?php echo $delivery->villages_id ?></td>
		      <td><?php echo $delivery->create_at ?></td>
		      <td><?php echo $delivery->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>