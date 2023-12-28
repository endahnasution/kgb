<section class="content-header">
    <h1>
        Edit LHK Penindakan
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
            <form action="<?php echo base_url('petugas/lhkPenindakan/list_lhk_c/edit') ?>" method="post" role="form">
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

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">

                                <h3 class="box-title">Hasil Pemeriksaan</h3>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr>

                                        <!-- sarana -->
                                        <div class="col-md-12">

                                            <div class="row">

                                                <div class="col-xs-12">
                                                    <a href="<?= site_url('petugas/lhkPenindakan/list_lhk_c/hp_lhk/' . $row->idLhk) ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Tambah Hasil Pemeriksaan" id="hplhk"> <i class="fa fa-plus">Tambah Hasil Pemeriksaan Sarana</i></a>
                                                    <p></p>

                                                    <div class="box">
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <table id="tbl" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="dt-center">Nama Sarana</th>
                                                                        <th class="dt-center">Aksi</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php





                                                                    if ($sarana[0] != null) {
                                                                        $id = 0;
                                                                        foreach ($sarana as $row) {

                                                                            echo "<tr>";
                                                                            echo "<td class='dt-center'>" . $row . "</td>";

                                                                            echo "<td class='dt-center'>" ?>
                                                                            <a href="<?= site_url('petugas/lhkPenindakan/list_lhk_c/editt_hp_lhk/' . $lhk[0]->idLhk . " " . $idSarana[$id]) ?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj"> <i class="fa fa-edit"></i></a>

                                                                            <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusSar" data-id="<?= $idLhk, "+", $idSarana[$id] ?>" data-toggle="modal" data-target="#hapusSarana"><i class="fa fa-trash"></i></a>
                                                                    <?php
                                                                            $id++;
                                                                        }
                                                                    } else {
                                                                        echo "no record found";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <!-- /.col -->
                                            </div>




                                            <div>
                                                <!--  <button type="button" class="btn btn-success repeater-add-btn"><i class="fa fa-plus"></i>&nbsp Tambah Rincian LHK</button>
                <div class="items" data-group="programming_languages"> -->

                                            </div>
                                        </div>

                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
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

<!-- Hapus Sarana -->
<div id="hapusSarana" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
            </div>
            <div class="modal-body" id="hapusData">
                <form role="form" method="post" action="<?= base_url('petugas/lhkPenindakan/list_lhk_c/hapusHasilPemeriksaan') ?>">
                    <div class="box-body">
                        <div class="form-group" style="text-align:center">Anda yakin akan menghapus hasil pemeriksaan sarana ini ?</label>
                            <input type="hidden" id=id__ name="id__">

                            <input type="hidden" id=id_ name="id_">

                        </div>
                    </div><!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                        <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
                    </div>
                </form>
                <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    $(document).on("click", "#hapusSar", function() {

                        var idSarana = $(this).data('id');
                        $("#hapusData #id_").val(idSarana);
                    });
                </script>
            </div>

        </div>
    </div>
</div>
<!-- Hapus Peringatan -->
<!-- <script>
      $(document).ready(function() {
          $('#repeater').createRepeater();

    });
</script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- <script>
      $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
});
</script> -->

<script type="text/javascript">
    $(function() {



        $('button.row-remove').on("click", function(e) {
            e.preventDefault();

            var form = $(this).parents('form')
            $(this).parents('tr').remove();


        });

        $('button.row-add').on("click", function(e) {
            e.preventDefault();

            var $table = $(this).parents('table');
            var $top = $table.find('tr.line_items').last();
            var $new = $top.clone(true);

            $new.insertAfter($top);
            $new.find('input[type=text]').val('');
        });

    });
</script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>

<script>
    $("select").select2();

    $("select").on("select2:select", function(evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
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