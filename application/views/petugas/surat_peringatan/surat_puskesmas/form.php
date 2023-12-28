  <section class="content-header">
    <h1>
      Buat Surat Tindak Lanjut untuk Puskesmas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tindak Lanjut</a></li>
      <li><a href="#">Surat Obat</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form role="form" action="<?php echo base_url('petugas/surat_peringatan/surat_puskesmas/simpanPeringatan') ?>" method="post">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pembuatan Surat Tindak Lanjut</h3>
              <p><span class="wajib">* wajib diisi</span></p>

              <div class="col-md-6">
                <h4>Informasi Kepala Surat</h4>
                <hr>

                <!-- nomor surat tugas -->
                <div class="form-group row">
                  <label for="kendaraan" class="col-sm-4 col-form-label">No.Surat Tugas<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                      <select name="suratTugas" id="suratTugas" class="form-control category" data-live-search="true" required>
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



                <!-- tanggal surat -->
                <!-- <div class="form-group row">
                  <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <input class="form-control" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" required>
                  </div>
                </div> -->

                <!-- nomor surat -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">No Surat (Diisi nama sarana)<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="text" class="form-control" placeholder="Nomor Surat" name="noSurat" id="noSurat" required>
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
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <select name="idSarana" id="idSarana" class="form-control input-sm" data-live-search="true" title="Pilih Sarana">
                        <option value="">Pilih Sarana</option>
                      </select>
                    </div>
                  </div>
                </div>



                <!-- tanggal periksa mulai -->
                <div class="form-group row">
                  <label for="example-date-input" class="col-sm-6 col-form-label">Tanggal Periksa<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <input class="form-control" type="date" name="tglMulaiperiksa" id="tglMulaiperiksa" placeholder="Tanggal Mulai Periksa" required>
                  </div>
                </div>


                <script>
                  function chk_date() {
                    var durationstart = document.getElementById('tglMulaiperiksa').value;
                    var durationend = document.getElementById('tglSelesaiperiksa').value;
                    var st = durationstart.split("-");
                    var en = durationend.split("-");
                    var startDate = new Date(st[2], (+st[0] - 1), st[1]);
                    var endDate = new Date(en[2], (+en[0] - 1), en[1]);
                    if (startDate > endDate) {
                      alert("Please enter proper duration range");
                      return false;
                    } else {
                      return true;
                    }
                  }
                </script>


                <!-- no izin -->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-4 col-form-label">Nomor izin<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="noIzin" id="noIzin" placeholder="Nomor Izin" required>
                    </div>
                  </div>
                </div>



                <!-- nama PJ-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-6 col-form-label">Nama Penanggung Jawab<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="namaPj" id="namaPj" placeholder="Nama Penanggung Jawab" required>
                    </div>
                  </div>
                </div>

                <!-- nomor SIPTTK-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-5 col-form-label">No. SIPTTK<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="noSip" id="noSip" placeholder="No. SIPTTK" required>
                    </div>
                  </div>
                </div>

                <!-- nomor HP-->
                <div class="form-group row">
                  <label for="noSurat" class="col-sm-5 col-form-label">No. HP<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-building"></i></span>
                      <input type="text" class="form-control" name="noHp" id="noHp" placeholder="No. HP" required>
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
              <!--        <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="detPelanggaran" id="detPelanggaran" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>-->

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
                      <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="detPasal" id="detPasal" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>

                    </div>
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <button type="submit" value="submit" onclick="return chk_date()" class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
                <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>


                <a class="btn btn-primary pull-right" href=<?php echo base_url() . "petugas/surat_peringatan/c_surat_peringatan" ?>> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali ke daftar peringatan</a>
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
            url: "<?php echo base_url(); ?>petugas/surat_peringatan/c_surat_peringatan/getSaranaPer",
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