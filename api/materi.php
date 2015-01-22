<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 22:56
 */
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
require(realpath(dirname(__FILE__)) . '/lib/materi.php');
//require(realpath(dirname(__FILE__)) . '/lib/user.php');
$materi= new Materi();
if(isset($_GET['menu']))
{
    if($_GET['menu']=='tambah')
    {
        if(User::cekAccessKey())
        {
            $materi->setValue($_POST['id_materi'],$_POST['id_kelas'],$_POST['judul_materi'],$_POST['deskripsi_materi'],$_POST['tujuan_materi'],$_POST['author']);
            $materi->tambahMateri();
        }

    }
    elseif($_GET['menu']=='materi')
    {
        if(isset($_GET['access_key']))
        {
            $materi->getMateri($_GET['access_key']);
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Akses ditolak');
            echo json_encode($hasil);
        }

    }
    elseif($_GET['menu']=='hapus')
    {
        if((isset($_GET['access_key']))&&(isset($_GET['id_materi'])))
        {
            $materi->hapusMateri($_GET['id_materi']);

        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Akses ditolak');
            echo json_encode($hasil);
        }
    }
    else
    {

    }
}

