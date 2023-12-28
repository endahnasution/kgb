 <section class="content-header">
   <h1>
     Menu LHK
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

           <h3 class="box-title"><i class="fa fa-file"></i> Buat LHK
           </h3>

         </div>
         <!-- /.box-header -->
         <!-- form start -->

         <div class="box-body">
           <div class="row">
             <!-- obat -->
             <div class="col-lg-4 col-xs-5">
               <!-- small box -->
               <div class="small-box bg-aqua">
                 <div class="inner">
                   <h3>1</h3>

                   <h4><b>LHK Pemeriksaan</b></h4>
                 </div>
                 <div class="icon">
                   <i class="fa fa-plus-square"></i>
                 </div>
                 <a href="<?php echo base_url('petugas/lhk/lhk_pem_c') ?>" class="small-box-footer">
                   Buat LHK <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>

             <!-- pangan -->
             <div class="col-lg-4 col-xs-5">
               <!-- small box -->
               <div class="small-box bg-yellow">
                 <div class="inner">
                   <h3>2</h3>

                   <h4><b>LHK Sampling</b></h4>
                 </div>
                 <div class="icon">
                   <i class="fa fa-magic"></i>
                 </div>
                 <a href="<?php echo base_url('petugas/lhk/lhk_sampling_c') ?>" class="small-box-footer">
                   Buat LHK <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>

             <!-- kosmetik -->
             <div class="col-lg-4 col-xs-5">
               <!-- small box -->
               <div class="small-box bg-red">
                 <div class="inner">
                   <h3>3</h3>

                   <h4><b>LHK Iklan </b></h4>
                 </div>
                 <div class="icon">
                   <i class="fa fa-briefcase"></i>
                 </div>
                 <a href="<?php echo base_url('petugas/lhk/lhk_iklan_c') ?>" class="small-box-footer">
                   Buat LHK <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>
             <!-- ./col -->

             <!-- kemasan pangan -->
             <div class="col-lg-4 col-xs-5">
               <!-- small box -->
               <div class="small-box bg-purple">
                 <div class="inner">
                   <h3>4</h3>

                   <h4><b>LHK Sertifikasi</b></h4>
                 </div>
                 <div class="icon">
                   <i class="fa fa-building"></i>
                 </div>
                 <a href="<?php echo base_url('petugas/lhk/lhk_sertifikasi_c') ?>" class="small-box-footer">
                   Buat LHK <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>

             <!-- kemasan pangan -->
             <div class="col-lg-4 col-xs-5">
               <!-- small box -->
               <div class="small-box bg-maroon">
                 <div class="inner">
                   <h3>5</h3>

                   <h4><b>LHK Umum</b></h4>
                 </div>
                 <div class="icon">
                   <i class="fa fa-clone"></i>
                 </div>
                 <a href="<?php echo base_url('petugas/lhk/lhk_umum_c') ?>" class="small-box-footer">
                   Buat LHK <i class="fa fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div>
           </div>
         </div>
       </div>

       <div class="box box-primary">
         <div class="box-header with-border">

           <h3 class="box-title"><i class="fa fa-list"></i> Daftar LHK
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
                         <th class="dt-center">Nomor Surat Tugas</th>
                         <th class="dt-center">Tanggal LHK</th>
                         <th class="dt-center">Jenis LHK</th>
                         <th class="dt-center">Aksi</th>

                       </tr>
                     </thead>
                     <tbody>
                       <?php
                        if (isset($list_lhk)) {
                          foreach ($list_lhk->result() as $row) {

                            echo "<tr>";
                            echo "<td class='dt-center'>" . $row->noSuratTugas . "</td>";
                            echo "<td class='dt-center'>" . $row->tglLhk . "</td>";
                            echo "<td class='dt-center'>" . $row->jenisLhk . "</td>";
                            echo "<td class='dt-center'>" ?>

                           <!-- <a href="<?= site_url('petugas/lhk/list_lhk_c/hp_lhk/' . $row->idLhk) ?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Tambah Hasil Pemeriksaan" id="hplhk"> <i class="fa fa-plus"></i></a> -->

                           <a href="<?= site_url('petugas/lhk/list_lhk_c/edit_lhk/' . $row->idLhk) ?>" class="btn btn-primary btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj"> <i class="fa fa-edit"></i></a>

                           <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusPer" data-id="<?= $row->idLhk ?>" data-toggle="modal" data-target="#hapusLhk"><i class="fa fa-trash"></i></a>

                           <a href="#" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Print" id="printSur" data-toggle="modal" data-target="#printLhk" data-id="<?= $row->idSurat ?>">
                             <i class="fa fa-print"></i></a>



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

   <!-- Edit Peringatan -->
   <div id="editLhk" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Data LHK</h4>
         </div>
         <div class="modal-body" id=editData>
           <form action="<?= base_url('petugas/lhk/list_lhk_c/ubah_lhk') ?>" method="post" enctype="multipart/form-data">
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
           <form role="form" method="post" action="<?= base_url('petugas/lhk/list_lhk_c/hapus_lhk') ?>">
             <div class="box-body">
               <div class="form-group" style="text-align:center">Anda yakin akan menghapus LHK ini ?</label>
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
             $(document).on("click", "#hapusPer", function() {
               var id = $(this).data('id');
               $("#hapusData #id_").val(id);
             });
           </script>
         </div>

       </div>
     </div>
   </div>
   <!-- Hapus Peringatan -->


   <!-- Print Surat Tugas -->
   <div id="printLhk" class="modal fade" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
         </div>
         <div class="modal-body" id=panelSur>
           <form role="form" method="post" action="<?= base_url('petugas/lhk/list_lhk_c/print_lhk') ?>">
             <div class="box-body">
               <div class="form-group" style="text-align:center">Anda Akan Mencetak LHK</label>
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
 </section>