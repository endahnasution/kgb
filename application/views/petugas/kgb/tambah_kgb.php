<section class="content-header">
    <h1>
        Pengajuan KGB
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
            <form action="<?php echo site_url('petugas/kgb/simpan_kgb') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pengajuan KGB</h3>
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

                        <input type="hidden" class="form-control" name="idPegawai" id="idPegawai" value = "<?php echo $idPegawai;?>">
                        <div class="col-md-6">
                           
                            <br>
                            <!-- nomor surat -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Masukkan nomor terakhir surat<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Nomor terakhir surat" required>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6">
                            <br>

                            <!-- sppd -->
                              <!-- tanggal kegiatan -->
                              <div class="form-group row">
                                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="tgl_surat" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <!-- kwitansi -->
                      


                        </div>

                        <div class="col-md-12">
                            <div class="box box-primary">
                               
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
                        </div>
                        &nbsp;
                    </div>
                </form>
            </div>
        </div>
    </section>
