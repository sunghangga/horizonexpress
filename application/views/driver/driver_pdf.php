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
        <h2>Driver List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Address</th>
		<th>Telephone</th>
		<th>Name Wife</th>
		<th>Telephone Wife</th>
		<th>Sim Expire</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($driver_data as $driver)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $driver->name ?></td>
		      <td><?php echo $driver->address ?></td>
		      <td><?php echo $driver->telephone ?></td>
		      <td><?php echo $driver->name_wife ?></td>
		      <td><?php echo $driver->telephone_wife ?></td>
		      <td><?php echo $driver->sim_expire ?></td>
		      <td><?php echo $driver->create_at ?></td>
		      <td><?php echo $driver->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>