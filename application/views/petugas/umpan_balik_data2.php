 <section>
 	<div class="box box-primary">
 		<div class="box-header with-border">

 			<h3 class="box-title">Riwayat Umpan Balik CAPA
 			</h3>

 			<section class="content">
 				<div class="row">
 					<div class="col-xs-12">
 						<div class="box">
 							<?php 
 							if(isset($tracking_result)){
 								$jumlah =0;
 								foreach ($tracking_result->result() as $row) {
 									print_r($tracking_result);
 								}
 							}
 							else{
 								echo "Data tidak ditemukan";
 							}

 							?>
 							<div class="box-body">
 								
 								<?php     
 								if(isset($tracking_result)){
 									foreach ($tracking_result->result() as $row) {

 										if($row->closed == 0) {
 											$status='<small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> No</small>';
 										}else if($row->closed == -1){
 											$status='<small class="label label-warning"><i class="  fa fa-question-circle"></i> VERIF</small>';
 										}
 										else {
 											$status='<small class="label label-success"><i class="fa fa-check-circle"></i>&nbsp    Yes</small>';
 										}


 										echo "<table class='table table-bordered'>";
 										echo "<thead>";
 										echo	"<tr>";
 										echo "<th >No.Surat TL</th>";
 										echo "<th >Tgl Surat TL </th>";
 										echo "<th >File Surat TL </th>";
 										echo "<th >No.Surat Feedback</th>";
 										echo "<th >Tgl Surat Feedback</th>";
 										echo "<th >File Surat Feedback</th>";
 										echo "<th >Status</th>";
 										echo "</tr>";
 										echo "</thead>";
 										echo "<tbody>";

 										echo "<tr>";
 										echo "<td >".$row ->noSuratPeringatan."</td>";
 										echo "<td >".$row->tglSuratPeringatan."</td>";
 										echo "<td >".$row->filePeringatan."</td>";
 										echo "<td >".$row->noSuratFeedback."</td>";
 										echo "<td>".$row->tglFeedback."</td>";
 										echo "<td>".$row->file_feedback."</td>";
 										echo "<td >".$status."</td>";
 										echo "</tbody>";
 										echo "</table>";

 									}
 								}else{
 									echo "<h4>no record found</h4>";
 								}
 								?>


 							</div>
 							<!-- /.box-body -->
 						</div>
 						<!-- /.box -->
 					</div>
 					<!-- /.col -->
 				</div>
 				<!-- /.row -->
 			</section>
 			<!-- /.content -->
 		</div>

 	</div>
 	<!-- /.box-header -->
 	<!-- form start -->



 </section>