<section class="content-header">
    <h1>
        Realisasi Anggaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Petugas</a></li>
        <li><a href="#">LHK</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="dt-center">MAK</th>
                  <th class="dt-center">Sumber Dana</th>
                  <th class="dt-center">Pagu</th>
                  <th class="dt-center">Biaya Riil</th> 
                  <th class="dt-center">Sisa Anggaran</th> 
                </tr>
                </thead>
                <tbody>
                <?php     
                 if(isset($anggaran)){
                  foreach ($anggaran->result() as $row){
                 
                   echo "<tr>";
                   echo "<td class='dt-center'>".$row->mak."</td>";      
                   echo "<td class='dt-center'>".$row->jenisSubstansi."</td>";
                   echo "<td class='dt-center'>Rp. ".$row->pagu."</td>";
                   echo "<td class='dt-center'>Rp. ".$row->biaya."</td>";
                   echo "<td class='dt-center'>Rp. ".($row->pagu-$row->biaya) ."</td>";
                  }
                  }else{
                   echo "no record found";
                  }
                ?>
                </tbody>
              </table>
              <form role="form" method="post" action="<?= base_url('admin/eksporDataAdmin/tarikAnggaran/'.$tahun) ?>">
                <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-print"></i> Cetak</button>
            </form>
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
  <style>
    th.dt-center, td.dt-center { text-align: center; }
  </style>