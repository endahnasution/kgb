<?php
header("Content-type:application/vnd.ms-word");
$filename = $noSurat . ".doc";
header("Content-Disposition: attachment; Filename=SuratPeringatan-" . $filename)

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/peringatan.css">
</head>


<body style="font-family:arial;" onload="window.print()">

	<!-- formatting date -->
	<?php

	$tanggal  = strtotime('now');
	$tglMulaiperiksa = strtotime($tglMulaiperiksa);


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
		$tahun = "20" . $year;
		return $tahun;
	}

	?>
	<div class="Section1">

		<!-- tabel kop surat -->
		<table style="width:100%">
		<tr>
				<!-- nomor surat -->
				<th width="63%" class="satu">
					<p style="font-family:arial;">Nomor : T-PW.04.01.9A.9A2.<?php echo date('m') . "." . date('y') . "." ?></p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="21%" class="dua">
					<p style="font-family:arial;">Batam, <?php echo convertMonthB(convertMonthA($tanggal)) . " " . convertYear($tanggal) ?></p>
				</th>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;">Lampiran: </p>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;">Hal : <?php echo $halSurat ?></p>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;"><?php echo " " ?></p>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>

		<!--  tabel alamat tujuan -->
		<br>
		<table style="width:100%">
			<tr>
					<th>
						<p style="font-family:arial;" class="satu"><b>Yth. Pimpinan / Penanggung Jawab</p>
					</th>
			    </tr>
			<tr>
				<td>
					<p style="font-family:arial;"><b><?php echo $penerimaSurat; ?></b></p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;"><b>di</b></p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="space1"><b><?php echo " " . $kotaSurat ?></b></p>
				</td>
			</tr>
		</table>
		<!-- paragraf 1 -->
		<br>
		<p style="font-family:arial;" class="paragraf">Dalam rangka melindungi masyarakat dari sediaan farmasi (obat, obat tradisional, kosmetik) dan pangan yang Tidak Memenuhi Ketentuan (tanpa izin edar, rusak, kadaluarsa) pada tanggal <?php echo convertDay($tglMulaiperiksa) . " " . convertMonthB(convertMonthA($tglMulaiperiksa)) . " " . convertYear($tglMulaiperiksa) ?>
			telah dilakukan pemeriksaan terhadap sarana: </p>
		<!-- paragraf 2 -->

		<table style="width:100%">
			<tr>
				<th class="a">
					<p style="font-family:arial;" class="satu" id="space2">Nama Sarana</p>
				</th>
				<th class="b">
					<p style="font-family:arial;" class="satu">: <?php echo $namaSarana; ?></p>
				</th>
			</tr>

			<tr>
				<td>
					<p style="font-family:arial;" id="space2">Alamat Sarana</p>
				</td>
				<td>
					<p style="font-family:arial;">: <?php echo $alamatSarana; ?></p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-family:arial;" id="space2">NIB</p>
				</td>
				<td>
					<p style="font-family:arial;">: <?php echo $nib; ?></p>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-family:arial;" id="space2">No. Telp</p>
				</td>
				<td>
					<p style="font-family:arial;">: <?php echo $noHp; ?></p>
				</td>
			</tr>
		</table>

		<!-- no izin
		<table style="width:100%">
			<tr>
				<th class="a">
					<p style="font-family:arial;" class="satu" id="space2">Nomor Izin Edar</p>
				</th>
				<th class="b">
					<p style="font-family:arial;" class="satu">:</p>
				</th>
			</tr>
		</table>
		<p style="font-family:arial;"></p> -->

		<table style="width:100%">
			<tr>
				<th class="a">
					<p style="font-family:arial;" class="satu" id="space2">Nama Pimpinan</p>
				</th>
				<th class="b">
					<p style="font-family:arial;" class="satu">: <?php echo $namaPimpinan; ?></p>
				</th>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="space2">Penanggung Jawab Produksi</p>
				</td>
				<td>
					<p style="font-family:arial;">: <?php echo $namaPj; ?></p>
				</td>
		</table>


		<!-- paragraf 3 -->
		<br>
		<p style="font-family:arial;" class="paragraf">Ditemukan pelanggaran sebagai berikut: </p>
		<p style="font-family:arial;" class="paragraf"><?php echo "<p class='paragraf'>" . $detailTemuan . "</p>" ?></p>
		<!-- paragraf 4 -->
		<p style="font-family:arial;" class="paragraf">Hal ini merupakan pelanggaran terhadap: </p>
		<p style="font-family:arial;" class="paragraf">
		<?php echo $pasalPeringatan; ?>
		</ol>
		</p>
		<!-- paragraf 5 -->
		<p style="font-family:arial;" class="paragraf">Sehubungan dengan temuan tersebut di atas, kami memberikan sanksi
			<b>PERINGATAN</b> dan kepada Saudara agar:
		</p>
		<p style="font-family:arial;" id="space1">
		<ol>
			<li>
					<p style="font-family:arial;" class="paragraf">Melakukan tindak lanjut terhadap temuan dengan membuat <i>Corrective Action</i> dan <i>Preventive Action</i> (CAPA)</p>
				</li>
				<li>
					<p style="font-family:arial;" class="paragraf">2.	Melaporkan hasil tindak lanjut dan CAPA tersebut paling lambat 21 (dua puluh satu) hari kerja sejak tanggal surat tindak lanjut sarana dengan disertai data/dokumen pendukung yang ditujukan kepada Kepala Balai POM di Batam 
					</p>
				</li>
				<li>
					<p style="font-family:arial;" class="paragraf">Format CAPA dapat diunduh di bit.ly/formatCapaSarana21</p>
				</li>
				<li>
					<p style="font-family:arial;" class="paragraf">Laporan agar dikirimkan ke alamat email pemserbpom@gmail.com atau pom_batam@yahoo.com atau melalui whatsapp nomor 082282049135</p>
				</li>
				<li>
					<p style="font-family:arial;" class="paragraf">Apabila Corrective Action dan Preventive Action (CAPA) tidak dilaporkan maka akan dikenakan sanksi bertingkat sesuai dengan prosedur yang berlaku</p>
				</li>
				<li>
					<p style="font-family:arial;" class="paragraf">Melakukan pelayanan kefarmasian sesuai dengan Standar Pelayanan Kefarmasian di Apotek dan peraturan perundang - undangan yang berlaku</p>
				</li>
		</ol>
		</p>
		<!-- paragraf 6 -->
		<p style="font-family:arial;" class="paragraf">Demikian disampaikan untuk dilaksanakan.</p>
		<!-- paragraf 7 -->
		<br>
		<table style="width:100%">
			<tr>
				<th class="c">
					<p style="font-family:arial;" class="satu" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</th>
				<th class="c">
					<p style="font-family:arial;" class="satu"><b>Kepala Balai Pengawas Obat dan Makanan</b></p>
				</th>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p style="font-family:arial;"><b>Di Batam</b></p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
			</tr>
			<tr>
				<td>
					<p style="font-family:arial;" id="hilang">Cobacabicobacabicobacabicobacabi</p>
				</td>
				<td>
					<p style="font-family:arial;"><b>Bagus Heri Purnomo, S.Si., Apt.</b></p>
				</td>
			</tr>

		</table>

		<!-- paragraf 8 -->
		<?php

		function walikota($kotaSurat)
		{
			$kalimat = "";
			if ($kotaSurat == "Batam") {
				$kalimat = "<li>Walikota Batam di - <b>Batam</b></li>";
			} elseif ($kotaSurat == "Lingga") {
				$kalimat = "<li>Bupati Lingga di - <b>Daik</b></li>";
			} elseif ($kotaSurat == "Natuna") {
				$kalimat = "<li>Bupati Kabupaten Natuna di - <b>Ranai</b></li>";
			} elseif ($kotaSurat == "Bintan") {
				$kalimat = "<li>Bupati Kabupaten Bintan di - <b>Bintan</b></li>";
			} elseif ($kotaSurat == "Anambas") {
				$kalimat = "<li>Bupati Kabupaten Anambas di - <b>Tarempa</b></li>";
			} else {
				$kalimat = "<li>Bupati Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
			}

			return $kalimat;
		}

		function dinkes($kotaSurat)
		{
			$kalimat = "";
			if ($kotaSurat ==  "Batam") {
				$kalimat = "<li>Kepala Dinas Kesehatan Kota Batam di - <b>Batam</b></li>";
			} elseif ($kotaSurat == "Lingga") {
				$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Lingga di - <b>Daik</b></li>";
			} elseif ($kotaSurat == "Natuna") {
				$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Natuna di - <b>Ranai</b></li>";
			} elseif ($kotaSurat == "Bintan") {
				$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Bintan di - <b>Bintan</b></li>";
			} elseif ($kotaSurat == "Anambas") {
				$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Anambas di - <b>Tarempa</b></li>";
			} else {
				$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
			}

			return $kalimat;
		}

		function din_industri($kotaSurat)
		{
			$kalimat = "";
			if ($kotaSurat ==  "Batam") {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kota Batam di - <b>Batam</b></li>";
			} elseif ($kotaSurat == "Lingga") {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Lingga di - <b>Daik</b></li>";
			} elseif ($kotaSurat == "Natuna") {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Natuna di - <b>Ranai</b></li>";
			} elseif ($kotaSurat == "Bintan") {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Bintan di - <b>Bintan</b></li>";
			} elseif ($kotaSurat == "Anambas") {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Anambas di - <b>Tarempa</b></li>";
			} else {
				$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
			}

			return $kalimat;
		}

		function dinper($kotaSurat)
		{
			$kalimat = "";
			if ($kotaSurat ==  "Batam") {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kota Batam di - <b>Batam</b></li>";
			} elseif ($kotaSurat == "Lingga") {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Lingga di - <b>Daik</b></li>";
			} elseif ($kotaSurat == "Natuna") {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Natuna di - <b>Ranai</b></li>";
			} elseif ($kotaSurat == "Bintan") {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Bintan di - <b>Bintan</b></li>";
			} elseif ($kotaSurat == "Anambas") {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Anambas di - <b>Tarempa</b></li>";
			} else {
				$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
			}

			return $kalimat;
		}
		echo "<br>";
		echo "<p class='paragraf'>Tembusan: </p>";
		echo "<p class='paragraf'>";
		echo "<ol>";
		echo "<li>Direktur Pengawasan Produksi Pangan Olahan Badan POM RI di - <b>Jakarta</b></li>";
		echo "<p class='paragraf'>" . dinper($kotaSurat) . "</p>";
		echo "<p class='paragraf'>" . din_industri($kotaSurat) . "</p>";
		echo "</ol>";
		echo "</p>";

		?>
</div>
</body>

</html>