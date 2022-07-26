<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Pengajuan</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengajuan</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Pengajuan</label>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID/NoHp</th>
                  <th>Nama Anggota</th>
                  <th>Pengajuan</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID/NoHp</th>
                  <th>Nama Anggota</th>
                  <th>Pengajuan</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach($Dbpinjam as $b){ 
                  $Id = $b->Id_Pinjaman;
                  $ID = $b->id_Pengajuan;
                  $where = array('Id_Jenis' => $Id);
                  $data = $this->M_DBWD->edit_data($where,'jenis_pinjaman')->result();
                  foreach ($data as $a) {
                    $Jumlah = $a->Jumlah;
                  }
                  $where2 = array('Id_Anggota' => $b->Id_Anggota);
                  $data = $this->M_DBWD->edit_data($where2,'anggota')->result();
                  foreach ($data as $wer) {
                    $Nama = $wer->NamaAnggota;
                    $NoHp = $wer->NoHp;
                  }
                  ?>
                  <tr>
                    <td><?php echo $NoHp ?></td>
                    <td><?php echo $Nama ?></td>
                    <td><?php echo $b->Keterangan ?></td>
                    <td><?php echo number_format($Jumlah) ?></td>
                    <td><?php echo $b->Tanggal ?></td>
                    <?php if ($b->Verivikasi=="Y") { ?>
                      <td>Terverivikasi</td>
                    <?php }elseif ($b->Verivikasi=="N") { ?>
                      <td>Ditolak</td>
                    <?php }else{ ?>
                      <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#Cek<?php echo $ID;?>" title="Batal">Verivikasi</button></td>
                    <?php } ?>
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

  <!-- ------------------ Modal Pengajuan -------------------- -->
  <?php 
  foreach($Dbpinjam as $db){ 
    $ID = $db->id_Pengajuan;
    $wh = array('Id_Jenis' => $db->Id_Pinjaman);
    $data = $this->M_DBWD->edit_data($wh,'jenis_pinjaman')->result();
    foreach ($data as $ab) {
      $Jmlh = $ab->Jumlah;
    }
    $wh2 = array('Id_Anggota' => $db->Id_Anggota);
    $data = $this->M_DBWD->edit_data($wh2,'anggota')->result();
    foreach ($data as $wr) {
      $Name = $wr->NamaAnggota;
      $No = $wr->NoHp;
    }
    $SubTotal = $this->M_DBWD->TotalPinjaman($db->Id_Anggota);
    ?>
    <div class="modal fade" id="Cek<?php echo $ID;?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <form action="<?php echo base_url('Welcome/').'AddPengajuan'; ?>" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Verifikasi Pengajuan</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Anggota</label>
                <input type="hidden" name="ID" value="<?php echo $ID?>">
                <input type="text" class="form-control" name="name" value="<?php echo $Name ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">No Hp</label>
                <input type="hidden" name="Id_Anggota" value="<?php echo $db->Id_Anggota?>">
                <input type="text" class="form-control" name="No" value="<?php echo $No ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Jumlah Pengajuan</label>
                <input type="hidden" name="Jumlah" value="<?php echo $Jmlh?>">
                <input type="text" class="form-control" value="<?php echo number_format($Jmlh) ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Pinjaman Sebelumnya</label>
                <input type="text" class="form-control" name="SubTotal" value="<?php echo number_format($SubTotal) ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Keterangan</label>
                <input type="text" class="form-control" name="Ket" min="0" max="50" value="<?php echo $db->Keterangan ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Pengajuan</label>
                <select name="Cek" class="User form-control">
                    <option value="N">Tolak Pengajuan</option>
                    <option value="Y">DiSetujuin</option>
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