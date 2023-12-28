<?php
header("Content-type:application/vnd.ms-word");
$filename = $idSurat . ".doc";
header("Content-Disposition: attachment; Filename=lhkSer-" . $filename)

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/print.css">
</head>


<body onload="window.print()">


	<?php

	function convertDay($day)
	{
		$day = date('d', $day);
		return $day;
	}
	function convertMonthA($month)
	{
		$month = date('m', $month);
		return $month;
	}

	function convertMonthB($month)
	{
		if ($month == "01") {
			$month = "Januari";
		} elseif ($month == "02") {
			$month = "Februari";
		} elseif ($month == "03") {
			$month = "Maret";
		} elseif ($month == "04") {
			$month = "April";
		} elseif ($month == "05") {
			$month  = "Mei";
		} elseif ($month == "06") {
			$month = "Juni";
		} elseif ($month == "07") {
			$month = "Juli";
		} elseif ($month == "08") {
			$month = "Agustus";
		} elseif ($month == "09") {
			$month = "September";
		} elseif ($month == "10") {
			$month = "Oktober";
		} elseif ($month == "11") {
			$month = "November";
		} else {
			$month = "Desember";
		}
		return $month;
	}

	function convertYear($year)
	{
		$year = date('y', $year);
		$tahun = $year;
		return $tahun;
	}


	?>


	<?php
	$nama_all = array();
	$nip_all = array();
	$pangkat_all = array();
	$golongan_all = array();
	$jabatan_all = array();
	$noSurat = "";
	$tglSurat = "";
	$tglMulai = "";
	$tglSelesai = "";
	$tujuan = "";
	$maksud = "";
	$kota = "";



	foreach ($surat as $row) {
		array_push($nama_all, $row->nama);
		array_push($nip_all, $row->nip);
		array_push($pangkat_all, $row->pangkat);
		array_push($golongan_all, $row->golongan);
		array_push($jabatan_all, $row->jabatan);
		$noSurat = $row->noSuratTugas;
		$tujuan = $row->kota;
		$tglSurat = strtotime($row->tglSurat);
		$tglMulai = strtotime($row->tglMulai);
		$tglSelesai = strtotime($row->tglSelesai);
		$maksud = $row->maksud;
		$kota = $row->kota;
	}


	$nomor = 0;
	$tglLhk2 = strtotime($tglLhk);



	?>
	<div class="Section2">

		<p align="center" style="font-size: 12pt; font-family:Arial, Helvetica, sans-serif "><b>LAPORAN HASIL KEGIATAN </b></p>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b><u>Yth:</u></b> Kepala Balai POM di Batam melalui PPK</p>
		<table style="width:100%">

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>I.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>DASAR PEMERIKSAAN :</b>

				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">I</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Surat Perintah Tugas Kepala Balai Pengawas Obat Makanan di Batam, Nomor <?php echo $noSurat  ?> dan tanggal Surat Tugas <?php echo  convertDay($tglSurat) . " " . convertMonthB(convertMonthA($tglSurat)) . " " . "20" . convertYear($tglSurat) ?>, dilaksanakan pada tanggal <?php echo  convertDay($tglMulai) . " " . convertMonthB(convertMonthA($tglMulai)) . " 20" . convertYear($tglMulai) ?> s.d. <?php echo  convertDay($tglSelesai) . " " . convertMonthB(convertMonthA($tglSelesai)) . " 20" . convertYear($tglSelesai) ?></p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>II.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>TUJUAN PEMERIKSAAN :</b>

				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">I</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ; text-align:justify; "><?php echo $maksud ?></p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>III.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif"><b>DAERAH YANG DIKUNJUNGI :</b>

				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">I</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify;  "><?php echo $kota ?></p>
				</td>
			</tr>

			<td>
				<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>IV.</b></p>
			</td>
			<td>
				<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>YANG MELAKSANAKAN PEMERIKSAAN :</b>

		</table>

		<table style="width:100%">

			<?php
			$huruf = array('a.', 'b.', 'c.', 'd.', 'e.');
			for ($i = 0; $i < count($nama_all); $i++) { ?>
				<tr>
					<td width="5%">
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $huruf[$i]; ?></p>
					</td>
					<td width="24%">
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Nama / NIP </p>
					</td>
					<td width="5%" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">
						<p class="satu"> : </p>
					</td>
					<td width="66%" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ;text-align:justify; ">
						<p><?php echo $nama_all[$i]; ?> / <?php echo $nip_all[$i]; ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p> </p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Pangkat / Gol </p>
					</td>
					<td>
						<p class="satu"> : </p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify;  "><?php echo $pangkat_all[$i] . "/" . $golongan_all[$i]; ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p> </p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Jabatan </p>
					</td>
					<td>
						<p class="satu"> : </p>
					</td>
					<td>
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ; text-align:justify; "><?php echo $jabatan_all[$i]; ?></p>
					</td>
				</tr>
			<?php } ?>
		</table>

		<table style="width:100%">
			<td style="width:2.5%">
				<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>V.</b></p>
			</td>
			<td style="width:97.5%">
				<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>HASIL PEMERIKSAAN :</b> </p>

			</td>


		</table>

		<table style="width:100%">
			<?php
			foreach ($sarana as $value) {
				foreach ($value as $item) {
					foreach ($item as $row) {
			?>

						<tr>
							<td width="5%">
								<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $nomor + 1 ?>.</p>
							</td>
							<td width="24%">
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Nama Sarana</p>
							</td>
							<td width="5%">
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
							</td>
							<td width="60%">
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $row->namaSarana ?> </p>
							</td>

						</tr>
						<tr>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Alamat </p>
							</td>
							<td>
								<p class="satu"> :</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $row->alamatSarana ?> </p>
							</td>
						</tr>

						<tr>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Kategori Sarana </p>
							</td>
							<td>
								<p class="satu"> :</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $row->kategoriSarana ?> </p>
							</td>
							<td width="3%">
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td width="3%">
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
						</tr>

						<tr>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Jenis Sarana </p>
							</td>
							<td>
								<p class="satu"> :</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $row->jenisSarana ?> </p>
							</td>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
						</tr>


						<tr>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td>
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Keterangan</p>
							</td>
							<td>
								<p class="satu"> :</p>
							</td>
							<td>
								<p id="hilang">1</p>

							</td>

						</tr>
						<tr>
							<td>
								<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">1</p>
							</td>
							<td colspan="3">
								<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify;  "><?php echo $keterangan[$nomor] ?> </p>
							</td>
						</tr>

			<?php

						$nomor += 1;
					}
				}
			}
			?>
		</table>

		<table style="width:100%">

			<tr>
				<td width="5%">
					<p><b>VI.</b></p>
				</td>
				<td width="33%">
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>PENGESAHAN :</b></p>
				</td>
				<td width="4%">
					<p class="satu">&nbsp;</p>
				</td>
				<td width="58%">
					<p class="satu">&nbsp;</p>
				</td>
			</tr>

			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>VI.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">- SPPD disahkan oleh</p>
				</td>
				<td>
					<p class="satu">:</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $sppd ?> </p>
				</td>
			</tr>

			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>VI.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">- Kwitansi disahkan oleh</p>
				</td>
				<td>
					<p class="satu">:</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $kwitansi ?> </p>
				</td>
			</tr>

			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>VI.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">- Form 8 Jam disahkan oleh </p>
				</td>
				<td>
					<p class="satu"> :</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><?php echo $form ?> </p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>VII.</b></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>KESIMPULAN</b></p>
				</td>
				<td>
					<p class="satu">&nbsp;</p>
				</td>
				<td>
					<p class="satu">&nbsp;</p>
				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>VI.</b></p>
				</td>
				<td colspan="5">
					<p style="font-size: 11pt; font-family:Arial; text-align:justify; "> <?php echo $detKegiatan ?></p>
				</td>

			</tr>



		</table>

		<br>
		<table style="width:100%">
			<tr>
				<th>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Menyetujui</p>
				</th>
				<th>
				<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Batam, <?php echo  convertDay($tglLhk2) . " " . convertMonthB(convertMonthA($tglLhk2)) . " 20" . convertYear($tglLhk2) ?></p>
				</th>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Petugas,</p>
				</td>
			</tr>
			<?php for ($i = 0; $i < count($nama_all); $i++) { ?>
				<tr>
					<td>
						<p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Cobacabicobacabicobacabicobacabi</p>
					</td>
					<td>
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo ($i + 1) . "." . $nama_all[$i] ?></p>
					</td>
				</tr>
			<?php } ?>

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><u><?php echo $namaKetua; ?></u></p>
				</td>

			</tr>

			<tr>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">NIP. <?php echo $nipKetua; ?></p>
				</td>
				<td>
					<p></p>
				</td>
			</tr>

		</table>

	<table style="width:90%">
			<tr>
				<p align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Mengetahui,</p>
			</tr>
			<tr>
				<p align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Kepala Balai POM di Batam</p>
			</tr>
			<tr>
				<p id="hilang" align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Cobacabicobacabicobacabicobacabi</p>
			</tr>
			<tr>
				<p id="hilang" align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Cobacabicobacabicobacabicobacabi</p>
			</tr>
			<tr>
				<p align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><u><?php echo $namaKepala; ?></u></p>
			</tr>
			<tr>
				<p align="center" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">NIP. <?php echo $nipKepala; ?></p>
			</tr>
		</table>



	</div>






</body>

</html>