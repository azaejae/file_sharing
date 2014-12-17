<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 13-Dec-14
 * Time: 12:35
 * 
 */

require(realpath(dirname(__FILE__)) . '/user.php');
class Kelas extends User{

    //property
    protected $_username;
    protected $_id_kelas;
    protected $_nama_kelas='matematika';
    protected $_tingkat;
    protected $_tujuan_kelas;
    protected $_deskripsi_kelas;
    protected $_db;

    //method
    //constructor

    public function __construct()
    {
        require 'DbConn.php';
        $this->_db=DbConn::getConnection();

    }

    //set value
    public function setValueKelas($nama_kelas,$tingkat,$tujuan_kelas,$deskripsi_kelas)
    {
        if(User::cekAccessKey($_GET['access_key']))
        {
            $this->_username=$this->getAksesUsername($_GET['access_key']);
            $this->_nama_kelas = $nama_kelas;
            $this->_tingkat = $tingkat;
            $this->_tujuan_kelas = $tujuan_kelas;
            $this->_deskripsi_kelas = $deskripsi_kelas;
        }

    }



    protected function generateIdKelas()
    {
        $datetime=new DateTime('NOW');
        $waktu=$datetime->format('H:i:s');
        $hash=md5($this->_nama_kelas.$waktu);
        $id_kelas=substr($hash,0,10);
        return $id_kelas;
    }


    //tambah kelas
    public function tambahKelas()
    {
        if(User::cekAccessKey($_GET['access_key']))
        {
            $this->getAksesUsername($_GET['access_key']);

            $sql='INSERT INTO kelas(id_kelas,username,nama_kelas,tingkat,tujuan_kelas,deskripsi_kelas) VALUES(:id_kelas,:username,:nama_kelas,:tingkat,:tujuan_kelas,:deskripsi_kelas)';
            try{
                $exe=$this->_db->prepare($sql);
                $exe->execute(array('id_kelas'=>$this->generateIdKelas(),
                                    'username'=>$this->_username,
                                    'nama_kelas'=>$this->_nama_kelas,
                                    'tingkat'=>$this->_tingkat,
                                    'tujuan_kelas'=>$this->_tujuan_kelas,
                                    'deskripsi_kelas'=>$this->_deskripsi_kelas));

                $hasil=array('hasil'=>'berhasil','pesan'=>'Kelas berhasil dibuat');
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
            $hasil=array('hasil'=>'gagal','pesan'=>'akses ditolak');
            echo json_encode($hasil);
        }
    }

    //get kelas
    public function getKelas()
    {
        $sql='SELECT * FROM v_pengajar_kelas_dari_sekolah';
        $hasil=$this->_db->query($sql);
        $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
        $data=array('data'=>$data);
        echo json_encode($data);
    }

    //get pengajar di kelas
    public function pengajarKelas()
    {
        if(isset($_GET['access_key']))
        {
            $this->getAksesUsername($_GET['access_key']);
            $sql='SELECT * FROM v_pengajar_kelas_dari_sekolah WHERE id_pengajar=:username';
            try{
                $exe=$this->_db->prepare($sql);
                $exe->execute(array('username'=>$this->_username));
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
    }

    //detail kelas
    public function detailKelas($id_kelas)
    {
        $sql="SELECT * FROM v_detail_kelas WHERE id_kelas=:id_kelas";
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('id_kelas'=>$id_kelas));
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

    //get materi kelas
    public function getMateriKelas($id_kelas)
    {
        $sql="SELECT * FROM v_materi_kelas WHERE id_kelas=:id_kelas";
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('id_kelas'=>$id_kelas));
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
}
