<section class="content-header">
    <h1>
        Edit LHK Tata Usaha
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Petugas</a></li>
        <li><a href="#">Edit LHK</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo base_url('petugas/lhkTu/List_lhk_c/edit') ?>" method="post" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Surat LHK</h3>
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

                    <div class="col-md-6">

                        <?php
                        $sarana = array();
                        $idSarana = array();
                        // $statusBalai = array();
                        // $temuan = array();
                        // $deskripsiTemuan = array();
                        // $jenisTl = array();
                        foreach ($lhk as $row) {
                            $idLhk = $row->idLhk;
                            $noSuratTugas = $row->noSuratTugas;
                            $tglLhk = $row->tglLhk;
                            $pejabat = $row->pejabatDituju;
                            $pengesahSppd = $row->pengesahSppd;
                            $pengesahKwitansi = $row->pengesahKwitansi;
                            $pengesahForm = $row->pengesahForm;
                            $idSuratTugas = $row->idSurat;
                            $deskripsi = $row->deskripsi;
                            array_push($sarana, $row->namaSarana);
                            // array_push($statusBalai, $row->statusBalai);
                            // array_push($temuan, $row->temuan);
                            // array_push($deskripsiTemuan, $row->deskripsiTemuan);
                            // array_push($jenisTl, $row->jenisTl);
                            array_push($idSarana, $row->idSarana);
                        } ?>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="idSuratTugas" id="idSuratTugas" value="<?= $idSuratTugas ?>">
                        </div>

                        <br>
                        <!-- nomor surat -->
                        <div class="form-group">
                            <label>Surat Tugas</label><span class="wajib"> *</span></label>
                            <input type="text" class="form-control" placeholder="Nomor Surat Tugas" name="surattugas" id="surattugas" value="<?= $noSuratTugas ?>" readonly>
                        </div>

                        <!-- tanggal kegiatan -->
                        <div class="form-group row">
                            <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal LHK<span class="wajib"> *</span></label>
                            <div class="col-sm-12">
                                <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tglLhk" value="<?= $tglLhk ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo form_error('tglPemeriksaan') ?>
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
                                    <input type="text" class="form-control" name="sppd" id="sppd" value="<?= $pengesahSppd ?>" required>
                                </div>
                            </div>
                        </div>


                        <!-- kwitansi -->
                        <div class="form-group row">
                            <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :<span class="wajib"> *</span></label></label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                    <input type="text" class="form-control" name="kwitansi" id="kwitansi" value="<?= $pengesahKwitansi ?>" required>
                                </div>
                            </div>
                        </div>


                        <!-- form 8 jam  -->
                        <div class="form-group row">
                            <label for="noSurat" class="col-sm-6 col-form-label">Form 8 jam disahkan oleh :<span class="wajib"> *</span></label></label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                    <input type="text" class="form-control" name="form" id="form" value="<?= $pengesahForm ?>" required>
                                </div>
                            </div>
                        </div>


                   </div>
                        <!-- Keterangan -->
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">

                                    <h3 class="box-title">Hasil Pemeriksaan</h3>

                                    <div class="row">
                                        <div class="col-xs-12">

                                            <hr>

                                            <div class="items" data-group="programming_languages">
                                                <div class="item-content">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <table class="table table-bordered table-hover">
                                                                <tr>
                                                                    <td colspan="3"> <textarea class="textarea" placeholder="Keterangan." name="keterangan" id="keterangan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $deskripsi?></textarea></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
                        </div>
                        &nbsp;
                    </div>
                </form>
            </div>
        </div>
    </section>
