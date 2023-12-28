<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="content-header">
  <h1>
    Buat Kwitansi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Daftar Kwitansi</a></li>
    <li><a href="#">Kwitansi</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <form role="form" action="<?php echo base_url('admin/form_pj/simpanKwitansi') ?>" method="post" id="myform" onkeyup="calculate()">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Kwitansi</h3>
            <p><span class="wajib">* wajib diisi</span></p>

            <div class="col-md-6">
              <hr>


              <div class="form-group">
                <label>Surat Tugas</label><span class="wajib"> *</span></label>
                <select name="surattugas" id="surattugas" class="form-control category" data-live-search="true" title="Select Category" required>

                  <option value="">Pilih Surat Tugas</option>

                  <?php
                  foreach ($tugas as $tg) {
                    echo "<option value=" . $tg->noSuratTugas . ">" . $tg->noSuratTugas . "</option>";
                  }
                  ?>

                </select>
              </div>

              <div class="form-group">
                <label>Nama Petugas</label><span class="wajib"> *</span></label>
                <select name="petugas" id="petugas" class="form-control input-sm" data-live-search="true" title="Pilih Petugas">

                  <option value="">Pilih Petugas</option>
                </select>
              </div>

            </div>
            <div class="col-md-6">
              <hr>

              <!-- Tanggal Kwitansi -->
              <div class="form-group row">
                <label for="example-date-input" class="col-sm-5 col-form-label">Tanggal Kwitansi<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <input class="form-control" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" required>
                </div>
              </div>
              
              


            </div>


            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">

                  <h3 class="box-title">Rincian Biaya</h3>

                  <div class="row">
                    <div class="col-xs-12">

                      <hr>
                      <table class="table table-bordered table-hover" id="dynamic_field" name="myform">
                      <tr>
                          <td><button type="button" name="row-add" id="row-add" class="row-add"><i class="fa fa-plus"> </button></td>
                        </tr>
                        <tr class="line_items">
                          <td><input type="text" name="uraian[]" id="uraian[]" placeholder="Uraian Biaya" class="form-control name_list" /></td>
                          <td><select name="kategori[]" id="kategori[]" class="form-control input-sm" data-live-search="true" title="Kategori">
                              <option>Kategori</option>
                              <option value="uh">Uang Harian</option>
                              <option value="rl">Riil</option>
                              <option value="rep">Representasi</option>
                              <option value="tr">Transport</option>
                              <option value="trans">Transportasi Lokal</option>
                              <option value="ht">Hotel</option>

                            </select></td>
                          <td span="1" style="width: 10%;"><input type="text" name="qty" id="qty" placeholder="QTY" class="form-control" /></td>
                          <td><input type="text" name="harga" id="harga" placeholder="Harga" class="form-control" /></td>
                          <td span="1" style="width: 15%;"><input type="text" name="biaya[]" id="biaya[]" value="" class="form-control" jAutoCalc="{qty} * {harga}" readonly  /></td>
                          <td><button class="row-remove"><i class="fa fa-close"></button></td>
                        </tr>
                        


                      </table>

                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.box-header -->

                <div class="box-footer">
                  <button type="submit" value="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                  <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
                </div>

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

<!-- dynamic form -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#surattugas').change(function() {
      var noSuratTugas = $('#surattugas').val();
      if (noSuratTugas != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/form_pj/getPetugas",
          method: "POST",
          data: {
            noSuratTugas: noSuratTugas
          },
          success: function(data) {
            $('#petugas').html(data);
          }
        });
      } else {
        $('#petugas').html('<option value="">Pilih Petugas</option>');
      }


    });
  });
</script>
<script type="text/javascript">
  $(function() {

    function autoCalcSetup() {
      $('form#myform').jAutoCalc('destroy');
      $('form#myform tr.line_items').jAutoCalc({
        keyEventsFire: true,
        emptyAsZero: true
      });
      $('form#myform').jAutoCalc({});
    }
    autoCalcSetup();


    $('button.row-remove').on("click", function(e) {
      e.preventDefault();

      var form = $(this).parents('form')
      $(this).parents('tr').remove();
      autoCalcSetup();

    });

    $('button.row-add').on("click", function(e) {
      e.preventDefault();

      var $table = $(this).parents('table');
      var $top = $table.find('tr.line_items').first();
      var $new = $top.clone(true);

      $new.jAutoCalc('destroy');
      $new.insertBefore($top);
      $new.find('input[type=text]').val('');
      autoCalcSetup();

    });

  });
</script>