<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=LaporanSuratTugas-" . $filename);
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

    $noSuratTugas_all = array();
    $maksud_all = array();
    $kota_all = array();
    $tglMulai_all = array();
    $tglSelesai_all = array();
    $namaSarana_all = array();
    $alamatSarana_all = array();
    $jenisSarana_all = array();
    $isMk_all = array();
    $jenisTl_all = array();
    $temuan_all = array();
    $deskripsi_all = array();
    $noSuratPeringatan_all = array();
    $tglSuratPeringatan_all = array();

    function normalisasi($a)
    {
        if ($a == null) {
            $b = "-";
        } else {
            $b = $a;
        }
        return $b;
    }



    foreach ($laporanSurat as $row) {
        array_push($noSuratTugas_all, $row->noSuratTugas);
        array_push($maksud_all, $row->maksud);
        array_push($kota_all, $row->kota);
        array_push($tglMulai_all, $row->tglMulai);
        array_push($tglSelesai_all, $row->tglSelesai);
        array_push($namaSarana_all, normalisasi($row->namaSarana));
        array_push($alamatSarana_all,  normalisasi($row->alamatSarana));
        array_push($jenisSarana_all,  normalisasi($row->jenisSarana));
        array_push($isMk_all,  normalisasi($row->isMk));
        array_push($jenisTl_all,  normalisasi($row->jenisTl));
        array_push($deskripsi_all,  normalisasi($row->deskripsiTemuan));
        array_push($temuan_all,  normalisasi($row->temuan));
        array_push($noSuratPeringatan_all,  normalisasi($row->noSuratPeringatan));
        array_push($tglSuratPeringatan_all,  normalisasi($row->tglSuratPeringatan));
    }


    ?>


    <table border="1" style="text-align:center">
        <thead>
            <tr style="background-color:#E0E0E0 ">
                <th>Surat Tugas</th>
                <th>Kegiatan</th>
                <th>Tujuan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Nama 1</th>
                <th>Nama 2</th>
                <th>Nama 3</th>
                <th>Nama 4</th>
                <th>Nama Sarana</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Hasil</th>
                <th>Tindak Lanjut</th>
                <?php if($deskripsi == "on"){
                    echo "<th>Deskripsi</th>";
                    }?>
                
                <th>Kesimpulan</th>
                <th>LHK</th>
                <th>SIPT</th>
                <th>Nomor Surat TL</th>
                <th>Tanggal Surat TL</th>
                <th>Tujuan Surat TL</th>
                <th>Perihal TL</th>
                <th>Asal Instansi</th>
                <th>Nomor Surat Instansi</th>
                <th>Tanggal Surat Instansi</th>
                <th>Perihal Surat Instansi</th>
                <th>Nomor Surat Feedback</th>
                <th>Tanggal Surat Feedback</th>
                <th>Nomor Surat CAPA</th>
                <th>Tanggal Surat CAPA</th>
                <th>Dibuat Oleh</th>
            </tr>
        </thead>
        <tr>
            <?php
            for ($i = 0; $i < count($noSuratTugas_all); $i++) { ?>
                <td><?php echo $noSuratTugas_all[$i]; ?></td>
                <td><?php echo $maksud_all[$i]; ?></td>
                <td><?php echo $kota_all[$i]; ?></td>
                <td><?php echo $tglMulai_all[$i] ?></td>
                <td><?php echo $tglSelesai_all[$i]; ?></td>
                <?php
                $petugas_all = array();
                foreach ($petugas as $row) {
                    if ($row->noSuratTugas == $noSuratTugas_all[$i]) {
                        array_push($petugas_all, $row->nama);
                    }
                }

                for ($j = 0; $j < count($petugas_all); $j++) {
                    echo "<td>$petugas_all[$j]</td>";
                }
                for ($j = 0; $j < 4 - count($petugas_all); $j++) {
                    echo "<td>-</td>";
                }
                ?>
                <td><?php echo $namaSarana_all[$i]; ?></td>
                <td><?php echo $alamatSarana_all[$i]; ?></td>
                <td><?php echo $jenisSarana_all[$i]; ?></td>
                <?php if ($isMk_all[$i] == "-") {
                    $status = "-";
                } else if ($isMk_all[$i] == 1) {
                    $status = "MK";
                } else {
                    $status = "TMK";
                } ?>
                <td><?php echo $status; ?></td>
                <td><?php echo $jenisTl_all[$i]; ?></td>
                <?php if($deskripsi == "on"){
                    echo "<td>".wordwrap($deskripsi_all[$i],200)."</td>";
                    }?>
                
                <td><?php echo $temuan_all[$i]; ?></td>
                <td></td>
                <td></td>
                <td><?php echo $noSuratPeringatan_all[$i]; ?></td>
                <td><?php echo $tglSuratPeringatan_all[$i]; ?></td>
                <td><?php echo $namaSarana_all[$i]; ?></td>
                <td><?php echo $jenisTl_all[$i]; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php foreach ($feedback as $row) {
                    if ($row->namaSarana == $namaSarana_all[$i]) {
                ?>
                        <td><?php echo $row->noFeedback; ?></td>
                        <td><?php echo $row->tglFeedback; ?></td>
                <?php
                    }
                }

                ?>

                <?php foreach ($closed as $row) {
                    if ($row->namaSarana == $namaSarana_all[$i]) {
                ?>
                        <td><?php echo $row->noSuratPeringatan; ?></td>
                        <td><?php echo $row->tglSuratPeringatan; ?></td>
                <?php
                    }
                }
                ?>





        </tr>
    <?php } ?>

    </tr>

    </table>
</body>

</html>