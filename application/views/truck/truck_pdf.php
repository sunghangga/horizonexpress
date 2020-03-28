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
        <h2>Truck List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Nopol</th>
		<th>Nosin</th>
		<th>Norangka</th>
		<th>Production Year</th>
		<th>Jto Samsat</th>
		<th>Kir</th>
		<th>Km</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($truck_data as $truck)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $truck->name ?></td>
		      <td><?php echo $truck->nopol ?></td>
		      <td><?php echo $truck->nosin ?></td>
		      <td><?php echo $truck->norangka ?></td>
		      <td><?php echo $truck->production_year ?></td>
		      <td><?php echo $truck->jto_samsat ?></td>
		      <td><?php echo $truck->kir ?></td>
		      <td><?php echo $truck->km ?></td>
		      <td><?php echo $truck->create_at ?></td>
		      <td><?php echo $truck->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>