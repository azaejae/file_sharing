<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 13:52
 */
require(realpath(dirname(__FILE__)) . '\lib\berkas.php');

//DbConn::getConnection();
$berkas= new Berkas();
$berkas->setHash(Berkas::checkHash('berkas.php'));
$berkas->setBase('http://poliga.me');
$berkas->setNamaFile('berkas.php');
$berkas->setUkuran(1254512);
//$berkas->tambahBerkas();
$berkas->getBerkas();

