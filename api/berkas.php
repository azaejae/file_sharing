<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 13:52
 */
require(realpath(dirname(__FILE__)) . '\lib\berkas.php');

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
echo Berkas::fileHashing('berkas.php');

