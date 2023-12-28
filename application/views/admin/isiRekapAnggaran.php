<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=RekapPengeluaran-" . $filename);
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
                  <th class="dt-center">No.Surat Tugas</th>
                  <th class="dt-center">Maksud Perjalanan Dinas</th>
                  <th class="dt-center">MAK</th>
                   <th class="dt-center">No. SPM</th>
                    <th class="dt-center">Nama Pelaksana Perjalanan Dinas (Tanpa Gelar Akademik)</th>
                    <th class="dt-center">Uang Harian ( H-/ H+ / HalfDay / Full Day )</th>
                    <th class="dt-center">Uang Representasi </th>
                    <th class="dt-center">Uang Riil </th>
                    <th class="dt-center">Transportasi Lokal/Taksi</th>
                   
                  <th class="dt-center">Harga Tiket (Rp)</th>
                  <th class="dt-center">Harga Hotel (Rp)</th>


                  
                    <!-- <th class="dt-center">Total Bill Hotel Yang Dibayarkan</th> -->
                  
                    <th class="dt-center">TOTAL BIAYA PERJALANAN DINAS YANG DIBAYARKAN OLEH BENDAHARA</th>
            </tr>
        </thead>

          <tr>
          <?php     
         
                 if(isset($rincianIdentitas)){
                  foreach ($rincianIdentitas as $row ){
                    $noSuratTugas =$row->noSuratTugas;
                    $totalBiaya = 0;
                   
                  
                      echo "<td class='dt-center'>".$row->noSuratTugas."</td>";      
                   echo "<td class='dt-center'>".$row->maksud."</td>";
                   echo "<td class='dt-center'>".$row->mak."</td>";
                   $spm = array();
                   $namaPetugas = array();
                   foreach($rincianDetail as $rinciDetail){
                     if($noSuratTugas == $rinciDetail->noSuratTugas){
                      array_push($spm, $rinciDetail->noSpm);
                      array_push($namaPetugas, $rinciDetail->nama);
                     }
                   }
                   echo "<td class='dt-center'>".implode(",",$spm)."</td>";
                   echo "<td class='dt-center'>".implode(",",$namaPetugas)."</td>";
           
                   foreach ($rincianUh as $rinciUh ){
                    if($noSuratTugas == $rinciUh->noSuratTugas ){
                      echo "<td class='dt-center'>".$rinciUh->biaya."</td>";
                      $totalBiaya +=$rinciUh->biaya;
                     }
                   }
                   
     
                   foreach ($rincianRepresentasi as $rinciRepresentasi ){
                    if($noSuratTugas == $rinciRepresentasi->noSuratTugas ){
                      echo "<td class='dt-center'>".$rinciRepresentasi->biaya."</td>";
                      $totalBiaya +=$rinciRepresentasi->biaya;
                     }
                     
                     
                   }

                   foreach ($rincianRiil as $rinciRiil ){
                    if($noSuratTugas == $rinciRiil->noSuratTugas){
                      echo "<td class='dt-center'>".$rinciRiil->biaya."</td>";
                      $totalBiaya +=$rinciRiil->biaya;
                     }
                   }

                  

                   foreach ($rincianTrans as $rinciTrans ){
                    if($noSuratTugas == $rinciTrans->noSuratTugas ){
                      echo "<td class='dt-center'>".$rinciTrans->biaya."</td>";
                      $totalBiaya +=$rinciTrans->biaya;
                     }
                   }

                   $hitungTransport = 0;
                  //  echo count($rincianTransport);
                  //  echo count($rincianHotel);

                   foreach ($rincianTransport as $rinciTransport  ){
                     
                    if($noSuratTugas == $rinciTransport->noSuratTugas  ){
                      
                       
                        // echo "<td class='dt-center'>".$rinciTransport->namaMaskapai."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->noTiket."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->kodeBooking."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->noPenerbangan."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->tempatAsal."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->tempatTujuan."</td>";
                        // echo "<td class='dt-center'>".$rinciTransport->tanggalTerbang."</td>";
                        echo "<td class='dt-center'>".$rinciTransport->biaya."</td>";
                        $totalBiaya +=$rinciTransport->biaya;
                      
                    }

                     
             
                   }


         
                   foreach ($rincianHotel as $rinciHotel ){
                     
                    if($noSuratTugas == $rinciHotel->noSuratTugas  ){
                    
                        
                        echo "<td class='dt-center'>".$rinciHotel->biaya."</td>";
                        $totalBiaya +=$rinciHotel->biaya;
                        echo "<td class='dt-center'>".$totalBiaya."</td>";
                        echo "<tr>";
    
            

                    }

                     
             
                   }

                  



                   
                   
                   

                 
                   
                  //  echo "<td class='dt-center'>Rp. ".$row->biaya."</td>";
                   
                  echo "<tr>";
                
                  }
                  }else{
                   echo "no record found";
                  }
                ?>

          </tr>
    </table>
</body>

</html>