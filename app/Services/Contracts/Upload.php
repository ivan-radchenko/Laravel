<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface Upload
{
    public function upload(UploadedFile $file):string;
}
