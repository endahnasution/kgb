  <section class="content-header">
    <h1>
      Edit Surat Tindak Lanjut Untuk Kemasan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tindak Lanjut</a></li>
      <li><a href="#">Surat Kemasan</a></li>
      <li><a href="#">Edit Kemasan</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form role="form" action="<?php echo base_url('admin/surat_peringatan/surat_kemasan/editPeringatan') ?>" method="post">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Surat Tindak Lanjut</h3>
              <p><span class="wajib">* wajib diisi</span></p>

              <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php elseif ($this->session->flashdata('failed')) : ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('failed'); ?>
                </div>
              <?php endif; ?>


              <div class="col-md-6">
                <h4>Informasi Kepala Surat</h4>
                <hr>

                <?php
                $noSuratTugas = "";
                foreach ($peringatan as $row) {
                  $idPeringatan = $row->idPeringatan;
                  $noSuratTugas = $row->noSuratTugas;
                  $tglSurat = $row->tglSuratPeringatan;
                  $noSuratPeringatan = $row->noSuratPeringatan;
                  $namaSarana = $row->namaSarana;
                  $tglPeriksa = $row->tglPeriksa;
                  $noIzin = $row->noIzin;
                  $namaPimpinan = $row->namaPimpinan;
                  $namaPj = $row->namaPj;
                  $noSipa = $row->noSipa;
                  $nib = $row->nib;
                  $detailPeringatan = $row->detailPeringatan;
                  $pasalPeringatan = $row->pasalPeringatan;
                  $noHp = $row->noHp;
                }
                ?>

                <div class="form-group">
                  <input type="hidden" class="form-control" name="idPeringatan" id="idPeringatan" value="<?= $idPeringatan ?>">
                </div>

                <!-- nomor surat tugas -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="noSuratTugas" value="<?= $noSuratTugas ?>" readonly>
                    </div>
                  </div>
                </div>



                <!-- tanggal surat -->
                <div class="form-group row">
                  <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <input class="form-control" type="date" name="tanggalSurat" value="<?= $tglSurat ?>" required>
                  </div>
                </div>

                <!-- nomor surat -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="noSurat" value="<?= $noSuratPeringatan ?>" required>
                    </div>
                  </div>
                </div>



              </div>


              <div class="col-md-6">
                <h4>Detail Sarana</h4>
                <hr>

                <!-- nama sarana -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="namaSarana" name="namaSarana" value="<?= $namaSarana ?>" readonly>
                    </div>
                  </div>
                </div>




                <!-- tanggal periksa mulai -->
                <div class="form-group row">
                  <label for="example-date-input" class="col-sm-6 col-form-label">Tanggal Periksa<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <input class="form-control" type="date" name="tglMulaiperiksa" id="tglMulaiperiksa" value="<?= $tglPeriksa ?>" required>
                  </div>
                </div>



                <!-- nomor surat -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor NIB<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="nib" value="<?= $nib ?>" required>
                    </div>
                  </div>
                </div>


                <!-- nama pj-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-6 col-form-label">Nama Pimpinan<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="namaPimpinan" id="namaPimpinan" value="<?= $namaPimpinan ?>" required>
                    </div>
                  </div>
                </div>

                <!-- nama pj-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-6 col-form-label">Nama PJ<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="namaPj" id="namaPj" value="<?= $namaPj ?>" required>
                    </div>
                  </div>
                </div>



                <!-- nomor HP-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-5 col-form-label">No. HP<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="noHp" id="noHp" value="<?= $noHp ?>" required>
                    </div>
                  </div>
                </div>

              </div>

              <hr>
              <h4>Detail Pasal Pelanggaran</h4>
              <hr>


              <!-- Pelanggaran -->
              <!--<div class="form-group row">-->
              <!--  <label for="" class="col-sm-3 col-form-label">Detail Pelanggaran<span class="wajib"> *</span></label>-->
              <!--  <div class="col-md-12">-->
                  <!-- /.card-header -->
              <!--    <div class="box-body pad">-->
              <!--      <div class="">-->
              <!--        <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="detPelanggaran" id="detPelanggaran" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $detailPeringatan ?></textarea></td>-->

              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->


              <!-- Pelanggaran -->

              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Pasal <span class="wajib"> *</span></label>
                <div class="col-md-12">
                  <!-- /.card-header -->
                  <div class="box-body pad">
                    <div class="">
                      <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="detPasal" id="detPasal" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pasalPeringatan ?></textarea></td>

                    </div>
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <button type="submit" value="submit" class="btn btn-success"><i class="fa fa-save"></i> Edit</button>
                <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>

                <a class="btn btn-primary pull-right" href=<?php echo base_url() . "admin/surat_peringatan/c_surat_peringatan" ?>> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali ke daftar peringatan</a>




              </div>
            </div>
          </div>


        </form>

      </div>



    </div>
    </div>

    <style>
      .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;

        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
      }

      .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #151515;
        cursor: pointer;
        display: inline-block;
        font-weight: bold;
        margin-right: 2px;
      }
    </style>
    <!-- /.row -->
  </section>
  <!-- /.content -->