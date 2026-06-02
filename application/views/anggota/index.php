<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

    <a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">
        + Tambah Anggota
    </a>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1; ?>
                        <?php foreach ($anggota as $a): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->alamat; ?></td>
                            <td><?= $a->no_hp; ?></td>
                            <td><?= $a->email; ?></td>
                            <td><?= $a->tgl_daftar; ?></td>
                            <td>
                                <a href="<?= site_url('anggota/edit/'.$a->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('anggota/hapus/'.$a->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>