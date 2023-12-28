<?php
header("Content-type:application/vnd.ms-word");
$filename = $idSurat . ".doc";
header("Content-Disposition: attachment; Filename=lhkPenindakan-" . $filename)

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

    $mk = 0;
    $tmk = 0;
    $nomor = 0;

    $tglLhk2 = strtotime($tglLhk);

    ?>

    <div class="Section2">

        <p align="center" style="font-size: 12pt; font-family:Arial, Helvetica, sans-serif "><b>LAPORAN HASIL KEGIATAN </b></p>
        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b><u>Yth:</u></b> Kepala Balai POM di Batam melalui PPK</p>
        <table style="width:100%; font-family:arial;">

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif "><b>I.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>DASAR PEMERIKSAAN :</b>

                </td>
            </tr>
            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">I</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Surat Perintah Tugas Kepala Balai Pengawas Obat Makanan di Batam, Nomor <?php echo $noSurat  ?>, Tanggal Surat Tugas <?php echo  convertDay($tglSurat) . " " . convertMonthB(convertMonthA($tglSurat)) . " " . "20" . convertYear($tglSurat) ?> , dilaksanakan pada tanggal <?php echo  convertDay($tglMulai) . " " . convertMonthB(convertMonthA($tglMulai)) . " " . "20" . convertYear($tglMulai) ?> s.d. <?php echo  convertDay($tglSelesai) . " " . convertMonthB(convertMonthA($tglSelesai)) . " " . "20" . convertYear($tglSelesai) ?></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>II.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>TUJUAN PEMERIKSAAN :</b>

                </td>
            </tr>
            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">I</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $maksud ?></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>III.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>DAERAH YANG DIKUNJUNGI :</b>

                </td>
            </tr>
            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">I</p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $kota ?></p>
                </td>
            </tr>

            <td>
                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>IV.</b></p>
            </td>
            <td>
                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>YANG MELAKSANAKAN PEMERIKSAAN :</b>

        </table>

        <table style="width:100%; font-family:arial;">

            <?php
            $huruf = array('a.', 'b.', 'c.', 'd.', 'e.');
            for ($i = 0; $i < count($nama_all); $i++) { ?>
                <tr>
                    <td width="1%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $huruf[$i]; ?></p>
                    </td>
                    <td width="22%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Nama / NIP</p>
                    </td>
                    <td width="5%">
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">:</p>
                    </td>
                    <td width="72%">
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $nama_all[$i]; ?> / <?php echo $nip_all[$i]; ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p> </p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Pangkat / Gol</p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> :</p>
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
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Jabatan</p>
                    </td>
                    <td>
                        <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> :</p>
                    </td>
                    <td>
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $jabatan_all[$i]; ?></p>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <table style="width:100%; font-family:arial;">

            <tr>
                <td width="3%">
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>V.</b></p>
                </td>
                <td width="97%">
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>HASIL PEMERIKSAAN :</b> </p>

                </td>
            </tr>

        </table>


        <?php
        foreach ($sarana as $value) {
            foreach ($value as $item) {
                foreach ($item as $row) {
        ?>

                    <table style="width:100%; font-family:arial;">

                        <tr>
                            <td width="3%">
                                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $nomor + 1 ?>.</p>
                            </td>
                            <td width="20%">
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Nama Sarana</p>
                            </td>
                            <td width="5%">
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">:</p>
                            </td>
                            <td width="36%">
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $row->namaSarana ?> </p>
                            </td>
                            <td width="19%">
                                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Temuan : </p>
                            </td>
                            <td width="17%">
                                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Tindak Lanjut: </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Alamat</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $row->alamatSarana ?> </p>
                            </td>
                            <td>

                                <p><?php $temuann = explode(",", $temuan[$nomor]);
                                    foreach ($temuann as $value) {
                                        echo $value . "<br>";
                                    } ?></p>
                            </td>
                            <td>
                                <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $tl[$nomor]; ?></p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Kategori Sarana</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $row->kategoriSarana ?> </p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Jenis Sarana</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo $row->jenisSarana ?> </p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Kesimpulan</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> :

                                </p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php if ($kesimpulan[$nomor] == "1") {
                                                                                                                                            echo "MK";
                                                                                                                                            $mk += 1;
                                                                                                                                        } else {
                                                                                                                                            echo "TMK";
                                                                                                                                            $tmk += 1;
                                                                                                                                        } ?> </p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Keterangan</p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> : </p>
                            </td>
                            <td>
                                <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"> </p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                            <td>
                                <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">1</p>
                            </td>
                        </tr>

                    </table>

        <?php echo $keterangan[$nomor];
                    $nomor += 1;
                }
            }
        }
        ?>


        <table style="width:100%; font-family:arial;">

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>PENGESAHAN :</b></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">- SPPD disahkan oleh : <?php echo $sppd ?> </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">- Kwitansi disahkan oleh : <?php echo $kwitansi ?> </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p id="hilang" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><b>VI.</b></p>
                </td>
                <td>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">- Form 8 Jam disahkan oleh : <?php echo $form ?> </p>
                </td>
            </tr>


        </table>


        <table style="width:100%; font-family:arial;">
            <tr>
                <th>
                    <p class="satu" style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">Menyetujui</p>
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
                        <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><?php echo ($i + 1) . "." . $nama_all[$i] ?></p>
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify"><u>Irdiansyah, SH </u></p>
                </td>
                <td>
                    <p><u></u></p>
                </td>
            </tr>

            <tr>
                <td>
                    <p style="font-size: 11pt; font-family:Arial, Helvetica, sans-serif; text-align:justify">NIP. 19880118 201012 1 002</p>
                </td>
                <td>
                    <p></p>
                </td>
            </tr>

        </table>


    </div>


</body>

</html>