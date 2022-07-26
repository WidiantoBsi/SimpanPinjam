<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Pinjaman</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Pinjaman</li>
      </ol>
      
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Pinjaman</label>
          <?php 
          $IdAgt = $this->session->userdata('id');?>
          <div><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_Add<?php echo $IdAgt ?>"><i class="fas fa-plus"></i> Add</a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No ID</th>
                  <th>Pengajuan</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No ID</th>
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
                  $where = array('Id_Jenis' => $Id);
                  $data = $this->M_DBWD->edit_data($where,'jenis_pinjaman')->result();
                  foreach ($data as $va) {
                    $Jumlah = $va->Jumlah;
                  }
                  ?>
                  <tr>
                    <td><?php echo $b->id_Pengajuan ?></td>
                    <td><?php echo $b->Keterangan ?></td>
                    <td><?php echo number_format($Jumlah) ?></td>
                    <td><?php echo $b->Tanggal ?></td>
                    <?php if ($b->Verivikasi=="N") { ?>
                      <td><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $Id;?>" title="Hapus"><i class="fa fa-times"></i> Ditolak</button></td>
                    <?php }elseif ($b->Verivikasi=="Y") { ?>
                      <td>Terverivikasi</td>
                    <?php }else{ ?>
                      <td>Diproses</td>
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

  <!-- =========================== Delet Pengajuan ============================== -->
  <?php 
  foreach($Dbpinjam as $i){
    $Id = $i->Id_Pinjaman;
    ?>
    <div class="modal animated shake" id="delete<?php echo $Id; ?>">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <h4 class="modal-title" style="text-align:center;">Hapus Pengajuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form action="<?php echo base_url('Member').'/HapusPengajuan'; ?>" method="post">
           <div class="modal-body">
            <input type="hidden" name="ID" value="<?php echo $Id?>">
            Apakah Anda yakin ingin hapus Pengajuan Ini?
          </div>   
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <button type="submit" class="btn-sm btn-danger">Peroses</button>
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- ------------------ Modal Add Pengajuan -------------------- -->
<?php 
foreach($anggota as $wr){
  $Id = $wr->Id_Anggota;
  $Nama = $wr->NamaAnggota;
  $NoHp = $wr->NoHp;
  ?>
  <div class="modal fade" id="modal_Add<?php echo $Id?>" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form action="<?php echo base_url('Member/').'AddPengajuan'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Add Pengajuan</h3>
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
            <select name="Jenis" class="User form-control">
              <?php foreach($Jenis->result() as $row):?>
                <option value="<?php echo $row->Id_Jenis; ?>"><?php echo number_format($row->Jumlah); ?></option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Keterangan</label>
            <input type="text" class="form-control" name="Ket" min="0" max="50" placeholder="Biaya Sekolah" required/>
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