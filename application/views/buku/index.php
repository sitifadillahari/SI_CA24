<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

    <a href="<?= base_url('buku/tambah') ?>" class="btn btn-primary mb-3">
        + Tambah Buku
    </a>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <table id="tableBuku" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no=1; foreach($buku as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b->kode_buku ?></td>
                <td><?= $b->judul ?></td>
                <td><?= $b->penulis ?></td>
                <td><?= $b->nama_kategori ?></td>
                <td><?= $b->stok ?></td>
                <td>
                    <a href="<?= base_url('buku/edit/'.$b->id) ?>" 
                       class="btn btn-warning btn-sm">Edit</a>

                    <a href="<?= base_url('buku/hapus/'.$b->id) ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin mau hapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#tableBuku').DataTable();
});
</script>