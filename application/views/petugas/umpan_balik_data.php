        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Timeline
            <small>example</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">UI</a></li>
            <li class="active">Timeline</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->


              <div class="box">
               <div class="box-header with-border">

                 <h4>Hai <b>Petugas!!</b> </h4>
                 <?php 
                 if(isset($tracking_result)){
                  $jumlah =0;
                  foreach ($tracking_result->result() as $row) {
                    ?>
                    <h5>Berikut hasil riwayat feedback CAPA dengan Nomor Surat Tugas <b> <?php echo  $row ->noSuratTugas ?> </b> </h5>

                    <?php 

                    $jumlah+=1;
                    if($jumlah==1) break;
                  }

                  ?>

                  <div class="box-body">
                    <ul class="timeline">

                      <?php     
                      if(isset($tracking_result)){
                        foreach ($tracking_result->result() as $row) {

                          if($row->closed == 0) {
                            $status='<span class="bg-yellow"><i class="fa fa-exclamation-triangle"></i> CAPA masih dalam proses </span>';
                          }else if($row->closed == -1){
                            $status='<span class="bg-grey"><i class="  fa fa-question-circle"></i> Menunggu verifikasi</span> ';
                          }
                          else {
                            $status='<span class="bg-green"><i class="fa fa-check-circle"></i> CAPA selesai</span>';
                          }

                          $attr = array(
                            'target'=>'_blank',
                          );



                          ?>

                          <!-- timeline item -->
                          <li>
                            <?php if($row->jenisPeringatan == "eval"){
                              $stat  = "Evaluasi CAPA";
                              $temuan = $row->isiCapa;
                            } else if($row->jenisPeringatan == "closed"){
                              $stat  = "Closed CAPA";
                              $temuan = $row->isiCapa;
                            } else{
                              $stat  = $row->jenisTl;
                              $temuan = $row->deskripsiTemuan;
                            }?>
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->tglSuratPeringatan ?></span>
                              <h3 class="timeline-header"><a href="#">Anda</a> mengirim <b>Surat <?php echo $stat ?></b> dengan nomor <?php echo $row ->noSuratPeringatan ?></h3>
                              <div class="timeline-body">
                                <p><b>Temuan : </b></p>
                                <?php echo $temuan ?> 
                              </div>
                            
                            </div>
                          </li>

                          <?php

                          if(isset($row->tglFeedback)){
                            ?>
                            <li>
                              <i class="fa fa-comments bg-yellow"></i>
                              <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->tglFeedback ?></span>
                                <h3 class="timeline-header "><a href="#"><?php echo $row->namaSarana  ?></a> memberi feedback</h3>
                                <div class="timeline-body">
                                  <?php echo $row->isiFeedback?>
                                </div>
                                <div class="timeline-footer">
                                  <a class="btn btn-primary btn-xs" href="../../assets/uploads/files/feedback/feedback-<?php echo $row ->noSuratFeedback?>.pdf " target="_blank" >Lihat File</a>
                                </div>
                              </div>
                            </li>

                            <li class="time-label">
                             <?php echo $status ?>
                           </li>

                           <?php 
                         }

                         ?>



                       <?php }
                     }?>
                     <!-- END timeline item -->




                   </ul>

                 </div>
                 <?php
               }
               else{
                echo "Data tidak ditemukan";
              }

              ?>

              

            </div>


          </div>


        </div><!-- /.col -->
      </div><!-- /.row -->


        </section><!-- /.content -->