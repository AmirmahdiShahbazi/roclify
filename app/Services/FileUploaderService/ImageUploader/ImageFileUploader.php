<?php

namespace  App\Services\FileUploaderService\ImageUploader;

use App\Services\FileUploaderService\FileUploaderInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageFileUploader implements FileUploaderInterface
{

    protected $type;

    public function upload(array $files,$directoryName)
    {

        $urls=[];

        foreach($files as $key=>$file){

            $path=$this->basePath($directoryName).'/'.$key;

            $url=Storage::disk('public')->put($path,$file);

            $urls[$key]=$url;
            
            

        }
        return $urls;

    }

    private function basePath($directoryName)
    {
        return $this->type.'/'.$directoryName;

    }



    public function deleteDirectory(string $fileName)
    {

        $directory=explode('/',$fileName)[0].'/'.explode('/',$fileName)[1];

        $result=Storage::disk('public')->deleteDirectory($directory);

        return $result;



    }


    public function updateImage(array $images)
    {

        $urls=[];
        foreach($images as $dirName=>$image)
        {
            $path=$this->basePath($dirName).'/image';

            Storage::disk('public')->deleteDirectory($path);

            $urls[]=$this->upload(['image'=>$image],$dirName);
            

        }

        return $urls;


    }

    public function updateThumbnail(array $images)
    {
        $urls=[];
        foreach($images as $dirName=>$image)
        {
            $path=$this->basePath($dirName).'/thumbnail';

            Storage::disk('public')->deleteDirectory($path);

            $urls[]=$this->upload(['thumbnail'=>$image],$dirName);
            
            
        }
        return $urls;

    }

}