<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Tambah Anggota</h2>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">

<form method="post" action="<?= site_url('anggota/simpan');?>">

    <div class="form-group mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <div class="form-group mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label>Tanggal Daftar</label>
        <input type="date" name="tgl_daftar" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>

            </div>
        </div>
    </div>
</div>