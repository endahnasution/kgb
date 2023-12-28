<?php
header("Content-type:application/vnd.ms-word");
$filename = $noSurat . ".doc";
header("Content-Disposition: attachment; Filename=lhkInfokom-" . $filename)

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="">
    <!-- CSS buatan sendiri -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/print.css">
</head>


<body onload="window.print()">


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
    

    ?>


    <?php
    $nama_all = array();
    $nip_all = array();
    $pangkat_all = array();
    $golongan_all = array();
    $jabatan_all = array();
    $noSurat = "";
    $tglSurat = "";
    $tglMulai = "";
    $tglSelesai = "";
    $tujuan = "";
    $maksud = "";
    $kota = "";



    foreach ($surat as $row) {
        array_push($nama_all, $row->nama);
        array_push($nip_all, $row->nip);
        array_push($pangkat_all, $row->pangkat);
        array_push($golongan_all, $row->golongan);
        array_push($jabatan_all, $row->jabatan);
        $noSurat = $row->noSuratTugas;
        $tujuan = $row->kota;
        $tglSurat = strtotime($row->tglSurat);
        $tglMulai = strtotime($row->tglMulai);
        $tglSelesai = strtotime($row->tglSelesai);
        $maksud = $row->maksud;
        $kota = $row->kota;
    }


    $nomor = 0;
$tglLhk2 = strtotime($tglLhk);


    ?>

    <div class="Section2">

        <p align="center" style="font-size: 12pt; font-family:Arial, Helvetica, sans-serif "><b>LAPORAN HASIL KEGIATAN</b></p>
        <table style="width:50%">
            <tr>
                <td width="5%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b><u>Yth:</u></b></p>
                </td>
                <td width="45%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "> Kepala Balai POM di Batam melalui PPK</p>
                </td>
            <tr>
                <td whidth="5%">
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b><u>Yth:</u></b></p>
                </td>
                <td whidth="45%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Therecy Elly Yana, S.Farm., Apt.</p>
                </td>
            </tr>
        </table>
        <p></p>
        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Sehubungan dengan penugasan berdasarkan surat tugas dari Kepala Balai POM di Batam nomor <?php echo $noSurat  ?> tanggal <?php echo  convertDay($tglSurat) . " " . convertMonthB(convertMonthA($tglSurat)) . " " . "20" . convertYear($tglSurat) ?> berikut ini kami sampaikan resume hasil kegiatan yang telah dilaksanakan.</p>
        <table style="width:100%">  
            <tr>
                <td width="3%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>I.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>Identitas Kegiatan</b>
                </td>
            </tr>
        </table>
        <table style="width:100%">

                <tr>
                    <td width="3%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"></p>
                    </td>
                    <td width="2%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">-</p>
                    </td>
                    <td width="24%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Nama / Judul </p>
                    </td>
                    <td width="5%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td width="66%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $maksud; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td width="2%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">-</p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Jadwal / Waktu </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo  convertDay($tglMulai) . " " . convertMonthB(convertMonthA($tglMulai)) . " 20" . convertYear($tglMulai) ?> s.d. <?php echo  convertDay($tglSelesai) . " " . convertMonthB(convertMonthA($tglSelesai)) . " 20" . convertYear($tglSelesai) ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td width="2%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">-</p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Tempat / Tujuan </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $kota; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td width="2%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">-</p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Pejabat yang Dituju </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $sppd; ?></p>
                    </td>
                </tr>
            
        </table>
        <table style="width:100%">
            <td width="3%">
                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>II.</b></p>
            </td>
            <td>
                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>Identitas Petugas</b>

        </table>

        <table style="width:100%">

            <?php
            $huruf = array('a.', 'b.', 'c.', 'd.', 'e.');
            for ($i = 0; $i < count($nama_all); $i++) { ?>
                <tr>
                    <td width="3%">
                        <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $huruf[$i]; ?></p>
                    </td>
                    <td width="2%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $huruf[$i]; ?></p>
                    </td>
                    <td width="24%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Nama / NIP </p>
                    </td>
                    <td width="5%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td width="66%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $nama_all[$i]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Pangkat / Gol </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $pangkat_all[$i] . "/" . $golongan_all[$i]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">NIP </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $nip_all[$i]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Jabatan </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $jabatan_all[$i]; ?></p>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <table style="width:100%">
            <tr>
                <td width="3%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>III.</b></p>
                </td>
                <td width="97%">
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>Pointer Hasil Kegiatan</b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>III.</b></p>
                </td>
                <td colspan="3">
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> <?php echo $detKegiatan ?></p>
                </td>   
            </tr>
        </table>
        <table style="width:100%">
            <tr>
                <td width="3%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>V.</b></p>
                </td>
                <td width="27%">
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>Pengesahan</b></p>
                </td>
                <td width="5%">
                    <p class="satu">&nbsp;</p>
                </td>
                <td width="65%">
                    <p class="satu">&nbsp;</p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">a. SPPD disahkan oleh</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">:</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $sppd ?> </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">- Kwitansi disahkan oleh</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">:</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $kwitansi ?> </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">- Form 8 Jam disahkan oleh </p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> :</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $form ?> </p>
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%">
            <tr>
                <th width="60%">
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Demikian disampaikan, atas perhatiannya diucapkan terimakasih.</p>
                </th>
                <th width="40%">
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">dfdsffsdf</p>
                </th>
            </tr>
            <tr>
                <th>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">dsfsdfsgh</p>
                </th>
                <th>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">dfdsffsdf</p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Menyetujui</p>
                </th>
                <th>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">dfdsffsdf</p>
                </th>
            </tr>
            <tr>
                <th>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Koordinator Substansi Informasi dan Komunikasi</p>
                </th>
                <th>
                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif ">Batam, <?php echo  convertDay($tglLhk2) . " " . convertMonthB(convertMonthA($tglLhk2)) . " 20" . convertYear($tglLhk2) ?></p>
                </th>
            </tr>
            <tr>
                <td>
                    <p></p>
                </td>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Petugas,</p>
                </td>
            </tr>
            <?php for ($i = 0; $i < count($nama_all); $i++) { ?>
                <tr>
                    <td>
                        <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Cobacabicobacabicobacabicobacabi</p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo ($i + 1) . "." . " " . $nama_all[$i] ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p></p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">&nbsp;&nbsp;&nbsp; <?php echo " " . "NIP." . " " . $nip_all[$i] ?></p>
                    </td>
                </tr>    
            <?php } ?>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><u>Therecy Elly Yana, S.Farm., Apt.</u></p>
                </td>
                <td>
                    <p><u></u></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">NIP. 198304272010122001</p>
                </td>
                <td>
                    <p></p>
                </td>
            </tr>

        </table>

    </div>










</body>

</html>