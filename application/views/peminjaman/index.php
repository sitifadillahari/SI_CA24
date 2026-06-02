<div class="container-fluid">

    <h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

    <a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">
        Tambah
    </a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Peminjaman</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($peminjaman as $p) : ?>

                        <tr>
                            <td><?= $no++; ?></td>

                            <td><?= $p->kode_peminjaman; ?></td>

                            <td><?= $p->nama; ?></td>

                            <td><?= $p->tanggal_pinjam; ?></td>

                            <td><?= $p->status; ?></td>

                        <td>
                        <?php
                            $today = date('Y-m-d');

                            $selisih = strtotime($today) - strtotime($p->tanggal_jatuh_tempo);

                            $terlambat = $selisih > 8
                                ? floor($selisih / 86400)
                                : 0;
                            ?>    

                            <?php if($p->status == 'dipinjam') : ?>
                            

                            <a href="<?= site_url('peminjaman/kembali/'.$p->id) ?>" 
                                class="btn btn-success btn-sm">
                                Kembalikan
                                </a>

                            <a href="<?= site_url('whatsapp/kirim_notifikasi/'.$p->id) ?>" 
                                class="btn btn-success btn-sm">
                            
                            <i class="fab fa-whatsapp"></i> 
                                Kirim WA
                                </a>    

                            <?php else : ?>
                            <button class="btn btn-secondary btn-sm" disabled>
                                Sudah Kembali
                            </button>
                            
                            <?php endif; ?>
                        </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>