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
      <form action="<?php echo site_url('petugas/lhk_pem_c/add') ?>" method="post" enctype="multipart/form-data" role="form">
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
                        echo "<option value=".$surat->idSurat.">".$surat->noSuratTugas."</option>";
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
                <label for="noSurat" class="col-sm-6 col-form-label">SPPD disahkan oleh :</label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="sppd" id="sppd" placeholder="Pengesah SPPD" required>
                  </div>
                </div>
              </div>


              <!-- kwitansi -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :</label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" placeholder="Pengesah Kwitansi" required>
                  </div>
                </div>
              </div>


              <!-- form 8 jam  -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Form 8 jam disahkan oleh :</label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="8jam" id="8jam" placeholder="Pengesah Form 8 Jam" required>
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
                     <div class="dynamic">
                     <table class="table table-bordered table-hover" >
                      <tr>
                        <!-- sarana -->
                        <td><select name="sarana[]" id="sarana[]" class="form-control category sm" title="Nama Sarana">
                          <?php
                      foreach ($sarana as $sr) {
                        echo "<option value=".$sr->idSarana.">".$sr->namaSarana."</option>";
                      }
                      ?>
                      <option selected="selected">- Pilih Sarana -</option>
                        </select>

                        <br>

                        <p>Jika tidak ada sarana, <a href="" >tambah sarana </a></p>

                      </td>

                        <!-- temuan -->

                         <td><select name="temuan[]" id="temuan[]" class="category related-post form-control" multiple="multiple" data-placeholder="Temuan" style="width: 100%;"> 
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

                           <td><select name="tl[]" id="tl[]" class="form-control sm" title="Nama Sarana">
                          <option>Tindak Lanjut</option>
                          <option value="Pembinaan">Pembinaan</option>
                          <option value="Peringatan">Peringatan</option>
                          <option value="Peringatan Keras">Peringatan Keras</option>
                          <option value="PSK">PSK</option>
                          <option value="Penghentian Kegiatan">Penghentian Kegiatan</option>
                          <option value="TL ke Penyidikan">TL ke Penyidikan</option>
                          <option value="CAPA">CAPA</option>
                        </select></td>

                           <td><select name="kesimpulan[]" id="kesimpulan[]" class="form-control sm" title="Kesimpulan">
                          <option>Kesimpulan</option>
                          <option value="1">MK</option>
                          <option value="0">TMK</option>
                           <option value="-">-</option>
                          
                        </select></td>


                        </tr>

                        <tr>

                        <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>

                        <td><button type="button" name="add" id="add" class="btn btn-primary"><i class="fa fa-plus"> Tambah</button></td>  
                        </tr>
                      
                      </table>
                      </div>

                        <div id="newRow"></div>
            <button id="addRow" type="button" class="btn btn-info">Add Row</button>

                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>





                  <div class="box-body pad">
                    <form>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
          </div>
          <!-- /.box-body -->
        </div>

      </div>

      <div class="box-footer">

      </div>
    </form>
  </div>
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
<style>
  .wajib {
    color: red;
  }

  .kotak {
    border: 1px groove #ffffffba !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
  }

  legend.scheduler-border {
    width: inherit;
    /* Or auto */
    padding: 0 10px;
    /* To give a bit of padding on the left and right */
    border-bottom: none;
    font-size: 16px;
  }
</style>


<script>
    $(document).ready(function(){
      
      var count = 0;

      $(document).on('click', '.add', function(){
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
        html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option><?php echo fill_select_box($connect, "0"); ?></select></td>';
        html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
        $('tbody').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

 

   
    });
</script>