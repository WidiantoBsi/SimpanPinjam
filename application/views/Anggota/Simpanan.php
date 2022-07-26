<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Simpanan</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Simpanan</li>
      </ol>

      <div class="card mb-4">
           <div class="card-body">
            <div class="d-flex justify-content-between">
              <h2>Total Simpanan Rp.<?php echo number_format($SubTotal) ;?></h2>
              <div class="small"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_Tarik">Tarik Saldo</a></div>
            </div>
          </div>
    </div>

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <label>DataTable Simpanan</label>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="dataTable">
            <thead>
              <tr>
               <!-- <th>Photo</th> -->
               <th>Id Transaksi</th>
               <th>Nama Anggota</th>
               <th>Jumlah Penarikan</th>
               <th>Total Simpanan</th>
               <th>Tanggal</th>
             </tr>
           </thead>
           <tfoot>
            <tr>
              <!-- <th>Photo</th> -->
              <th>Id Transaksi</th>
              <th>Nama Anggota</th>
              <th>Jumlah Penarikan</th>
              <th>Total Simpanan</th>
              <th>Tanggal</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $No ='1';
            foreach($Tabungan as $b){
              $Id = $b->Id_Pengguna;
              $where = array('Id_Anggota' => $Id);
              $DB = $this->M_DBWD->edit_data($where,'anggota')->result();
              foreach($DB as $row){
                $Nama = $row->NamaAnggota;
              }
              ?>
              <tr>
                <td><?php echo $b->Id_Laporan; ?></td>
                <td><?php echo $Nama; ?></td>
                <td><?php echo number_format($b->Jumlah); ?></td>
                <td><?php echo number_format($b->Total); ?></td>
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

<!-- ------------------ Modal Tarik Simpanan -------------------- -->
<?php 
foreach($TtlTabungan as $i){
  $Id = $i->Id_Anggota;
  $where = array('Id_Anggota' => $Id);
  $DB = $this->M_DBWD->edit_data($where,'anggota')->result();
  foreach($DB as $w){
    $Nama = $w->NamaAnggota;
    $NoHp = $w->NoHp;
  }
  ?>
  <div class="modal fade" id="modal_Tarik" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form action="<?php echo base_url('Member/').'EditSimpanan'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Tarik Saldo</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Anggota</label>
            <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">No Hp</label>
            <input type="text" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" readonly/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" name="Jumlah" min="0" max="<?php echo $SubTotal ?>" placeholder="<?php echo $SubTotal ?>" required/>
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