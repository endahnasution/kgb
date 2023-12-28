<section class="content-header">
  <h1>
    Buat Surat Tugas untuk Tata Usaha
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Surat Tugas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form" action="<?php echo base_url('petugas/surat_tugas/surat_tugas/simpan_surat_tu') ?>" method="post">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pembuatan Surat Tugas Untuk Tata Usaha</h3>
            <p><span class="wajib">* wajib diisi</span></p>
          </div>

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
              <label for="noSuratTugas" class="col-sm-6 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Input nomor surat terakhir" name="noSuratTugas" id="noSuratTugas" required>
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
              <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Surat Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tglSurat" id="tglSurat" placeholder="Tanggal" required>
              </div>
            </div>

            <!-- alamat tujuan -->
            <div class="form-group row">
              <label for="kota" class="col-sm-4 col-form-label">Kota Tujuan<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                  <select class="form-control" name="kota" id="kota" required>
                    <option value="" disabled selected>- Pilih Kota -</option>
                    <option>Kota Batam</option>
                    <option>Kota Tanjung Pinang</option>
                    <option>Kabupaten Bintan</option>
                    <option>Kabupaten Karimun</option>
                    <option>Kabupaten Anambas</option>
                    <option>Kabupaten Lingga</option>
                    <option>Kabupaten Natuna</option>
                    <option>Kota Bogor, Jawa Barat</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Anggaran -->
            <div class="form-group row">
              <label for="anggaran" class="col-sm-4 col-form-label">Anggaran<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money"></i></span>
                  <select class="form-control category" name="idAnggaran" id="idAnggaran" required>
                    <?php
                    foreach ($anggaran as $anggaran) {
                      echo "<option value=" . $anggaran->idAnggaran . ">" . $anggaran->namaAnggaran . "</option>";
                    }
                    ?>
                    <option value="" disabled selected>- Anggaran -</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Maksud -->
            <div class="form-group row">
              <label for="maksud" class="col-sm-4 col-form-label">Maksud<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                  <textarea class="form-control" name="maksud" id="maksud" placeholder="Enter.." required></textarea>
                </div>
              </div>
            </div>

          </div>


          <div class="col-md-6">
            <hr>

            <!-- tanggal mulai tugas -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Mulai Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tglMulai" id="tglMulai" placeholder="Tanggal Mulai Tugas" onclick="return chk_date()" required>
              </div>
            </div>

            <!-- tanggal selesai tugas -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Selesai Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tglSelesai" id="tglSelesai" placeholder="Tanggal Selesai Tugas" onclick="return chk_date()" required>
              </div>
            </div>

            <!-- kendaraan -->
            <div class="form-group row">
              <label for="kendaraan" class="col-sm-4 col-form-label">Kendaraan<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-taxi"></i></span>
                  <select class="form-control" name="kendaraan" id="kendaraan" required>
                    <option value="" disabled selected>- Pilih Kendaraan -</option>
                    <option>-</option>
                    <option>Pesawat</option>
                    <option>Kapal laut</option>
                    <option>Roda empat</option>
                    <option>Kendaraan umum</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Nama Penanda Tangan ST -->
            <div class="form-group row">
              <label for="namaPenandatanganst" class="col-sm-6 col-form-label">Nama Penanda Tangan ST<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select class="form-control" name="namaPenandatangan" id="namaPenandatangan" required>
                    <option value="" disabled selected>- Pilih Penanda Tangan Surat Tugas -</option>
                    <option>Bagus Heri Purnomo, S.Si., Apt</option>
                    <option>Larasati Setyaningtyas, S.Farm., Apt</option>
                    <option>Dyah Ayu Novi Hapsari, S.Farm., Apt</option>
                    <option>Ruth Deseyanti Purba, S.Si., Apt</option>
                    <option>Irdiansyah, SH</option>
                    <option>Paniyati, S.Farm., Apt</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Jabatan Penanda Tangan ST -->
            <div class="form-group row">
              <label for="jabatanPenandatanganst" class="col-sm-6 col-form-label">Jabatan Penanda Tangan ST<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select class="form-control" name="jabatanPenandatangan" id="jabatanPenandatangan" required>
                    <option value="" disabled selected>- Pilih Jabatan Penanda Tangan Surat Tugas -</option>
                    <option>Kepala Balai Pengawas Obat dan Makanan di Batam</option>
                    <option>PLH Kepala Balai POM di Batam Koordinator Substansi Informasi dan Komunikasi</option>
                    <option>PLH Kepala Balai POM di Batam Koordinatitor Substansi Pengujian</option>
                    <option>PLH Kepala Balai POM di Batam Koordinator Substansi Pemeriksaan</option>
                    <option>PLH Kepala Balai POM di Batam Koordinator Substansi Penindakan</option>
                    <option>PLH Kepala Balai POM di Batam Kepala SUB Bagian Tata Usaha</option>
                  </select>
                </div>
              </div>
            </div>

          </div>


          <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
              <!-- general form elements -->

              <div class="box box-primary">
                <div class="box-header with-border">

                  <hr>
                  <h4>Petugas</h4>
                  <hr>

                  <section class="content">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box">

                          <!-- Petugas -->
                          <div class="form-group row">
                            <label for="pilihPetugas" class="col-sm-3 col-form-label">Pilih Petugas<span class="wajib"> *</span></label>
                            <div class="col-md-12">
                              <select class="category related-post form-control" name="idPetugas[]" id="idPetugas[]" multiple="multiple" data-placeholder="Pilih Petugas" style="width: 100%;" required>
                                <?php
                                foreach ($petugas as $pegawai) {
                                  echo "<option value=" . $pegawai->idPegawai . ">" . $pegawai->nama . "</option>";
                                }
                                ?>

                              </select>
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

                <div class="box-footer">
                  <button type="submit" value="submit" onclick="return chk_date()" class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
                  <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
                </div>
      </form>

    </div>





  </div>
  </div>
  <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #ca2e2e;
      border: 1px solid #aaa;
      border-radius: 4px;
      box-sizing: border-box;
      display: inline-block;
      margin-left: 5px;
      margin-top: 5px;
      padding: 0;
      padding-left: 20px;
      position: relative;
      max-width: 100%;
      overflow: hidden;
      text-overflow: ellipsis;
      vertical-align: bottom;
      white-space: nowrap;
      font-size: 15px;
    }
  </style>

  <!-- /.row -->
</section>
<!-- /.content -->