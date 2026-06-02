<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Edit anggota</h2>

<div class="card shadow">
    <div class="card body">
        <form method="post" action="<?= site_url('anggota/update/'.$anggota->id); ?>">
    <div class="form-group">
        <label>Nama anggota</label><br>  
        <input type="text" name="nama_anggota" class="form-control" value="<?= $anggota->nama; ?>" required> 
</div>

    <button type="submit" class="btn btn-primary">update</button>
    <a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>
</form>
            </div>
        </div>
    </div>
</div>