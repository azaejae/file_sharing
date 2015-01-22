<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 13-Jan-15
 * Time: 10:34
 * 
 */

class Bse {
//constructor
    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db = DbConn::getConnection();
    }

    //get BSE
    public function getBSE()
    {
        $sql='SELECT * FROM v_bse';
        $hasil=$this->_db->query($sql);
        $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
        $data=array('data'=>$data);
        echo json_encode($data);
    }



}