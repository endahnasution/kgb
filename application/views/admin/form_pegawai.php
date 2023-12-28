<section class="content-header">
  <h1>
    Buat Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Data Pegawai</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
   <div class="col-md-12">
     <form role="form" action="<?php echo base_url('admin/Master/simpan_pegawai')?>" method="post">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pembuatan Data Pegawai</h3>
          <p><span class="wajib">* wajib diisi</span></p>
        </div>

        <div class="col-md-12">
          <hr>
          
          <!-- nama pegawai -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Nama Pegawai<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Nama Pegawai" name="nama" id="nama" required>
              </div>
            </div>
          </div>

         <!-- jabatan pegawai -->
            <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Jabatan<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="jabatan" id="jabatan" required>
                  <option value="" disabled selected>- Pilih Jabatan -</option>
                  <option>Kepala Balai POM di Batam</option>
                  <option>Kepala Sub Bagian Tata Usaha</option>
                  <option>Koordinator Substansi Infokom</option>
                  <option>Koordinator Substansi Penindakan</option>
                  <option>Koordinator Substansi Pemeriksaan</option>
                  <option>Koordinator Substansi Pengujian</option>
                  <option>PFM Ahli Madya</option>
                  <option>PFM Ahli Muda</option>
                  <option>PFM Ahli Pertama</option>
                  <option>PFM Keahlian</option>
                  <option>PFM Terampil</option>
                  <option>PFM Terampil Pelaksana</option>
                  <option>PFM Terampil Pelaksana Lanjutan</option>
                  <option>Perencana Ahli Pertama</option>
                  <option>Pranata Komputer Pelaksana</option>
                  <option>Analis Kepegawaian Pelaksana Lanjutan</option>
                  <option>Arsiparis Terampil</option>
                  <option>Analis Laporan Keuangan</option>
                  <option>Analis Pengadaan Barang dan Jasa</option>
                  <option>Bendahara</option>
                  <option>Pengadministrasi Umum</option>
                   <option>Tenaga Administrasi</option>
                </select>
              </div>
            </div>
          </div>


          <!-- nip -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">NIP<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" class="form-control" placeholder="NIP" name="nip" id="nip" required>
              </div>
            </div>
          </div>

          <!-- pangkat -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Pangkat<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="pangkat" id="pangkat" required>
                  <option value="" disabled selected>- Pilih Pangkat -</option>
                  <option>-</option>
                  <option>Pengatur</option>
                  <option>Pengatur Tk.I</option>
                  <option>Penata Muda</option>
                  <option>Penata Muda Tk.I</option>
                  <option>Penata</option>
                  <option>Penata Tk.I</option>
                  <option>Pembina</option>
                  <option>Pembina Tk.I</option>
                  <option>Pembina Utama Muda</option>
                  <option>Pembina Utama Madya</option>
                  <option>Pembina Utama</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Golongan -->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">Golongan<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="golongan" id="golongan" required>
                  <option value="" disabled selected>- Pilih Golongan -</option>
                  <option>-</option>
                  <option>II c</option>
                  <option>II d</option>
                  <option>III a</option>
                  <option>III b</option>
                  <option>III c</option>
                  <option>III d</option>
                  <option>IV a</option>
                  <option>IV b</option>
                  <option>IV c</option>
                  <option>IV d</option>
                  <option>IV e</option>
                </select>
              </div>
            </div>
          </div>
          
          <!--ppk-->
          <div class="form-group row">
            <label for="noSurat" class="col-sm-4 col-form-label">PPK<span class="wajib"> *</span></label>
            <div class="col-sm-12">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control" name="ppk" id="ppk" required>
                  <option value="" disabled selected>- PPK -</option>
                  <option>-</option>
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>
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
