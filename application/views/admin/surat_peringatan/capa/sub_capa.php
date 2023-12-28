<section class="content-header">
  <h1>
    Buat Surat CAPA
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Peringatan</a></li>
    <li><a href="#">Surat CAPA</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form" action="<?php echo base_url('admin/surat_capa/simpanCapa') ?>" method="post">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title; ?></h3>
            <p><span class="wajib">* wajib diisi</span></p>

            <div class="col-md-6">
              <h4>Informasi Kepala Surat</h4>
              <hr>

              <!-- nomor surat tugas -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-4 col-form-label">No.Surat Tugas<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                    <select name="suratTugas" id="suratTugas" class="form-control category" data-live-search="true" required>
                      <?php
                      foreach ($surat as $row) {
                        echo "<option value=" . $row->idSurat . ">" . $row->noSuratTugas . "</option>";
                      }
                      ?>
                      <option selected="selected">- Pilih Surat Tugas -</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- tanggal surat -->
              <div class="form-group row">
                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <input class="form-control" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" required>
                </div>
              </div>

              <!-- nomor surat -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat CAPA<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="noSurat" id="noSurat" required>
                  </div>
                </div>
              </div>




              <!-- hal surat -->
              <div class="form-group row">
                <label for="Perihal" class="col-sm-4 col-form-label">Perihal CAPA<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    <select name="halSurat" id="halSurat" class="form-control" required>
                      <option value="" disabled selected>- Pilih Perihal -</option>
                      <option value="eval">Evaluasi CAPA</option>
                      <option value="closed">Close CAPA</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>


            <div class="col-md-6">
              <h4>Detail Sarana</h4>
              <hr>

              <!-- nama sarana -->
              <div class="form-group row">
                <label for="namaSarana" class="col-sm-4 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    <select name="idSarana" id="idSarana" class="form-control input-sm" data-live-search="true" title="Pilih Sarana">
                      <option selected="selected">- Pilih Sarana -</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Jenis Komoditi -->
              <div class="form-group row">
                <label for="Perihal" class="col-sm-4 col-form-label">Jenis Komoditi<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    <select name="komoditi" id="komoditi" class="form-control" required>
                      <option value="" disabled selected>- Jenis Komoditi -</option>
                      <option value="obat">PBF</option>
                      <option value="obat">Apotek</option>
                      <option value="obat">RS</option>
                      <option value="obat">Klinik</option>
                      <option value="obat">Puskesmas</option>
                      <option value="obat">Toko Obat</option>
                      <option value="pangan">Pangan</option>
                      <option value="kosmetik">Kosmetik</option>
                      <option value="kemasan">Kemasan Pangan</option>
                    </select>
                  </div>
                </div>
              </div>


              <!-- pembuat CAPA khusus untuk closed capa -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Pembuat CAPA<span class="wajib"> (khusus untuk surat closed capa)</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="Pembuat CAPA" name="pembuat" id="pembuat">
                  </div>
                </div>
              </div>






            </div>

            <div class="col-md-12">
              <br />
              <br />

              <h4>Isi Surat CAPA</h4>
              <hr>

              <div class="form-group row">
                <label for="detailTemuan" class="col-sm-3 col-form-label">Isi Surat CAPA<span class="wajib"> *</span></label>
                <div class="col-md-12">
                  <!-- /.card-header -->
                  <div class="card-body pad">
                    <div class="">
                      <textarea class="textarea" name="detailTemuan" id="detailTemuan" placeholder="Isi Surat CAPA" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                    </div>
                  </div>
                </div>
              </div>





              <div class="box-footer">
                <button type="submit" value="submit" onclick="return chk_date()" class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
                <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#suratTugas').change(function() {
      var idPer = $('#suratTugas').val();
      if (idPer != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/surat_capa/getSaranaPer",
          method: "POST",
          data: {
            idPer: idPer
          },
          success: function(data) {
            $('#idSarana').html(data);
          }
        });
      } else {
        $('#idSarana').html('<option value="">Pilih Surat Tugas Doloe</option>');
      }


    });
  });
</script>