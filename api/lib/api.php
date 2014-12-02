<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 02-Dec-14
 * Time: 15:10
 * 
 */
require_once "DbConn.php";
class Api {
    //property
    protected $_db;

    public function __construct()
    {
        $this->_db=DbConn::getConnection();
    }

    public static function auth()
    {
        if((isset($_GET['api_key']))&&(isset($_GET['secret'])))
        {
            $url=parse_url($_SERVER["HTTP_REFERER"]);
            $url=$url['host'];
            $api_key=$_GET['api_key'];
            $secret=$_GET['secret'];
            $koneksi=DbConn::getConnection();
            $sql='SELECT api_key,secret,alamat_domain FROM api_access WHERE api_key = :api_key AND secret = :secret AND alamat_domain = :origin ';
            $exe= $koneksi->prepare($sql);
            $exe->execute(array(':api_key'=>$api_key,':secret'=>$secret,':origin'=>$url));
            $hasil=$exe->rowCount();

            if($hasil>0)
            {
                header('Access-Control-Allow-Origin: *');
            }
            else
            {
                header('Access-Control-Allow-Origin: *');
                $hasil=array('hasil'=>'akses ditolak');
                echo json_encode($hasil);
                exit;
            }
        }
        else
        {
            header('Access-Control-Allow-Origin: *');
            $hasil=array('hasil'=>'akses ditolak');
            echo json_encode($hasil);
            exit;
        }
    }


} 