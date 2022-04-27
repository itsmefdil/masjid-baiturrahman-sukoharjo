<?php 
include 'part/header.php' ;
include 'part/navbar.php' ;
include 'part/sidebar.php' ;
?>
<!--Content Start-->
<div class="content transition">
    <div class="container-fluid dashboard">

        <div class="row">
            <div class="col-sm-6">
                <h3>User</h3>
            </div>
            <div class="col-sm-6" align="right">
                <a href="<?= base_url()?>admin/user/add" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    Tambah User</a>
            </div>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="card row">
                <div class="card-body">
                    <table id="example" class="display text-center responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black;">No</th>
                                <th style="color: black;">Nama</th>
                                <th style="color: black;">Email</th>
                                <!-- <th style="color: black;">Password</th> -->
                                <th style="color: black;">Role</th>
                                <!-- <th style="color: black;">Foto</th> -->
                                <th style="color: black;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1 ; foreach ($user as $u) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u->nama ?></td>
                                <td><?= $u->email ?></td>
                                <!-- <td><?= $u->password ?></td> -->
                                <td><?= $u->role ?></td>
                                <!-- <td><img width="50px" src="<?= base_url('uploads/users/')?><?= $u->foto ?>"
                                alt=""></td> -->
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#edit<?= $u->id ?>">
                                        <i class="fa fa-pen-square"></i>
                                        Ubah</button>
                                    |
                                    <button
                                        type="button"
                                        class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#hapus<?= $u->id ?>">
                                        <i class="fa fa-trash"></i>
                                        Hapus</button>
                                </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit User -->
    <?php $no =1 ; foreach ($user as $u) { ?>
    <div
        class="modal fade"
        id="edit<?= $u->id?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data :
                        <?= $u->nama?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="home-tab"
                                data-toggle="tab"
                                href="#home<?= $u->id ?>"
                                role="tab"
                                aria-controls="home"
                                aria-selected="true">Data User</a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="profile-tab"
                                data-toggle="tab"
                                href="#pwd<?= $u->id ?>"
                                role="tab"
                                aria-controls="profile"
                                aria-selected="false">Ganti Password</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="home<?= $u->id ?>"
                            role="tabpanel"
                            aria-labelledby="home-tab">
                            <br>
                            <div class="container">
                                <form
                                    action="<?= base_url()?>admin/user/update/<?= $u->id?>"
                                    method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input
                                                    type="text"
                                                    id="first-name"
                                                    class="form-control"
                                                    name="nama"
                                                    value="<?= $u->nama ?>"
                                                    required="required">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input
                                                    type="email"
                                                    id="email-id"
                                                    class="form-control"
                                                    name="email"
                                                    value="<?= $u->email ?>"
                                                    required="required">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-control" name="role">
                                                    <option value="admin">Admin</option>
                                                    <option value="penulis">Penulis</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" class="form-control-file" name="foto">
                                                <input type="hidden" name="foto_old" value="<?= $u->foto ?>">
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8 form-group">
                                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div><br>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pwd<?= $u->id ?>"
                            role="tabpanel"
                            aria-labelledby="profile-tab">
                            <br>
                            <form action="<?= base_url()?>admin/user/password/<?= $u->id?>" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Password Baru</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input
                                                type="password"
                                                id="first-name"
                                                class="form-control"
                                                name="password"
                                                placeholder="Masukan Password Baru"
                                                required="required">
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8 form-group">
                                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <!-- Akhir Modal Edit -->

    <!-- Modal Hapus -->
    <?php $no =1 ; foreach ($user as $u) { ?>
    <div
        class="modal fade"
        id="hapus<?= $u->id ?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data :
                        <?= $u->nama ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ingin menghapus data
                    <b><?= $u->nama ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a
                        href="<?= base_url()?>admin/user/delete/<?= $u->id ?>"
                        class="btn btn-danger">Ya</a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <!-- Akhir Modal Hapus -->

    <?php include 'part/footer.php' ?>
