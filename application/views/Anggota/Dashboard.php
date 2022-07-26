<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Dashboard</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>

      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Pinjaman</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link">Rp.<?php echo number_format($SubTotal)?></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">Total Simpanan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link">Rp.<?php echo number_format($TotalSimpan)?></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Pinjaman</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link"><?php echo number_format($Ttlpinjam)?> Pinjaman</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">Jumlah Penarikan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link">Rp.<?php echo number_format($TtlSimpan)?></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-4">
       <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Total Pinjaman Rp.<?php echo number_format($SubTotal);?></h2>
          <?php if ($SubTotal > 0) { ?>
            <div class="small"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_TupUp">Top Up</a></div>
          <?php } ?> 
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <label>DataTable Angsuran Pinjaman</label>
        <!-- <div><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_Add"><i class="fas fa-plus"></i> Add</a></div> -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="dataTable">
            <thead>
              <tr>
               <!--  <th>No</th> -->
               <th>Id Transaksi</th>
               <th>Nama Anggota</th>
               <th>No Hp</th>
               <th>Angsuran</th>
               <th>Tanggal</th>
             </tr>
           </thead>
           <tfoot>
            <tr>
              <!-- <th>No</th> -->
              <th>Id Angsuran</th>
              <th>Nama Anggota</th>
              <th>No Hp</th>
              <th>Angsuran</th>
              <th>Tanggal</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $No ='1';
            foreach($angsuran as $b){
              $Id = $b->Id_Anggota;
              $where = array('Id_Anggota' => $Id);
              $DB = $this->M_DBWD->edit_data($where,'anggota')->result();
              foreach($DB as $row){
                $Nama = $row->NamaAnggota;
                $NoHp = $row->NoHp;
              }
              ?>
              <tr>
                <td><?php echo $b->Id_Angsuran; ?></td>
                <td><?php echo $Nama; ?></td>
                <td><?php echo $NoHp; ?></td>
                <td><?php echo number_format($b->Jumlah); ?></td>
                <td><?php echo $b->Tanggal; ?></td> 
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('alert');?>" ></div>
</main>

<!-- ------------------ Modal TopUp Pinjaman -------------------- -->
<?php 
foreach($Ttlangsuran as $i){
  $Id = $i->Id_Anggota;
  $where = array('Id_Anggota' => $Id);
  $DB = $this->M_DBWD->edit_data($where,'anggota')->result();
  foreach($DB as $w){
    $Nama = $w->NamaAnggota;
    $NoHp = $w->NoHp;
  }
  ?>
  <div class="modal fade" id="modal_TupUp" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form action="<?php echo base_url('Member/').'AddPinjaman'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">TopUp Saldo</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Anggota</label>
            <input type="hidden" name="ID" value="<?php echo $Id?>">
            <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">No Hp</label>
            <input type="text" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Pinjaman</label>
            <input type="number" class="form-control" name="Pinjaman" min="0" value="<?php echo $i->Jumlah ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" name="Jumlah" min="0" placeholder="0" required/>
          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" value="Konfirmasi"  class="btn btn-sm btn-primary"/>
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php } ?>