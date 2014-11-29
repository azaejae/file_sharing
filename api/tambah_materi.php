<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 29/11/2014
 * Time: 19:34
 */
require(realpath(dirname(__FILE__)) . '\lib\materi.php');

$materi = new Materi();
if(isset($_GET['cek']))
{
    $hasil=array('result'=>$materi->cariHash($_POST['hash']));
    echo json_encode($hasil);
}
