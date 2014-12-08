<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:31
 * 
 */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

require(realpath(dirname(__FILE__)) . '\lib\sekolah.php');
require(realpath(dirname(__FILE__)) . '\lib\api.php');
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
}
else
{
    $sekolah->getDataSekolah();
}

//
