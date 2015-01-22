<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:31
 * 
 */
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

require(realpath(dirname(__FILE__)) . '/lib/sekolah.php');
require(realpath(dirname(__FILE__)) . '/lib/api.php');
//Api::auth();
//ini_set('max_execution_time',0);
$sekolah=new Sekolah();
if(isset($_GET['menu']))
{
    $menu=$_GET['menu'];
    if($_GET['menu']=='tambah')
    {
        $sekolah->setAtribut($_POST['npsn'],$_POST['nama_sekolah'],$_POST['alamat'],$_POST['status']);
        $sekolah->uploadLogo($_FILES);
        $sekolah->tambahSekolah();
    }
    elseif($_GET['menu']=='label')
    {
        $sekolah->getAutoCompleteData();
    }
    elseif($_GET['menu']=='hapus')
    {
        $sekolah->hapusSekolah($_GET['npsn']);
    }
    elseif($_GET['menu']=='ubah')
    {
        $sekolah->uploadLogo($_FILES);
        $sekolah->ubahSekolah($_POST['npsn'],$_POST['nama_sekolah'],$_POST['alamat'],$_POST['status']);
    }
    elseif($_GET['menu']=='detail')
    {
        if($_GET['npsn'])
        {
            $sekolah->detailSekolah($_GET['npsn']);
        }

    }
    else
    {
        $sekolah->getDataSekolah();
    }
}
else
{
    $sekolah->getDataSekolah();
}
/*
$password='master';
$key='BwUNO8SHHTyLk0loDiB+ww==';
$pass=$password.$key;
$pass=hash('sha256',$pass);
echo $pass;
//
*/
