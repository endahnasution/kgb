 <section class="content-header">
   <h1>
    Riwayat Capa
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Riwayat Capa</a></li>
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

          <h3 class="box-title"><i class="fa fa-file"></i> Form Tracking Capa
          </h3>

          <hr>

           <form action="<?php echo base_url('petugas/umpan_balik/tracking') ?>" method="post">
                
            <!-- nomor surat -->
           <div class="form-group">
              <label>Sarana</label>
              <select name="sarana" id="sarana" class="form-control category" data-live-search="true" title="Pilih Sarana">
                   <option value="">Pilih Sarana</option>
                   <?php
                      foreach ($sarana as $row) {
                        echo "<option value=".$row->idSarana.">".$row->namaSarana."</option>";
                      }
                    ?>
              </select> 
            </div>

            <!-- nomor surat -->
         <div class="form-group">
              <label>Surat Tugas</label><span class="wajib"> *</span></label>
              <select name="idSurat"  id="idSurat" class="form-control category" data-live-search="true" title="Select Category" required>

                <option value="">Pilih Surat Tugas</option>

               

              </select>
            </div>

          <button type="submit" value="submit" onclick="" class="btn btn-info"><i class="fa fa-search"></i> Search</button>
      </form>

        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
         <div class="row">
          

     
     </div>
   </div>
 </div>

 <script type="text/javascript">
  $(document).ready(function()
  {
    $('#sarana').change(function()
    {
      $('#idSurat').html('<option value="">Data Tidak Ada</option>');
      var idPer=$('#sarana').val();
      if(idPer!=''){
        $.ajax({
          url: "<?php echo base_url();?>petugas/umpan_balik/getSarana", 
          method: "POST",
          data: {idPer:idPer},
          success: function(data)
          {
            $('#idSurat').html(data);
          } 
        });
      }else{
        $('#idSurat').html('<option value="">Data Tidak Ada</option>');
      }


    });
  });
</script>

