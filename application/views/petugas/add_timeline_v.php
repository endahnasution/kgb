<section class="content-header">
  <h1>
    Buat Surat Sarana
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Petugas</a></li>
    <li><a href="#">Sarana</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo site_url('petugas/add_timeline_c/add') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pembuatan Surat Sarana</h3>
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

            <br>
            <!-- nomor surat -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nomor Surat Tugas<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                  <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" required>
                  <div class="invalid-feedback">

                  </div>
                </div>
              </div>
            </div>

            <!-- nama sarana -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="text" class="form-control" name="sarana" placeholder="Sarana">
                  <div class="invalid-feedback">

                  </div>
                </div>
              </div>
            </div>

            <!-- tanggal kegiatan -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Tanggal Surat<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control" type="date" name="tgl_surat">
                <div class="invalid-feedback">

                </div>
              </div>
            </div>

            <!-- tanggal kegiatan -->
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Tanggal Timeline<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control <?php echo form_error('tanggal_timeline') ? 'is-invalid' : '' ?>" type="date" name="tanggal_timeline" required>
                <div class="invalid-feedback">
                  <?php echo form_error('tanggal_timeline') ?>
                </div>
              </div>
            </div>
               
            <div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

          <div class="box-footer">

          </div>
      </form>
    </div>
  </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<style>
  .wajib {
    color: red;
  }

  .kotak {
    border: 1px groove #ffffffba !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;
  }

  legend.scheduler-border {
    width: inherit;
    /* Or auto */
    padding: 0 10px;
    /* To give a bit of padding on the left and right */
    border-bottom: none;
    font-size: 16px;
  }
</style>