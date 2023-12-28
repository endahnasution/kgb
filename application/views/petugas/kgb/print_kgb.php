<?php
header("Content-type:application/vnd.ms-word");
$filename = $id.".doc";
header("Content-Disposition: attachment; Filename=FileKgb-".$filename)

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
				<th width="50%" class="satu">
					<p style="font-family:arial;">Nomor : <?php echo $sk_baru; ?></p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="50%" class="dua">
					<p style="font-family:arial;">Batam, <?php echo convertDay(strtotime($tgl_sk_baru)). " ". convertMonthB(convertMonthA(strtotime($tgl_sk_baru))) . " " . convertYear(strtotime($tgl_sk_baru)); ?></p>
				</th>
          
               
			</tr>
				<tr>
				 
                <th width="50%" class="satu">
					<p style="font-family:arial;">Lampiran : - </p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="50%" class="dua">
                <?php echo " " ?>
				</th>
				</tr>
                
				<tr>
                <th width="50%" class="satu">
					<p style="font-family:arial;">Perihal : Kenaikan Gaji Berkala A.n <?php echo $nama;?> </p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="50%" class="dua">
                <?php echo " " ?>
				</th>
				 
				</tr>
			</table>

			<!--  tabel alamat tujuan -->
			<br>
			<table style="width:100%">
				<tr>
					<th>
						<p style="font-family:arial;" class="satu">Kepada Yth.</p>
					</th>
			    </tr>
				<tr>
					<td><p style="font-family:arial;">Kepala Kantor Pelayanan Perbendaharaan Negara</p></td>
				</tr>
				<tr>
					<td><p style="font-family:arial;">di- </p></td>
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="space1">Batam</p></td>
				</tr>
			</table>
			<!-- paragraf 1 -->
			<br>
			<p> Dengan Hormat, </p>
            <p>Dengan ini diberitahukan bahwa berhubungan dengan telah dipenuhinya masa kerja dan syarat lainnya kepada : </p>

            <table style="width:100%;  font-family:arial">
			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">1.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="40%" class="dua">
					<p align="left">Nama</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="54%" class="dua">
					<p align="left"><b><?php echo $nama?></b></p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">2.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">NIP</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $nip?></p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">3.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Pangkat/Jabatan</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $pangkat.",".$golongan?></p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">4.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Kantor Tempat Bekerja</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left">Balai POM di Batam</p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">5.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Gaji Pokok Lama</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left">Rp <?php echo $gapok_lama?>,-</p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;"id="hilang">a</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left" style= "text-indent: 2em">a. Oleh Pejabat</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left">Kepala Balai POM di Batam</p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;"id="hilang">b</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left" style= "text-indent: 2em">b. Tanggal</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo convertDay(strtotime($tgl_sk_lama)). " ". convertMonthB(convertMonthA(strtotime($tgl_sk_lama))) . " " . convertYear(strtotime($tgl_sk_lama)); ?></p>
				</th>
               
			</tr>

            <tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;"id="hilang">c</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left" style= "text-indent: 2em">c. Nomor</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $sk_lama?></p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;"id="hilang">d</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left" style= "text-indent: 2em">d. Tanggal mulai berlakunya</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
				<p style="font-family:arial;" align="left"><?php echo convertDay(strtotime($spmk_lama)). " ". convertMonthB(convertMonthA(strtotime($spmk_lama))) . " " . convertYear(strtotime($spmk_lama)); ?></p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;"id="hilang">e</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left" style= "text-indent: 2em">e. Masa kerja golongan pada tanggal tersebut</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $tahun_kerja_lama." tahun ". $bulan_kerja_lama." bulan"?></p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				
                <td colspan="4"><p align="left">Diberikan kenaikan gaji berkala hingga memperoleh :  </p></td>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">6.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Gaji pokok baru  </p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left">Rp <?php echo $gapok_baru?>,-</p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">7.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Berdasarkan masa kerja </p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $tahun_kerja_baru." tahun ". $bulan_kerja_baru." bulan"?></p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">8.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Dalam golongan</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p align="left"><?php echo $golongan_baru; ?></p>
				</th>
               
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">9.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="15%" class="dua">
					<p align="left">Mulai Berlaku</p>
				</th>
                <th width="3%" class="dua">
					<p align="left">:</p>
				</th>
                <th width="78%" class="dua">
					<p style="font-family:arial;" align="left"><?php echo convertDay(strtotime($spmk_baru)). " ". convertMonthB(convertMonthA(strtotime($spmk_baru))) . " " . convertYear(strtotime($spmk_baru)); ?></p>
				</th>
               
			</tr>
				
			</table>

			<p>Diharapkan agar sesuai dengan Peraturan Pemerintah Nomor 15 Tahun 2019 kepada pegawai tersebut dapat dibayarkan penghasilannya berdasarkan gaji pokok yang baru.</p>

		
			<!-- paragraf 7 -->
			<br>
			<table style="width:100%;font-family:arial">
				<tr>
					<th class="c"><p style="font-family:arial;"class="satu" id="hilang">Cobacabicobacabicobacabicobacabi</p></th> 
					<th class="c"><p style="font-family:arial;"class="satu">Kepala Balai Pengawas Obat dan Makanan</p></th> 
				</tr>
			
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;">${ttd_pengirim}.</p></td> 
				</tr>
				<tr>
					<td><p style="font-family:arial;"id="hilang">Cobacabicobacabicobacabicobacabi</p></td> 
					<td><p style="font-family:arial;">Musthofa Anwari, S.Si., Apt</p></td> 
				</tr>

			</table>

			<br>
			<p>Tembusan : </p>
			<table style="width:100%;font-family:arial;">
			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">1.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="97%" class="dua">
					<p align="left">Kepala BKN Up. Deputi Bidang Informasi Kepegawaian di Jakarta</p>
				</th>
            
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">2.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="97%" class="dua">
					<p align="left">Kepala Biro Sumber Daya Manusia Badan POM cq. Kelompok substansi Pengelolaan Kinerja dan Kesra Sumber Daya Manusia</p>
				</th>
            
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">3.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="97%" class="dua">
					<p align="left">Pembuat daftar gaji yang bersangkutan</p>
				</th>
            
			</tr>

			<tr>
				<!-- nomor surat -->
				<th width="3%" class="satu">
					<p style="font-family:arial;">4.</p>
				</th>
				<!-- tanggal pembuatan surat -->
				<th width="97%" class="dua">
					<p align="left">Arsip</p>
				</th>
            
			</tr>
			</table>

			<!-- paragraf 8 -->
		
</div>
	</div>
</body>
</html>