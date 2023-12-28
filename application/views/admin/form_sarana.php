<section class="content-header">
  <h1>
    Buat Data Sarana
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
     <form role="form" action="<?php echo base_url('admin/Master/simpan_sarana')?>" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pembuatan Data Sarana</h3>
          <p><span class="wajib">* wajib diisi</span></p>
        </div>

        <div class="col-md-12">
          <hr>
          
          <!-- nama sarana -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Nama Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Nama Sarana" name="namas" id="namas" required>
              </div>
            </div>
          </div>

         <!-- Alamat Sarana -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Alamat Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Alamat Sarana" name="alamats" id="alamats" required>
              </div>
            </div>
          </div>

          <!-- Jenis -->
          <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Jenis Sarana<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <!-- no surat -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                    <select class="form-control category" name="kategori" id="kategori" style="width: 100%;">
                    <option value="Apotek">Apotek</option>
                    <option value="Toko Obat">Toko Obat</option>
                    <option value="Rumah Sakit">Rumah Sakit</option>
                    <option value="Puskesmas">Puskesmas</option>
                    <option value="PBF">PBF</option>
                    <option value="Klinik">Klinik</option>
                    <option value="IFK">IFK</option>
                    <option value="Toko Kosmetik">Toko Kosmetik</option>
                    <option value="Pemilik Notifikasi">Pemilik Notifikasi</option>
                    <option value="Konter Kosmetik">Konter Kosmetik</option>
                    <option value="Klinik Kecantikan/Salon/Spa">Klinik Kecantikan/Salon/Spa</option>
                    <option value="Industri Kosmetik Golongan B">Industri Kosmetik Golongan B</option>
                    <option value="Industri Kosmetik Golongan A">Industri Kosmetik Golongan A</option>
                    <option value="Importir Kosmetik">Importir Kosmetik</option>
                    <option value="Distributor Kosmetik">Distributor Kosmetik</option>
                    <option value="Agen/Stokis MLM">Agen/Stokis MLM</option>
                    <option value="Retail Suplemen Kesehatan">Retail Suplemen Kesehatan</option>
                    <option value="Retail Obat Tradisional">Retail Obat Tradisional</option>
                    <option value="Importir Suplemen Kesehatan">Retail Obat Tradisional</option>
                    <option value="Pangan IRTP">Pangan IRTP</option>
                     <option value="Distribusi Pangan">Distribusi Pangan</option>
                      <option value="Produksi Pangan">Produksi Pangan</option>
                      <option value="Produksi Obat Tradisional">Produksi Obat Tradisional</option>
                      <option value="Produksi Kosmetika">Produksi Kosmetika</option>
                       <option value="Distributor Obat Tradisional">Distributor Obat Tradisional</option>
                       <option value="Distributor Suplemen Kesehatan">Distributor Suplemen Kesehatan</option>
                      <option selected="selected">- Pilih Jenis Sarana -</option>
                    </select>
                  </div>
                </div>
              </div>

              <!--Produk Sarana -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Produk Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Produk Sarana" name="produk" id="produk" required>
              </div>
            </div>
          </div>

             <!-- Kota -->
             <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Kota <span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <select class="form-control" name="kota" id="kota" required>
                  <option value="" disabled selected>- Pilih Kota -</option>
                  <option>Kota Batam</option>
                  <option>Kota Tanjung Pinang</option>
                  <option>Kabupaten Bintan</option>
                  <option>Kabupaten Karimun</option>
                  <option>Kabupaten Anambas</option>
                  <option>Kabupaten Lingga</option>
                  <option>Kabupaten Natuna</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Kecamatan Sarana -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Kecamatan Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Kecamatan Sarana" name="kecamatan" id="kecamatan" required>
              </div>
            </div>
          </div>

           <!-- Kelurahan Sarana -->
           <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Kelurahan Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="Kelurahan Sarana" name="kelurahan" id="kelurahan" required>
              </div>
            </div>
          </div>

          <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Jenis Komoditi<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                  <!-- no surat -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                    <select class="form-control category" name="komoditi" id="komoditi" style="width: 100%;">
                    <option value="Obat">Obat</option>
                    <option value="Kosmetik">Kosmetik</option>
                    <option value="Obat Tradisional">Obat Tradisional</option>
                    <option value="Suplemen Kesehatan">Suplemen Kesehatan</option>
                    <option value="Produksi Pangan">Produksi Pangan</option>
                    <option value="Pangan">Pangan</option>
                      <option selected="selected">- Pilih Jenis Komoditi -</option>
                    </select>
                  </div>
                </div>
              </div>

        
          
         

          </div>



        <div class="box-footer">
         <button type="submit" value="submit"  class="btn btn-info"><i class="fa fa-print"></i> Save Document</button>
         <button type="reset"  value ="reset" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Form</button>
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