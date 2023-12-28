<section class="content-header">
    <h1>
        KENAIKAN GAJI BERKALA (KGB)
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lhk</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

<?php
 
 foreach($pegawai as $row){
  $idPegawai = $row->idPegawai;
  $nama = $row->nama;
  $nip = $row->nip;
  $pangkat = $row->pangkat;
  $golongan = $row->golongan;
  $gapok_lama = $row->gapok_lama;
  $sk_lama = $row->sk_lama;
  $tgl_sk_lama = $row->tgl_sk_lama;
  $spmk_lama = $row->spmk_lama;
  $tahun_kerja_lama = $row->tahun_kerja_lama;
  $bulan_kerja_lama = $row->bulan_kerja_lama;
  $gapok_baru = $row->gapok_baru;
  $tahun_kerja_baru = $row->tahun_kerja_baru;
  $bulan_kerja_baru = $row->bulan_kerja_baru;
  $golongan_baru = $row->golongan_baru;
  $spmk_baru = $row->spmk_baru;
  $sk_baru = $row->sk_baru;
  $tgl_sk_baru = $row->tgl_sk_baru;
 }?>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="pull-right">
                        <ul>
                            <a class="btn btn-primary" href="<?php echo base_url('petugas/kgb/tambah_kgb/'.$idPegawai) ?>">
                                <i class="fa fa-plus"></i>&nbsp; Ajukan KGB
                            </a> </span>
                        </ul>
                    </div>
                    <h3 class="box-title"><i class="fa fa-list"></i> Informasi KGB Terakhir Anda
                    </h3>

                    <br>
                    <!-- 
           <?php if ($upload_file > 0) {
            ?>
             <div class="alert alert-danger alert-dismissable" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-exclamation"></i> Alert!</h4>
               Hallo Petugas ! Terdapat <strong><?php echo $upload_file ?></strong> LHK <?= $this->session->flashdata('flash_error'); ?> yang butuh upload soft file. Silahkan cek pada tabel!

             <?php  }; ?> -->
                    <!-- </div> -->

                </div>


                <section class="content">
                    <div class="row">
                        
                        <div class="col-md-6">
            <hr>

            <!-- hal surat -->
            <!-- <div class="form-group row">
              <label for="Perihal" class="col-sm-4 col-form-label">Substansi<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                  <select name="substansi" id="substansi" class="form-control" required>
                    <option value="" disabled selected>- Pilih Substansi -</option>
                    <option>Pengujian</option>
                    <option>Pemeriksaan</option>
                    <option>Penindakan</option>
                    <option>Infokom</option>
                    <option>Tata Usaha</option>
                  </select>
                </div>
              </div>
            </div>
 -->
 
           
            <!-- nomor surat -->
            <div class="form-group row">
              <label for="nama" class="col-sm-6 col-form-label">Nama<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="nama" id="nama" value = "<?php echo $nama;?>" required>
                </div>
              </div>
            </div>

            <!-- sUBSTANSI -->
            <!--<div class="form-group row">
              <label for="kota" class="col-sm-4 col-form-label">Substansi<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                  <select class="form-control" name="substansi" id="substansi" required>
                    <option value="" disabled selected>- Pilih Substansi -</option>
                    <option>Pemeriksaan</option>
                    <option>Pengujian</option>
                    <option>TU</option>
                    <option>Infokom</option>
                    <option>Penindakan</option>
                  </select>
                </div>
              </div>
            </div> -->
            <!-- tanggal surat -->
            <div class="form-group row">
              <label for="pangkat" class="col-sm-6 col-form-label">Pangkat/Jabatan<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="pangkat" id="pangkat" value = "<?php echo $pangkat."/".$golongan;?>" required>
                </div>
              </div>
            </div>

            <!-- alamat tujuan -->
            <div class="form-group row">
              <label for="tglGajiLama" class="col-sm-6 col-form-label">Tanggal SK<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="tglGajiLama" id="tglGajiLama" value = "<?php echo $tgl_sk_lama;?>" required>
                </div>
              </div>
            </div>
            <!-- Anggaran -->
            <div class="form-group row">
              <label for="spmkLama" class="col-sm-6 col-form-label">Tanggal mulai berlakunya<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="spmkLama" id="spmkLama" value = "<?php echo $spmk_lama;?>" required>
                </div>
              </div>
            </div>
            <!-- Maksud -->
            <div class="form-group row">
              <label for="gajiBaru" class="col-sm-6 col-form-label">Gaji pokok baru<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="gajiBaru" id="gajiBaru" value = "<?php echo $gapok_baru;?>" required>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="gol" class="col-sm-6 col-form-label">Dalam Golongan <span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="gol" id="gol" value = "<?php echo $golongan_baru;?>" required>
                </div>
              </div>
            </div>

          </div>


          <div class="col-md-6">
            <hr>

            <!-- tanggal mulai tugas -->
            <div class="form-group row">
              <label for="nip" class="col-sm-6 col-form-label">NIP<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="nip" id="nip" value = "<?php echo $nip;?>" required>
                </div>
              </div>
            </div>
            <!-- tanggal selesai tugas -->
            <div class="form-group row">
              <label for="gajiLama" class="col-sm-6 col-form-label">Gaji Pokok Lama<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="gajiLama" id="gajiLama" value = "<?php echo $gapok_lama;?>" required>
                </div>
              </div>
            </div>

            <!-- kendaraan -->
            <div class="form-group row">
              <label for="nomor" class="col-sm-6 col-form-label">Nomor SK<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="nomor" id="nomor" value = "<?php echo $sk_lama;?>" required>
                </div>
              </div>
            </div>

            <!-- Nama Penanda Tangan ST -->
            <div class="form-group row">
              <label for="masaLama" class="col-sm-6 col-form-label">Masa kerja golongan pada tanggal tersebut <span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="masaLama" id="masaLama" value = "<?php echo $tahun_kerja_lama."tahun ".$bulan_kerja_lama."bulan ";?>" required>
                </div>
              </div>
            </div>

            <!-- Jabatan Penanda Tangan ST -->
            <div class="form-group row">
              <label for="masaBaru" class="col-sm-6 col-form-label">Berdasarkan Masa Kerja <span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="masaBaru" id="masaBaru" value = "<?php echo $tahun_kerja_baru."tahun ".$bulan_kerja_baru."bulan ";?>" required>
                </div>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="spmkBaru" class="col-sm-6 col-form-label">Mulai Berlaku SK<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="spmkBaru" id="spmkBaru" value = "<?php echo $spmk_baru;?>" required>
                </div>
              </div>
            </div>
            

          </div>
                            <!-- /.box -->
                       
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

    <!-- Edit Peringatan -->
    <div id="editLhk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Data LHK</h4>
                </div>
                <div class="modal-body" id=editData>
                    <form action="<?= base_url('petugas/lhkTu/list_lhk_c/ubah_lhk') ?>" method="post" enctype="multipart/form-data">
                        <div class="box box-success">
                            <div class="box-body">

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_" id="id_">
                                </div>

                                <!-- tanggal surat -->
                                <div class="form-group ">
                                    <label for="tglEdit"><i class="fa fa-calendar"></i> Tanggal LHK</label> <small class="text-danger">*</small>
                                    <input class="form-control" type="date" name="tglEdit" id="tglEdit" required>

                                </div>


                                <div class="mb-3">
                                    <label for="fileEdit">Soft File LHK</label> <small class="text-danger">*</small>
                                    <input class="form-control" type="file" id="formFile" name="fileEdit" id="fileEdit" required>
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
        $(document).on("click", "#editPer", function() {
            var idPer = $(this).data('id');
            var tglPer = $(this).data('tgl');

            $("#editData #id_").val(idPer);
            $("#editData #tglEdit").val(tglPer);


        });
    </script>
    <!-- /. Edit Peringatan -->

    <!-- Hapus Peringatan -->
    <div id="hapusLhk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id="hapusData">
                    <form role="form" method="post" action="<?= base_url('petugas/lhkTu/list_lhk_c/hapus_lhk') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda yakin akan menghapus LHK ini ?</label>
                                <input type="hidden" id=id_ name="id_">

                            </div>
                        </div><!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
                        </div>
                    </form>
                    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).on("click", "#hapusPer", function() {
                            var id = $(this).data('id');
                            $("#hapusData #id_").val(id);
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
    <!-- Hapus Peringatan -->


    <!-- Print Surat Tugas -->
    <div id="printLhk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id=panelSur>
                    <form role="form" method="post" action="<?= base_url('petugas/lhkTu/list_lhk_c/print_lhk') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda Akan Mencetak LHK</label>
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
</section>