<section class="content-header">
  <h1>
    LHK Sertifikasi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Petugas</a></li>
    <li><a href="#">LHK</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo site_url('petugas/lhk/lhk_sertifikasi_c/add') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pembuatan Surat LHK</h3>
            <p><span class="wajib">* wajib diisi</span></p>

            <div class="col-md-6">
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <!-- no surat -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                    <select class="form-control category" name="suratTugas" id="suratTugas" style="width: 100%;">
                      <?php
                      foreach ($surat_tugas as $surat) {
                        echo "<option value=" . $surat->idSurat . ">" . $surat->noSuratTugas . "</option>";
                      }
                      ?>
                      <option selected="selected">- Pilih Surat Tugas -</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal LHK<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tglLhk" required>
                  <div class="invalid-feedback">
                    <?php echo form_error('tglPemeriksaan') ?>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">SPPD disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="sppd" id="sppd" placeholder="Pengesah SPPD" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" placeholder="Pengesah Kwitansi" required>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Form 8 jam disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="form" id="form" placeholder="Pengesah Form 8 Jam" required>
                  </div>
                </div>
              </div>
            </div>
            
             <!---ttd penanggung jawab-->
             
            <div class="col-md-6">
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Ketua Tim<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <!-- no surat -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                                        <select class="form-control category" name="ketuaTim" id="ketuaTim" style="width: 100%;">
                                            <?php
                                            foreach ($ketuaTims as $ketuaTim) {
                                                echo "<option value=" . $ketuaTim->idPegawai . ">" . $ketuaTim->nama . "</option>";
                                            }
                                            ?>
                                            <option selected="selected">- Pilih Ketua Tim -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
            </div>
            
            

            <div class="col-md-12">
              <div class="form-group row">

                <div class="col-sm-12">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp Save</button>
                </div>
              </div>
            </div>
          </div>





        </div>




        <br>
        <!-- nomor surat -->



        <!-- tanggal kegiatan -->



    </div>


    <div class="col-md-6">
      <br>

      <!-- sppd -->



      <!-- kwitansi -->



      <!-- form 8 jam  -->

    </div>

    <div class="col-md-12">

    </div>
  </div>


  </form>
  </div>
  </div>
</section>


<script>
  $(document).ready(function() {
    $('#repeater').createRepeater();

  });
</script>