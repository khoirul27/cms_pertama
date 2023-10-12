<div id='myalert'>
    <?= $this->session->flashdata('alert', true) ?>
</div>
<div class="container">
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">tambah konten</button>
    <div class="modal fade bg-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Konten</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('admin/konten/simpan_konten') ?>"
                        enctype="multipart/form-data">
                        <div class="row mb-3 mx-5">
                            <label for="inputEmail3" class="col-sm-2 me-5 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" name="judul" class="form-control" id="inputEmail3"
                                    fdprocessedid="nirm9k">
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 me-5 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" name="harga" class="form-control" id="inputPassword3"
                                    fdprocessedid="sazjs">
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 me-5 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="keterangan" id="floatingTextarea"
                                    style="height: 150px;"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 me-5 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <select name="id_kategori" class="form-control">
                                    <?php foreach ($kategori as $p) { ?>
                                        <option value="<?= $p['id_kategori']; ?>"><?= $p['kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3 mx-5">
                            <label for="inputPassword3" class="col-sm-2 me-5 col-form-label">Foto</label>
                            <div class="col-sm-8">
                                <input class="form-control bg-dark" name="foto" type="file" id="formFile"
                                    accept="image/png, image/jpeg">
                            </div>
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
        <h6 class="mb-4">tabel koten</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori konten</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kreator</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($konten as $p) { ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $p['judul']; ?>
                        </td>
                        <td>
                            <?= $p['kategori']; ?>
                        </td>
                        <td>
                            <?= $p['tanggal']; ?>
                        </td>
                        <td>
                            <?= $p['nama']; ?>
                        </td>
                        <td><i class="bi bi-eye">
                                <a href="<?= base_url('asset/admin/img/konten/' . $p['foto']) ?>" target="_blank"><span
                                        class="text-light">lihat</span></a></i>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/konten/hapus/' . $p['foto']) ?>"
                                onclick="return confirm('apakah anda yakin ingin kategoir data ini')"
                                class="btn btn-danger rounded-pill m-2"><i class="bi bi-trash"></i></a>
                            <button type="button" class="btn btn-warning rounded-pill m-2 text-secondary"
                                data-bs-toggle="modal" data-bs-target="#edit<?= $p['id_konten'] ?>"
                                data-bs-whatever="@mdo"><i class="bi bi-pencil"></i></button>
                            <div class="modal fade bg-dark" id="edit<?= $p['id_konten'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Konten</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?= base_url('admin/konten/update_konten') ?>"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="nama_foto" value="<?= $p['foto'] ?>">
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputEmail3"
                                                        class="col-sm-2 me-5 col-form-label">Judul</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="judul" class="form-control"
                                                            id="inputEmail3" value="<?= $p['judul'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 me-5 col-form-label">Harga</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="harga" class="form-control"
                                                            id="inputPassword3" value="<?= $p['harga'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 me-5 col-form-label">Keterangan</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="keterangan"
                                                            id="floatingTextarea"
                                                            style="height: 150px;"><?= $p['keterangan'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 me-5 col-form-label">Kategori</label>
                                                    <div class="col-sm-8">
                                                        <select name="id_kategori" class="form-control">
                                                            <?php foreach ($kategori as $a) { ?>
                                                                <option <?php
                                                                if($a['id_kategori']==$p['id_kategori']){ echo"selected"; } ?>
                                                                value="<?= $a['id_kategori']; ?>"><?= $a['kategori']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 mx-5">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 me-5 col-form-label">Foto</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control bg-dark" name="foto" type="file"
                                                            id="formFile" accept="image/png, image/jpeg">
                                                    </div>
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
        </div>
        </td>
        </tr>
        <?php $no++;
                } ?>
    </tbody>
    </table>
</div>
</div>