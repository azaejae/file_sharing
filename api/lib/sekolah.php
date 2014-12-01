<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:13
 * 
 */

class Sekolah {
    /*
     * Property
     */
    private $_NPSN;
    private $_nama_sekolah;
    private $_alamat_sekolah;
    private $_status;
    private $_logo;
    protected $_db;

    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db = DbConn::getConnection();
    }

    public function setAtribut($NPSN,$nama_sekolah,$alamat_sekolah,$status)
    {
        $this->_NPSN=$NPSN;
        $this->_nama_sekolah=$nama_sekolah;
        $this->_alamat_sekolah=$alamat_sekolah;
        $this->_status=$status;
    }

    public function uploadLogo($logo)
    {

    }

    public function tambahSekolah()
    {
        $sql='INSER INTO sekolah VALUES(:NPSN,:nama_sekolah,:alamat,:status,:logo)';
        $ex=$this->_db->prepare($sql);
        $ex->execute(array('NPSN'=>$this->_NPSN,
                            'nama_sekolah'=>$this->_nama_sekolah,
                            'alamat'=>$this->_alamat_sekolah,
                            'status'=>$this->_status,
                            'logo'=>'logo.jpg'));

    }
}