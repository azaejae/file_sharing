<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 02-Dec-14
 * Time: 15:10
 * 
 */
class Api {
    //property
    protected $_db;

    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db=DbConn::getConnection();
    }

    //api authentication
    public static function auth()
    {
        if((isset($_GET['api_key']))&&(isset($_GET['secret'])))
        {
            $api_key=$_GET['api_key'];
            $secret=$_GET['secret'];
            $koneksi=DbConn::getConnection();
            $sql="SELECT api_key,secret,alamat_domain FROM api_access WHERE api_key = :api_key AND secret = :secret";
            $exe= $koneksi->prepare($sql);
            $exe->execute(array(':api_key'=>$api_key,':secret'=>$secret));
            $hasil=$exe->rowCount();

            if($hasil>0)
            {
                header('Access-Control-Allow-Origin: *');
            }
            else
            {
                header('Access-Control-Allow-Origin: *');
                $hasil=array('hasil'=>'gagal','pesan'=>'Akses ditolak');
                echo json_encode($hasil);
                exit;
            }
        }
        else
        {
            header('Access-Control-Allow-Origin: *');
            $hasil=array('hasil'=>'gagal','pesan'=>'Akses ditolak');
            echo json_encode($hasil);
            exit;
        }
    }
    //api generator

    public function __destruct()
    {
        $this->_db=null;
    }


} 