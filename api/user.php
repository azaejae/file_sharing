<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 05/12/2014
 * Time: 16:56
 */
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
require(realpath(dirname(__FILE__)) . '/lib/user.php');
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
    elseif($_GET['menu']=='ubah')
    {
        if(isset($_POST['username']))
        {
            $user->setValueUbah($_POST['username'],$_POST['nama_user'],$_POST['alamat'],$_POST['email']);
            $user->ubahProfile();
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Data tidak boleh ada yang kosong');
            echo json_encode($hasil);
        }

    }
    elseif($_GET['menu']=='ubahpass')
    {
        if(isset($_GET['access_key']))
        {
            $user->ubahPassword($_GET['access_key'],$_POST['pass_lama'],$_POST['pass_baru']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Password Lama anda tidak sama');
            echo json_encode($hasil);
        }
    }elseif($_GET['menu']=='hapus')
    {
        if(isset($_GET['username']))
        {
            $user->hapusPengguna($_GET['username']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Username tidak ada');
        }
    }
    else
    {
        $user->getUserAktif();
    }
}
elseif(isset($_GET['detail']))
{
    $detail=$_GET['detail'];
    $user->getDetailUser($detail);
}
else
{
    $user->getUserAktif();
}
