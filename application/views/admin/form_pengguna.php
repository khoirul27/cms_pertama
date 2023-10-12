<div id='myalert'>
    <?= $this->session->flashdata('alert', true) ?>
</div>
<div class="container">
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">tambah pengguna</button>
    <div class="modal fade bg-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/pengguna/simpan_pengguna') ?>">
                        <div class="row mb-3 mx-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" id="inputEmail3"
                                    fdprocessedid="nirm9k">
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" id="inputEmail3"
                                    fdprocessedid="nirm9k">
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Passwod</label>
                            <div class="col-sm-8 me-5">
                                <input type="pasword" name="password" class="form-control" id="inputPassword3"
                                    fdprocessedid="sazjs">
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">level</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="level" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected=""></option>
                                    <option value="admin">admin</option>
                                    <option value="pengguna">pengguna</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" fdprocessedid="zx95ys">kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-secondary rounded mt-3 h-100 p-4">
        <h6 class="mb-4">Tabel pengguna</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $p) { ?>
                    <tr>
                        <td>
                            <?= $no ?>
                        </td>
                        <td>
                            <?= $p['username'] ?>
                        </td>
                        <td>
                            <?= $p['level'] ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/pengguna/hapus/' . $p['id']) ?>"
                                onclick="return confirm('apakah anda yakin ingin menghapus data ini')"
                                class="btn btn-squere btn-danger m-2"><i class="fa fa-trasd">hapus</a>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#edit<?= $p['id'] ?>" data-bs-whatever="@mdo">Edit</button>
                            <div class="modal fade bg-dark" id="edit<?= $p['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit Pengguna
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('admin/pengguna/update_pengguna') ?>">
                                                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputEmail3"
                                                        class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="username" class="form-control"
                                                            id="inputEmail3" value="<?= $p['username'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">level</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" name="level" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected=""></option>
                                                            <option value="admin" <?php if ($p['level'] == 'admin') {
                                                                echo "selected";
                                                            } ?>>admin</option>
                                                            <option value="pengguna" <?php if ($p['level'] == 'pengguna') {
                                                                echo "selected";
                                                            } ?>>pengguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">kirim</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text color-light" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Level:</label>
                            <div class="row mb-3 mx-5">
                                <select class="form-select" name="level" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected=""></option>
                                    <option value="admin" <?php if ($p['level'] == 'admin') {
                                        echo "selected";
                                    } ?>>admin</option>
                                    <option value="pengguna" <?php if ($p['level'] == 'pengguna') {
                                        echo "selected";
                                    } ?>>pengguna</option>
                                </select>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>