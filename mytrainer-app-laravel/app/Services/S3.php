<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Exception;

class S3
{
    public function getAllObject()
    {
        try{
            $arrayOfObjectName = Storage::disk('s3')->files('');
        }catch(Exception $e){
            //FIXME 403 Forbiddenを表示した画面に飛ばすべきかもしれない
            $arrayOfObjectName = null;
        }
        return $arrayOfObjectName;
    }

    public function getObject($objectName) 
    {
        try{
            $binaryObject = Storage::disk('s3')->get($objectName);
        }catch(Exception $e){
            //FIXME 403 Forbiddenを表示した画面に飛ばすべきかもしれない
            $binaryObject = null;
        }
        return $binaryObject;
    }

}