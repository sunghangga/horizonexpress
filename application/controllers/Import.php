<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	/**
	 * Menampilkan halaman import data.
	 *
	 */
	public function index()
	{
		// Action form.
		$data['action'] = site_url('import/process');

		$this->load->view('import', $data);
	}

	/**
	 * Memproses data yang diimport.
	 *
	 */
	public function process()
	{
		if ( isset($_POST['import'])) {

        $file = $_FILES['csv']['tmp_name'];

					// Medapatkan ekstensi file csv yang akan diimport.
					$ekstensi  = explode('.', $_FILES['csv']['name']);

					// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
					if (empty($file)) {
						echo 'File tidak boleh kosong!';
					} else {
						// Validasi apakah file yang diupload benar-benar file csv.
						if (strtolower(end($ekstensi)) === 'csv' && $_FILES["csv"]["size"] > 0) {

							$i = 0;
							$handle = fopen($file, "r");
							while (($row = fgetcsv($handle, 0, ";"))) {
								$i++;
								if ($i == 1) continue;
								
								// Data yang akan disimpan ke dalam databse
								$data = [
									'bike_code' => $row[5],
									'bike_color' => $row[6],
									'bike_no_rangka' => $row[7],
									'bike_no_mesin' => $row[8],
									'bike_year' => $row[9],
									'bike_faktur' => $row[13],
								];

								// Simpan data ke database.
								$this->Pending_bike_model->insert($data);
							}

							fclose($handle);
							redirect(site_url('pending_bike'));

						} else {
							echo 'Format file tidak valid!';
						}
					}
        }
	}
}