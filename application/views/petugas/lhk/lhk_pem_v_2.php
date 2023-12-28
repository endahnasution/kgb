<section class="content-header">
  <h1>
    LHK Pemeriksaan
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
      <form action="<?php echo site_url('petugas/lhk/lhk_pem_c/add') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pembuatan Surat LHK</h3>
            <p><span class="wajib">* wajib diisi</span></p>
          </div>
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

              <br>
              <!-- nomor surat -->
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


              <!-- tanggal kegiatan -->
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
              <br>

              <!-- sppd -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">SPPD disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="sppd" id="sppd" placeholder="Pengesah SPPD" required>
                  </div>
                </div>
              </div>


              <!-- kwitansi -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" placeholder="Pengesah Kwitansi" required>
                  </div>
                </div>
              </div>


              <!-- form 8 jam  -->
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

            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">

                  <h3 class="box-title">Hasil Pemeriksaan</h3>

                  <div class="row">
                    <div class="col-xs-12">
                       <hr>
                     
                      <!-- sarana -->


                      <label for="pilihPasal" class="col-sm-6 col-form-label">Pilih Nama Sarana Terlebih Dahulu<span class="wajib"> *</span></label>
                      <div class="col-md-12">
                        <select class="category related-post form-control" name="sarana[]" id= "sarana" multiple="multiple" data-placeholder="Pilih Sarana" style="width: 100%;" required>
                          <?php
                          foreach ($sarana as $sr) {
                            echo "<option value=" . $sr->idSarana . ">" . $sr->namaSarana . "</option>";
                          }
                          ?>

                          ?>

                        </select>

                         <hr>


                        <div id="repeater">
                          <button type="button" class="btn btn-success repeater-add-btn"><i class="fa fa-plus"></i>&nbsp Tambah Rincian LHK</button>
                          <div class="items" data-group="programming_languages">
                            <div class="item-content">
                              <div class="form-group">
                                <div class="row">
                                  <table class="table table-bordered table-hover">


                                      <!-- temuan -->

                                      <td><select data-skip-name="true" name="temuan[][]" id="temuan[][]" class="category related-post form-control" multiple="multiple" data-placeholder="Temuan" style="width: 100%;">
                                        <option value="Perizinan">Perizinan</option>
                                        <option value="Pengadaan">Pengadaan</option>
                                        <option value="CDOB">CDOB</option>
                                        <option value="Produk TIE">Produk TIE</option>
                                        <option value="Mutu/Label">Mutu/Label</option>
                                        <option value="Produk Dilarang">Produk Dilarang</option>
                                        <option value="Administrasi">Administrasi</option>
                                        <option value="Hygiene/Sanitasi">Hygiene/Sanitasi</option>
                                        <option value="CPPB">CPPB</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                      </select></td>

                                      <td><select data-skip-name="true" name="tl[]" id="tl[]" class="form-control sm" title="Tindak lanjut">
                                        <option>Tindak Lanjut</option>
                                        <option value="-">-</option>
                                        <option value="Pembinaan">Pembinaan</option>
                                        <option value="Tindak Lanjut Hasil Pemeriksaan">Tindak Lanjut Hasil Pemeriksaan</option>
                                        <option value="Pembinaan Teknis">Pembinaan Teknis</option>
                                        <option value="Peringatan">Peringatan</option>
                                        <option value="Peringatan Keras">Peringatan Keras</option>
                                        <option value="Penghentian Sementara Kegiatan">PSK</option>
                                        <option value="Rekomendasi Pencabutan Izin">Rekomendasi Pencabutan Izin</option>
                                        <option value="TL ke Penyidikan">TL ke Penyidikan</option>
                                      </select></td>

                                      <td><select data-skip-name="true" name="kesimpulan[]" id="kesimpulan[]" class="form-control sm" title="Kesimpulan">
                                        <option>Kesimpulan</option>
                                        <option value="1">MK</option>
                                        <option value="0">TMK</option>

                                      </select></td>



                                    </tr>

                                    <tr>

                                      <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="keterangan[]" id="keterangan[]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>

                                      <td>
                                        <div class="col-md-3" style="margin-top:18px;" align="left">
                                          <button id="remove-btn" onclick="$(this).parents('.items').remove()" class="btn btn-danger">Remove</button>
                                        </div>
                                      </td>

                                    </tr>

                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                  </div>
                </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
              </div>
              &nbsp;
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
    <script>
      $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

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