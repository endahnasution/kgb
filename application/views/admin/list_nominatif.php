<section class="content-header">
  <h1>
    Surat Nominatif
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Surat Nominatif</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="box">


    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->

        <div class="box box-primary">
          <div class="box-header with-border">

            <h3 class="box-title">Daftar Surat Nominatif </h3>
            <div class="pull-right">

            </div>

            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="tbl" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="dt-center">No Surat Tugas</th>
                            <th class="dt-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($tugas)) {
                            foreach ($tugas->result() as $row) {

                              echo "<tr>";
                              echo "<td class='dt-center'>" . $row->noSuratTugas . "</td>";

                              echo "<td class='dt-center'>" ?>


                              <a href="" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Dakota" id="printDk" data-id="<?= $row->noSuratTugas ?>" data-toggle="modal" data-target="#printDakota"><i class="fa fa-print"></i></a>

                              <a href="" class="btn btn-warning btn-sm" data-tooltip="tooltip" title="Lukota UP" id="printLk" data-id="<?= $row->noSuratTugas ?>" data-toggle="modal" data-target="#printLukotaUp"><i class="fa fa-print"></i></a>

                              <a href="" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Lukota LS" id="printLkLS" data-id="<?= $row->noSuratTugas ?>" data-toggle="modal" data-target="#printLukotaLs"><i class="fa fa-print"></i></a>

                              </td>

                          <?php
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
              <!-- /.row -->
            </section>
            <!-- /.content -->
          </div>
          <style>
            th.dt-center,
            td.dt-center {
              text-align: center;
            }
          </style>

        </div>
        <!-- /.box-header -->
        <!-- form start -->


      </div>
    </div>

  </div>
  <!-- /.box -->
  </div>

  </div>
  <!-- /.row -->




  <!-- print Dk -->
  <div id="printDakota" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=panelDkt>
          <form role="form" method="post" action="<?= base_url('admin/surat_pj/nominatifDk') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda Akan Mencetak Nominatif Format Dalam Kota</label>
                <input type="hidden" id="idKw" name="idKw">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#printDk", function() {
              var id = $(this).data('id');
              $("#panelDkt #idKw").val(id);
            });
          </script>
        </div>

      </div>
    </div>
  </div>

  <!-- Print LK UP -->
  <div id="printLukotaUp" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=panelLkt>
          <form role="form" method="post" action="<?= base_url('admin/surat_pj/nominatifLk') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda Akan Mencetak Nominatif Format Luar Kota UP</label>
                <input type="hidden" id="idKw" name="idKw">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#printLk", function() {
              var id = $(this).data('id');
              $("#panelLkt #idKw").val(id);
            });
          </script>
        </div>

      </div>
    </div>
  </div>

  <!-- Print LK LS -->
  <div id="printLukotaLs" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=panelLkt>
          <form role="form" method="post" action="<?= base_url('admin/surat_pj/nominatifLkLS') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda Akan Mencetak Nominatif Format Luar Kota LS</label>
                <input type="hidden" id="idKw" name="idKw">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#printLkLS", function() {
              var id = $(this).data('id');
              $("#panelLkt #idKw").val(id);
            });
          </script>
        </div>

      </div>
    </div>
  </div>