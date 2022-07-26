<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">User Admin</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User Admin</li>
      </ol>
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable User Admin</label>
          <!-- <div><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_Add"><i class="fas fa-plus"></i> Add</a></div> -->
          <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="btn btn-success btn-sm dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus fa-fw"></i> Add</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#AddAdmin" href="#">User Admin</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">User Anggota</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Email</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                $No ='1';
                foreach($User as $b){
                  $Id = $b->Id_User;
                  ?>
                  <tr>
                    <td><?php echo $No++; ?></td>
                    <td><?php echo $b->NamaUser; ?></td>
                    <td><?php echo $b->Email; ?></td>
                    <td><?php echo $b->Kategori; ?></td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $Id;?>" title="Edit"><i class="fa fa-edit "> Edit</i></button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $Id;?>" title="Hapus"><i class="fa fa-times"> Hapus</i></button></td>
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

    <!-- ------------------ Modal Add Simpanan -------------------- -->
    <div class="modal fade" id="modal_Add" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'AddSimpanan'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Add User Admin</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama User</label>
              <input type="text" class="form-control" name="Nama" placeholder="Nama Kategori" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Email</label>
              <input type="email" class="form-control" name="Jumlah" min="0" placeholder="email@gmail.com" required/>
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
  foreach($User as $i){
    $Id = $i->Id_User;
    $Nama = $i->NamaUser;
    $Pass = $i->Pasword;
    $Kategori = $i->Kategori;
    ?>
    <div class="modal fade" id="Edit<?php echo $Id ?>" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <form action="<?php echo base_url('Welcome/').'EditSimpanan'; ?>" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="myModalLabel">Edit User</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <input type="hidden" name="ID" value="<?php echo $Id?>">
                <label for="exampleFormControlInput1">Nama User</label>
                <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" required/>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Kategori</label>
                <input type="text" class="form-control" name="Jumlah" min="0" value="<?php echo $Pass ?>" required/>
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