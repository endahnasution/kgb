<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=TotalPemeriksaan-" . $filename);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php  echo "Periode Pemeriksaan Tanggal ". $tglAwal. " s/d ". $tglAkhir ?>
    <?php echo "Kota : ". $kota?>
    <br>

    <table border="1" style="text-align:center">
        <thead>
            <tr style="background-color:#E0E0E0 ">
                  <th class="dt-center">Nomor</th>
                  <th class="dt-center">Komoditi</th>
                  <th class="dt-center">Jumlah Pemeriksaan</th>
                  <th class="dt-center">MK</th>
                   <th class="dt-center">TMK</th>
                    <th class="dt-center">Pembinaan</th>
                    <th class="dt-center">Pembinaan Teknis</th>
                    <th class="dt-center">Peringatan</th>
                    <th class="dt-center">Peringatan Keras</th>
                    <th class="dt-center">PSK</th>
                    <th class="dt-center">Tidak ada TL</th>
                 
            </tr>
        </thead>

          <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">1</th>
                  <th class="dt-center">PBF</th>
                  <th class="dt-center"><?php echo $pbf?></th>
                  <th class="dt-center"><?php echo $mk_pbf?></th>
                  <th class="dt-center"><?php echo $pbf - $mk_pbf?></th>
                  <th class="dt-center"><?php echo $pembinaan_pbf?></th>
                  <th class="dt-center"><?php echo $pembinaantek_pbf?></th>
                  <th class="dt-center"><?php echo $peringatan_pbf?></th>
                   <th class="dt-center"><?php echo $peringatanKer_pbf?></th>
                    <th class="dt-center"><?php echo $psk_pbf?></th>
                    <th class="dt-center"><?php echo $notl_pbf?></th>
                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">2</th>
                  <th class="dt-center">Apotek</th>
                  <th class="dt-center"><?php echo $apotek?></th>
                  <th class="dt-center"><?php echo $mk_apotek?></th>
                  <th class="dt-center"><?php echo $apotek- $mk_apotek?></th>
                  <th class="dt-center"><?php echo $pembinaan_apotek?></th>
                    <th class="dt-center"><?php echo $pembinaantek_apotek?></th>
                    <th class="dt-center"><?php echo $peringatan_apotek?></th>
                    <th class="dt-center"><?php echo $peringatanKer_apotek?></th>
                    <th class="dt-center"><?php echo $psk_apotek?></th>
                     <th class="dt-center"><?php echo $notl_apotek?></th>


                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">2</th>
                  <th class="dt-center">puskesmas</th>
                  <th class="dt-center"><?php echo $puskesmas?></th>
                  <th class="dt-center"><?php echo $mk_puskesmas?></th>
                  <th class="dt-center"><?php echo $puskesmas- $mk_puskesmas?></th>
                  <th class="dt-center"><?php echo $pembinaan_puskesmas?></th>
                    <th class="dt-center"><?php echo $pembinaantek_puskesmas?></th>
                    <th class="dt-center"><?php echo $peringatan_puskesmas?></th>
                    <th class="dt-center"><?php echo $peringatanKer_puskesmas?></th>
                    <th class="dt-center"><?php echo $psk_puskesmas?></th>
                    <th class="dt-center"><?php echo $notl_puskesmas?></th>


                 
            </tr>


              <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">3</th>
                  <th class="dt-center">Toko Obat</th>
                  <th class="dt-center"><?php echo $toko_obat?></th>
                  <th class="dt-center"><?php echo $mk_toko_obat?></th>
                  <th class="dt-center"><?php echo $toko_obat - $mk_toko_obat?></th>
                  <th class="dt-center"><?php echo $pembinaan_toko_obat?></th>
                   <th class="dt-center"><?php echo $pembinaantek_toko_obat?></th>
                   <th class="dt-center"><?php echo $peringatan_toko_obat?></th>
                    <th class="dt-center"><?php echo $peringatanKer_toko_obat?></th>
                      <th class="dt-center"><?php echo $psk_toko_obat?></th>
                      <th class="dt-center"><?php echo $notl_toko_obat?></th>

                 
            </tr>
               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">4</th>
                  <th class="dt-center">Klinik</th>
                  <th class="dt-center"><?php echo $klinik?></th>
                  <th class="dt-center"><?php echo $mk_klinik?></th>
                  <th class="dt-center"><?php echo $klinik - $mk_klinik?></th>
                   <th class="dt-center"><?php echo $pembinaan_klinik?></th>
                   <th class="dt-center"><?php echo $pembinaantek_klinik?></th>
                   <th class="dt-center"><?php echo $peringatan_klinik?></th>
                    <th class="dt-center"><?php echo $peringatanKer_klinik?></th>
                    <th class="dt-center"><?php echo $psk_klinik?></th>
                    <th class="dt-center"><?php echo $notl_klinik?></th>
                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">5</th>
                  <th class="dt-center">Rumah Sakit </th>
                  <th class="dt-center"><?php echo $rs?></th>
                  <th class="dt-center"><?php echo $mk_rs?></th>
                  <th class="dt-center"><?php echo $rs - $mk_rs?></th>
                  <th class="dt-center"><?php echo $pembinaan_rs?></th>
                  <th class="dt-center"><?php echo $pembinaantek_rs?></th>
                  <th class="dt-center"><?php echo $peringatan_rs?></th>
                 <th class="dt-center"><?php echo $peringatanKer_rs?></th>
                 <th class="dt-center"><?php echo $psk_rs?></th>
                    <th class="dt-center"><?php echo $notl_rs?></th>
                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">6</th>
                  <th class="dt-center">IFK</th>
                  <th class="dt-center"><?php echo $ifk?></th>
                  <th class="dt-center"><?php echo $mk_ifk?></th>
                  <th class="dt-center"><?php echo $ifk - $mk_ifk?></th>
                   <th class="dt-center"><?php echo $pembinaan_ifk?></th>
                   <th class="dt-center"><?php echo $pembinaantek_ifk?></th>
                   <th class="dt-center"><?php echo $peringatan_ifk?></th>
                    <th class="dt-center"><?php echo $peringatanKer_ifk?></th>
                     <th class="dt-center"><?php echo $psk_ifk?></th>
                     <th class="dt-center"><?php echo $notl_ifk?></th>
                 
            </tr>

              <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">7</th>
                  <th class="dt-center">Produksi OT </th>
                  <th class="dt-center"><?php echo $prod_ot?></th>
                  <th class="dt-center"><?php echo $mk_prod_ot?></th>
                  <th class="dt-center"><?php echo $prod_ot - $mk_prod_ot?>
                      
                  </th>
                   <th class="dt-center"><?php echo $pembinaan_prod_ot?></th>
                    <th class="dt-center"><?php echo $pembinaantek_prod_ot?></th>
                    <th class="dt-center"><?php echo $peringatan_prod_ot?></th>
                     <th class="dt-center"><?php echo $peringatanKer_prod_ot?></th>
                        <th class="dt-center"><?php echo $psk_prod_ot?></th>
                           <th class="dt-center"><?php echo $notl_prod_ot?></th>
                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">8</th>
                  <th class="dt-center">Distribusi OT   </th>
                  <th class="dt-center"><?php echo $dist_ot?></th>
                  <th class="dt-center"><?php echo $mk_dist_ot?></th>
                  <th class="dt-center"><?php echo $dist_ot - $mk_dist_ot?>
                     
                  </th>
                   <th class="dt-center"><?php echo $pembinaan_dist_ot?></th>
                    <th class="dt-center"><?php echo $pembinaantek_dist_ot?></th>
                    <th class="dt-center"><?php echo $peringatan_dist_ot?></th>
                     <th class="dt-center"><?php echo $peringatanKer_dist_ot?></th>
                     <th class="dt-center"><?php echo $psk_dist_ot?></th>
                      <th class="dt-center"><?php echo $notl_dist_ot?></th>
                 
                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">9</th>
                  <th class="dt-center">Produksi Kosmetik   </th>
                  <th class="dt-center"><?php echo $prod_kos?></th>
                  <th class="dt-center"><?php echo $mk_prod_kos?></th>
                  <th class="dt-center"><?php echo $prod_kos - $mk_prod_kos?></th>
                  <th class="dt-center"><?php echo $pembinaan_prod_kos?></th>
                    <th class="dt-center"><?php echo $pembinaantek_prod_kos?></th>
                    <th class="dt-center"><?php echo $peringatan_prod_kos?></th>
                    <th class="dt-center"><?php echo $peringatanKer_prod_kos?></th>
                       <th class="dt-center"><?php echo $psk_prod_kos?></th>
                       <th class="dt-center"><?php echo $notl_prod_kos?></th>
                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">10</th>
                  <th class="dt-center">Distribusi Kosmetik </th>
                  <th class="dt-center"><?php echo $dist_kos?></th>
                  <th class="dt-center"><?php echo $mk_dist_kos?></th>
                  <th class="dt-center"><?php echo $dist_kos - $mk_dist_kos?></th>
                   <th class="dt-center"><?php echo $pembinaan_dist_kos?></th>
                     <th class="dt-center"><?php echo $pembinaantek_dist_kos?></th>
                     <th class="dt-center"><?php echo $peringatan_dist_kos?></th>
                     <th class="dt-center"><?php echo $peringatanKer_dist_kos?></th>
                      <th class="dt-center"><?php echo $psk_dist_kos?></th>
                                <th class="dt-center"><?php echo $notl_dist_kos?></th>
                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">11</th>
                  <th class="dt-center">Produksi Pangan </th>
                  <th class="dt-center"><?php echo $prod_pangan?></th>
                  <th class="dt-center"><?php echo $mk_prod_pangan?></th>
                  <th class="dt-center"><?php echo $prod_pangan - $mk_prod_pangan?></th>
                  <th class="dt-center"><?php echo $pembinaan_prod_pangan?></th>
                  <th class="dt-center"><?php echo $pembinaantek_prod_pangan?></th>
                  <th class="dt-center"><?php echo $peringatan_prod_pangan?></th>
                  <th class="dt-center"><?php echo $peringatanKer_prod_pangan?></th>
                   <th class="dt-center"><?php echo $psk_prod_pangan?></th>
                             <th class="dt-center"><?php echo $notl_prod_pangan?></th>
                 
            </tr>

 <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">12</th>
                  <th class="dt-center">Distribusi Pangan   </th>
                  <th class="dt-center"><?php echo $dist_pangan?></th>
                   <th class="dt-center"><?php echo $mk_dist_pangan?></th>
                   <th class="dt-center"><?php echo $dist_pangan - $mk_dist_pangan?></th>
                    <th class="dt-center"><?php echo $pembinaan_dist_pangan?></th>
                    <th class="dt-center"><?php echo $pembinaantek_dist_pangan?></th>
                    <th class="dt-center"><?php echo $peringatan_dist_pangan?></th>
                    <th class="dt-center"><?php echo $peringatanKer_dist_pangan?></th>
                     <th class="dt-center"><?php echo $psk_dist_pangan?></th>
                      <th class="dt-center"><?php echo $notl_dist_pangan?></th>
                 
            </tr>

       
      <!--   <?php     
                 // if(isset($anggaran)){
                 //  foreach ($anggaran->result() as $row){
                 
                 //   echo "<tr>";
                 //   echo "<td class='dt-center'>".$row->mak."</td>";      
                 //   echo "<td class='dt-center'>".$row->namaAnggaran."</td>";
                 //   echo "<td class='dt-center'>".$row->divisi."</td>";
                 //   echo "<td class='dt-center'>".$row->kode."</td>";
                 //   echo "<td class='dt-center'>Rp. ".$row->pagu."</td>";
                 //   echo "<td class='dt-center'>Rp. ".$row->biaya_riil."</td>";
                 //  }
                 //  }else{
                 //   echo "no record found";
                 //  }
                ?>

    </tr> -->

    </table>
</body>

</html>