<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<section class="content-header">
  <h1>
    Feedback CAPA
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Admin</a></li>
    <li><a href="#">Feedback CAPA</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
   <div class="col-md-12">
     <form role="form" action="<?php echo base_url('admin/entry_capa_c/add_data')?>" enctype="multipart/form-data" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Feedback Capa</h3>
          <p><span class="wajib">* wajib diisi</span></p>

          <div class="col-md-6">
            <hr>

          
            <!-- nomor Surat Peringatan -->
            <div class="form-group row">
              <label for="anggaran" class="col-sm-4 col-form-label">Pilih Nama Sarana<span class="wajib"> *</span></label>
              <div class="col-sm-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                  <select class="form-control category" name="idTl" id="idTl" required>
                    <?php
                    foreach ($sarana_tl as $sarana) {
                      echo "<option value=" . $sarana->idTl . ">" . $sarana->namaSarana . "</option>";
                    }
                    ?>
                    <option value="" disabled selected>- Pilih Sarana -</option>
                  </select>
                </div>
              </div>
            </div>


            <!-- Nomor Surat Feedback CAPA -->
            <div class="form-group row">
                <label for="noSurat" class="col-sm-4 col-form-label">Nomor Surat Feedback<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-building"></i></span>
                     <input type="text" name="noFeedback" id="noFeedback"  placeholder="Nomor Surat Feedback" class="form-control name_list" />
                    </div>
                 </div>
            </div>

            <!-- tanggal terima surat -->
            <div class="form-group row">
              <label for="example-date-input" class="col-sm-6 col-form-label">Tanggal Terima Surat Feedback<span class="wajib"> *</span></label>
              <div class="col-sm-12"> 
                <input class="form-control" type="date" name ="tanggal" id="tanggal" placeholder="Tanggal" required>
              </div>
            </div>

            <!-- tanggal created date -->
            
           

            <!-- Perihal Feedback CAPA -->
            <div class="form-group row">
                <label for="noSurat" class="col-sm-4 col-form-label">Perihal Surat Feedback<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-building"></i></span>
                     <input type="text" name="perihalFeedback" id="perihalFeedback"  placeholder="Perihal Surat Feedback" class="form-control name_list" />
                    </div>
                 </div>
            </div>
            
            <!-- Upload File -->
          <!--   <div class="form-group">
                  <label for="uploadFile">Lampiran Feedback<span class="wajib"> *</span></label>
                  <input type="file" name="fileFeedback" id="fileFeedback">
            </div> -->

            <br>

                        
          </div>


          <div class="col-md-6">
            <br>
            <br>

           <!-- Sarana -->
          
            </div>
            </div>
            <div class="box-footer">
            <button type="submit" value="submit" class="btn btn-primary"><i class="fa fa-print"></i> Save Document</button>
            <button type="reset"  value ="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
            </div>
            </div>
            
          </div>
          <!-- /.box-body -->
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


<script type="text/javascript">
  $(document).ready(function()
  {
    $('#noSuratPeringatan').change(function()
    {
      var idPer=$('#noSuratPeringatan').val();
      if(idPer!=''){
        $.ajax({
          url: "<?php echo base_url();?>admin/Entry_capa_c/getSarana",    
          method: "POST",
          data: {idPer:idPer},
          success: function(data)
          {
            $('#sarana').html(data);
          } 
        });
      }else{
        $('#sarana').html('<option value="">Pilih Surat Peringatan Doloe</option>');
      }


    });
  });
</script>