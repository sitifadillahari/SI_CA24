<div class="container-fluid">
    <h3>Laporan Peminjaman</h3>
    <form method="get">
        <input type="month" name="bulan" value="<?= $bulan; ?> ">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?=site_url('laporan/peminjaman'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href="<?=site_url('peminjaman/cetak_peminjaman?bulan='.$bulan); ?>"
    target="_blank" class="btn btn-success btn-sm">Cetak  PDF</a>

    <table id="tablePeminjaman" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Anggota</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Status</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($data as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->kode_peminjaman ?></td>
                <td><?= $p->nama ?></td>
                <td><?= $p->tanggal_jatuh_tempo ?></td>
                <td><?= $p->status ?></td>
            </tr>
            <?php endforeach; ?>
    </thead>
    </table>

</div>