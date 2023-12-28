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
            <form action="<?php echo site_url('admin/pengajuan/update_pengajuan') ?>" method="post" enctype="multipart/form-data" role="form">
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



                        <input type="hidden" class="form-control" name="idKgb" id="idKgb" value = "<?= $kgb->idKgb ?>">
                        
                        
                        <div class="col-md-6">
                           
                            <br>

                          
                            <!-- Nama Pegawai -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Nama Pegawai<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?=  $kgb->nama ?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Tanggal SK Lama<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="tgl_sk_lama" id="tgl_sk_lama" value="<?=  $kgb->tgl_sk_lama?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Gaji Pokok Lama<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="gapok_lama" id="gapok_lama" value="<?=  $kgb->gapok_lama?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Gaji Pokok Baru<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="gapok_baru" id="gapok_baru" value="<?=  $kgb->gapok_baru?>"  required>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Nomor SK Baru<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="sk_baru" id="sk_baru" value="<?=  $kgb->sk_baru ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Catatan<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="note_kgb" id="note_kgb" value="<?=  $kgb->note_kgb ?>" required>
                                    </div>
                                </div>
                            </div>

                            


                        </div>


                        <div class="col-md-6">
                            <br>

                            <!-- NIP -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">NIP<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="nip" id="nip" value="<?=  $kgb->nip ?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Nomor SK Lama<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="sk_lama" id="sk_lama" value="<?=  $kgb->sk_lama?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Pangkat<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="jabatan" id="jabatan" readonly required>
                  <option value="<?echo $kgb->jabatan ?>"  selected><?= $kgb->jabatan ?> </option>
                  <option>-</option>
                  <option>Kepala Balai POM di Batam</option>
                  <option>Kepala Sub Bagian Tata Usaha</option>
                  <option>Koordinator Substansi Infokom</option>
                  <option>Koordinator Substansi Penindakan</option>
                  <option>Koordinator Substansi Pemeriksaan</option>
                  <option>Koordinator Substansi Pengujian</option>
                  <option>PFM Ahli Madya</option>
                  <option>PFM Ahli Muda</option>
                  <option>PFM Ahli Pertama</option>
                  <option>PFM Keahlian</option>
                  <option>PFM Terampil</option>
                  <option>PFM Terampil Pelaksana</option>
                  <option>PFM Terampil Pelaksana Lanjutan</option>
                  <option>Perencana Ahli Pertama</option>
                  <option>Pranata Komputer Pelaksana</option>
                  <option>Analis Kepegawaian Pelaksana Lanjutan</option>
                  <option>Arsiparis Terampil</option>
                  <option>Analis Laporan Keuangan</option>
                  <option>Analis Pengadaan Barang dan Jasa</option>
                  <option>Bendahara</option>
                  <option>Pengadministrasi Umum</option>
                   <option>Tenaga Administrasi</option>
                </select>
              </div>
            </div>
          </div>

                         

                           
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Golongan<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="golongan" id="golongan" value="<?=  $kgb->golongan?>"  required>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal SK Baru<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="tgl_sk_baru" id="tgl_sk_baru" value="<?=  $kgb->tgl_sk_baru ?>"  required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Status<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="status" id="status" required>
                  <option value="<?= $kgb->status_kgb?>"  selected><?= $kgb->status_kgb?> </option>
                  <option value="Diterima">Diterima</option>
                  <option value="Ditolak">Ditolak</option>
                 
                </select>
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
