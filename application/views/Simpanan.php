<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Kategori</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Simpanan</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Kategori Simpanan</label>
          <div><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_Add"><i class="fas fa-plus"></i> Add</a></div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $No ='1';
                foreach($KtSimpan as $b){
                  $Id = $b->Id_Simpanan;
                  ?>
                  <tr>
                    <td><?php echo $No++; ?></td>
                    <td><?php echo $b->Nama; ?></td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $Id;?>" title="Edit"><i class="fa fa-edit "> Edit</i></button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $Id;?>" title="Hapus"><i class="fa fa-times"> Hapus</i></button></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <!-- </div> -->

      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('alert');?>" ></div>
    </main>

    <!-- ------------------ Modal Add Simpanan -------------------- -->
    <div class="modal fade" id="modal_Add" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'AddSimpanan'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Add Kategori Simpanan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Simpanan</label>
              <input type="text" class="form-control" name="Nama" placeholder="Nama Simpanan" required/>
            </div>

          </div>
          <div class="modal-footer">
            <input type="submit" value="Tambah"  class="btn btn-sm btn-primary"/>
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- ------------------ Modal Edit Simpanan -------------------- -->
  <?php 
  foreach($KtSimpan as $i){
    $Id = $i->Id_Simpanan;
    $Nama = $i->Nama;
    ?>
    <div class="modal fade" id="Edit<?php echo $Id ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <form action="<?php echo base_url('Welcome/').'EditSimpanan'; ?>" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Edit Kategori Simpanan</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <input type="hidden" name="ID" value="<?php echo $Id?>">
                <label for="exampleFormControlInput1">Nama Kategori</label>
                <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" required/>
              </div>

            </div>
            <div class="modal-footer">
              <input type="submit" value="Ubah"  class="btn btn-sm btn-primary"/>
              <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- =========================== Delet Anggota ============================== -->
    <div class="modal animated shake" id="delete<?php echo $Id; ?>">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form action="<?php echo base_url('Welcome').'/HapusSimpanan'; ?>" method="post">
           <div class="modal-body">
            <input type="hidden" name="ID" value="<?php echo $Id?>">
            Apakah Anda yakin ingin membuang data ini ke tempat sampah?
          </div>   
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <button type="submit" class="btn-sm btn-danger">Delete</button>
            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>