<section class="content-header">
  <h1>
    Feedback CAPA
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Feedback CAPA</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->

      <div class="box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title">List Feedback CAPA</h3>
          

          <!-- /.box-header -->
          <!-- form start -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">

                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="tbl" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th class="dt-center">Nama Sarana</th>
                          <th class="dt-center">Nomor Surat Feedback</th>
                          <th class="dt-center">Tanggal Feedback</th>
                          <th class="dt-center">Sudah dibuat?</th>
                          <th class="dt-center">Isi Feedback</th>
                          <th class="dt-center">Pembuat CAPA</th>
                          <!-- <th class="dt-center">Substansi</th>
 -->                          <th class="dt-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($list_feedback)) {
                          foreach ($list_feedback->result() as $row) {

                            echo "<tr>";
                            echo "<td class='dt-center'>" . $row->namaSarana . "</td>";
                            echo "<td class='dt-center'>" . $row->noFeedback . "</td>";
                            echo "<td class='dt-center'>" . $row->tglFeedback . "</td>";
                            if($row->createdFeedback==1){
                             ?>
                            <td class='dt-center'><a href="#" data-tooltip="tooltip" title="Ok" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a></td>
                            <?php 
                            }elseif($row->createdFeedback==0){
                              ?>
<td class='dt-center'><a href="#" data-tooltip="tooltip" title="No" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
                              <?php
                            }else{
                              
                              ?>
                              <td class='dt-center'><a href="#" data-tooltip="tooltip" title="No" class="btn btn-danger btn-sm"><i class="fa fa-question  "></i></a></td>
                              <?php 
                            }
                            echo "<td class='dt-center'>" . $row->isiFeedback . "</td>";
                            echo "<td class='dt-center'>" . $row->nama . "</td>";
                            // echo "<td class='dt-center'>" . $row->jenisSurat . "</td>";
                            echo "<td class='dt-center'>" ?>
                            <a href="<?=site_url('petugas/monitoring/edit_capa/'. $row->idFeedback)?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="editSur" ><i class="fa fa-edit"></i></a>

                            <!-- <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapus" data-id="<?= $row->idFeedback ?>"  data-idTl="<?= $row->idTl ?>"data-toggle="modal" data-target="#hapusFeedback">
                              <i class="fa fa-trash"></i></a>  -->

                         

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

  
  <!-- Hapus Surat -->
  <div id="hapusFeedback" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=hapusData>
          <form role="form" method="post" action="<?= base_url('petugas/monitoring/hapus_capa') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda yakin akan menghapus Data Feedbcak ini ?</label>
                <input type="hidden" id="idFeedback" name="idFeedback">
                <input type="hidden" id="idTl" name="idTl">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#hapus", function() {
              var id = $(this).data('id');
              var idTl = $(this).data('idTl');
              $("#hapusData #idFeedback").val(id);
              $("#hapusData #idTl").val(idTl);
            });
          </script>
        </div>

      </div>
    </div>
  </div>
  </div>

  <!-- Print Surat Tugas -->
  <div id="printSurat" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=panelSur>
          <form role="form" method="post" action="<?= base_url('admin/surat_tugas/surat_tugas/print') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda Akan Mencetak Surat Tugas</label>
                <input type="hidden" id="idSurat" name="idSurat">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#printSur", function() {
              var id = $(this).data('id');

              $("#panelSur #idSurat").val(id);
            });
          </script>
        </div>

      </div>
    </div>
  </div>