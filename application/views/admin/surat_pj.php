<section class="content-header">
 <h1>
   Surat Pertanggung Jawaban 
 </h1>
 <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Surat Pertanggung Jawaban</a></li>
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

          <h3 class="box-title">Daftar Surat Pertanggung Jawaban </h3>
          <div class="pull-right">
            <ul>
              <a class= "btn btn-primary" href="<?php echo base_url('admin/form_pj')?>">
                <i class="fa fa-plus"></i>&nbsp; Tambah Data 
              </a> </span>
            </ul>
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
                          <th class="dt-center">Petugas</th>
                          <th class="dt-center">Tgl Kwitansi</th>
                          <th class="dt-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php     
                        if(isset($kwitansi)){
                         foreach ($kwitansi->result() as $row){

                          echo "<tr>";
                          echo "<td class='dt-center'>".$row->noSuratTugas."</td>";      
                          echo "<td class='dt-center'>".$row->nama."</td>";
                          echo "<td class='dt-center'>".$row->tglKwitansi."</td>";
                          echo "<td class='dt-center'>"?>
                          <a href="<?=site_url('admin/surat_pj/edit_pj/'. $row->idKwitansi)?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="ubahPj">
                          <i class="fa fa-edit"></i></a>

                         
                        

                            <a href="" class="btn btn-info btn-sm" data-tooltip="tooltip" title="Dakota" id="printDk" data-id = "<?=$row->idKwitansi ?>" data-toggle="modal" data-target="#printDakota"><i class="fa fa-print"></i></a>

                            <a href="" class="btn btn-warning btn-sm" data-tooltip="tooltip" title="Lukota" id="printLk" data-id = "<?=$row->idKwitansi ?>" data-toggle="modal" data-target="#printLukota"><i class="fa fa-print"></i></a>
                            
                             <a href="" class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Lukota" id="hapusKw" data-id = "<?=$row->idKwitansi ?>" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></a>

                          

                          </td>

                          <?php 
                        }
                      }else{
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
        th.dt-center, td.dt-center { text-align: center; }
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


<!-- Edit Surat Tugas -->
<div id= "editPJ" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><i class="icon fa fa-edit"></i>  Edit Surat Pertanggung Jawaban</h4>
			</div>
			<div class="modal-body" id=editData >
				<form action="<?= base_url('admin/surat_pj/ubahPj')?>" method="post">
					<div class="box box-success">
						<div class="box-body">

							<div class="form-group">
								<input type="hidden" class="form-control" name="idKwitansi" id="idKwitansi" >
							</div>

              <div class="form-group">
								<label for="noEdit">No. Surat Tugas </label> <small class="text-danger">*</small>
								<input type="text" class="form-control" name="noSurat" id="noSurat" >
							</div>

							<div class="form-group">
								<label for="noEdit">Tanggal Surat </label> <small class="text-danger">*</small>
								<input class="form-control" type="date" name ="tglKwitansi" id="tglKwitansi" onclick="return chk_date()" >
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
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery-1.10.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).on("click","#ubahPj",function(){
		var idS = $(this).data('id');
    var noSur = $(this).data('nosur');
		var tgl = $(this).data('tglkw');


		$("#editData #idKwitansi").val(idS);
    $("#editData #noSurat").val(noSur);
    $("#editData #tglKwitansi").val(tgl);

	});
  </script>

<!-- print Dk -->
<div id= "printDakota" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
      </div>
      <div class="modal-body" id=panelDkt>
        <form role="form" method="post" action="<?= base_url('admin/surat_pj/printDk')?>">
          <div class="box-body">
            <div class="form-group" style="text-align:center">Anda Akan Mencetak Kwitansi Format Dalam Kota</label>
              <input type="hidden" id="idKw" name="idKw">

            </div>                        
          </div><!-- /.box-body -->
          <div class="modal-footer">
            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
          </div>
        </form>             
        <script src="<?php echo base_url();?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" >
          $(document).on("click","#printDk",function(){
            var id = $(this).data('id');
            $("#panelDkt #idKw").val(id);
          });
        </script>
      </div>

    </div>
  </div>
</div>

<!-- Print LK -->
<div id= "printLukota" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
      </div>
      <div class="modal-body" id=panelLkt>
        <form role="form" method="post" action="<?= base_url('admin/surat_pj/printLk')?>">
          <div class="box-body">
            <div class="form-group" style="text-align:center">Anda Akan Mencetak Kwitansi Format Luar Kota</label>
              <input type="hidden" id="idKw" name="idKw">

            </div>                        
          </div><!-- /.box-body -->
          <div class="modal-footer">
            <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
          </div>
        </form>             
        <script src="<?php echo base_url();?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" >
          $(document).on("click","#printLk",function(){
            var id = $(this).data('id');
            $("#panelLkt #idKw").val(id);
          });
        </script>
      </div>

    </div>
  </div>
</div>
<!-- Print Lk -->


  <!-- Hapus PJ -->
  <div id="hapus" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
        </div>
        <div class="modal-body" id=hapusData>
          <form role="form" method="post" action="<?= base_url('admin/surat_pj/hapuspj') ?>">
            <div class="box-body">
              <div class="form-group" style="text-align:center">Anda yakin akan menghapus Surat Pertanggung Jawaban ini ?</label>
                <input type="hidden" id="idKwitansi" name="idKwitansi">

              </div>
            </div><!-- /.box-body -->
            <div class="modal-footer">
              <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
            </div>
          </form>
          <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
          <script type="text/javascript">
            $(document).on("click", "#hapusKw", function() {
              var id = $(this).data('id');

              $("#hapusData #idKwitansi").val(id);
            });
          </script>
        </div>

      </div>
    </div>
  </div>
  </div>


