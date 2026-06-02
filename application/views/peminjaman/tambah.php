<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Peminjaman</h1>

    <form action="<?= base_url('peminjaman/simpan') ?>" method="post">

        <div class="form-group">

            <label>ID Anggota</label>

            <input type="number"
                   name="anggota_id"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Buku</label>

            <select name="buku_id"
                    class="form-control"
                    required>

                <option value="">
                    -- Pilih Buku --
                </option>

                <?php foreach($buku as $b): ?>

                    <option value="<?= $b->id ?>">

                        <?= $b->kode_buku ?> - <?= $b->judul ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="form-group">

            <label>Tanggal Pinjam</label>

            <input type="date"
                   name="tanggal_pinjam"
                   class="form-control"
                   required>

        </div>

        <div class="form-group">

            <label>Tanggal Jatuh Tempo</label>

            <input type="date"
                   name="tanggal_jatuh_tempo"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>

        <a href="<?= base_url('peminjaman') ?>"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>