<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }
        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }
    </style>
</head>
<body>
    <h3><center>Laporan Data Anggota Perpustakaan Online</center></h3>
    <br/>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($anggota as $b){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $b['nama']; ?></td>
                <td><?= $b['email']; ?></td>
                <td><?= date('d F Y', $b['tanggal_input']); ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
