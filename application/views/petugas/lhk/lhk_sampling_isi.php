<?php
header("Content-type:application/vnd.ms-word");
$filename = $noSurat . ".doc";
header("Content-Disposition: attachment; Filename=lhkSampling-" . $filename)

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
		$maksud = $row->maksud;
		$kota = $row->kota;
	}

	$tglLhk2 = strtotime($tglLhk);

	?>

	<div class="Section2">

		<p align="center" style="font-size: 12pt; font-family:Arial, Helvetica, sans-serif "><b>LAPORAN HASIL KEGIATAN </b></p>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><b><u>Yth:</u></b> Kepala Balai POM di Batam melalui PPK</p>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">Sehubungan dengan penugasan berdasarkan surat tugas dari kepala Balai POM di Batam nomor <?php echo $noSurat ?> dan tanggal Surat Tugas <?php echo  convertDay($tglSurat) . " " . convertMonthB(convertMonthA($tglSurat)) . " " . "20" . convertYear($tglSurat) ?> yang dilaksanakan pada tanggal <?php echo  convertDay($tglSurat) . " " . convertMonthB(convertMonthA($tglSurat)) . " 20" . convertYear($tglSurat) ?> berikut ini kami sampaikan laporan hasil kegiatan yang telah dilaksanakan : </p>

		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">1. Identitas Kegiatan </p>
		<table style="width:100%; font-family:arial;">

			<tr>
				<td width="2%">
					<p></p>
				</td>
				<td width="27%">
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">- Nama/Judul</p>
				</td>
				<td width="4%">
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">: </p>
				</td>
				<td width="67%">
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><?php echo $maksud; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">- Jadwal/Waktu</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">: </p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">
						<?php echo  convertDay($tglMulai) . " " . convertMonthB(convertMonthA($tglMulai)) . " 20" . convertYear($tglMulai) ?> </p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">- Tempat/Tujuan</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">: </p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><?php echo $kota; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">- Pejabat yang Dituju</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">: </p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><?php echo $pejabat; ?></p>
				</td>
			</tr>

		</table>

		<p>2. Identitas Petugas </p>

		<table style="width:100%; font-family:arial;">

			<?php
			$huruf = array('a.', 'b.', 'c.', 'd.', 'e.');
			for ($i = 0; $i < count($nama_all); $i++) { ?>
				<tr>
					<td width="1%">
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $huruf[$i]; ?></p>
					</td>
					<td width="28%">
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Nama / NIP</p>
					</td>
					<td width="4%">
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
					</td>
					<td width="67%">
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $nama_all[$i]; ?> / <?php echo $nip_all[$i]; ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p> </p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Pangkat / Gol</p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
					</td>
					<td>
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $pangkat_all[$i] . "/" . $golongan_all[$i]; ?></p>
					</td>
				</tr>
				<tr>
					<td>
						<p> </p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Jabatan</p>
					</td>
					<td>
						<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "> :</p>
					</td>
					<td>
						<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $jabatan_all[$i]; ?></p>
					</td>
				</tr>
			<?php } ?>
		</table>

		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">3. Pointer Hasil Kegiatan </p>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">Dilakukan sampling dengan rincian sebagai berikut : </p>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; "><?php echo $detSampling ?></p>

		<p>4. Pengesahan </p>
		<table style="width:100%; font-family:arial;">
			<tr>
				<td width="2%">
					<p></p>
				</td>
				<td width="38%">
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">a. SPPD disahkan oleh</p>
				</td>
				<td width="4%">
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
				</td>
				<td width="56%">
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $sppd; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">b. Kwitansi disahkan oleh</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $kwitansi; ?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p></p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">c. Form 8 jam disahkan oleh</p>
				</td>
				<td>
					<p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">:</p>
				</td>
				<td>
					<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><?php echo $form; ?></p>
				</td>
			</tr>

		</table>
		<p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify; ">Demikian disampaikan, atas perhatiannya diucapkan terimakasih.</p>

		<table style="width:100%; font-family:arial;">
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
				<td>
					<p><u></u></p>
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