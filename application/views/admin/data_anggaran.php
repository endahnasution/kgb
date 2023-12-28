<section class="content-header">
	<h1>
		Data Anggaran
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Data Anggaran</a></li>
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

					<h3 class="box-title">Data Anggaran </h3>
					<div class="pull-right">
						<ul>
							<a class="btn btn-primary" href="<?php echo base_url('admin/master/tambah_anggaran') ?>">
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
												    <!--<th class="dt-center">Nama Anggaran</th>-->
													<th class="dt-center">MAK</th>
														<th class="dt-center">Nama Anggaran</th>
													<th class="dt-center">Sumber Dana</th>
													<th class="dt-center">Pagu</th>
                                                    <th class="dt-center">PPK</th>
													<th class="dt-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (isset($anggaran)) {
													foreach ($anggaran as $row) {

														echo "<tr>";
													
														echo "<td class='dt-left'>" . $row->mak . "</td>";
															echo "<td class='dt-left'>" . $row->namaAnggaran . "</td>";
														echo "<td class='dt-left'>" . $row->jenisSubstansi . "</td>";
														echo "<td class='dt-left'>" . $row->pagu . "</td>";
														echo "<td class='dt-left'>" . $row->nama . "</td>";
														echo "<td class='dt-left'>" ?>

														<a href="<?=site_url('admin/master/editAnggaran/'. $row->idAnggaran)?>" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="editA" data-idag="<?= $row->idAnggaran ?>" data-makag="<?= $row->mak ?>" data-diviag="<?= $row->jenisSubstansi ?>" data-paguag="<?= $row->pagu ?>" data-ppkag="<?= $row->idPegawai ?>" data-toggle="modal" data-target=""><i class="fa fa-edit"></i></a>


														<a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusAn" data-id="<?= $row->idAnggaran ?>" data-toggle="modal" data-target="#hapusAnggaran"><i class="fa fa-trash"></i></a>

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

	<!-- Edit Anggaran -->
	<div id="editAnggaran" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Data Anggaran</h4>
				</div>
				<div class="modal-body" id=editData>
					<form action="<?= base_url('admin/Master/ubahAnggaran') ?>" method="post">
						<div class="box box-success">
							<div class="box-body">

								<div class="form-group">
									<input type="hidden" class="form-control" name="idag" id="idagEdit">
								</div>

								<div class="form-group">
									<label for="noEdit">MAK</label> <small class="text-danger">*</small>
									<input type="text" class="form-control" name="makag" id="makagEdit" required>
								</div>
								<div class="form-group">
									<label for="noEdit">Sumber Dana</label> <small class="text-danger">*</small>
									<input type="text" class="form-control" name="diviag" id="diviagEdit" required>
								</div>
								<div class="form-group">
									<label for="noEdit">Pagu</label> <small class="text-danger">*</small>
									<input type="text" class="form-control" name="paguag" id="paguagEdit" required>
								</div>

								<!-- <div class="form-group">
									<label for="noEdit">Realisasi</label> <small class="text-danger">*</small>
									<input type="text" class="form-control" name="realisasiag" id="realisasiagEdit" required>
								</div> -->
	<div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">PPK<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="ppkag" id="ppkagEdit" required>
                   <option value="" disabled selected>- Pilih PPK -</option>
                  <?php
                  foreach ($ppk as $row) {
                  echo "<option value=" . $row->idPegawai . ">" . $row->nama . "</option>";
                }

                ?>?>
                </select>
              </div>
            </div>
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
		$(document).on("click", "#editA", function() {
			var idAn = $(this).data('idag');
			var makAn = $(this).data('makag');
			var diviAn = $(this).data('diviag');
			var paguAn = $(this).data('paguag');
			var ppkAn = $(this).data('ppkag');
			// var realisasiAn = $(this).data('realisasiag');

			$("#editData #idagEdit").val(idAn);
			$("#editData #makagEdit").val(makAn);
			$("#editData #diviagEdit").val(diviAn);
			$("#editData #paguagEdit").val(paguAn);
			$("#editData #pppkagEdit").val(ppkAn);
			// $("#editData #realisasiagEdit").val(realisasiAn);
		});
	</script>

	<!-- Hapus Anggaran -->
	<div id="hapusAnggaran" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
				</div>
				<div class="modal-body" id="hapusData">
					<form role="form" method="post" action="<?= base_url('admin/Master/hapus_dataAnggaran') ?>">
						<div class="box-body">
							<div class="form-group" style="text-align:center">Anda yakin akan menghapus Data Anggaran ini ?</label>
								<input type="hidden" id="idHapus" name="idHapus">

							</div>
						</div><!-- /.box-body -->
						<div class="modal-footer">
							<button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
							<button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
						</div>
					</form>
					<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).on("click", "#hapusAn", function() {
							var id = $(this).data('id');
							$("#hapusData #idHapus").val(id);
						});
					</script>
				</div>

			</div>
		</div>
	</div>