<section class="content-header">
    <h1>
        Data KGB Awal 
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
            <form action="<?php echo site_url('petugas/kgb/simpan_kgb_awal') ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Data KGB Awal (Masukkan Sesuai Data KGB Terakhir Anda) </h3>
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
            <label for="noSurat" class="col-sm-4 col-form-label">Pangkat<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="pangkat" id="pangkat"  required>
                <option>Pilih Pangkat</option>
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
                 <option>-</option>
                </select>
              </div>
            </div>
          </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Gaji Pokok Lama <span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="gapok_lama" id="gapok_lama" placeholder="Gaji Pokok Lama " required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Nomor SK Lama<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="sk_lama" id="sk_lama" placeholder="Nomor SK" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Nomor SK Baru<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="sk_baru" id="sk_baru" placeholder="Nomor SK" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Masa Kerja SK Lama (Tahun) <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="number" name="tahun_lama" id="tahun_lama" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Gaji Pokok SK Baru <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="number" name="gapok_baru" id="gapok_baru" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Masa Kerja SK Baru (Tahun) <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="number" name="tahun_baru" id="tahun_baru" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-6">
                            <br>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Golongan Lama<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="golongan_lama" id="golongan_lama"   required>
                                    </div>
                                </div>
                            </div>


                            <!-- sppd -->
                              <!-- tanggal kegiatan -->
                              <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Tanggal SK Lama <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="tgl_sk_lama" id="tgl_sk_lama" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Tanggal SPMK Lama <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="spmk_lama" id="spmk_lama" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Tanggal SK Baru <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="tgl_sk_baru" id="tgl_sk_baru" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            


                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Masa Kerja SK Lama (Bulan) <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="number" name="bulan_lama" id="bulan_lama" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Tanggal SPMK Baru <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="date" name="spmk_baru" id="spmk_baru" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-8 col-form-label">Masa Kerja SK Baru (Bulan) <span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglSurat') ? 'is-invalid' : '' ?>" type="number" name="bulan_baru" id="bulan_baru" required>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tglPemeriksaan') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-8 col-form-label">Golongan Baru<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="golongan_baru" id="golongan_baru"   required>
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
