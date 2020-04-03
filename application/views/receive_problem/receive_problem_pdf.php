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
        <h2>Receive_problem List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Item</th>
		<th>Foto</th>
		<th>Gejala</th>
		<th>Penyebab</th>
		<th>Engine</th>
		<th>Frame</th>
		<th>Type</th>
		<th>Solusi</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($receive_problem_data as $receive_problem)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $receive_problem->kode ?></td>
		      <td><?php echo $receive_problem->item ?></td>
		      <td><?php echo $receive_problem->foto ?></td>
		      <td><?php echo $receive_problem->gejala ?></td>
		      <td><?php echo $receive_problem->penyebab ?></td>
		      <td><?php echo $receive_problem->engine ?></td>
		      <td><?php echo $receive_problem->frame ?></td>
		      <td><?php echo $receive_problem->type ?></td>
		      <td><?php echo $receive_problem->solusi ?></td>
		      <td><?php echo $receive_problem->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>