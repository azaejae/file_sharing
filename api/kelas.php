<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 14-Dec-14
 * Time: 14:33
 * 
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

//require(realpath(dirname(__FILE__)) . '/lib/sekolah.php');
require(realpath(dirname(__FILE__)) . '/lib/kelas.php');

$kelas= new Kelas();
if(isset($_GET['menu']))
{
    if($_GET['menu']=='tambah')
    {
        $kelas->setValueKelas($_POST['nama_kelas'],$_POST['tingkat'],$_POST['tujuan_kelas'],$_POST['deskripsi_kelas']);
        $kelas->tambahKelas();
    }
    elseif($_GET['menu']=='pengajar_kelas')
    {
        $kelas->pengajarKelas();
    }
    else
    {
        $kelas->getKelas();
    }
}
else
{
    $kelas->getKelas();
}