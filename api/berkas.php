<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 13:52
 */
ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: *');
require(realpath(dirname(__FILE__)) . '/lib/berkas.php');

//DbConn::getConnection();
/*$berkas= new Berkas();
$berkas->setHash(Berkas::fileHashing('berkas.php'));
$berkas->setBase('http://poliga.me');
$berkas->setNamaFile('berkas.php');
$berkas->setUkuran(1254512);
//$berkas->tambahBerkas();
$berkas->getBerkas();
*/
$berkas= new Berkas();
//echo $berkas->cariHash('a1f3c2300f5cbf1992a90211d45ed331');
if(isset($_GET['menu']))
{
    if($_GET['menu']=='check')
    {
        $hash=$berkas->cariHash($_GET['hash']);
        $hasil=array('hasil'=>'berhasil','pesan'=>$hash);
        echo json_encode($hasil);
    }
    elseif($_GET['menu']=='unggah')
    {
        $berkas->unggahBerkas($_FILES);
        $berkas->tambahBerkas();
    }
    else
    {

    }
}
