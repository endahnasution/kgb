<section class="content-header">
    <h1>
        LHK Penindakan
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
            <form action="<?php echo base_url('petugas/lhkPenindakan/list_lhk_c/addLhk') ?>" method="post" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pembuatan Surat LHK</h3>
                        <p><span class="wajib">* wajib diisi</span></p>

                        <div class="col-md-6">

                            <br>
                            <!-- nomor surat -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <!-- no surat -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                                        <select class="form-control category" name="suratTugas" id="suratTugas" style="width: 100%;">
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


                            <!-- tanggal kegiatan -->
                            <div class="form-group row">
                                <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal LHK<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tglLhk" required>
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
                                        <input type="text" class="form-control" name="sppd" id="sppd" placeholder="Pengesah SPPD" required>
                                    </div>
                                </div>
                            </div>


                            <!-- kwitansi -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Kwitansi disahkan oleh :<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="kwitansi" id="kwitansi" placeholder="Pengesah Kwitansi" required>
                                    </div>
                                </div>
                            </div>


                            <!-- form 8 jam  -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Form 8 jam disahkan oleh :<span class="wajib"> *</span></label></label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                                        <input type="text" class="form-control" name="form" id="form" placeholder="Pengesah Form 8 Jam" required>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
                        </div>


                    </div>




                </div>

        </div>
        </form>
    </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#repeater').createRepeater();

    });
</script>
<script>
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>

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