<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 21-Dec-14
 * Time: 18:22
 * 
 */
require(realpath(dirname(__FILE__)) . '/user.php');
class Materi {
    protected $_db;
    protected $_id_materi;
    protected $_hash;
    protected $_id_kelas;
    protected $_judul_materi;
    protected $_deskripsi_materi;
    protected $_tujuan_materi;
    protected $_author;

    //constructor
    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db = DbConn::getConnection();
    }

    //set value class
    public function setValue($hash,$id_kelas,$judul_materi,$deskripsi_materi,$tujuan_materi,$author)
    {
        if($author==null)
        {
            $this->_author=null;
        }
        else
        {
            $this->_author=$author;
        }
        $this->_id_kelas=$id_kelas;
        $this->_hash=$hash;
        $this->_judul_materi=$judul_materi;
        $this->_deskripsi_materi=$deskripsi_materi;
        $this->_tujuan_materi=$tujuan_materi;
        $this->idMateriGenerator();

    }

    //tambah materi ke basis data
    public function tambahMateri()
    {
        $sql="INSERT INTO materi VALUES(:id_materi,:hash,:id_kelas,:judul_materi,:deskripsi_materi,:tujuan_materi,:author)";
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('id_materi'=>$this->_id_materi,
                                'hash'=>$this->_hash,
                                'id_kelas'=>$this->_id_kelas,
                                'judul_materi'=>$this->_judul_materi,
                                'deskripsi_materi'=>$this->_deskripsi_materi,
                                'tujuan_materi'=>$this->_tujuan_materi,
                                'author'=>$this->_author
                ));
                $hasil=array('hasil'=>'berhasil','pesan'=>'materi berhasil ditambahkan');
                echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage()." code ".$e->getCode());
            echo json_encode($hasil);
        }
    }

    protected function idMateriGenerator()
    {
        $datetime=new DateTime('NOW');
        $waktu=$datetime->format('H:i:s');
        $acak=substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),0,20);
        $this->_id_materi=substr(md5($acak.$waktu),0,20);
    }

    //get jumlah materi non dinas
    public function getJumlahMateri()
    {
        $sql='SELECT COUNT(*) AS jumlah_materi FROM v_materi';
        try{
            $exe=$this->_db->query($sql);
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
            $hasil=array('data'=>$data);
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    //get jumlah BSE
    public function getJumlahBSE()
    {
        $sql='SELECT COUNT(*) AS jumlah_bse FROM v_bse';
        try{
            $exe=$this->_db->query($sql);
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
            $hasil=array('data'=>$data);
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    //get daftar materi pengajar
    public function getMateri($access_key)
    {
        $user= new User();
        $username=$user->getUsername($access_key);
        $sql='SELECT id_materi, judul_materi, deskripsi_materi, tujuan_materi, nama_kelas, author, href FROM v_materi_kelas WHERE username=:username';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username));
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
            $hasil=array('data'=>$data);
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }

    }

    //hapus materi
    public function hapusMateri($id_materi)
    {
        if(User::cekAccessKey())
        {
            $sql='DELETE FROM materi WHERE id_materi=:id_materi';
            try{
                $exe=$this->_db->prepare($sql);
                $exe->execute(array('id_materi'=>$id_materi));
                $hasil=array('hasil'=>'berhasil','Materi berhasil dihapus');
                echo json_encode($hasil);
            }
            catch(PDOException $e)
            {
                $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
                echo json_encode($hasil);
            }
        }
        else
        {
            $hasil=array('hasil'=>'gagal','pesan'=>'Akses ditolak');
            echo json_encode($hasil);
        }


    }


}
//$mater = new Materi();
//$mater->hapusMateri('1a607183bf133a836b62');