<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 13-Jan-15
 * Time: 10:34
 * 
 */
require(realpath(dirname(__FILE__)) . '/lib/api.php');
require(realpath(dirname(__FILE__)) . '/lib/bse.php');
$api=new Api();
$api->auth();
$bse= new Bse();
$bse->getBSE();