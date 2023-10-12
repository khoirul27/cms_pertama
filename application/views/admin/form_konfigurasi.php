<div id='myalert'>
    <?= $this->session->flashdata('alert', true) ?>
</div>
<h4>Halaman konfigurasi</h4>
<form method="post" action="<?= base_url('admin/konfigurasi/update_konfigurasi') ?>">
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Judul website:</label>
        <input type="text" name="judul_web" class="form-control bg-secondary" value="<?= $konfig->judul_website; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Profile website:</label>
        <input type="text" name="profil_web" class="form-control bg-secondary" value="<?= $konfig->profil_website; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Instagram:</label>
        <input type="text" name="instagram" class="form-control bg-secondary" value="<?= $konfig->instagram; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Facebook:</label>
        <input type="text" name="facebook" class="form-control bg-secondary" value="<?= $konfig->facebook; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Email:</label>
        <input type="email" name="email" class="form-control bg-secondary" value="<?= $konfig->email; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">No whatsapp:</label>
        <input type="text" name="no_wa" class="form-control bg-secondary" value="<?= $konfig->no_wa; ?>">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">alamat:</label>
        <input type="text" name="alamat" class="form-control bg-secondary" value="<?= $konfig->alamat; ?>">
    </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>