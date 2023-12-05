<?php

namespace System\Plugins;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

include 'plugins/aws/vendor/autoload.php';

class S3
{
    public $aws;
    public function __construct()
    {
        $this->aws = new S3Client([
            'version' => 'latest',
            'region' => AWS_REGION,
            'credentials' => [
                'key' => AWS_KEY,
                'secret' => AWS_SECRET
            ]
        ]);
    }

    public function awsUpload($location,$tmp){
        try{
            $this->aws->putObject([
                'Bucket' => AWS_BUCKET_INPUT,
                'Key' => $location,
                'Body' => fopen($tmp,'rb'),
                'ACL' => 'public-read'
            ]);
            return true;
        }catch(S3Exception $e){
            return $e;
        }
    }

    public function awsDelete($location){
        try {
            $this->aws->deleteObject([
                'Bucket' => AWS_BUCKET_INPUT,
                'Key' => $location
            ]);
            return true;
        }catch(S3Exception $e){
            return false;
        }
    }
}
