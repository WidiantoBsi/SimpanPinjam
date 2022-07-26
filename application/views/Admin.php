<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Admin</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Admin</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Admin</label>
          <div><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_Add"><i class="fas fa-plus"></i> Add</a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id Admin</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Bagian</th>
                  <th>No HP</th>
                  <th>Jenis Kelamin</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id Admin</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Bagian</th>
                  <th>No HP</th>
                  <th>Jenis Kelamin</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach($admin as $b){
                  $Id = $b->Id_Admin;
                  ?>
                  <tr>
                    <td><a href="#" title="Detail" data-toggle="modal" data-target="#Detail<?php echo $Id;?>"><?php echo $b->Id_Admin ?></a></td>
                    <td><?php echo $b->Nama ?></td>
                    <td><?php echo $b->Email ?></td>
                    <td><?php echo $b->Bagian ?></td>
                    <td><?php echo $b->NoHp ?></td>
                    <td><?php echo $b->JenisKelamin ?></td>
                    <td>
                      <?php 
                      $dbadm = $this->session->userdata('id');
                      if ($b->Id_Admin==$dbadm) { ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $Id;?>" title="Edit"><i class="fa fa-edit "></i></button>
                      <?php }else{ ?>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $Id;?>" title="Edit"><i class="fa fa-edit "></i></button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $Id;?>" title="Hapus"><i class="fa fa-times"></i></button>
                      <?php } ?>
                    </td>
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

  <!-- ------------------ Modal Add Anggota -------------------- -->
  <div class="modal fade" id="modal_Add" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <form action="<?php echo base_url('Welcome/').'AddAdmin'; ?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Add Admin</h3>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleFormControlInput1">ID Admin</label>
            <input class="form-control" type="text" name="ID" value="<?php echo $IDAgt ?>" readonly>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Lengkap</label>
            <input type="text" class="form-control" name="Nama" placeholder="Nama Lengkap" required/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="alamat_email@gmail.com" required/>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Bagian</label>
            <input type="text" class="form-control" name="Bagian" placeholder="Bagian" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Jenis Kelamin</label>
            <select class="form-control mb-3" name="JK">
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">No Telepon</label>
            <input type="number" class="form-control" name="NoHp" placeholder="No Telepon" required/>
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

<!-- ------------------ Modal Edit Anggota -------------------- -->
<?php 
foreach($admin as $i){
  $Id = $i->Id_Admin;
  $Nama = $i->Nama;
  $Bagian = $i->Bagian;
  $email = $i->Email;
  $NoHp = $i->NoHp;
  $JK = $i->JenisKelamin;
  ?>
  <div class="modal fade" id="Edit<?php echo $Id ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'EditAdmin'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Edit Admin</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">ID Anggota</label>
              <input class="form-control" type="text" name="ID" value="<?php echo $Id ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Lengkap</label>
              <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Bagian</label>
              <input type="text" class="form-control" name="Bagian" value="<?php echo $Bagian ?>" required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Jenis Kelamin</label>
              <select class="form-control mb-3" name="JK">
                <?php
                if ($JK=='Laki-Laki') { ?>
                  <option value="<?php echo $JK ?>"><?php echo $JK ?></option>
                <?php }else{ ?>
                  <option value="Perempuan">Perempuan</option>
                <?php } ?>
                <?php
                if ($JK=='Laki-Laki') { ?>
                  <option value="Perempuan">Perempuan</option>
                <?php }else{ ?>
                  <option value="Laki-Laki">Laki-Laki</option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">No Telepon</label>
              <input type="number" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" required/>
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

  <!-- Detail Anggota -->
  <div class="modal fade" id="Detail<?php echo $Id ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'EditAnggota'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Detail Anggota</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">ID Anggota</label>
              <input class="form-control" type="text" name="ID" value="<?php echo $Id ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Lengkap</label>
              <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Bagian</label>
              <input type="text" class="form-control" name="Bagian" value="<?php echo $Bagian ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $email ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Jenis Kelamin</label>
              <input type="email" class="form-control" name="JK" value="<?php echo $JK ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">No Telepon</label>
              <input type="number" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" readonly>
            </div>

          </div>
          <div class="modal-footer">
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
        <form action="<?php echo base_url('Welcome').'/HapusAdmin'; ?>" method="post">
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