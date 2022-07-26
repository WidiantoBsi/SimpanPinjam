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
                    <div class="card-body">Jumlah Anggota</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link"><?php echo $this->M_DBWD->get_data('anggota')->num_rows(); ?> Anggota</a>
                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Admin</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link"><?php echo $this->M_DBWD->get_data('db_admin')->num_rows(); ?> Admin</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Angsuran</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link">Rp.<?php echo number_format($Total)?></a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="card bg-danger text-white mb-4">
        <div class="card-body">Jumlah Pengajuan</div>
        <div class="card-footer d-flex align-items-center justify-content-between">
          <a class="small text-white stretched-link"><?php echo $this->M_DBWD->get_data('db_pengajuan')->num_rows(); ?> Anggota</a>
          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
  </div>
</div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
      <label>DataTable Angsuran</label>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID/NoHp</th>
          <th>Nama Anggota</th>
          <th>Jumlah</th>
          <th>Tanggal</th>
      </tr>
  </thead>
  <tfoot>
    <tr>
      <th>ID/NoHp</th>
      <th>Nama Anggota</th>
      <th>Jumlah</th>
      <th>Tanggal</th>
  </tr>
</tfoot>
<tbody>
    <?php
    foreach($Dbsimpan as $b){ 
      $Id = $b->Id_Anggota;
      $where = array('Id_Anggota' => $Id);
      $data = $this->M_DBWD->edit_data($where,'anggota')->result();
      foreach ($data as $a) {
        $Nama = $a->NamaAnggota;
        $NoHp = $a->NoHp;
    }
    ?>
    <tr>
        <td><?php echo $NoHp ?></td>
        <td><?php echo $Nama ?></td>
        <td><?php echo $b->Jumlah ?></td>
        <td><?php echo $b->Tanggal ?></td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</main>