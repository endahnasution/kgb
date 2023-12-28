<section class="content-header">
    <h1>
        Tambah Hasil Penindakan Sarana
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Petugas</a></li>
        <li><a href="#">Hasil Pemerikasaan LHK</a></li>
    </ol>
</section>



<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <form action="<?php echo base_url('petugas/lhkPenindakan/list_lhk_c/addhp') ?>" method="post" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Hasil Penindakan Sarana</h3>
                        <p><span class="wajib">* wajib diisi</span></p>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idLhk" id="idLhk" value="<?= $idLhk ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="idSurat" id="idSurat" value="<?= $idSurat ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- nomor surat -->
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <!-- sarana -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                                        <select class="form-control category" name="sarana" id="sarana" style="width: 100%;">
                                            <?php
                                            foreach ($data_sarana as $sr) {
                                                echo "<option value=" . $sr->idSarana . ">" . $sr->namaSarana . "</option>";
                                            }
                                            ?>
                                            <option selected="selected">- Pilih Sarana -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Temuan<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <select data-skip-name="true" name="temuan[]" id="temuan[]" class="category related-post form-control" multiple="multiple" data-placeholder="Temuan" style="width: 100%;">
                                        <option value="Perizinan">Perizinan</option>
                                        <option value="Pengadaan">Pengadaan</option>
                                        <option value="CDOB">CDOB</option>
                                        <option value="Produk TIE">Produk TIE</option>
                                        <option value="Mutu/Label">Mutu/Label</option>
                                        <option value="Produk Dilarang">Produk Dilarang</option>
                                        <option value="Administrasi">Administrasi</option>
                                        <option value="Hygiene/Sanitasi">Hygiene/Sanitasi</option>
                                        <option value="CPPB">CPPB</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                            </div>

                        </div>




                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Tindak Lanjut<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <select data-skip-name="true" name="tl" id="tl" class="form-control sm" title="Tindak lanjut">
                                        <option>Tindak Lanjut</option>
                                        <option value="-">-</option>
                                        <option value="Pembinaan">Pembinaan</option>
                                        <option value="Tindak Lanjut Hasil Pemeriksaan">Tindak Lanjut Hasil Pemeriksaan</option>
                                        <option value="Pembinaan Teknis">Pembinaan Teknis</option>
                                        <option value="Peringatan">Peringatan</option>
                                        <option value="Peringatan Keras">Peringatan Keras</option>
                                        <option value="Penghentian Sementara Kegiatan">PSK</option>
                                        <option value="Rekomendasi Pencabutan Izin">Rekomendasi Pencabutan Izin</option>
                                        <option value="TL ke Penyidikan">TL ke Penyidikan</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Kesimpulan<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <select data-skip-name="true" name="kesimpulan" id="kesimpulan" class="form-control sm" title="Kesimpulan">
                                        <option>Kesimpulan</option>
                                        <option value="1">MK</option>
                                        <option value="0">TMK</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="noSurat" class="col-sm-6 col-form-label">Keterangan<span class="wajib"> *</span></label>
                                <div class="col-sm-12">
                                    <textarea class="textarea" placeholder="Keterangan." name="keterangan" id="keterangan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>

                        </div>






                    </div>












                    <div class="box-header with-border">


                        <button type="submit" class="btn btn-success"><i class="fa fa-share"></i>&nbsp Save</button>
                    </div>
                    &nbsp;
                </div>
            </form>
        </div>
    </div>
</section>
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

<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> -->

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