<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 27/11/2014
 * Time: 19:05
 */

class Berkas
{

    //property berkas
    private $_hash;
    private $_extensiBerkas='docx';
    private $_namaFile;
    private $_base;
    private $_ukuran;
    protected $_db;


    //constructor
    /**
     *
     */
    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db = DbConn::getConnection();

    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->_hash;
    }

    public function setHash($hash)
    {
        $this->_hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getExtensiBerkas()
    {
        return $this->_extensiBerkas;
    }

    /**
     * @return mixed
     */
    public function getNamaFile()
    {
        return $this->_namaFile;
    }

    /**
     * @param mixed $namaFile
     */
    public function setNamaFile($namaFile)
    {
        $this->_namaFile = $namaFile;
    }

    /**
     * @return mixed
     */
    public function getBase()
    {
        return $this->_base;
    }

    /**
     * @param mixed $base
     */
    public function setBase($base)
    {
        $this->_base = $base;
    }

    /**
     * @return mixed
     */
    public function getUkuran()
    {
        return $this->_ukuran;
    }

    /**
     * @param mixed $ukuran
     */
    public function setUkuran($ukuran)
    {
        $this->_ukuran = $ukuran;
    }

    //chech hash
    public static function fileHashing($file)
    {
        $hash = md5_file($file);
        return $hash;
    }
    public static function cariHash($hash)
    {

    }

    public function tambahBerkas()
    {
        $sql= 'INSERT INTO berkas(hash,ekstensi_berkas,nama_file,base,ukuran) VALUES(:hash,:ekstensi_berkas,:nama_file,:base,:ukuran)';
        $exe=$this->_db->prepare($sql);
        $exe->execute(array(':hash'=>$this->getHash(),
                            ':ekstensi_berkas'=>$this->getExtensiBerkas(),
                            ':nama_file'=>$this->getNamaFile(),
                            ':base'=>$this->getBase(),
                            ':ukuran'=>$this->getUkuran()));
    }

    public function getBerkas($hash=null)
    {
        if($hash!=null)
        {

        }
        else
        {
            $sql='SELECT * FROM berkas';
            $hasil=$this->_db->query($sql);
            $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
        }


        $data=array('hasil'=>$data);
        echo json_encode($data);
    }

    /**
     *destructor
     */
    public function __destruct()
    {
    }





} 