<section class="content-header">
    <h1>
        Buat Data monitoring
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Data Sarana</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="<?php echo base_url('petugas/Monitoring/simpan_monitoring') ?>" method="post">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pembuatan Data Monitoring</h3>
                        <p><span class="wajib">* wajib diisi</span></p>
                    </div>

                    <div class="col-md-12">
                        <hr>

                        <!-- nama sarana -->
                        <div class="form-group row">
                  <label for="kendaraan" class="col-sm-4 col-form-label">Pilih Nama Sarana<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                      <select name="idTl" id="idTl" class="form-control category" data-live-search="true" required>
                        <?php
                        foreach ($sarana as $data) {
                          echo "<option value=" . $data->idTl . ">" . $data->namaSarana . "</option>";
                        }
                        ?>
                        <option selected="selected">- Pilih Nama Sarana -</option>
                      </select>
                    </div>
                  </div>
                </div>

               


                        <!-- Alamat Sarana -->
                        <div class="form-group row">
                  <label for="kendaraan" class="col-sm-4 col-form-label">Nama Pembuat TL<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                      <select name="idPegawai" id="idPegawai" class="form-control category" data-live-search="true" required>
                        <?php
                        foreach ($petugas as $data) {
                          echo "<option value=" . $data->idPegawai . ">" . $data->nama . "</option>";
                        }
                        ?>
                        <option selected="selected">- Nama Pembuat Tindak Lanjut -</option>
                      </select>
                    </div>
                  </div>
                </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" value="submit" class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
                        <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
                    </div>
            </form>

        </div>


    </div>
    </div>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #ca2e2e;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
            display: inline-block;
            margin-left: 5px;
            margin-top: 5px;
            padding: 0;
            padding-left: 20px;
            position: relative;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: bottom;
            white-space: nowrap;
            font-size: 15px;
        }
    </style>

    <!-- /.row -->
</section>
<!-- /.content -->