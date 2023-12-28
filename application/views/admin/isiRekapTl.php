<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=TotalRekapSuratTindakLanjut-" . $filename);
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

    <br>

    <table border="1" style="text-align:center">
        <thead>
            <tr style="background-color:#E0E0E0 ">
                  <th class="dt-center">Nomor</th>
                  <th class="dt-center">Komoditi</th>
                  <th class="dt-center">Jumlah Surat TL Dibuat</th>
                  <th class="dt-center">Jumlah Surat TL Keluar</th>
                   <th class="dt-center">Surat Feedback Masuk</th>
                        
                 
            </tr>
        </thead>

          <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">1</th>
                  <th class="dt-center">PBF</th>
                  <th class="dt-center"><?php echo $tl_pbf_created?></th>
                  <th class="dt-center"><?php echo $tl_pbf_sent?></th>
                  <th class="dt-center"><?php echo $feedback_pbf_get?></th>
                
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">2</th>
                  <th class="dt-center">Apotek</th>
                  <th class="dt-center"><?php echo $tl_apotek_created?></th>
                  <th class="dt-center"><?php echo $tl_apotek_sent?></th>
                  <th class="dt-center"><?php echo $feedback_apotek_get?></th>


                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">2</th>
                  <th class="dt-center">puskesmas</th>
                  <th class="dt-center"><?php echo $tl_puskesmas_created?></th>
                  <th class="dt-center"><?php echo $tl_puskesmas_sent?></th>
                  <th class="dt-center"><?php echo $feedback_puskesmas_get?></th>



                 
            </tr>


              <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">3</th>
                  <th class="dt-center">Toko Obat</th>
                  <th class="dt-center"><?php echo $tl_toko_obat_created?></th>
                  <th class="dt-center"><?php echo $tl_toko_obat_sent?></th>
                  <th class="dt-center"><?php echo $feedback_toko_obat_get?></th>


                 
            </tr>
               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">4</th>
                  <th class="dt-center">Klinik</th>
                  <th class="dt-center"><?php echo $tl_klinik_created?></th>
                  <th class="dt-center"><?php echo $tl_klinik_sent?></th>
                  <th class="dt-center"><?php echo $feedback_klinik_get?></th>

                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">5</th>
                  <th class="dt-center">Rumah Sakit </th>
                  <th class="dt-center"><?php echo $tl_rs_created?></th>
                  <th class="dt-center"><?php echo $tl_rs_sent?></th>
                  <th class="dt-center"><?php echo $feedback_rs_get?></th>

            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">6</th>
                  <th class="dt-center">IFK</th>
                  <th class="dt-center"><?php echo $tl_ifk_created?></th>
                  <th class="dt-center"><?php echo $tl_ifk_sent?></th>
                  <th class="dt-center"><?php echo $feedback_ifk_get?></th>
            
            </tr>

              <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">7</th>
                  <th class="dt-center">Produksi OT </th>
                  <th class="dt-center"><?php echo $tl_prod_ot_created?></th>
                  <th class="dt-center"><?php echo $tl_prod_ot_sent?></th>
                  <th class="dt-center"><?php echo $feedback_prod_ot_get?>
                      
                  </th>
                  
                 
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">8</th>
                  <th class="dt-center">Distribusi OT   </th>
                  <th class="dt-center"><?php echo $tl_dist_ot_created?></th>
                  <th class="dt-center"><?php echo $tl_dist_ot_sent?></th>
                  <th class="dt-center"><?php echo $feedback_dist_ot_get?>
                     
                  </th>
                  
            </tr>

             <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">9</th>
                  <th class="dt-center">Produksi Kosmetik   </th>
                  <th class="dt-center"><?php echo $tl_prod_kos_created?></th>
                  <th class="dt-center"><?php echo $tl_prod_kos_sent?></th>
                  <th class="dt-center"><?php echo $feedback_prod_kos_get?></th>
              
                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">10</th>
                  <th class="dt-center">Distribusi Kosmetik </th>
                  <th class="dt-center"><?php echo $tl_dist_kos_created?></th>
                  <th class="dt-center"><?php echo $tl_dist_kos_sent?></th>
                  <th class="dt-center"><?php echo $feedback_dist_kos_get?></th>
                 
                 
            </tr>

               <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">11</th>
                  <th class="dt-center">Produksi Pangan </th>
                  <th class="dt-center"><?php echo $tl_prod_pangan_created?></th>
                  <th class="dt-center"><?php echo $tl_prod_pangan_sent?></th>
                  <th class="dt-center"><?php echo $feedback_prod_pangan_get?></th>
             
                 
            </tr>

 <tr style="background-color:#FFFFFF ">
                  <th class="dt-center">12</th>
                  <th class="dt-center">Distribusi Pangan   </th>
                  <th class="dt-center"><?php echo $tl_dist_pangan_created?></th>
                   <th class="dt-center"><?php echo $tl_dist_pangan_sent?></th>
                   <th class="dt-center"><?php echo $feedback_dist_pangan_get?></th>
                    
                 
            </tr>

       
      
    </table>
</body>

</html>