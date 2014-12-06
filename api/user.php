<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 05/12/2014
 * Time: 16:56
 */
header('Access-Control-Allow-Origin: *');
require(realpath(dirname(__FILE__)) . '\lib\user.php');
$user=new User();
//user Auth
if(isset($_GET['menu']))
{
    if($_GET['menu']=='login')
    {
        if((isset($_POST['username']))&&($_POST['password']))
        {
            $user->userAuth($_POST['username'],$_POST['password']);
        }
        else
        {
            $pesan=array('hasil'=>'gagal','pesan'=>'username atau password tidak boleh kosong');
            echo json_encode($pesan);
        }
    }
    elseif($_GET['menu']=='tambah')
    {
        $user->setValue($_POST['username'],$_POST['npsn'],$_POST['jenis_user'],$_POST['password'],$_POST['nama'],$_POST['alamat'],$_POST['email']);
        $user->uploadFoto($_FILES);
        $user->tambahUser();
    }
    else
    {
        $user->getUserAktif();
    }
}
else
{
    $user->getUserAktif();
}
