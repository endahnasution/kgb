<section class="content-header">
  <h1>
    Edit Surat Tugas
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Surat Tugas</a></li>
     <li><a href="#">Edit Surat Tugas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form" action="<?php echo base_url('admin/surat_tugas/surat_tugas/ubah_surat') ?>" method="post">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Edit Surat Tugas</h3>
            <p><span class="wajib">* wajib diisi</span></p>
          </div>

          <div class="col-md-6">
            <hr>

 <?php
 $petugasSurat = array();
 $idPetugasSurat = array();
 foreach($surattugas as $row){
  $idSurat = $row->idSurat;
  $noSurat = $row->noSuratTugas;
  $tglSurat = $row->tglSurat;
  $kotaSurat = $row->kota;
  $anggaranSurat = $row->namaAnggaran;
  $idanggaranSurat = $row->idAnggaran;
  $maksudSurat = $row->maksud;
  $tglMulaiSurat = $row->tglMulai;
  $tglSelesaiSurat = $row->tglSelesai;
  $kendaraanSurat =$row->kendaraan;
  $penandatanganSurat = $row->namaPenandatangan;
  $jabatanSurat = $row->jabatanPenandatangan;
  array_push($petugasSurat, $row->nama);
  array_push($idPetugasSurat, $row->idPegawai);
 }?>


                <div class="form-group">
                  <input type="hidden" class="form-control" name="idSurat" id="idSurat" value="<?=$idSurat?>">
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="noSuratLama" id="noSuratLama" value="<?=$noSurat?>">
                </div>


            <!-- nomor surat -->
            <div class="form-group row">
              <label for="noSuratTugas" class="col-sm-6 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Nomor Surat Tugas" name="noSuratTugas" id="noSuratTugas" value="<?=$noSurat?>" required>
                </div>
              </div>
            </div>

            <!-- tanggal surat -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Surat Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tglSurat" id="tglSurat" value="<?=$tglSurat?>" required>
              </div>
            </div>

            <!-- alamat tujuan -->
            <div class="form-group row">
              <label for="kota" class="col-sm-4 col-form-label">Kota Tujuan<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-building"></i></span>
                  <select class="form-control" name="kota" id="kota"  required>
                    <option value="<?=$kotaSurat?>" selected><?php echo $kotaSurat ?></option>
                    <option>Kota Batam</option>
                    <option>Kota Tanjung Pinang</option>
                    <option>Kabupaten Bintan</option>
                    <option>Kabupaten Karimun</option>
                    <option>Kabupaten Anambas</option>
                    <option>Kabupaten Lingga</option>
                    <option>Kabupaten Natuna</option>
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
                     <option value="<?=$idanggaranSurat?>" selected><?php echo $anggaranSurat ?></option>
                    <?php
                    foreach ($anggaran as $anggaran) {
                      echo "<option value=" . $anggaran->idAnggaran . ">" . $anggaran->namaAnggaran . "</option>";
                    }
                    ?>
                    
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
                  <textarea class="form-control" name="maksud" id="maksud" required><?=$maksudSurat?></textarea>
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
                <input class="form-control" type="date" name="tglMulai" id="tglMulai" value="<?=$tglMulaiSurat?>" onclick="return chk_date()" required>
              </div>
            </div>

            <!-- tanggal selesai tugas -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Selesai Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tglSelesai" id="tglSelesai" value="<?=$tglSelesaiSurat?>"onclick="return chk_date()" required>
              </div>
            </div>

            <!-- kendaraan -->
            <div class="form-group row">
              <label for="kendaraan" class="col-sm-4 col-form-label">Kendaraan<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-taxi"></i></span>
                  <select class="form-control" name="kendaraan" id="kendaraan" required>
                    <option value="<?=$kendaraanSurat?>" selected><?=$kendaraanSurat?></option>
                    <option>-</option>
                    <option>Pesawat</option>
                    <option>Kapal laut</option>
                    <option>Kendaraan dinas</option>
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
                    <option value="<?=$penandatanganSurat?>" selected><?=$penandatanganSurat?></option>
                    <option>Musthofa Anwari,S.Si.,Apt	</option>
                    <option>Larasti Setyaningtyas, S.Farm., Apt</option>
                    <!--<option>Dyah Ayu Novi Hapsari, S.Farm., Apt</option>-->
                    <!--<option>Ruth Deseyanti Purba, S.Si., Apt</option>-->
                    <!--<option>Irdiansyah, SH</option>-->
                    <!--<option>Paniyati, S.Farm., Apt</option>-->
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
                  <select class="form-control" name="jabatanPenandatangan" id="jabatanPenandatangan"  required>
                    <option value="<?=$jabatanSurat?>"  selected><?php echo $jabatanSurat ?></option>
                    <option>Kepala Balai Pengawas Obat dan Makanan di Batam</option>
                    <!--<option>PLH Kepala Balai POM di Batam Koordinator Substansi Informasi dan Komunikasi</option>-->
                    <!--<option>PLH Kepala Balai POM di Batam Koordinatitor Substansi Pengujian</option>-->
                    <!--<option>PLH Kepala Balai POM di Batam Koordinator Substansi Pemeriksaan</option>-->
                    <!--<option>PLH Kepala Balai POM di Batam Koordinator Substansi Penindakan</option>-->
                    <option>Plh. Kepala Balai Pengawas Obat dan Makanan di Batam</option>
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
                              <select class="category related-post form-control" name="idPetugas[]" id="idPetugas[]" multiple="multiple"  style="width: 100%;" required>
                                <?php for($i = 0; $i<count($petugasSurat);$i++){?> 
                                  <option value="<?=$idPetugasSurat[$i]?>"  selected><?php echo $petugasSurat[$i]; ?></option>
                                  <?php 
                                }?>
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
                  <button type="submit" value="submit" onclick="return chk_date()" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
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