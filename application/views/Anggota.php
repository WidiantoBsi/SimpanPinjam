<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Data Anggota</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Anggota</li>
      </ol>

      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <label>DataTable Anggota</label>
          <div><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_Add"><i class="fas fa-plus"></i> Add</a></div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id Anggota</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id Anggota</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach($anggota as $b){
                  $Id = $b->Id_Anggota;
                  ?>
                  <tr>
                    <td><a href="#" title="Detail" data-toggle="modal" data-target="#Detail<?php echo $Id;?>"><?php echo $b->Id_Anggota ?></a></td>
                    <td><?php echo $b->NamaAnggota ?></td>
                    <td><?php echo $b->Email ?></td>
                    <td><?php echo $b->NoHp ?></td>
                    <td><?php echo $b->Alamat ?></td>
                    <td><?php echo $b->Tanggal ?></td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $Id;?>" title="Edit"><i class="fa fa-edit "></i></button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $Id;?>" title="Hapus"><i class="fa fa-times"></i></button></td>
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
    <form action="<?php echo base_url('Welcome/').'AddAnggota'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Add Anggota</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">ID Anggota</label>
              <input class="form-control" type="text" name="ID" value="<?php echo $IDAgt ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">NIP</label>
              <input class="form-control" type="text" name="NIP" placeholder="No NIP">
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
              <label for="exampleFormControlInput1">Jenis Kelamin</label>
              <select class="form-control mb-3" name="JK">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="decadeView">Tanggal Lahir</label>
              <div class="input-group date">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" class="form-control" name="Tgl_Lahir" value="dd/mm/yyyy" id="decadeView" required/>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">No Telepon</label>
              <input type="number" class="form-control" name="NoHp" placeholder="No Telepon" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
              <textarea class="form-control" name="Alamat" rows="3" required/></textarea>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Photo</label>
              <div class="">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="<?php echo base_url().'assets/img/No Image.jpg' ; ?>">
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                  <div>
                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input type="file" name="foto"></span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div>
              </div> 
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
  foreach($anggota as $i){
    $Id = $i->Id_Anggota;
    $Nama = $i->NamaAnggota;
    $TglLahir = $i->Tanggal;
    $alamat = $i->Alamat;
    $email = $i->Email;
    $NoHp = $i->NoHp;
    $NIP = $i->NIP;
    $JK = $i->JenisKelamin;
    $Photo = $i->Photo;
    ?>
    <div class="modal fade" id="Edit<?php echo $Id ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="<?php echo base_url('Welcome/').'EditAnggota'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlInput1">ID Anggota</label>
              <input class="form-control" type="text" name="ID" value="<?php echo $Id ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">NIP</label>
              <input class="form-control" type="text" name="NIP" value="<?php echo $NIP ?>">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Lengkap</label>
              <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" required/>
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
              <label for="decadeView">Tanggal Lahir</label>
              <div class="input-group date">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" class="form-control" name="Tgl_Lahir" value="<?php echo $TglLahir ?>" id="decadeView" required/>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">No Telepon</label>
              <input type="number" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" required/>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
              <textarea class="form-control" name="Alamat" rows="3" required/><?php echo $alamat ?></textarea>
            </div>

            <div class="">
              <label for="exampleFormControlTextarea1">Photo</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 200px; height: 140px;"><img src="<?php echo base_url().'assets/upload/'.$Photo ; ?>" alt="gambar tidak ada"></div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
              <div>
                <span class="btn btn-file btn-primary"><span class="fileupload-new">Edit image</span><span class="fileupload-exists">Change</span>
                <input type="file" name="foto"></span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
            </div>
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
    <form>
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
              <label for="exampleFormControlInput1">NIP</label>
              <input class="form-control" type="text" name="NIP" value="<?php echo $NIP ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Lengkap</label>
              <input type="text" class="form-control" name="Nama" value="<?php echo $Nama ?>" readonly>
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
              <label for="decadeView">Tanggal Lahir</label>
              <div class="input-group date">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="date" class="form-control" name="Tgl_Lahir" value="<?php echo $TglLahir ?>" id="decadeView" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">No Telepon</label>
              <input type="number" class="form-control" name="NoHp" value="<?php echo $NoHp ?>" readonly>
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
              <textarea class="form-control" name="Alamat" rows="3" readonly><?php echo $alamat ?></textarea>
            </div>

            <div class="">
              <label for="exampleFormControlTextarea1">Photo</label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 200px; height: 140px;"><img src="<?php echo base_url().'assets/upload/'.$Photo ; ?>" alt="gambar tidak ada"></div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            </div>
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
        <form action="<?php echo base_url('Welcome').'/HapusAnggota'; ?>" method="post">
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