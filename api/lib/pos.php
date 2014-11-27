<?php

// dddddIdasdasdasdasdasdasdasdadnclude the AWS SDK using theddd Composer autoloader.
//require 'vendor/autoload.php'; add some galau
require(realpath(dirname(__FILE__)) . '/vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

//created by azaejae
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$bucket = 'ahmadza';
$keyname = basename($_FILES["fileToUpload"]["name"]);
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
