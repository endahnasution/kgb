<section class="content-header">
    <h1>
        Daftar Pengajuan KGB
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Lhk</a></li>
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
                    <div class="pull-right">
                        <ul>
                            <a class="btn btn-primary" href="<?php echo base_url('petugas/kgb/tambah_kgb/'.$idPegawai) ?>">
                                <i class="fa fa-plus"></i>&nbsp; Ajukan KGB
                            </a> </span>
                        </ul>
                    </div>
                    <h3 class="box-title"><i class="fa fa-list"></i> Daftar Pengajuan KGB Anda
                    </h3>

                    <br>
                    <!-- 
           <?php if ($upload_file > 0) {
            ?>
             <div class="alert alert-danger alert-dismissable" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4><i class="icon fa fa-exclamation"></i> Alert!</h4>
               Hallo Petugas ! Terdapat <strong><?php echo $upload_file ?></strong> LHK <?= $this->session->flashdata('flash_error'); ?> yang butuh upload soft file. Silahkan cek pada tabel!

             <?php  }; ?> -->
                    <!-- </div> -->

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
                                                <th class="dt-center">Nomor Surat Pengajuan </th>
                                                <th class="dt-center">Tanggal Pengajuan</th>
                                                <th class="dt-center">Status</th>
                                                <th class="dt-center">Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($list_kgb)) {
                                                foreach ($list_kgb as $row) {

                                                    echo "<tr>";
                                                    echo "<td class='dt-center'>" . $row->sk_baru . "</td>";
                                                    echo "<td class='dt-center'>" . $row->tgl_sk_baru . "</td>";
                                                    if($row->status_kgb == "Pengajuan"){
                                                        echo "<td class='dt-center'><span class='label label-primary'>" . $row->status_kgb . "</span></td>";
                                                    }elseif($row->status_kgb == "Ditolak"){
                                                        echo "<td class='dt-center'><span class='label label-danger'>" . $row->status_kgb . "</span></td>";
                                                    }else{
                                                        echo "<td class='dt-center'><span class='label label-warning'>" . $row->status_kgb . "</span></td>";
                                                    }
                                                   
                                                    
                                                    echo "<td class='dt-center'>" ;

                                                    if($row->status_kgb == "Diterima"){

                                                        ?>

                                                    <a href="<?= site_url('petugas/kgb/edit_file_kgb/' . $row->idKgb) ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj"> <i class="fa fa-edit"></i></a>

                                                 
                                                    <a href="#" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Print" id="printSur" data-toggle="modal" data-target="#printSurat" data-id="<?= $row->idKgb ?>">
                                                    <i class="fa fa-print"></i></a>

                                                    <a href="../../../assets/uploads/files/kgb/<?=$row->file_kgb?>" target="_blank" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Print" id="printSur" data-toggle="modal" data-target="#" data-id="<?= $row->idKgb ?>">
                                                    <i class="fa fa-eye"></i></a>

                                                        <?php

                                                    }else {
                                                    
                                                    ?>

                                                    

                                            
                                                 <a href="<?= site_url('petugas/kgb/edit_kgb/' . $row->idKgb) ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj"> <i class="fa fa-edit"></i></a>

                                                    <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusPer" data-id="<?= $row->idKgb ?>" data-idpeg="<?= $idPegawai ?>" data-toggle="modal" data-target="#hapusLhk"><i class="fa fa-trash"></i></a>

                                                        


                                                    </td>

                                            <?php
                                                     } }
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

    <!-- Edit Peringatan -->
    <div id="editLhk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Data LHK</h4>
                </div>
                <div class="modal-body" id=editData>
                    <form action="<?= base_url('petugas/lhkTu/list_lhk_c/ubah_lhk') ?>" method="post" enctype="multipart/form-data">
                        <div class="box box-success">
                            <div class="box-body">

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_" id="id_">
                                </div>

                                <!-- tanggal surat -->
                                <div class="form-group ">
                                    <label for="tglEdit"><i class="fa fa-calendar"></i> Tanggal LHK</label> <small class="text-danger">*</small>
                                    <input class="form-control" type="date" name="tglEdit" id="tglEdit" required>

                                </div>


                                <div class="mb-3">
                                    <label for="fileEdit">Soft File LHK</label> <small class="text-danger">*</small>
                                    <input class="form-control" type="file" id="formFile" name="fileEdit" id="fileEdit" required>
                                </div>

                            </div><!-- /.box-body -->
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                                <button type="submit" name="update" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.10.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).on("click", "#editPer", function() {
            var idPer = $(this).data('id');
            var tglPer = $(this).data('tgl');

            $("#editData #id_").val(idPer);
            $("#editData #tglEdit").val(tglPer);


        });
    </script>
    <!-- /. Edit Peringatan -->

    <!-- Hapus Peringatan -->
    <div id="hapusLhk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id="hapusData">
                    <form role="form" method="post" action="<?= base_url('petugas/kgb/hapus_kgb') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda yakin akan menghapus LHK ini ?</label>
                                <input type="hidden" id=id_ name="id_">
                                <input type="hidden" id=idPegawai name="idPegawai">

                            </div>
                        </div><!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                            <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
                        </div>
                    </form>
                    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).on("click", "#hapusPer", function() {
                            var id = $(this).data('id');
                            var idpeg= $(this).data('idpeg');
                            $("#hapusData #id_").val(id);
                            $("#hapusData #idPegawai").val(idpeg);
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
    <!-- Hapus Peringatan -->


    <!-- Print Surat Tugas -->
    <div id="printSurat" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
                </div>
                <div class="modal-body" id=panelSur>
                    <form role="form" method="post" action="<?= base_url('petugas/kgb/print_kgb') ?>">
                        <div class="box-body">
                            <div class="form-group" style="text-align:center">Anda Akan Mencetak File KGB</label>
                                <input type="hidden" id="idKgb" name="idKgb">

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

                            $("#panelSur #idKgb").val(id);
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
</section>