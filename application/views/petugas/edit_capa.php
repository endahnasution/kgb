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
    <form role="form" action="<?php echo base_url('petugas/monitoring/ubah_capa')?>" enctype="multipart/form-data" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Form Feedback Capa</h3>
        <p><span class="wajib">* wajib diisi</span></p>

        <div class="col-md-6">
            <hr>
            

        
            <!-- nomor Surat Peringatan -->
            <?php
                foreach($dataFeedback->result() as $row){
                    
            ?>

            <div class="form-group">
              <input type="hidden" class="form-control" name="idFeedback" id="idFeedback" value="<?=$row->idFeedback?>">
            </div>

           


            <div class="form-group row">
            <label for="anggaran" class="col-sm-4 col-form-label">Pilih Nama Sarana<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control category" name="idTl" id="idTl"  disabled >
                <option value="<?=$row->idTl?>" selected ><?php echo $row->namaSarana ?></option>
                    <?php
                    foreach ($sarana_tl as $sarana) {
                    echo "<option value=" . $sarana->idTl . ">" . $sarana->namaSarana . "</option>";
                    }
                    ?>
                  
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
                    <input type="text" name="noFeedback" id="noFeedback"  placeholder="Nomor Surat Feedback" value="<?=$row->noFeedback?>" class="form-control name_list" disabled />
                    </div>
                </div>
            </div>

            <!-- tanggal terima surat -->
            <div class="form-group row">
            <label for="example-date-input" class="col-sm-6 col-form-label">Tanggal Terima Surat Feedback<span class="wajib"> *</span></label>
            <div class="col-sm-12"> 
                <input class="form-control" type="date" name ="tglFeedback" id="tglFeedback"  value="<?=$row->tglFeedback?>" placeholder="Tanggal" disabled>
            </div>
            </div>

            <!-- tanggal created date -->
            
        

            <!-- Perihal Feedback CAPA -->
            <div class="form-group row">
                <label for="noSurat" class="col-sm-4 col-form-label">Perihal Surat Feedback<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                    <input type="text" name="isiFeedback" id="isiFeedback"  placeholder="Perihal Surat Feedback" value="<?=$row->isiFeedback?>" class="form-control name_list"  disabled/>
                    </div>
                </div>
            </div>

      
           
            
            
            <!-- Upload File -->
        <!--   <div class="form-group">
                <label for="uploadFile">Lampiran Feedback<span class="wajib"> *</span></label>
                    <input type="file" name="fileFeedback" id="fileFeedback">
            </div> -->

            <br>
          
            <?php }?>
                        
        </div>

        <div class="col-md-6">
            <hr>
            

        
            <!-- nomor Surat Peringatan -->
            <?php
                foreach($dataFeedback->result() as $row){
                    
            ?>

          
            <div class="form-group row">
                <label for="noSurat" class="col-sm-6 col-form-label">Status CAPA (sudah dibuat?)<span class="wajib"> *</span></label>
                <div class="col-sm-12">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control category" name="created" name="created" required>
            
                <?php if($row->createdFeedback == '1') {
                    ?>
                <option value="<?=$row->createdFeedback?>" selected>Yes</option> 
                <?php 
                }else{
                    ?>
                <option value="<?=$row->createdFeedback?>" selected>No</option>
                <?php 
                }
                    ?>
                <option value="1" >Yes</option>
                <option value="0" >No</option>
                  
                  
                </select>
                </div>
                </div>
            </div>

            <div class="form-group row">
            <label for="anggaran" class="col-sm-4 col-form-label">Penanggung Jawab CAPA<span class="wajib"> *</span></label>
            <div class="col-sm-12">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <select class="form-control category" name="idPetugas" id="idPetugas"   >
                <option value="<?=$row->petugasFeedback?>" selected ><?php echo $row->nama ?></option>
                    <?php
                    foreach ($petugas->result() as $tg) {
                    echo "<option value=" . $tg->idPegawai . ">" . $tg->nama . "</option>";
                    }
                    ?>
                  
                </select>
                </div>
            </div>
            </div>
           
            
            
            <!-- Upload File -->
        <!--   <div class="form-group">
                <label for="uploadFile">Lampiran Feedback<span class="wajib"> *</span></label>
                    <input type="file" name="fileFeedback" id="fileFeedback">
            </div> -->

            <br>
          
            <?php }?>
                        
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