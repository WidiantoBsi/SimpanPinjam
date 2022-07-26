<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WD Simpan Pinjam</title>
    <!-- Bootsrap SweetArt -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert/sweetalert.css">
    <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> -->
    <!-- Bootsrap File Upload -->
    <link href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Login/').'AddAnggota'; ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nama Lengkap</label>
                                                    <input class="form-control" type="hidden" name="ID" value="<?php echo $IDAgt ?>">
                                                    <input class="form-control py-4" name="Nama" type="text" placeholder="Enter Nama Lengkap" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputLastName">Nomer Hanpone</label>
                                                    <input class="form-control py-4" type="number" name="NoHp" placeholder="08571234567890" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">No NIP</label>
                                                    <input class="form-control py-4" type="number" name="NIP" placeholder="0" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Tanggal Lahir</label>
                                                    <input class="form-control py-4" type="date" name="Tgl_Lahir" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Alamat KTP</label>
                                            <textarea class="form-control" name="Alamat">Alamat Sesuai KTP</textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Jenis Kelamin</label>
                                                    <select class="form-control mb-3" name="JK">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                    <input class="form-control" type="email" name="email" placeholder="alamat@gmail.com" />
                                                </div>
                                            </div>
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
                                    <div class="form-group mt-4 mb-0">
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="<?php echo base_url().'Login'?>">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('alert');?>" ></div>
    </main>
</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> -->
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<!-- Bootstrap FileUpload -->
<script src="<?php echo base_url()?>assets/js/bootstrap-fileupload.js"></script>
<!-- Bootsrap SweetAlert -->
<script src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/js/coding.js"></script>
<script src="<?php echo base_url()?>assets/js/scripts.js"></script>
</body>
</html>
