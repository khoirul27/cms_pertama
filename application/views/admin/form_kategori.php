<div id='myalert'>
    <?= $this->session->flashdata('alert', true) ?>
</div>

<div class="container">
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">tambah kategori</button>
    <div class="modal fade bg-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/kategori/simpan_kategori') ?>">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Kategori:</label>
                            <input type="text" name="kategori" class="form-control" id="recipient-name">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-secondary rounded h-100 p-4 mt-3">
        <h6 class="mb-4">Tabel Kategori</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $p) { ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $p['kategori']; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/kategori/hapus/' . $p['id_kategori']) ?>"
                                onclick="return confirm('apakah anda yakin ingin kategoir data ini')"
                                class="btn btn-squere btn-danger m-2"><i class="fa fa-trasd">hapus</a>
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                data-bs-target="#edit<?= $p['id_kategori'] ?>" data-bs-whatever="@mdo">Edit</button>
                            <div class="modal fade bg-dark" id="edit<?= $p['id_kategori'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('admin/kategori/update_kategori') ?>">
                                                <input type="hidden" name="id_kategori" value="<?= $p['id_kategori'] ?>">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                                                    <input type="text" name="kategori" value="<?= $p['kategori']; ?>"
                                                        class="form-control" id="recipient-name">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
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
</div>