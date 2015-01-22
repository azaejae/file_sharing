<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 14-Dec-14
 * Time: 14:33
 * 
 */

ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
//require(realpath(dirname(__FILE__)) . '/lib/sekolah.php');
require(realpath(dirname(__FILE__)) . '/lib/kelas.php');
require(realpath(dirname(__FILE__)) . '/lib/api.php');

$api = new Api();
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
        if(isset($_GET['pengajar']))
        {
            $api->auth();
            $kelas->pengajarKelas($_GET['pengajar']);
        }
        else
        {
            $api->auth();
            $kelas->pengajarKelas();
        }

    }
    elseif($_GET['menu']=='detail')
    {
        if(isset($_GET['id_kelas']))
        {
            $kelas->detailKelas($_GET['id_kelas']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'id kelas tidak boleh kosong');
            echo json_encode($hasil);
        }

    }elseif($_GET['menu']=='materi')
    {
        if(isset($_GET['id_kelas']))
        {
            $kelas->getMateriKelas($_GET['id_kelas']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'id kelas tidak boleh kosong');
            echo json_encode($hasil);
        }
    }
    elseif($_GET['menu']=='hapus')
    {
        if(isset($_GET['id_kelas']))
        {
            $kelas->hapusKelas($_GET['id_kelas']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'id kelas tidak boleh kosong');
            echo json_encode($hasil);
        }
    }
    else
    {
        $api->auth();
        if(isset($_GET['npsn']))
        {
            $kelas->getKelas($_GET['npsn']);
        }
        else
        {
            $kelas->getKelas();
        }

    }
}
else
{
    $api->auth();
    if(isset($_GET['npsn']))
    {
        $kelas->getKelas($_GET['npsn']);
    }
    else
    {
        $kelas->getKelas();
    }
}