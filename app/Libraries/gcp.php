<?php

namespace App\Libraries;
/*require 'vendor/autoload.php';*/
//require __DIR__ . '/vendor/autoload.php';
require ('vendor/autoload.php');
use Google\Cloud\Core\ServiceBuilder;
use Google\Cloud\Storage\StorageClient;


/*$gcloud = new ServiceBuilder([
    'keyFilePath' => 'mobileapp-print-f9a802fd93c6.json',
    'projectId' => '943953297255'
]);*/
class gcp{
function gcpUpload($uploadFile,$filename)
{
	$bucketName='visuals.dbnewshub.com';
    $storage = new StorageClient([
    'keyFilePath' => 'mobileapp-print-f9a802fd93c6.json',
    'projectId' => '943953297255'
    ]);

    $bucket = $storage->bucket($bucketName);
    $success= $bucket->upload(fopen($uploadFile, 'r'),['name' => 'bhaskar/bhopal-app/abc-game/'.$filename]);
    if($success){
    	return true;
    }else{
    	return false;
    }
   /* foreach ($bucket->objects() as $object) {
        printf('Object: %s' . PHP_EOL, $object->name());
    }*/
}
}

?>