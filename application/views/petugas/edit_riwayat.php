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
            <form role="form" action="<?php echo base_url('petugas/Monitoring/update_riwayat/') ?>" method="post">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pembuatan Data Monitoring</h3>
                        <p><span class="wajib">* wajib diisi</span></p>
                    </div>

                    <?php
                     foreach ($riwayatMonitoring as $row) {
                        $idMonitoring = $row->idMonitoring;
                        $statusMonitoring = $row->statusMonitoring;
                        $tanggalMonitoring = $row->tanggalMonitoring;
                        $kesesuaianMonitoring = $row->kesesuaianMonitoring;
                        $justifikasiMonitoring = $row->justifikasiMonitoring;
                        $idPeringatan = $row->idPeringatan;
                       
                      } 
                    ?>

                    <div class="col-md-12">
                        <hr>

                        <div class="form-group">
              <input type="hidden" class="form-control" name="idMonitoring" id="idMonitoring" value="<?= $idMonitoring ?>">
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" name="idPeringatan" id="idPeringatan" value="<?= $idPeringatan ?>">
            </div>

                        <!-- nama sarana -->
                        <div class="form-group row">
                  <label for="kendaraan" class="col-sm-4 col-form-label">Pilih Status Monitoring<span class="wajib"> *</span></label>
                  <div class="col-sm-12">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
                      <select name="status" id="status" class="form-control category" data-live-search="true" required>
                       
                      <option selected='selected' value="<?php echo $statusMonitoring?>" ><?php echo $statusMonitoring?></option>
                        <option value="Draft Tindak Lanjut">Draft Tindak Lanjut</option>
                        <option value="Draft TL telah dikoreksi / dikembalikan">Draft TL telah dikoreksi / dikembalikan </option>
                        <option value="TL Dicetak">TL Dicetak</option>
                        <option value="TL telah diparaf">TL telah diparaf</option>
                        <option value="TL ditandatangani">TL ditandatangani</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
              <label for="example-date-input" class="col-sm-4 col-form-label">Tanggal <span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <input class="form-control <?php echo form_error('tglLhk') ? 'is-invalid' : '' ?>" type="date" name="tanggal"  value="<?= $tanggalMonitoring ?>" id="tanggal">
              
              </div>
            </div>

            <div class="form-check"> 
                <?php if ($kesesuaianMonitoring  ==1){
                        echo '<input type="checkbox" class="form-check-input" id="sesuai" name="sesuai" checked>';
                } else{
                    echo '<input type="checkbox" class="form-check-input" id="sesuai" name="sesuai" >';
                }
                ?>
   
    <label class="form-check-label" for="exampleCheck1">Kesesuaian TL dengan pola TL</label>
  </div>

            <div class="form-group">
              <label>Justifikasi</label><span class="wajib"> *</span></label>
              <textarea class="form-control" id="justifikasi" name="justifikasi" rows="3"><?php echo $justifikasiMonitoring?></textarea>
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