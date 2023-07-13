<?php

namespace App\Services\FileUploaderService;

use Illuminate\Http\UploadedFile;

interface FileUploaderInterface{

    public function upload(array $files ,$directoryName);

    public function deleteDirectory(string $fileName);


}