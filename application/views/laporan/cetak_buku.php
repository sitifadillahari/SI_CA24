<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Buku</title>

    <style>
        body{
            font-family: Arial;
        }

        h3{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 8px;
            text-align: center;
        }

        @media print{
            button{
                display: none;
            }
        }
    </style>
</head>

<body>

    <h3>LAPORAN DATA BUKU</h3>

    <table>
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

    <br><br>

    <p style="text-align: right;">
        Tangerang, <?= date('d-m-Y'); ?><br><br><br>
        (Admin)
    </p>

    <script>
        window.print();
    </script>

</body>
</html>