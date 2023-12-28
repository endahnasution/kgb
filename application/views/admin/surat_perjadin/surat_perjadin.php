<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<section class="content-header">
  <h1>
    Surat Perjalanan Dinas
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Surat Perjalanan Dinas</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title"><i class="fa fa-file"></i> Cetak Surat Perjalanan Dinas
          </h3>

          <hr>

          <form action="<?php echo base_url('admin/surat_perjadin/surat_perjadin/print') ?>" method="post">
            <!-- nomor surat -->
            <div class="form-group">
              <label>Surat Tugas</label><span class="wajib"> *</span></label>
              <select name="noSurat" id="noSurat" class="form-control category" data-live-search="true" title="Select Category" required>

                <option value="" disabled selected>Pilih Surat Tugas</option>

                <?php
                foreach ($tugas as $row) {
                  echo "<option value=" . $row->noSuratTugas . ">" . $row->noSuratTugas . "</option>";
                }

                ?>

              </select>
            </div>


            <!-- nomor surat -->
            <div class="form-group">
              <label>Petugas</label><span class="wajib"> *</span></label>
              <select name="idPetugas" id="idPetugas" class="form-control input-sm" data-live-search="true" title="Pilih Petugas">
                <option value="" disabled selected>- Pilih Petugas -</option>
              </select>
            </div>

            <!-- Nama Penanda Tangan ST -->
            <div class="form-group row">
              <label for="namaPenandatanganst" class="col-sm-6 col-form-label">Nama Penanda Tangan SPD<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <select class="form-control" name="namaPenandatangan" id="namaPenandatangan" required>
                    <option value="" disabled selected>- Pilih Penanda Tangan SPD -</option>
                    <option>Lintang Purba Jaya, S.Farm,Apt.,M.Si</option>
                    <option>Larasti Setyaningtyas, S.Farm., Apt</option>
                    <option>Dyah Ayu Novi Hapsari, S.Farm., Apt</option>
                    <option>Ruth Deseyanti Purba, S.Si., Apt</option>
                    <option>Irdiansyah, SH</option>
                    <option>Paniyati, S.Farm., Apt</option>
                  </select>
                </div>
              </div>
            </div>


            <!-- ppk -->
            <div class="form-group">
              <label>Pejabat Pembuat Komitmen<span class="wajib"> *</span></label>
              <select class="form-control" name="namaPpk" id="namaPpk" required>
                <option value="" disabled selected>- Pilih Penanda Tangan PPK -</option>
                <option>Indah Rosdiana, S.Si</option>
                <option>Rhee Juliana, S.Kom</option>
                
                ?>
              </select>
            </div>


            <button type="submit" value="submit" onclick="" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
          </form>

        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
          <div class="row">



          </div>
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      </body>

      </html>

      <script type="text/javascript">
        $(document).ready(function() {
          $('#noSurat').change(function() {
            var idPer = $('#noSurat').val();
            if (idPer != '') {
              $.ajax({
                url: "<?php echo base_url(); ?>admin/surat_perjadin/surat_perjadin/getPetugas",
                method: "POST",
                data: {
                  idPer: idPer
                },
                success: function(data) {
                  $('#idPetugas').html(data);
                }
              });
            } else {
              $('#idPetugas').html('<option value="">Pilih Surat Tugas Doloe</option>');
            }


          });
        });
      </script>