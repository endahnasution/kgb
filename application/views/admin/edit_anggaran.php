<section class="content-header">
  <h1>
    Edit Data Anggaran
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
     <form role="form" action="<?php echo base_url('admin/Master/ubahAnggaran')?>" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Data Anggaran</h3>
          <p><span class="wajib">* wajib diisi</span></p>
        </div>
        
         <?php
 
 foreach($anggaran as $row){
  $id = $row->idAnggaran;
  $mak = $row->mak;
  $nama =  $row->namaAnggaran;
  $kegiatan =  $row->uraianKegiatan;
  $substansi=  $row->jenisSubstansi;
  $kode =  $row->kode;
  $pagu =  $row->pagu;
  $idPpk =  $row->idPpk;

 }?>
    

        <div class="col-md-12">
          <hr>
       
           <input type="hidden" class="form-control" placeholder="Nama Pegawai" name="id" id="id" value=<?= $id?> required>
          
          <!-- nama pegawai -->
           <div class="form-group row">
                  <label for="noSuratTugas" class="col-sm-6 col-form-label">Nama Anggaran<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                      <input type="text" class="form-control" placeholder="Pilih Nama " name="nama" id="nama" value="<?=$nama?>" required>
                    </div>
                  </div>
                </div>
                
                
                 <div class="form-group row">
                  <label for="noSuratTugas" class="col-sm-6 col-form-label">MAK Anggaran<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                      <input type="text" class="form-control" placeholder="Pilih Nama " name="mak" id="mak" value="<?=$mak?>" required>
                    </div>
                  </div>
                </div>
                
                  <!-- nama pegawai -->
           <div class="form-group row">
                  <label for="noSuratTugas" class="col-sm-6 col-form-label">Kegiatan<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                      <input type="text" class="form-control" placeholder="Pilih Nama " name="kegiatan" id="kegiatan" value="<?=$kegiatan?>" required>
                    </div>
                  </div>
                </div>
                
                
                   

        

          <!-- nip -->
          

          <!-- pangkat -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Sumber Dana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="substansi" id="substansi" required>
                  <option value="<?= $substansi ?>"  selected><?= $substansi ?></option>
                  <option value="PNBP" >PNBP</option>
                  <option value="RM"  >RM</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Golongan -->
           <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Kode Anggaran<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Kode Anggaran" name="kode" id="kode" value="<?=$kode?>"  required>
              </div>
            </div>
          </div>
          
            <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Pagu<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Pagu" name="pagu" id="pagu" value="<?=$pagu?>"  required>
              </div>
            </div>
          </div>
          
          <!--ppk-->
          <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Nama PPK<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <!-- no surat -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                    <select class="form-control category" name="ppk" id="ppk" style="width: 100%;">
                        <?php foreach($ppk as $row){
                            if($row->idPegawai == $idPpk){
                                 ?>
                                 <option value='<?=$row->idPegawai ?>' selected ><?= $row->nama ?></option>
                                 
                                 <?php
                                 
                                 
                            }?>
                                 
                                  <option value='<?=$row->idPegawai ?>'  ><?= $row->nama ?></option>
                                 <?php
                            
                            
                        }?>
                       
                    
                    </select>
                  </div>
                </div>
              </div>

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
