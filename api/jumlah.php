<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 15-Jan-15
 * Time: 10:29
 * 
 */

ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
if(isset($_GET['pengajar']))
{
    require_once(realpath(dirname(__FILE__)) . '/lib/pengajar.php');
    $pengajar = new Pengajar();
    $pengajar->getJumlahPengajar();
}
elseif(isset($_GET['kelas']))
{
    require_once(realpath(dirname(__FILE__)) . '/lib/kelas.php');
    $kelas= new Kelas();
    $kelas->getJumlahKelas();
}elseif(isset($_GET['materi']))
{
    require_once(realpath(dirname(__FILE__)) . '/lib/materi.php');
    $materi = new Materi();
    $materi->getJumlahMateri();
}
elseif(isset($_GET['sekolah']))
{
    require_once(realpath(dirname(__FILE__)) . '/lib/sekolah.php');
    $sekolah= new Sekolah();
    $sekolah->getJumlahSekolah();
}
else
{
    require_once(realpath(dirname(__FILE__)) . '/lib/materi.php');
    $materi = new Materi();
    $materi->getJumlahBSE();
}