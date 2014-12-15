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

    public function setHash($hash)
    {
        $this->_hash = $hash;
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

        return $ex->getExtension();
    }


    /**
     * @param mixed $namaFile
     */
    public function setNamaFile($namaFile)
    {
        $namaFile= basename($namaFile);
        $this->_namaFile = $namaFile;
    }

    /**
     * @param mixed $base
     */
    public function setBase($base)
    {
        $this->_base = $base;
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

    protected function tambahBerkas()
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
        $file=$berkas;
        $target_dir = "uploads/";
        $target_file = $target_dir . $this->_namaFile;
        move_uploaded_file($file["berkas"]["tmp_name"], $target_file);

        $bucket = 'berkasosi';
        $keyname = Berkas::fileHashing($target_file).".".Berkas::getExtensi($file["berkas"]["name"]);;
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
            echo $result['ObjectURL'] . "\n";
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
    }


} 