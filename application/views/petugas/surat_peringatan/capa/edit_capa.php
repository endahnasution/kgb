<section class="content-header">
  <h1>
    Edit Surat CAPA
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Peringatan</a></li>
    <li><a href="#">Edit Surat CAPA</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form" action="<?php echo base_url('petugas/surat_capa/simpanEditCapa') ?>" method="post">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title; ?></h3>
            <p><span class="wajib">* wajib diisi</span></p>

            <div class="col-md-6">
              <h4>Informasi Kepala Surat</h4>
              <hr>



              <?php 
             
              foreach ($editCapa as $row){
                $idPeringatan = $row->idPeringatan;
                $noSuratTugas = $row->noSuratTugas;
                $tglSurat = $row->tglSuratPeringatan;
                $noSurat = $row->noSuratPeringatan;
                $perihal = $row->jenisPeringatan;
                $namaSarana = $row->namaSarana;
                $pembuatCapa = $row->pembuatCapa;
                $detail = $row->isiCapa;
              }?>


              <div class="form-group">
                  <input type="hidden" class="form-control" name="idPeringatan" id="idPeringatan" value="<?=$idPeringatan?>">
                </div>

             <!-- nomor surat tugas -->
               <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="noSuratTugas" value="<?=$noSuratTugas?>" readonly>
                    </div>
                  </div>
                </div>


           <!-- tanggal surat -->
                <!-- <div class="form-group row">
                  <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <input class="form-control" type="date" name="tanggalSurat" value="<?=$tglSurat?>" required>
                  </div>
                </div> -->

             <!-- nomor surat -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat CAPA (Diisi Nama Sarana)<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="noSurat" value="<?=$noSurat ?>"  required>
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
                      <?php 
                      if($perihal == "eval"){
                           $tampil = "Evaluasi CAPA";
                        }else{
                          $tampil = "Closed CAPA";
                        }
                        ?>
                       <option value="<?=$perihal?>"  selected><?php echo $tampil; ?></option>
                      <option value="eval">Evaluasi CAPA</option>
                      <option value="closed">Closed CAPA</option>
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
                  <label for="noSurat" class="col-sm-4 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="namaSarana" name="namaSarana" value="<?=$namaSarana ?>"  readonly>
                    </div>
                  </div>
                </div>


              <!-- pembuat CAPA khusus untuk closed capa -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Pembuat CAPA<span class="wajib"> (khusus untuk surat closed capa)</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" placeholder="Pembuat CAPA" name="pembuat" id="pembuat" value="<?=$pembuatCapa ?>">
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
                      <textarea class="textarea" name="detailTemuan" id="detailTemuan" value="<?=$detail ?>"  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required> <?php echo $detail?></textarea>
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
          url: "<?php echo base_url(); ?>petugas/surat_capa/getSaranaPer",
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