<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class S3
{
    public function getAllObject()
    {
        $arrayOfObjectName = Storage::disk('s3')->files('');
        return $arrayOfObjectName;
    }

    public function getObject($objectName) 
    {
        $binaryObject = Storage::disk('s3')->get($objectName);
        return $binaryObject;
    }

}