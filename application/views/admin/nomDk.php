<?php
header("Content-type:application/vnd.ms-word");
$filename = $idKw . ".doc";
header("Content-Disposition: attachment; Filename=nominatifDakota-" . $filename)

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/style.css">
</head>


<body style="font-size: 12px;" onload="window.print()">

	<div class="page2">
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

		$nama_nom = array();
		$nip_nom = array();
		$surat = "";
		$tujuan = "";
		$tgl1 = "";
		$tgl2 = "";
		$tgl_mulai2;
		$tgl_selesai2;
		$lama = "";
		$mak  = "";

		foreach ($nomDk->result() as $row) {
			array_push($nama_nom, $row->nama);
			array_push($nip_nom, $row->nip);
			$surat = $row->noSuratTugas;
			$tujuan = $row->kota;
			$tgl1 = strtotime($row->tglMulai);
			$tgl2 = strtotime($row->tglSelesai);
			$tgl_mulai2 = $row->tglMulai;
			$tgl_selesai2 = $row->tglSelesai;
			$lama = $row->lamaPerjalanan;
			$mak = $row->mak;
		}


		?>
		<p style="font-family:arial;font-size: 12px;line-height: 1.6;" align="left">
			DAFTAR NOMINATIF PENGGUNAAN BIAYA PERJALANAN DINAS DALAM KOTA <br>
			PADA BALAI PENGAWAS OBAT DAN MAKANAN DI BATAM. <br>
			<b>MAK : <?php echo $mak; ?></b>
		</p>

		<table style="width:100%;font-family:arial;font-size: 12px;  border:1px solid black;border-collapse: collapse; ">
			<tr>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">No.</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Nama/NIP <br> Pangkat/Gol</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Tujuan</p>
				</th>
				<th colspan="2" style="border:1px solid black; font-family:arial;">
					<p align="center">Tanggal</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Lama Perjalanan</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Rincian (Rp)</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Jumlah (Rp)</p>
				</th>
				<th style="border:1px solid black; font-family:arial;">
					<p align="center">Tanda Tangan</p>
				</th>
			</tr>


			<tr>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"><b>Mulai</b></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"><b>Selesai</b></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"><b>Transport Lokal</b></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p></p>
				</td>

			</tr>

			<tr>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">1</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">2</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">3</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">4</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">5</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">6</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">7</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">8</p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center">9</p>
				</td>
			</tr>
			<?php
			$i = 0;
			for ($i = 0; $i < count($nama_nom); $i++) {
			?>

				<tr>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center"><?php echo $i + 1; ?></p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="left"><?php echo $nama_nom[$i] . "<br>" . $nip_nom[$i] . "<br>" . $surat; ?></p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center"><?php echo $tujuan; ?></p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center"><?php echo convertDay($tgl1) . "-" . convertMonthB(convertMonthA($tgl1)) . "-" . convertYear($tgl1); ?></p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center"><?php echo convertDay($tgl2) . "-" . convertMonthB(convertMonthA($tgl2)) . "-" . convertYear($tgl2); ?></p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center">
					<?php
		 $datetime1 = new DateTime($tgl_mulai2);
	     $datetime2 = new DateTime($tgl_selesai2);
	     $difference = $datetime2->diff($datetime1)->days + 1;
		 echo $difference. " "; 
		?>
		Hari</p></td>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center">150.000</p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p align="center">150.000</p>
					</td>
					<td style="border:1px solid black; font-family:arial;">
						<p><?php echo $i + 1; ?>.</p>
					</td>
				</tr>

			<?php } ?>

			<tr>
				<td colspan="6" style="border:1px solid black; font-family:arial;">
					<p align="center"><b>Jumlah</b></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"><?php echo ($i * 150000); ?></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"><?php echo ($i * 150000); ?></p>
				</td>
				<td style="border:1px solid black; font-family:arial;">
					<p align="center"></p>
				</td>
			</tr>

		</table>

		<br><br>

		<table style="width:100%;font-family:arial;font-size: 12px;">
			<tr>
				<td>
					<p style="font-family:arial;" align="right">Mengetahui/Menyetujui</p>
				</td>
				<td>
					<p style="font-family:arial;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						Batam, </p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" align="right">Pejabat Pembuat Komitmen</p>
				</td>
				<td>
					<p style="font-family:arial;" align="right">Bendahara Pengeluaran</p>
				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" align="right"><u>Paniyati, S.Farm., Apt</u></p>
				</td>
				<td>
					<p style="font-family:arial;" align="right"><u>Deasy Mandasari, A.Md</u></p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-family:arial;" align="right">NIP. 19830820 200712 2 001</p>
				</td>
				<td>
					<p style="font-family:arial;" align="right">NIP. 19891203 201012 2 005</p>
				</td>
			</tr>

		</table>








</body>

</html>