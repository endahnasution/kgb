<section class="content-header">
  <h1>
    Edit LHK Pemeriksaan
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
      <form action="<?php echo base_url('petugas/monitoring/ubah_monitoring/') ?>" method="post" role="form">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Surat LHK</h3>
            <p><span class="wajib">* wajib diisi</span></p>

            <?php
            $sarana = array();
            $idSarana = array();
          
            foreach ($monitoring as $row) {
              $idSarana = $row->idSarana;
              $namaSarana = $row->namaSarana;
              $nama = $row->nama;
              $tglPeriksa= $row->tglPeriksa;
              $idPegawai = $row->idPegawai;
              $idTl = $row->idTl;
              $idPeringatan = $row->idPeringatan;
             
            } ?>

            <div class="form-group">
              <input type="hidden" class="form-control" name="idPeringatan" id="idPeringatan" value="<?= $idPeringatan ?>">
            </div>

            <br>
            <!-- nomor surat -->
            <div class="form-group">
              <label>Nama Sarana</label><span class="wajib"> *</span></label>
              <input type="text" class="form-control" placeholder="Nomor Surat Tugas" name="namaSarana" id="namaSarana" value="<?= $namaSarana ?>" readonly>
            </div>

            <!-- tanggal kegiatan -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal Periksa<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tglPeriksa" value="<?= $tglPeriksa ?>" readonly>
              
              </div>
            </div>


            <div class="form-group row">
            <label for="kendaraan" class="col-sm-4 col-form-label">Nama Pembuat TL<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <!-- sarana -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control category" name="idPegawai" id="idPegawai" style="width: 100%;">
                      <?php
                      foreach ($petugas as $sr) {
                        if ($idPegawai == $sr->idPegawai) {

                          echo "<option selected='selected' value=" . $sr->idPegawai . ">" . $sr->nama. "</option>";
                        } else {

                          echo "<option value=" . $sr->idPegawai . ">" . $sr->nama. "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>


           
         

        </div>
        </div>



          

          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">

                <h3 class="box-title">Riwayat Monitoring</h3>

                <div class="row">
                  <div class="col-xs-12">
                    <hr>

                    <!-- sarana -->
                    <div class="col-md-12">

                      <div class="row">

                        <div class="col-xs-12">
                          <a href="<?= site_url('petugas/monitoring/tambah_riwayat/' . $row->idPeringatan) ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Tambah Hasil Pemeriksaan" id="hplhk"> <i class="fa fa-plus">Tambah Riwayat</i></a>
                          <p></p>

                          <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="tbl" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th class="dt-center">Status</th>
                                    <th class="dt-center">Tanggal</th>
                                    <th class="dt-center">Kesesuaian TL dengan Pola TL</th>
                                    <th class="dt-center">Justifikasi</th>

                                  </tr>
                                </thead>
                                <tbody>
                                  <?php





                                  if (isset($riwayatMonitoring)) {
                                    $id = 0;
                                    foreach ($riwayatMonitoring as $row) {

                                      echo "<tr>";
                                      echo "<td class='dt-center'>" . $row->statusMonitoring . "</td>";
                                      echo "<td class='dt-center'>" . $row->tanggalMonitoring . "</td>";
                                      if($row->kesesuaianMonitoring== "1"){
                                        $sesuai="ya";
                                      }else{
                                        $sesuai = "tidak";
                                      }
                                      echo "<td class='dt-center'>" . $sesuai . "</td>";
                                      echo "<td class='dt-center'>" . $row->justifikasiMonitoring . "</td>";

                                      echo "<td class='dt-center'>" ?>
                                      <a href="<?= site_url('petugas/monitoring/edit_riwayat/' . $row->idMonitoring."&".$row->idPeringatan) ?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj"> <i class="fa fa-edit"></i></a>

                                      <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusSar" data-id="<?= $row->idMonitoring ?>"  data-idPer="<?= $row->idPeringatan ?>" data-toggle="modal" data-target="#hapusMonitoring"><i class="fa fa-trash"></i></a>
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

<!-- Hapus Monitoring -->
<div id="hapusMonitoring" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
      </div>
      <div class="modal-body" id="hapusData">
        <form role="form" method="post" action="<?= base_url('petugas/monitoring/hapus_riwayat') ?>">
          <div class="box-body">
            <div class="form-group" style="text-align:center">Anda yakin akan menghapus hasil pemeriksaan sarana ini ?</label>
              <input type="hidden" id=id__ name="id__">
              <input type="hidden" class="form-control" name="idPeringatan" id="idPeringatan" value="<?= $idPeringatan ?>">

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

            var idMonitoring = $(this).data('id');
            var idPer= $(this).data('idPer');
            $("#hapusData #id__").val(idMonitoring);
            $("#hapusData #idPer").val(idPer);
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


