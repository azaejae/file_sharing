<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 03-Dec-14
 * Time: 12:39
 * 
 */
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<form id="tambah_sekolah" method="POST" enctype="multipart/form-data">
    <input type="text" name="npsn" required placeholder="NPSN"><br/>
    <input type="text" name="nama_sekolah" required placeholder="Nama Sekolah"><br/>
    <select name="status">
        <option value="Swasta">Swasta</option>
        <option value="Negeri">Negeri</option>
    </select><br/>
    <textarea cols="30" rows="4" placeholder="Alamat" name="alamat" required></textarea><br/>
    Logo : <input type="file" name="logo" placeholder="Logo" required><br/>
    <input type="submit">
</form>
</body>
</html>