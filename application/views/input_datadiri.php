<html>
<head>
    <title>Form Input Data Diri</title>
<head>
<body>
    <form action="<?= base_url('datadiri/tampil') ?>" method="post">
        <table>
            <tr>
                <td colspan="2">FORM INPUT DATA DIRI</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>
                    <input type="text" name="nim">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>Prodi</td>
                <td>
                    <select name="prodi">
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                    </select>
                </td>       
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea id = "alamat" name="alamat" rows="2" cols="20"></textarea>
                </td>
                </tr>    
        </table>
        <input type="submit" value="submit">
    </form>
</body>
</html>