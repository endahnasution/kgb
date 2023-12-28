<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=LaporanAnggaran-" . $filename);
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

    <table border="1" style="text-align:center">
        <thead>
            <tr style="background-color:#E0E0E0 ">
                  <th class="dt-center">MAK</th>
                  <th class="dt-center">Sumber Dana</th>
                  <th class="dt-center">Pagu</th>
                  <th class="dt-center">Biaya Riil</th>
                  <th class="dt-center">Sisa Anggaran</th>

            </tr>
        </thead>
       
        <?php     
                 if(isset($anggaran)){
                  foreach ($anggaran->result() as $row){
                 
                   echo "<tr>";
                   echo "<td class='dt-center'>".$row->mak."</td>";      
                   echo "<td class='dt-center'>".$row->jenisSubstansi."</td>";
                   echo "<td class='dt-center'>Rp. ".$row->pagu."</td>";
                   echo "<td class='dt-center'>Rp. ".$row->biaya."</td>";
                   echo "<td class='dt-center'>Rp. ".($row->pagu-$row->biaya) ."</td>";
                  }
                  }else{
                   echo "no record found";
                  }
                ?>

    </tr>

    </table>
</body>

</html>