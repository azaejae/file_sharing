<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Z. Abdilah
 * NIM : 10110163
 * Date: 01-Dec-14
 * Time: 20:13
 * 
 */

require(realpath(dirname(__FILE__)) . '/vendor/autoload.php');
require(realpath(dirname(__FILE__)) . '/berkas.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
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
    protected $_tmp;

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
        ini_set('max_execution_time', 0);
        $berkas=$logo;

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($berkas["logo"]["name"]);
        move_uploaded_file($berkas["logo"]["tmp_name"], $target_file);

        $bucket = 'statikosi';
        $keyname = Berkas::fileHashing($target_file).".".Berkas::getExtensi($berkas["logo"]["name"]);
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
            $this->_logo=$result['ObjectURL'];
        } catch (S3Exception $e) {
            //echo $e->getMessage() . "\n";
           // echo json_encode(array('result'=>'gagal','pesan'=>$e->getMessage()));
            $this->_logo='https://statikosi.s3.amazonaws.com/logo.png';
        }
    }

    public function tambahSekolah()
    {
        try{
            $sql='INSERT INTO sekolah VALUES(:npsn,:nama_sekolah,:alamat,:status,:logo)';
            $ex=$this->_db->prepare($sql);
            $ex->execute(array('npsn'=>$this->_NPSN,
                'nama_sekolah'=>$this->_nama_sekolah,
                'alamat'=>$this->_alamat_sekolah,
                'status'=>$this->_status,
                'logo'=>$this->_logo));
            $hasil=array('hasil'=>'berhasil','pesan'=>'Sekolah '.$this->_nama_sekolah.' berhasil ditambahkan ke dalam basis data');
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
        }


    }
    //menampilkan data sekolah yang ada di sistem

    public function getDataSekolah()
    {
        $sql='SELECT * FROM sekolah';
        $hasil=$this->_db->query($sql);
        $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
        $data=array('data'=>$data);
        echo json_encode($data);
    }

    //data autocomplete sekolah
    public function getAutoCompleteData()
    {
        $sql='SELECT nama_sekolah as label,npsn FROM sekolah WHERE npsn <> 1';
        if(isset($_GET['term']))
        {
            $nama=$_GET['term'];
            $sql="SELECT nama_sekolah as label,npsn FROM sekolah WHERE nama_sekolah LIKE '%$nama%' AND npsn <> 1";
        }

        try{

            $hasil=$this->_db->query($sql);
            $data=$hasil->fetchAll(PDO::FETCH_ASSOC);
            //$data=array('data'=>$data);
            echo json_encode($data);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage());
            echo json_encode($hasil);
        }
    }

    //hapus Sekolah
    public function hapusSekolah($npsn)
    {
        $sql='DELETE FROM sekolah WHERE npsn=:npsn';
        try{
            $exe=$this->_db->prepare($sql);
            $exe->execute(array('npsn'=>$npsn));
        }
        catch(PDOException $e)
        {

        }
    }

    public function __destruct()
    {
        $this->_db=null;
    }
}

//$sekolah= new Sekolah();
//$sekolah->getAutoCompleteData();
//$sekolah->getDataSekolah();