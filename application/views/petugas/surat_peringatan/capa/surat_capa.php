<?php
header("Content-type:application/vnd.ms-word");
$filename = $noSurat.".doc";
header("Content-Disposition: attachment; Filename=SuratCapa-".$filename)

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="">
	<!-- CSS buatan sendiri -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/style.css">
</head>


<body style="font-family:arial;" onload="window.print()">

	<div class="page">
		
			<!-- formatting date -->
			<?php

			$tanggal  = strtotime('now');
			


			function convertDay($day){
				$day = date('d',$day);
				return $day;
			}
			function convertMonthA($month){
				$month = date('m',$month);
				return $month;
			}

			function convertMonthB($month){
				if($month=="01"){
					$month = "Januari";
				}elseif($month=="02"){
					$month ="Februari";
				}elseif($month=="03"){
					$month = "Maret";
				}elseif($month=="04"){
					$month ="April";
				}elseif($month=="05"){
					$month  = "Mei";
				}elseif($month=="06"){
					$month = "Juni";
				}elseif($month=="07"){
					$month = "Juli";
				}elseif($month=="08"){
					$month = "Agustus";
				}elseif($month=="09"){
					$month = "September";
				}elseif($month=="10"){
					$month="Oktober";
				}elseif($month=="11"){
					$month="November";
				}else{
					$month="Desember";
				}
				return $month;
			}

			function convertYear($year){
				$year = date('y',$year);
				$tahun = "20".$year;
				return $tahun;
			}

			?>

			<!-- tabel kop surat -->
			<table style="width:100%">
			<tr>
				<!-- nomor surat -->
				<th width="67%" class="satu">
					<p style="font-family:arial;">Nomor : T-PW.01.10.9A.9A2.<?php echo date('m') . "." . date('y') . "." ?></p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="33%" class="dua">
					<p style="font-family:arial;">Batam, <?php echo convertMonthB(convertMonthA($tanggal)) . " " . convertYear($tanggal) ?></p>
				</th>
			</tr>
				<tr>
				 
					<?php if($halSurat == "eval"){
						?>
						<td><p style="font-family:arial;">Hal		: Evaluasi CAPA</p></td>

						<?php
					}else {
						?>
						<td><p style="font-family:arial;">Hal		: Closed CAPA</p></td>
						<?php
					} ?>
					
				</tr>
				<tr>
				  <td><p style="font-family:arial;"><?php echo " " ?></p></td>
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
					<td><p style="font-family:arial;"><b><?php echo $penerimaSurat; ?></b></p></td>
				</tr>
				<tr>
					<td><p style="font-family:arial;"><b>di</b></p></td>
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="space1"><b><?php echo " ". $kotaSurat ?></b></p></td>
				</tr>
			</table>
			<!-- paragraf 1 -->
			<br>
			<p> <?php echo $detailTemuan?> </p>
		
			<!-- paragraf 7 -->
			<br>
			<table style="width:100%">
				<tr>
					<th class="c"><p style="font-family:arial;"class="satu" id="hilang">Cobacabicobacabicobacabicobacabi</p></th> 
					<th class="c"><p style="font-family:arial;"class="satu"><b>Kepala Balai Pengawas Obat dan Makanan</b></p></th> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;"><b>Di Batam</b></p></td> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;"><b>Bagus Heri Purnomo, S.Si., Apt.</b></p></td> 
				</tr>

			</table>

			<!-- paragraf 8 -->
			<?php

			function walikota($kotaSurat){
				$kalimat="";
				if($kotaSurat == "Batam"){
					$kalimat = "<li>Walikota Batam di - <b>Batam</b></li>";
				}elseif($kotaSurat == "Lingga"){
					$kalimat = "<li>Bupati Lingga di - <b>Daik</b></li>";
				}elseif($kotaSurat == "Natuna"){
					$kalimat = "<li>Bupati Kabupaten Natuna di - <b>Ranai</b></li>";
				}elseif($kotaSurat == "Bintan"){
					$kalimat = "<li>Bupati Kabupaten Bintan di - <b>Bintan</b></li>";
				}elseif($kotaSurat == "Anambas"){
					$kalimat = "<li>Bupati Kabupaten Anambas di - <b>Tarempa</b></li>";
				}else{
					$kalimat = "<li>Bupati Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
				}

				return $kalimat;

			}

			function dinkes($kotaSurat){
				$kalimat="";
				if($kotaSurat ==  "Batam"){
					$kalimat = "<li>Kepala Dinas Kesehatan Kota Batam di - <b>Batam</b></li>";
				}elseif($kotaSurat == "Lingga"){
					$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Lingga di - <b>Daik</b></li>";
				}elseif($kotaSurat== "Natuna"){
					$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Natuna di - <b>Ranai</b></li>";
				}elseif($kotaSurat == "Bintan"){
					$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Bintan di - <b>Bintan</b></li>";
				}elseif($kotaSurat== "Anambas"){
					$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Anambas di - <b>Tarempa</b></li>";
				}else{
					$kalimat = "<li>Kepala Dinas Kesehatan Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
				}

				return $kalimat;

			}

			function din_industri($kotaSurat){
				$kalimat="";
				if($kotaSurat ==  "Batam"){
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kota Batam di - <b>Batam</b></li>";
				}elseif($kotaSurat == "Lingga"){
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Lingga di - <b>Daik</b></li>";
				}elseif($kotaSurat== "Natuna"){
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Natuna di - <b>Ranai</b></li>";
				}elseif($kotaSurat == "Bintan"){
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Bintan di - <b>Bintan</b></li>";
				}elseif($kotaSurat== "Anambas"){
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Anambas di - <b>Tarempa</b></li>";
				}else{
					$kalimat = "<li>Kepala Dinas Perindustrian, Perdagangan dan Energi Sumber Daya Mineral Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
				}

				return $kalimat;
			}

			function dinper($kotaSurat){
				$kalimat="";
				if($kotaSurat ==  "Batam"){
					$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kota Batam di - <b>Batam</b></li>";
				}elseif($kotaSurat == "Lingga"){
					$kalimat = "<li>KKepala Dinas Perindustrian dan Perdagangan Kabupaten Lingga di - <b>Daik</b></li>";
				}elseif($kotaSurat== "Natuna"){
					$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Natuna di - <b>Ranai</b></li>";
				}elseif($kotaSurat == "Bintan"){
					$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Bintan di - <b>Bintan</b></li>";
				}elseif($kotaSurat== "Anambas"){
					$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Anambas di - <b>Tarempa</b></li>";
				}else{
					$kalimat = "<li>Kepala Dinas Perindustrian dan Perdagangan Kabupaten Karimun di - <b>Tanjung Balai Karimun</b></li>";
				}

				return $kalimat;
			}
			echo "<br>";
			echo "<p class='paragraf'>Tembusan: </p>";
			echo "<p class='paragraf'>";
			echo "<ol>";
			echo "<p class='paragraf'>".walikota($kotaSurat)."</p>";
			echo "<li>Direktur Pengawasan Distribusi dan Pelayanan Obat, Narkotika, Psikotropika, dan Prekursor Badan POM RI di - <b>Jakarta</b></li>";
			echo "<p class='paragraf'>".dinkes($kotaSurat)."</p>";
			echo "<li>Ketua PD Ikatan Apoteker Provinsi Kepri di - <b>Batam</b></li>";
			echo "</ol>";
			echo "</p>";

			?>
</div>
	</div>
</body>
</html>