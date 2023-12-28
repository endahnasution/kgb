<section class="content-header">
  <h1>
    Buat Data Anggaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Data Anggaran</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
   <div class="col-md-12">
     <form role="form" action="<?php echo base_url('admin/Master/simpan_anggaran')?>" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pembuatan Data Anggaran</h3>
          <p><span class="wajib">* wajib diisi</span></p>
        </div>

        <div class="col-md-12">
          <hr>
          
          <!-- mak -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">MAK<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="MAK" name="makag" id="makag" required>
              </div>
            </div>
          </div>

          <!-- uraian kegiatan -->

          <!-- divisi -->
            <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Sumber Dana <span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="diviag" id="diviag" required>
                  <option value="" disabled selected>- Pilih Sumber Dana -</option>
                  <option>PNBP</option>
                  <option>RM</option>
                </select>
              </div>
            </div>
          </div>
          <!-- kode -->
          
          <!-- pagu -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Pagu<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Pagu" name="paguag" id="paguag" required>
              </div>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">PPK <span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="ppk" id="ppk" required>
                  <option value="" disabled selected>- Pilih PPK -</option>
                  <?php
                  foreach ($ppk as $row) {
                  echo "<option value=" . $row->idPegawai . ">" . $row->nama . "</option>";
                }

                ?>?>
                  
                </select>
              </div>
            </div>
          </div>

          <!-- realisasi -->
          <!-- <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Realisasi<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Realisasi" name="realisasiag" id="realisasiag" required>
              </div>
            </div>
          </div> -->

          </div>




        <div class="box-footer">
         <button type="submit" value="submit"  class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
         <button type="reset"  value ="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
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
