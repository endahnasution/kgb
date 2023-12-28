<section class="content-header">
    <h1>
        Menu Surat Tugas Penindakan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Surat Tugas Penindakan</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="box box-primary">
                <div class="box-header with-border">

                    <h3 class="box-title">Buat Surat Tugas Penindakan</h3>
                    <div class="pull-right">
                        <ul>
                            <a class="btn btn-primary" href="<?php echo base_url('admin/surat_tugas/surat_tugas/tambah_surat_penindakan') ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Data
                            </a> </span>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">

                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="tbl" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="dt-center">No Surat Tugas</th>
                                                    <th class="dt-center">Tgl Surat Tugas</th>
                                                    <th class="dt-center">Maksud & Tujuan</th>
                                                    <th class="dt-center">Kota</th>
                                                    <!-- <th class="dt-center">Substansi</th>
 -->
                                                    <th class="dt-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($surattugas)) {
                                                    foreach ($surattugas as $row) {

                                                        echo "<tr>";
                                                        echo "<td class='dt-center'>" . $row->noSuratTugas . "</td>";
                                                        echo "<td class='dt-center'>" . $row->tglSurat . "</td>";
                                                        echo "<td class='dt-center'>" . $row->maksud . "</td>";
                                                        echo "<td class='dt-center'>" . $row->kota . "</td>";
                                                        // echo "<td class='dt-center'>" . $row->jenisSurat . "</td>";
                                                        echo "<td class='dt-center'>" ?>
                                                        <a href="<?= site_url('admin/surat_tugas/surat_tugas/edit_surat_penindakan/' . $row->noSuratTugas) ?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="editSur"><i class="fa fa-edit"></i></a>

                                                        <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusSur" data-id="<?= $row->idSurat ?>" data-toggle="modal" data-target="#hapusSurat">
                                                            <i class="fa fa-trash"></i></a>

                                                        <a href="#" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Print" id="printSur" data-toggle="modal" data-target="#printSurat" data-id="<?= $row->idSurat ?>">
                                                            <i class="fa fa-print"></i></a>

                                                        </td>

                                                <?php
                                                    }
                                                } else {
                                                    echo "no record found";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
                    <!-- /.content -->
                </div>
                <style>
                    th.dt-center,
                    td.dt-center {
                        text-align: center;
                    }
                </style>

            </div>
            <!-- /.box-header -->
            <!-- form start -->


        </div>
    </div>

    </div>
    <!-- /.box -->
    </div>

    </div>
    <!-- /.row -->

    <!-- Edit Surat Tugas -->
    <div id="editSurat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Surat Tugas</h4>
                </div>
                <div class="modal-body" id=editData>
                    <form action="<?= base_url('admin/surat_tugas/surat_tugas/ubah_surat') ?>" method="post">
                        <div class="box box-success">
                            <div class="box-body">

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="idSurat" id="idSurat">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">No. Surat Tugas </label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" name="noSurat" id="noSurat">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Tanggal Surat </label> <small class="text-danger">*</small>
                                    <input class="form-control" type="date" name="tglSurat" id="tglSurat" onclick="return chk_date()">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Kota </label> <small class="text-danger">*</small>
                                    <select class="form-control" name="kota" id="kota">
                                        <option>Kota Batam</option>
                                        <option>Kota Tanjung Pinang</option>
                                        <option>Kabupaten Bintan</option>
                                        <option>Kabupaten Karimun</option>
                                        <option>Kabupaten Anambas</option>
                                        <option>Kabupaten Lingga</option>
                                        <option>Kabupaten Natuna</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Anggaran </label> <small class="text-danger">*</small>
                                    <select class="form-control" name="idAnggaran" id="idAnggaran">
                                        <?php
                                        foreach ($anggaran as $anggaran) {
                                            echo "<option value=" . $anggaran->idAnggaran . ">" . $anggaran->namaAnggaran . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Maksud </label> <small class="text-danger">*</small>
                                    <input type="text" class="form-control" name="maksud" id="maksud">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Tanggal Mulai Tugas </label> <small class="text-danger">*</small>
                                    <input class="form-control" type="date" name="tglMulai" id="tglMulai" onclick="return chk_date()">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Tanggal Selesai Tugas </label> <small class="text-danger">*</small>
                                    <input class="form-control" type="date" name="tglSelesai" id="tglSelesai" onclick="return chk_date()">
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Kendaraan </label> <small class="text-danger">*</small>
                                    <select class="form-control" name="kendaraan" id="kendaraan">
                                        <option>-</option>
                                        <option>Pesawat</option>
                                        <option>Kapal laut</option>
                                        <option>Kendaraan dinas</option>
                                        <option>Kendaraan umum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Nama Penanda Tangan ST </label> <small class="text-danger">*</small>
                                    <select class="form-control" name="namaPenandatangan" id="namaPenandatangan">
                                        <option>Bagus Heri Purnomo, S.Si., Apt</option>
                                        <option>Larasati Setyaningtyas, S.Farm., Apt</option>
                                        <option>Dyah Ayu Novi Hapsari, S.Farm., Apt</option>
                                        <option>Ruth Deseyanti Purba, S.Si., Apt</option>
                                        <option>Irdiansyah, SH</option>
                                        <option>Paniyati, S.Farm., Apt</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="noEdit">Jabatan Penanda Tangan ST </label> <small class="text-danger">*</small>
                                    <select class="form-control" name="jabatanPenandatangan" id="jabatanPenandatangan">
                                        <option>Kepala Balai POM di Batam</option>
                                        <option>PLH Kepala Balai POM di Batam Koordinator Substansi Informasi dan Komunikasi</option>
                                        <option>PLH Kepala Balai POM di Batam Koordinator Substansi Pengujian</option>
                                        <option>PLH Kepala Balai POM di Batam Koordinator Substansi Pemeriksaan</option>
                                        <option>PLH Kepala Balai POM di Batam Koordinator Substansi Penindakan</option>
                                        <option>PLH Kepala Balai POM di Batam Kepala SUB Bagian Tata Usaha</option>
                                    </select>
                                </div>


                            </div><!-- /.box-body -->
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                                <button type="submit" name="update" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.10.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).on("click", "#editSur", function() {
            var idS = $(this).data('idsurat');
            var noS = $(this).data('nosurat');
            var tglS = $(this).data('tglsurat');
            var maksudS = $(this).data('maksud');
            var kotaS = $(this).data('kota');
            var anggaranS = $(this).data('anggaran');
            var tglmulaiS = $(this).data('tglmulai');
            var tglselesaiS = $(this).data('tglselesai');
            var kendaraanS = $(this).data('kendaraan');
            var namaS = $(this).data('namapenandatangan');
            var jabatanS = $(this).data('jabatanpenandatangan');

            $("#editData #idSurat").val(idS);
            $("#editData #noSurat").val(noS);
            $("#editData #tglSurat").val(tglS);
            $("#editData #maksud").val(maksudS);
            $("#editData #kota").val(kotaS);
            $("#editData #idAnggaran").val(anggaranS);
            $("#editData #tglMulai").val(tglmulaiS);
            $("#editData #tglSelesai").val(tglselesaiS);
            $("#editData #kendaraan").val(kendaraanS);
            $("#editData #namaPenandatangan").val(namaS);
            $("#editData #jabatanPenandatangan").val(jabatanS);
        });
    </script>
    <!-- Hapus Surat -->
    <div id="hapusSurat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id=hapusData>
                    <form role="form" method="post" action="<?= base_url('admin/surat_tugas/surat_tugas/hapus_surat_penindakan') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda yakin akan menghapus Data ini ?</label>
                                <input type="hidden" id="idSurat" name="idSurat">

                            </div>
                        </div><!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
                        </div>
                    </form>
                    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).on("click", "#hapusSur", function() {
                            var id = $(this).data('id');

                            $("#hapusData #idSurat").val(id);
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- Print Surat Tugas -->
    <div id="printSurat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id=panelSur>
                    <form role="form" method="post" action="<?= base_url('admin/surat_tugas/surat_tugas/print_penindakan') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda Akan Mencetak Surat Tugas</label>
                                <input type="hidden" id="idSurat" name="idSurat">

                            </div>
                        </div><!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </form>
                    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).on("click", "#printSur", function() {
                            var id = $(this).data('id');

                            $("#panelSur #idSurat").val(id);
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>