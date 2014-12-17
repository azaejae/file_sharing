<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 08-Dec-14
 * Time: 19:21
 * 
 */

require(realpath(dirname(__FILE__)) . '/user.php');
class Pengajar extends User {



    //method

    //constructor

    //tambah user ke dalam basis data
    public function tambahPengajar()
    {
        parent::securePass();
        try {


            $sql = 'INSERT INTO user(`username`,`npsn`,`id_jenis_user`,`password`,`nama_user`,`alamat`,`email`,`foto`) VALUES(:username,:npsn,:id_jenis_user,:password,:nama_user,:alamat,:email,:foto)';
            $exe = $this->_db->prepare($sql);
            $exe->execute(array('username' => $this->_username,
                'npsn' => $this->_NPSN,
                'id_jenis_user' => $this->_id_jenis_user,
                'password' => $this->_password,
                'nama_user' => $this->_nama_user,
                'alamat' => $this->_alamat,
                'email' => $this->_email,
                'foto' => $this->_foto));

            $this->insertKeygen();

            $pesan=array('hasil'=>'berhasil','pesan'=>'Terima kasih telah mendaftar, Silakan tunggu aktivasi akun oleh admin');
            echo json_encode($pesan);
        }
        catch(PDOException $e)
        {
            $pesan=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($pesan);
            //echo $e->getMessage();
        }

    }

    //otentikasi pengajar
    public function pengajarAuth($username,$password)
    {
        $key=$this->getKeygen($username);
        $pass=$password.$key;
        $pass=hash('sha256',$pass);
        try{
            $sql='SELECT username,password FROM user WHERE username=:username AND password=:password AND id_jenis_user = 2';
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username,'password'=>$pass));
            if($exe->rowCount()>0)
            {
                $this->accessKeyGenerator($username);
                $hasil=array('hasil'=>'berhasil','access_key'=>$this->_access_key);
                echo json_encode($hasil);
            }
            else
            {
                $pesan=array('hasil'=>'gagal','pesan'=>'username atau password salah');
                echo json_encode($pesan);
            }
        }
        catch (PDOException $e)
        {
            $pesan=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($pesan);
        }
    }

    //get pengajar
    public function getPengajar()
    {
        $sql="SELECT npsn, nama_sekolah, nama_user as nama_pengajar, username as id_pengajar FROM v_pengguna WHERE jenis_user='pengajar'";
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


}