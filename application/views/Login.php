<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WD Simpan Pinjam</title>
    <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form action="<?php echo base_url().'LogIn/CekLogin'; ?>" method="post">
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">No Hp</label>
                                            <input class="form-control py-4" min="0" type="number" placeholder="Masukan Nomer ponsel" name="No" required/></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Email</label><input class="form-control py-4" name="email" type="email" placeholder="nama@gmail.com" required/></div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-success" href="<?php echo base_url().'Daftar'?>">Daftar</a>
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?php
                                        if($this->session->flashdata('alert')){ ?>
                                         <div class="alert alert-danger alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?php echo $this->session->flashdata('alert'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>