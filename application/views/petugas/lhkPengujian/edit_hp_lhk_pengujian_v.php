<section class="content-header">
    <h1>
        Edit Hasil Pemeriksaan LHK
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Petugas</a></li>
        <li><a href="#">Hasil Pemerikasaan LHK</a></li>
    </ol>
</section>

<?php

foreach ($detail_sarana as $row) {
    $idTl = $row->idTl;
    $sarana = $row->namaSarana;
    $idSarana = $row->idSarana;
    $tl = $row->jenisTl;
    $temuan = $row->temuan;
    $kesimpulan = $row->isMk;
    $keterangan = $row->deskripsiTemuan;
}

$temuan_array = explode(",", $temuan);

?>




<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <form action="<?php echo base_url('petugas/lhkPengujain/list_lhk_c/edit_hasil') ?>" method="post" role="form">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Hasil Pemeriksaan LHK</h3>
                        <p><span class="wajib">* wajib diisi</span></p>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id="id" value="<?= $idLhk . " " . $idTl  ?>">
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
                                                if ($idSarana == $sr->idSarana) {

                                                    echo "<option selected='selected' value=" . $sr->idSarana . ">" . $sr->namaSarana . "</option>";
                                                } else {

                                                    echo "<option value=" . $sr->idSarana . ">" . $sr->namaSarana . "</option>";
                                                }
                                            }
                                            ?>
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

                                        <?php

                                        foreach ($temuan_array as $tm) {

                                            echo "<option selected='selected' value=" . $tm . ">" . $tm . "</option>";
                                        }


                                        ?>


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

                                        <?php

                                        // foreach($temuan as $tm){
                                        //   if($tm == $lhk->temuan){
                                        echo "<option selected='selected' value=" . $tl . ">" . $tl . "</option>";
                                        //   }else{
                                        //     echo "<option value=" . $tm . ">" . $tm . "</option>";
                                        //   }
                                        // }

                                        ?>
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

                                        <?php
                                        if ($kesimpulan == "0") {
                                            $kesimpulan_cet = "TMK";
                                        } else {
                                            $kesimpulan_cet = "MK";
                                        }

                                        echo "<option selected='selected' value=" . $kesimpulan . ">" . $kesimpulan_cet . "</option>"; ?>
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
                                    <textarea class="textarea" value="<?= $keterangan; ?>" placeholder="Keterangan." name="keterangan" id="keterangan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $keterangan ?></textarea></td></textarea>
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