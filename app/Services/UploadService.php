<?php

namespace App\Services;

use App\Services\Contracts\Upload;
use Exception;
use Illuminate\Http\UploadedFile;


class UploadService implements Upload
{

    /**
     * @throws Exception
     */
    public function upload(UploadedFile $file): string
    {
        $path = $file->storeAs('news',$file->hashName(),'public');
        if ($path===false){
            throw new Exception('exception upload');
        }
        return $path;
    }
}
