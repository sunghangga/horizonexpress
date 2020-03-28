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
        <h2>Tire_out List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tire Id</th>
		<th>Amount</th>
		<th>Driver Id</th>
		<th>Nopol</th>
		<th>Km Before</th>
		<th>Km After</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($tire_out_data as $tire_out)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tire_out->tire_id ?></td>
		      <td><?php echo $tire_out->amount ?></td>
		      <td><?php echo $tire_out->driver_id ?></td>
		      <td><?php echo $tire_out->nopol ?></td>
		      <td><?php echo $tire_out->km_before ?></td>
		      <td><?php echo $tire_out->km_after ?></td>
		      <td><?php echo $tire_out->create_at ?></td>
		      <td><?php echo $tire_out->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>