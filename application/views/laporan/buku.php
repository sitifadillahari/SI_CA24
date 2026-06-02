<div class="container-fluid">
    <h3>Laporan Buku</h3>
    <form method="get">
        <input type="month" name="bulan" value="<?= $bulan; ?> ">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?=site_url('laporan/buku'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href="<?=site_url('laporan/cetak_buku?bulan='.$bulan); ?>"
    target="_blank" class="btn btn-success btn-sm">Cetak  PDF</a>

    <br><br>

    <table id="tableBuku" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($buku as $b): ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b->kode_buku ?></td>
                <td><?= $b->judul ?></td>
                <td><?= $b->id_kategori ?></td>
                <td><?= $b->stok ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>