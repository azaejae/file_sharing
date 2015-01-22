<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 27/11/2014
 * Time: 19:05
 */

require(realpath(dirname(__FILE__)) . '/vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
class Berkas
{
    //property berkas
    protected $_hash;
    protected $_extensiBerkas;
    protected $_namaFile;
    protected $_base;
    protected $_ukuran;
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

    protected function setExtensiBerkas()
    {
        $ex=new SplFileInfo($this->_namaFile);

        $this->_extensiBerkas=$ex->getExtension();
    }

    public static function getExtensi($berkas)
    {
        $ex= new SplFileInfo($berkas);

        return strtolower($ex->getExtension());
    }


    /**
     * @param mixed $base
     */
    protected function setBase()
    {
        $this->_base = "http://cdn.osindonesia.org/";
    }

    /**
     * @param mixed $ukuran
     */
    protected function setUkuran($ukuran)
    {

        $this->_ukuran = filesize($ukuran);
    }

    //chech hash
    public static function fileHashing($file)
    {
        $hash = md5_file($file);
        return $hash;
    }
    public function cariHash($hash)
    {
        $sql=('SELECT hash FROM berkas WHERE hash LIKE ?');
        $exe=$this->_db->prepare($sql);
        $exe->execute(array($hash));
        $hitung=$exe->rowCount();

        if($hitung>0)
        {
            return $hash;
        }
        else
        {
            return 0;
        }

    }

    public function tambahBerkas()
    {
        $sql= 'INSERT INTO berkas(hash,ekstensi_berkas,nama_file,base,ukuran) VALUES(:hash,:ekstensi_berkas,:nama_file,:base,:ukuran)';
        try {

            $exe = $this->_db->prepare($sql);
            $exe->execute(array(':hash' => $this->_hash,
                ':ekstensi_berkas' => $this->_extensiBerkas,
                ':nama_file' => $this->_namaFile,
                ':base' => $this->_base,
                ':ukuran' => $this->_ukuran));

            $hasil=array('hasil'=>'berhasil','hash'=>$this->_hash);
            echo json_encode($hasil);
        }
        catch(PDOException $e)
        {
            $hasil=array('hasil'=>'gagal','pesan'=>$e->getMessage().' '.$e->getCode());
            echo json_encode($hasil);
        }
    }

    public function getBerkas($hash=null)
    {
        if($hash!=null)
        {
            $sql=('SELECT * FROM berkas WHERE hash LIKE ?');
            $exe=$this->_db->prepare($sql);
            $exe->execute(array($hash));
            $data=$exe->fetchAll(PDO::FETCH_ASSOC);
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

    public function unggahBerkas($berkas)
    {
        ini_set('max_execution_time', 0);
        $file=$berkas;
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file['berkas']['name']);
        move_uploaded_file($file["berkas"]["tmp_name"], $target_file);

        $bucket = 'berkasosi';
        $this->setUkuran($target_file);
        $this->setBase();
        $this->_hash=$this->fileHashing($target_file);
        $keyname = $file['berkas']['name'].".".$this->getExtensi($file["berkas"]["name"]);
        $this->_namaFile=str_replace(' ','_',$keyname);
        $this->setExtensiBerkas();
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
                'Key'    => $this->_namaFile,
                'SourceFile'   => $filepath,
                'ACL'    => 'public-read'
            ));



            // Print the URL to the object.
            //echo $result['ObjectURL'] . "\n";
            unlink($target_file);
        } catch (S3Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     *destructor
     */
    public function __destruct()
    {
        $this->_db=null;
    }


} 