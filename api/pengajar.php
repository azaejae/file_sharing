<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 12-Dec-14
 * Time: 08:39
 * 
 */
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
require(realpath(dirname(__FILE__)) . '/lib/pengajar.php');
require(realpath(dirname(__FILE__)) . '/lib/api.php');
$api = new Api();
$pengajar =new Pengajar();

if(isset($_GET['menu']))
{
    if($_GET['menu']=='login')
    {
        if((isset($_POST['username']))&&($_POST['password']))
        {
            $pengajar->pengajarAuth($_POST['username'],$_POST['password']);
        }
        else
        {
            $pesan=array('hasil'=>'gagal','pesan'=>'username atau password tidak boleh kosong');
            echo json_encode($pesan);
        }
    }
    elseif($_GET['menu']=='tambah')
    {
        $pengajar->setValue($_POST['username'],$_POST['npsn'],3,$_POST['password'],$_POST['nama_lengkap'],$_POST['alamat'],$_POST['email']);
        $pengajar->uploadFoto($_FILES);
        $pengajar->tambahPengajar();
    }
    elseif($_GET['menu']=='pengajarsekolah')
    {
        $api->auth();
        if(isset($_GET['npsn']))
        {
            $pengajar->getPengajar($_GET['npsn']);
        }
        else
        {
            $pengajar->getPengajar();
        }


    }
    else
    {
        $api->auth();
        $pengajar->getPengajar();

    }
}
else
{
    $api->auth();
    $pengajar->getPengajar();
}