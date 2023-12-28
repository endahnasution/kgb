<?php
header("Content-type:application/vnd.ms-word");
$filename = $idSurat . ".doc";
header("Content-Disposition: attachment; Filename=SPD-" . $filename)

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/print.css">
</head>


<body onload="window.print()">

	<div class="page2">
	</div>


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
		$tahun = "20" . $year;
		return $tahun;
	}

	$no_surat = "";
	$nama_peg = "";
	$nip_peg = "";
	$pangkat_peg = "";
	$golongan_peg = "";
	$jabatan_peg = "";
	$urutan_peg = "";
	$maksud = "";
	$tujuan = "";
	$kendaraan = "";
	$tgl_surat = "";
	$tgl_mulai = "";
	$tgl_selesai = "";
	$tgl_mulai2;
	$tgl_selesai2;
	$mak = "";
	$nama_penandatangan = "";
	$jabatan_penandatangan = "";
	$nama_ppk = "";
	$nip_ppk = "";
	$nama_pejabat = "";
	$jabatan_pejabat = "";
	$nip_pejabat = "";

	foreach ($printS->result() as $row) {
		$nama_peg =  $row->nama;
		$nip_peg = $row->nip;
		$pangkat_peg = $row->pangkat;
		$golongan_peg = $row->golongan;
		$jabatan_peg =  $row->jabatan;
		$urutan_peg = $row->urutan;
		$no_surat = $row->noSuratTugas;
		$maksud = $row->maksud;
		$tujuan = $row->kota;
		$kendaraan = $row->kendaraan;
		$tgl_surat = strtotime($row->tglSurat);
		$tgl_mulai = strtotime($row->tglMulai);
		$tgl_mulai2 = $row->tglMulai;
		$tgl_selesai2 = $row->tglSelesai;
		$tgl_selesai = strtotime($row->tglSelesai);
		$mak = $row->mak;
	}

	foreach ($pejabatPpk as $row) {
		$nama_ppk = $row->nama;
		$nip_ppk = $row->nip;
	}

	foreach ($pejabatTtd as $row) {
		$nama_pejabat = $row->nama;
		$jabatan_pejabat = $row->jabatan;
		$nip_pejabat = $row->nip;
	}


	?>
	<div class="Section1">
	<table style="font-family:bookman old style;font-size: 10px;">

		<tr>
			<td style="width:50%;">
				<p id="hilang">aaaaaaaaaaaaaaaaaazazazazazazazazazazazazazazaz</p>
			</td>
			<td style="width:50%;">
				<p style="line-height: 1px;text-align:justify;">PERATURAN DIREKTUR JENDERAL PERBENDAHARAAN
					<br />
					NOMOR-22/PB/2013 TENTANG KETENTUAN LEBIH LANJUT
					<br />
					PELAKSANAAN PERJALANAN DINAS DALAM NEGERI BAGI PEJABAT
					<br />
					NEGARA, PEGAWAI NEGERI DAN PEGAWAI TIDAK TETAP
				</p>
			</td>
		</tr>
	</table>

	<br />


	<table style="width:100%;font-size: 14px;">
		<tr>
			<td style="width:50%;">
				<p style="font-family:bookman old style;text-align:center;">Kementerian Negara/Lembaga
					<br />
					<b>BALAI PENGAWAS OBAT DAN MAKANAN DI BATAM
						<br />
						Jalan Hang Jebat Batu Besar Nongsa
						<br />
						BATAM</b>
				</p>
			</td>
			<td style="width:50%;">
				<p style="font-family:bookman old style;" align="left">Lembar Ke<u class="hilang">iiiii</u>: <br />Kode No<u class="hilang">iiiiiiiii</u>: <br />Nomor<u class="hilang">iiiiiiiiiii'</u>: <?php echo $no_surat . "     " . $urutan_peg; ?></p>
			</td>



		</tr>
	</table>



	<p style="font-family:bookman old style;" align="center"><b>SURAT PERJALANAN DINAS (SPD)</u></p>

	<table style="width:100%;font-size: 14px;border:1px solid black;border-collapse: collapse;">
		<tr>
			<td style="border:1px solid black;width:50%;">
				<p style="font-family:bookman old style;"> 1. Pejabat Pembuat Komitmen</p>
			</td>
			<td style="border:1px solid black;width:50%;" colspan="2">
				<p style="font-family:bookman old style;"><?php echo $nama_ppk; ?></p>
			</td>
		</tr>

		<tr>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;">2. Nama / NIP Pegawai yang melaksanakan perjalanan dinas</p>
				<br />
			</td>
			<td style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;"><?php echo $nama_peg; ?> &nbsp;&nbsp;&nbsp;&nbsp;/<?php echo $nip_peg; ?></p>

			</td>
		</tr>


		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;">3. a. Pangkat dan Golongan
					<br />&nbsp;&nbsp;&nbsp;&nbsp;b. Jabatan/Instansi
					<br />&nbsp;&nbsp;&nbsp;&nbsp;c. Tingkat Biaya Perjalanan Dinas
					<br />
				</p>
			</td>
			<td valign="top" style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;">a. <?php echo $pangkat_peg; ?> / <?php echo $golongan_peg; ?>
					<br />b. <?php echo $jabatan_peg; ?>
					<br />c.
				</p>
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;">4. Maksud Perjalanan Dinas
					<br />
				</p>
			</td>
			<td valign="top" style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;"><?php echo $maksud; ?></p>
			</td>
		</tr>

		<tr>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;">5. Alat angkut yang dipergunakan
					<br />
				</p>
			</td>
			<td style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;"><?php echo $kendaraan; ?></p>
			</td>
		</tr>

		<tr>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;">6. a. Tempat Berangkat
					<br />&nbsp;&nbsp;&nbsp;&nbsp;b. Tempat Tujuan
					<br />
				</p>
			</td>

			<td style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;">a. Kota Batam
					<br />b. <?php echo $tujuan; ?>
				</p>
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;">7. a. Lama perjalanan Dinas
					<br />&nbsp;&nbsp;&nbsp;&nbsp;b. Tanggal berangkat
					<br />&nbsp;&nbsp;&nbsp;&nbsp;c. Tanggal harus kembali/tiba di tempat *)
					<br />
				</p>
			</td>

			<td valign="top" style="border:1px solid black;" colspan="2">
				<?php
				$datetime1 = new DateTime($tgl_mulai2);
				$datetime2 = new DateTime($tgl_selesai2);
				$difference = $datetime2->diff($datetime1)->days + 1;
				?>
				<p style="font-family:bookman old style;">a. <?php echo $difference . " Hari" ?>
					<br />b. <?php echo  convertDay($tgl_mulai) . " " . convertMonthB(convertMonthA($tgl_mulai)) . " " . convertYear($tgl_mulai) ?>
					<br />c. <?php echo convertDay($tgl_selesai) . " " . convertMonthB(convertMonthA($tgl_selesai)) . " " . convertYear($tgl_selesai) ?>
				</p>
			</td>

		</tr>

		<tr>

			<td valign="top" style="border:1px solid black;">

				<p style="font-family:bookman old style;">8. Pengikut : Nama
					<br />&nbsp;&nbsp;&nbsp;&nbsp;1.
					<br />&nbsp;&nbsp;&nbsp;&nbsp;2.
					<br />&nbsp;&nbsp;&nbsp;&nbsp;3.
					<br />
				</p>
			</td>

			<td valign="top" style="border:1px solid black;">

				<p style="font-family:bookman old style;">Tanggal Lahir
					<br />&nbsp;&nbsp;&nbsp;&nbsp;
					<br />&nbsp;&nbsp;&nbsp;&nbsp;
					<br />&nbsp;&nbsp;&nbsp;&nbsp;
				</p>
			</td>

			<td valign="top" style="border:1px solid black;">

				<p style="font-family:bookman old style;">Keterangan
					<br />&nbsp;&nbsp;&nbsp;&nbsp;
					<br />&nbsp;&nbsp;&nbsp;&nbsp;
					<br />&nbsp;&nbsp;&nbsp;&nbsp;

				</p>
			</td>



		</tr>

		<tr>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;">9. Pembebanan Anggaran
					<br />&nbsp;&nbsp;&nbsp;&nbsp;a. Instansi
					<br />&nbsp;&nbsp;&nbsp;&nbsp;b. Mata Anggaran
					<br />
				</p>
			</td>

			<td style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;">
					<br />a. Balai Pengawas Obat dan Makanan di Batam
					<br />b. <?php echo $mak; ?>
				</p>
			</td>
		</tr>

		<tr>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;">10. Keterangan Lain-Lain
					<br />
				</p>
			</td>
			<td style="border:1px solid black;" colspan="2"></td>
		</tr>

	</table>

	<br />

	<table style="width:100%;font-size: 14px;border-collapse: collapse;">
		<tr>
			<td style="width:50%;">
				<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
			</td>
			<td style="width:50%;">
				<p style="font-family:bookman old style;" align="left">Dikeluarkan di : Batam
					<br />Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo  convertDay($tgl_surat) . " " . convertMonthB(convertMonthA($tgl_surat)) . " " . convertYear($tgl_surat) ?>
					<br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
					<br />Pejabat Pembuat Komitmen
					<br />
					<br />
					<br />
					<br />
					<br />
					<br /><?php echo $nama_ppk; ?>
					<br />NIP. <?php echo $nip_ppk; ?>
				</p>
			</td>
		</tr>

	</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
	<table style="width:100%;font-size: 14px;border:1px solid black;border-collapse: collapse;">
		<tr>
			<td style="width:50%;border:1px solid black;">
				<p id="hilang">Cobacabicobacabicobacabicobacabi</p>
			</td>
			<td style="width:50%;border:1px solid black;">
				<p style="font-family:bookman old style;" align="left">Berangkat dari<u class="hilang">iiii,'</u>: Batam
					<br />Pada Tanggal <u class="hilang">iiiii’’’</u>: <?php echo  convertDay($tgl_mulai) . " " . convertMonthB(convertMonthA($tgl_mulai)) . " " . convertYear($tgl_mulai) ?>
					<br />Tempat Tujuan<u class="hilang">iiill</u>: <?php echo $tujuan; ?>
					<br>
					<br />Kasub Bag Tata Usaha
					<br />
					<br />
					<br />

					<br />Larasti Setyaningtyas, S.Farm., Apt
					<br />NIP. 19840502 200812 2 2002
				</p>
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="left">II. Tiba di <u class="hilang">iiii,'.’i,'</u>:
					<br />&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal :
				</p>
			</td>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="top-left">Berangkat dari :
					<br />Ke <u class="hilang">,'.’ii’’’’’’’’’’’’’’’’I’</u> :
					<br />Pada Tanggal  <u class="hilang">','</u>:
				</p>
				<br />
				<br />
				<br />
				<br />
				<br />

			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="left">III. Tiba di <u class="hilang">iiii,'.’i,'</u>:
					<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal :
				</p>
			</td>
			<td>
				<p style="font-family:bookman old style;" align="top-left">Berangkat dari :
					<br />Ke <u class="hilang">,'.’ii’’’’’’’’’’’’’’’’I’</u> :
					<br />Pada Tanggal <u class="hilang">','</u>:
				</p>
				<br />
				<br />
				<br />
				<br />
				<br />
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="left">IV. Tiba di <u class="hilang">iiii,'.’i,'</u>:
					<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada Tanggal :
				</p>
			</td>
			<td style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="top-left">Berangkat dari :
					<br />Ke <u class="hilang">,'.’ii’’’’’’’’’’’’’’’’I’</u> :
					<br />Pada Tanggal <u class="hilang">','</u>:
				</p>
				<br />
				<br />
				<br />
				<br />
				<br />
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="left">V. Tiba Kembali<u class="hilang">''</u>: Batam
					<br />(Tempat Kedudukan)
					<br />Pada Tanggal &nbsp;&nbsp;&nbsp;&nbsp;:
					<br>
					<br />Pejabat Pembuat Komitmen
					<br />
					<br />
					<br />
					<br /><?php echo $nama_ppk; ?>
					<br />NIP. <?php echo $nip_ppk; ?>
				</p>
			</td>

			<td valign="top" style="border:1px solid black;">
				<p style="font-family:bookman old style;" align="justify">Telah diperiksa dengan keterangan bahwa perjalanan tersebut diatas benar dilakukan atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya
					<br>
					<br />Pejabat Pembuat Komitmen
					<br />
					<br />
					<br />
					<br /><?php echo $nama_ppk; ?>
					<br />NIP. <?php echo $nip_ppk; ?>
				</p>
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;" align="left">VI. Keterangan Lain-Lain
			</td>
		</tr>

		<tr>
			<td valign="top" style="border:1px solid black;" colspan="2">
				<p style="font-family:bookman old style;" align="left">VII. PERHATIAN :</p>
				<p style="font-family:bookman old style;" align="left">PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara bertanggung jawab berdasarkan peraturan-peraturan keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</p>
			</td>
		</tr>
	</table>



	</div>
</body>

</html>