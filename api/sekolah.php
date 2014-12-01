<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:31
 * 
 */
require(realpath(dirname(__FILE__)) . '\lib\sekolah.php');
$sekolah=new Sekolah();
$sekolah->setAtribut('20237395','SMK Al-Munawar Karawang','Jl. Raya Tamelang Mekarsari-Purwasari','Swasta');
$sekolah->tambahSekolah();