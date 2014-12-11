<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 11:16
 * */

require(realpath(dirname(__FILE__)) . '\vendor\autoload.php');
require(realpath(dirname(__FILE__)) . '\berkas.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;



class User {
//Property
    protected $_username;
    protected $_NPSN;
    protected $_id_jenis_user;
    protected $_password;
    protected $_nama_user;
    protected $_alamat;
    protected $_email;
    protected $_foto="https://statikosi.s3.amazonaws.com/logo.png";
    protected $_db;
    protected $_keygen;
    protected $_tmp;
    protected $_access_key;


    //method
    //constructor
    /**
     *
     */
    public function __construct()
    {
        require_once "DbConn.php";
        $this->_db = DbConn::getConnection();

    }
    //setter atribut
    public function setValue($username,$npsn,$jenis_user,$password,$nama_user,$alamat,$email)
    {
        $this->_username=$username;
        $this->_NPSN=$npsn;
        $this->_id_jenis_user=$jenis_user;
        $this->_password=$password;
        $this->_nama_user=$nama_user;
        $this->_alamat=$alamat;
        $this->_email=$email;
    }
        //foto uploader
    public function uploadFoto($foto)
    {
        $berkas=$foto;

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($berkas["foto"]["name"]);
        move_uploaded_file($berkas["foto"]["tmp_name"], $target_file);

        $bucket = 'statikosi';
        $keyname = Berkas::fileHashing($target_file).".".Berkas::getExtensi($berkas["foto"]["name"]);
        // $filepath should be absolute path to a file on disk
        $filepath = $target_file;

        // Instantiate the client.
        $s3 = S3Client::factory(array(
            'key'    => 'AKIAJNBAJZYQ3RX7HM3Q',
            'secret' => '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'
        ));

        try {
            // Upload data.
            $result = $s3->putObject(array(
                'Bucket' => $bucket,
                'Key'    => $keyname,
                'SourceFile'   => $filepath,
                'ACL'    => 'public-read'
            ));



            // Print the URL to the object.
            //echo $result['ObjectURL'] . "\n";
            //echo json_encode(array("result"=>"berhasil","url"=>$result['ObjectURL']));
            //unlink($target_file);
            $this->_tmp=$target_file;
            unlink($this->_tmp);
            $this->_foto=$result['ObjectURL'];
        } catch (S3Exception $e) {
            //echo $e->getMessage() . "\n";
            //echo json_encode(array('result'=>'gagal','pesan'=>$e->getMessage()));
            $this->_foto='https://statikosi.s3.amazonaws.com/logo.png';
        }
    }
    //tambah user ke database
    public function tambahUser()
    {
        $this->securePass();
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

            $pesan=array('hasil'=>'berhasil','pesan'=>'User berhasil ditambahkan kedalam basis data');
            echo json_encode($pesan);
        }
        catch(PDOException $e)
        {
            $pesan=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($pesan);
            //echo $e->getMessage();
        }

    }
    //salt generator
    protected function generateSalt()
    {
        $iv = mcrypt_create_iv(16, MCRYPT_DEV_RANDOM);
        $iv=base64_encode($iv);
        $this->_keygen=$iv;
    }

    //securing password
    protected function securePass()
    {
        $this->generateSalt();
        $pass=$this->_password.$this->_keygen;
        $pass=hash('sha256',$pass);
        $this->_password=$pass;
    }

    //get User salt
    protected function getKeygen($username)
    {
        try{
            $sql='SELECT keygen FROM slt WHERE username = :username';
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username));
            if($exe->rowCount()==1)
            {
                $row  = $exe->fetchColumn();
                return $row;
            }
            else
            {
                return '123456789123456789123456';
            }
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    protected function insertKeygen()
    {
        try {
            $sql2 = 'INSERT INTO slt VALUES(:username,:keygen)';
            $exe = $this->_db->prepare($sql2);
            $exe->execute(array('username' => $this->_username, 'keygen' => $this->_keygen));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    //user authentication
    public function userAuth($username,$password)
    {
        $key=$this->getKeygen($username);
        $pass=$password.$key;
        $pass=hash('sha256',$pass);
        try{
            $sql='SELECT username,password FROM user WHERE username=:username AND password=:password AND id_jenis_user=1';
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

    //access id generator
    protected function accessKeyGenerator($username)
    {
        $datetime=new DateTime('NOW');
        $datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
        $valid=$datetime->modify('+1 day');
        $key=$valid->format('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $access_key=hash('md5',$key);
        try{
            $cleaner=$this->_db->prepare('DELETE FROM access_key WHERE username= :username');
            $cleaner->execute(array('username'=>$username));
            $sql='INSERT INTO access_key VALUES(:username,:access_key,:valid,:ip)';
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username,'access_key'=>$access_key,'valid'=>$key,'ip'=>$ip));
            $this->_access_key=$access_key;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }



    }
    //daftar user aktif
    public function getUserAktif(){
        $sql='SELECT * FROM v_pengguna';
        try{
            $hasil=$this->_db->query($sql);
            $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
            $data=array('data'=>$data);
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            $data=array('data'=>$e->getMessage());
            echo json_encode($data);
        }
    }

    //cek password
    protected function cekPassword($username,$pass)
    {
        $sql='SELECT username,password FROM user WHERE username=:username AND password=:password';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('username'=>$username,'password'=>$pass));
            $hasil=$exe->rowCount();
            if($hasil==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e)
        {
            //echo $e->getMessage();
            return false;

        }
    }

    //get username
    protected function getAksesUsername($access_key)
    {
        $sql='SELECT username FROM v_akses_user WHERE access_key=:access_key';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('access_key'=>$access_key));
            $row  = $exe->fetchColumn();
            $this->_username=$row;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Ubah password
    public  function ubahPassword($access_key,$pass_lama,$pass_baru)
    {
        $this->getAksesUsername($access_key);
        $key=$this->getKeygen($this->_username);
        $pass=$pass_lama.$key;
        $pass=hash('sha256',$pass);
        $passbaru=$pass_baru.$key;
        $passbaru=hash('sha256',$passbaru);
        if($this->cekPassword($this->_username,$pass))
        {
            try{
                $sql='UPDATE user SET password=:password WHERE username=:username';
                $gantipass=$this->_db->prepare($sql);
                $gantipass->execute(array('password'=>$passbaru,'username'=>$this->_username));

                $hasil=array('hasil'=>'berhasil','pesan'=>'Password berhasil diubah');
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
            $hasil=array('hasil'=>'gagal','pesan'=>'Password Lama anda tidak sama');
            echo json_encode($hasil);
        }
    }

    //detail user
    public function getDetailUser($key)
    {
        $sql='SELECT nama_user,nama_sekolah,email,alamat,foto,username FROM v_akses_user WHERE access_key=:access_key';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('access_key'=>$key));
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
            $hasil=array('data'=>$data);
            echo json_encode($hasil);
        }catch (PDOException $e)
        {
            $hasil=array('data'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    //ubah profile
    public function setValueUbah($username,$nama,$alamat,$email)
    {
        $this->_username=$username;
        $this->_nama_user=$nama;
        $this->_alamat=$alamat;
        $this->_email=$email;
    }
    public function ubahProfile()
    {
        $sql='UPDATE user SET nama_user=:nama_user,alamat=:alamat,email=:email WHERE username=:username';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('nama_user'=>$this->_nama_user,'alamat'=>$this->_alamat,'email'=>$this->_email,'username'=>$this->_username));

            $hasil=array('hasil'=>'berhasil','pesan'=>'Perubahan profile berhasil dilakukan');
            echo json_encode($hasil);
        }
        catch(PDOException $e){
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }

    }


    public function __destruct()
    {
        $this->_db=null;
    }




}
//$user=new User();
//$user->getUserAktif();
//$user->setValue('azaejae','1','1','master','ahmad zaelani','karawang','ahmad@ahmad.com');
//$user->tambahUser();
//$user->userAuth('azaejae','master');
//$user->ubahPassword('e919392b8f86d07090c12953e158d86f','master','rahasia');
//$user->getDetailUser('a80199fc09829ea255b763230549a03e');

