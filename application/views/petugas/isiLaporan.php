<?php
header("Content-type: application/vnd-ms-excel");
$filename = $tglAwal . "-" . $tglAkhir . ".xls";
header("Content-Disposition: attachment; filename=LaporanPemeriksaan-" . $filename);
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

    $namaSarana_all = array();
    $alamatSarana_all = array();
    $tglSurat_all = array();
    $tglMulai_all = array();
    $tglSelesai_all = array();
    $maksud_all = array();
    $kategori_all = array();
    $temuan_all = array();
    $jenisTl_all = array();
    $peringatan_all = array();
    $statusBalai_all = array();
    $petugas_all = array();


    foreach ($laporanSarana as $row) {
        array_push($namaSarana_all, $row->namaSarana);
        array_push($alamatSarana_all, $row->alamatSarana);
        array_push($tglSurat_all, $row->tglSurat);
        array_push($tglMulai_all, $row->tglMulai);
        array_push($tglSelesai_all, $row->tglSelesai);
        array_push($maksud_all, $row->maksud);
        array_push($kategori_all, $row->kategoriSarana);
        array_push($temuan_all, $row->deskripsiTemuan);
        array_push($jenisTl_all, $row->jenisTl);
        array_push($peringatan_all, $row->isiPeringatan);
        array_push($statusBalai_all, $row->statusBalai);
        array_push($petugas_all, $row->namaPetugas);
    }


    ?>

    <p>LAPORAN HASIL PEMERIKSAAN SARANA </p>
    <p>Jenis Sarana : <?php echo $jenisSarana; ?></p>
    <p>Pemeriksaan Awal : <?php echo $tglAwal; ?></p>
    <p>Pemeriksaan Akhir: <?php echo $tglAkhir; ?></p>
    <table border="1" style="text-align:center">
        <thead>
            <tr style="background-color:#E0E0E0 ">
                <th colspan="2">Informasi Sarana</th>
                <th rowspan="2">Tanggal Input</th>
                <th rowspan="2">Tanggal Periksa</th>
                <th rowspan="2">Tujuan Pemeriksaan</th>
                <th rowspan="2">Komoditi</th>
                <th rowspan="2">Hasil Temuan</th>
                <th rowspan="2">Saran Tindak Lanjut</th>
                <th rowspan="2">Catatan</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">Petugas</th>
            </tr>
        </thead>
        <tr style="background-color:#E0E0E0 ;text-align:center">
            <td><b>Nama</b></td>
            <td><b>Alamat</b></td>

        </tr>
        <?php
        for ($i = 0; $i < count($namaSarana_all); $i++) { ?>
            <tr>
                <td><?php echo $namaSarana_all[$i]; ?></td>
                <td><?php echo $alamatSarana_all[$i]; ?></td>
                <td><?php echo $tglSurat_all[$i]; ?></td>
                <td><?php echo $tglMulai_all[$i] . " s/d " . $tglSelesai_all[$i]; ?></td>
                <td><?php echo $maksud_all[$i]; ?></td>
                <td><?php echo $kategori_all[$i]; ?></td>
                <td><?php echo $temuan_all[$i]; ?></td>
                <td><?php echo $jenisTl_all[$i]; ?></td>
                <td><?php echo $peringatan_all[$i]; ?></td>
                <td><?php if ($statusBalai_all[$i] == 0) {
                        echo "TMK";
                    } else {
                        echo "MK";
                    } ?></td>
                <td><?php echo $petugas_all[$i]; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>