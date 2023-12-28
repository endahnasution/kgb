<?php
header("Content-type:application/vnd.ms-word");
$filename = $idKw.".doc";
header("Content-Disposition: attachment; Filename=kwLukota-".$filename)

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


<body onload="window.print()">

	<div class="page">
		<?php

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
			$tahun = $year;
			return $tahun;
		}
		$nama = "";
		$nip = "";
		$tujuan = "";
		$tgl1 = "";
		$tgl2 = "";
		$maksud = "";
		$tglKw  = "";
		$uraian_kw = array();
		$biaya_kw = array();
		foreach($kwLukota->result() as $row){
			$nama = $row->nama;
			$nip = $row->nip;
			$tujuan = $row->kota;
			$tgl1 =strtotime($row->tglMulai);
			$tgl2 = strtotime($row->tglSelesai);
			$maksud = $row->maksud;
			$tglKw= strtotime($row->tglKwitansi);
			array_push($uraian_kw,$row->uraian);
			array_push($biaya_kw,$row->biaya);

		}

		$jumlahPerjalanan = 0;

		?>
		<p style="font-family:arial;" align="center"><b>BIAYA PERJALANAN DINAS</b></p>
		<p style="font-family:arial;" align="center"><b><?php  echo $maksud; ?></b></p>

		<table style="width:100%">
			<tr>
				<th class="a"><p style="font-family:arial;" class="satu" id="space2">Nama</p></th>
				<th class="b"><p style="font-family:arial;" class="satu">: <?php echo $nama; ?></p></th>
			</tr>


			<tr>
				<td><p style="font-family:arial;" id="space2">NIP</p></td>
				<td><p style="font-family:arial;">: <?php echo $nip; ?></p></td>
			</tr>

			<tr>
				<td><p style="font-family:arial;" id="space2">Tujuan</p></td>
				<td><p style="font-family:arial;">: <?php echo $tujuan; ?></p></td>
			</tr>	

			<tr>
				<td><p style="font-family:arial;" id="space2">Waktu Pelaksanaan</p></td>
				<td><p style="font-family:arial;">: <?php echo convertDay($tgl1)."-".convertMonthB(convertMonthA($tgl1))."-".convertYear($tgl1) ." - ".convertDay($tgl2)."-".convertMonthB(convertMonthA($tgl2))."-".convertYear($tgl2); ?></p></td>
			</tr>	

			<tr>
				<td><p style="font-family:arial;" id="space2">Maksud Perjalanan</p></td>
				<td><p style="font-family:arial;">: <?php echo $maksud; ?></p></td>
			</tr>	

		</table>

		<?php

		$no=1;

		?>	

		<br>


		<table style="width:100%;  border:1px solid black;border-collapse: collapse; ">
			<tr>
				<th style="border:1px solid black;"><p style="font-family:arial;">No</p></th>
				<th style="border:1px solid black;"><p style="font-family:arial;">Perincian Biaya</p></th>
				<th style="border:1px solid black;"><p style="font-family:arial;">Jumlah</p></th>
			</tr>

			<?php for($i=0;$i<count($biaya_kw);$i++){ ?>

				<tr>
					<td style="border:1px solid black;"><p style="font-family:arial;" align="center"><?php echo $i+1; ?></p></td>
					<td style="border:1px solid black;"><p style="font-family:arial;" align="left"><?php echo $uraian_kw[$i]; ?></p></td>
					<td style="border:1px solid black;"><p style="font-family:arial;" align="center"><?php echo "Rp       ".$biaya_kw[$i]; ?></p></td>
				</tr>

			<?php }?>
			<td style="border:1px solid black;" colspan="2"><p style="font-family:arial;" align="center"><b>Jumlah</b></p></td>
			<td style="border:1px solid black;"><p style="font-family:arial;" align="center"><?php echo "Rp       ".array_sum($biaya_kw); ?></p></td>

		</table>
		<br>
		<table style="width:100%">
			<tr>
				<td><p style="font-family:arial;" align="left" >Mengetahui/Menyetujui</p></td> 
				<td><p style="font-family:arial;" align="left">Batam, <?php echo convertDay($tglKw)."-".convertMonthB(convertMonthA($tglKw))."-".convertYear($tglKw) ;?></b></p></td> 
			</tr>
			<tr>
				<td><p style="font-family:arial;" align="left">Pejabat Pembuat Komitmen</p></td> 
				<td><p style="font-family:arial;" align="left">Petugas</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
				<td><p id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
			</tr>
			<tr>
				<td><p style="font-family:arial;" align="left"><b>Paniyati, S.Farm., Apt  </b></p></td> 
				<td><p style="font-family:arial;" align="left"><b><?php echo $nama; ?></b></p></td> 
			</tr>

			<tr>
				<td><p style="font-family:arial;" align="left"><b>NIP. 19830820 200712 2 001</b></p></td> 
				<td><p style="font-family:arial;" align="left"><b>NIP. <?php echo $nip; ?></b></p></td> 
			</tr>

		</table>


		





	</body>
	</html>