<section class="content-header">
  <h1>
   Edit LHK Iklan
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
      <form action="<?php echo site_url('petugas/lhk/lhk_iklan_c/edit') ?>" method="post"  role="form">
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

             <?php

 foreach($lhk as $row){
  $noSuratTugas = $row->noSuratTugas;
  $tglLhk = $row->tglLhk;
  $pejabat = $row->pejabatDituju;
  $pengesahSppd = $row->pengesahSppd;
  $pengesahKwitansi = $row->pengesahKwitansi;
  $pengesahForm = $row->pengesahForm;
  $idSuratTugas = $row->idSurat;
  $rincianSampling = $row->rincianSampling;
  $idKetua= $row->idPegawai;
  $deskripsi = $row->deskripsi;

 }?>

            <div class="col-md-6">

              <br>
              <div class="form-group">
                  <input type="hidden" class="form-control" name="idSuratTugas" id="idSuratTugas" value="<?=$idSuratTugas?>">
                </div>

              <!-- nomor surat -->
             <div class="form-group">
                <label>Surat Tugas</label><span class="wajib"> *</span></label>
                <input type="text" class="form-control" placeholder="Nomor Surat Tugas" name="surattugas" id="surattugas" value="<?=$noSuratTugas?>" readonly>
              </div>


              <!-- tanggal kegiatan -->
              <div class="form-group row">
                <label for="example-date-input" class="col-sm-6 col-form-label">Tanggal Pembuatan LHK<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tglLhk" id="tglLhk" value="<?=$tglLhk?>"  required>
                  <div class="invalid-feedback">
                    <?php echo form_error('tglPemeriksaan') ?>
                  </div>
                </div>
              </div>


              <!--ketua tim-->
            
             <div class="form-group row">
              <label for="noSurat" class="col-sm-6 col-form-label">Ketua Tim<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <!-- no surat -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                                        <select class="form-control category" name="ketuaTim" id="ketuaTim" style="width: 100%;">
                                            <?php
                                            foreach ($ketuaTims as $ketuaTim) {
                                                if($ketuaTim->idPegawai == $idKetua){
                                                    echo "<option selected='selected' value=" . $ketuaTim->idPegawai . ">" . $ketuaTim->nama . "</option>";
                                                }
                                                echo "<option value=" . $ketuaTim->idPegawai . ">" . $ketuaTim->nama . "</option>";
                                            }
                                            ?>
                                            
                                        </select>
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
                    <input type="text" class="form-control" name="sppd" id="sppd" value="<?=$pengesahSppd?>" >
                  </div>
                </div>
              </div>


              <!-- kwitansi -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :<span class="wajib"> *</span></label></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" value="<?=$pengesahKwitansi?>">
                  </div>
                </div>
              </div>


              <!-- form 8 jam  -->
              <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Form 8 jam disahkan oleh :<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                    <input type="text" class="form-control" name="form" id="form" value="<?=$pengesahForm?>" required>
                  </div>
                </div>
              </div>


            </div>

            

            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">

                  <h3 class="box-title">Pointer Hasil Kegiatan</h3>

                  <div class="row">
                    <div class="col-xs-12">

                     <hr>

                      <div class="form-group row">
             <label for="detailTemuan" class="col-sm-3 col-form-label">Rincian Sampling</label>
             <div class="col-md-12">
              <!-- /.card-header -->
              <div class="box-body pad">
                <div class="">
                  <textarea id="editor1" name="detSampling" id= "detSampling" placeholder="noIzin" 
                  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  ><?php echo $rincianSampling ?></textarea>
                </div>
              </div>
            </div>
          </div>

           <div class="form-group row">
             <label for="" class="col-sm-3 col-form-label">Rincian Kegiatan<span class="wajib"> *</span></label>
             <div class="col-md-12">
              <!-- /.card-header -->
              <div class="box-body pad">
                <div class="">
                  <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="detKegiatan"id = "detKegiatan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $deskripsi ?></textarea></td>

                </div>
              </div>
            </div>
          </div>

                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>

                <div class="box-body pad">

                </div>
              </div>
            </div>
          </div>

            <div class="box-footer">
             <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>&nbsp Save</button>
           </div>
         
        </div>
        </form>
      </div>

 

    </div>


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


