<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:31
 * 
 */
//header('Access-Control-Allow-Origin: *');

require(realpath(dirname(__FILE__)) . '\lib\sekolah.php');
require(realpath(dirname(__FILE__)) . '\lib\api.php');
Api::auth();
//ini_set('max_execution_time',0);
$sekolah=new Sekolah();
//$sekolah->setAtribut('20237414','SMKN 3 Karawang','Jl. Kondang Jaya Klari Karawang','Negeri');
//$sekolah->uploadLogo($_FILES);
//$sekolah->tambahSekolah();
$sekolah->getDataSekolah();