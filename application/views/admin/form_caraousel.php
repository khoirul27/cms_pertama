<div id='myalert'>
    <?= $this->session->flashdata('alert', true) ?>
</div>

<div class="row mt-4">
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Carousel</h6>
            <form action="<?= base_url('admin/caraousel/simpan_caraousel') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul</label>
                    <input type="text" class="form-control bg-dark" name="judul">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Foto</label>
                    <input class="form-control bg-dark" name="foto" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary" fdprocessedid="ssdf4b">kirim</button>
            </form>
        </div>
    </div>
</div>
<?php foreach ($caraousel as $a) { ?>
    <div class="card col-6 mx-3 bg-secondary" style="width: 18rem;">
        <img src="<?= base_url('asset/admin/img/caraousel/' . $a['foto']) ?>" class="card-img-top mt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $a['judul'] ?></h5>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p> -->
            <a href="<?= base_url('admin/caraousel/hapus/' . $a['foto']) ?>" class="btn btn-primary">hapus</a>
            <a href="#" class="btn btn-warning">edit</a>
        </div>
    </div>
    <?php } ?>