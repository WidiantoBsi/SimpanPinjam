<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Simpanan</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Simpanan</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Anggota</label>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Photo</th>
                  <th>No Hp</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Simpanan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>No Hp</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Simpanan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach($anggota as $b){
                  $Id = $b->Id_Anggota;
                  $where = $where = array('Id_Anggota' => $Id);
                  $tbngan = $this->M_DBWD->edit_data($where,'db_tabungan')->num_rows();
                  if ($tbngan>0) {
                    $db = $this->M_DBWD->edit_data($where,'db_tabungan')->result();
                    foreach ($db as $key) {
                      $Jml = $key->Jumlah;
                    }
                  }else{
                    $Jml = '0';
                  }
                  ?>
                  <tr>
                    <td align="center"><img src="<?php echo base_url().'/assets/upload/'.$b->Photo; ?>" style="max-width:100%; max-height: 100%; height: 100px; width: 70px"></td>
                    <td><?php echo $b->NoHp ?></td>
                    <td><?php echo $b->NamaAnggota ?></td>
                    <td><?php echo $b->Email ?></td>
                    <td><?php echo number_format($Jml) ?></td>
                    <td><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#AddTabungan<?php echo $Id ?>"><i class="fas fa-plus"></i> TopUp</a></td>
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

  <!-- ------------------ Modal Add Tabungan -------------------- -->
  <?php
  foreach($anggota as $db){
    $Id = $db->Id_Anggota;
    $NoHp = $db->NoHp;
    $Nama = $db->NamaAnggota; 
    ?>
    <div class="modal fade" id="AddTabungan<?php echo $Id ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'AddTabungan'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Top Up Simpanan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">No Hp</label>
              <input type="hidden" name="ID" value="<?php echo $Id?>">
              <input type="number" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" readonly/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Anggota</label>
              <input type="text" name="Nama" class="form-control" value="<?php echo $Nama ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Jumlah</label>
              <input type="number" class="form-control" name="Jumlah" placeholder="0" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Simpanan</label>
              <select name="Jenis" class="User form-control">
                <?php foreach($Dbjenis->result() as $row):?>
                  <option value="<?php echo $row->Id_Simpanan; ?>"><?php echo $row->Nama ?></option>
                <?php endforeach;?>
              </select>
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