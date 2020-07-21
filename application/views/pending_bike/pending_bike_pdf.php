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
        <h2>Pending_bike List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Bike Code</th>
		<th>Bike Color</th>
		<th>Bike No Rangka</th>
		<th>Bike No Mesin</th>
		<th>Bike Year</th>
		<th>Bike Faktur</th>
		
            </tr><?php
            foreach ($pending_bike_data as $pending_bike)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pending_bike->bike_code ?></td>
		      <td><?php echo $pending_bike->bike_color ?></td>
		      <td><?php echo $pending_bike->bike_no_rangka ?></td>
		      <td><?php echo $pending_bike->bike_no_mesin ?></td>
		      <td><?php echo $pending_bike->bike_year ?></td>
		      <td><?php echo $pending_bike->bike_faktur ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>