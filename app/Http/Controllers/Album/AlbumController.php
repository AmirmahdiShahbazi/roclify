<?php

namespace App\Http\Controllers\Album;

use App\Exceptions\BandNotFoundException;
use App\Exceptions\DeleteAblumFailed;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumStoreRequest;
use App\Http\Requests\AlbumUpdateRequest;
use App\Models\Album;
use App\Models\Band;
use App\Services\FileUploaderService\ImageUploader\AlbumImageUploader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class AlbumController extends Controller
{
    private $imageFileUploader;

    public function __construct(AlbumImageUploader $uploader)
    {
        $this->imageFileUploader=$uploader;
        
    }

    public function index()
    {
        $albums=Album::paginate(6);

        return view('dashboard.albums',compact('albums'));
    }

    public function create()
    {   
        return view('dashboard.create.album');
    }


    public function store(AlbumStoreRequest $request)
    {   
        try{
            
            $validatedData=$request->validated();
        
            $thumbnail=$validatedData['album-thumbnail'];
    
            $image=$validatedData['album-image'];
    
            
            $band_id=$this->findBandId($validatedData['album-band']);

            $uploadedFiles=$this->imageFileUploader->upload(['thumbnail'=>$thumbnail,'image'=>$image],$validatedData['album-name']);
    
            Album::create(['name'=>$validatedData['album-name'],'biography'=>$validatedData['album-bio']
            
            ,'user_id'=>1,'thumbnail'=>$uploadedFiles['thumbnail'],'image'=>$uploadedFiles['image'],'band_id'=>$band_id,'download_link'=>$validatedData['album-link']]);
            

             
            return back()->with('success','البوم با موفقیت ساخته شد');

        }catch(Exception $e){

            return back()->with('failed',$e->getMessage());
        }
        

    }
    
    
    private function findBandId(string $bandName){

        $band= Band::where('name',$bandName)->get();
      
        if($band->isEmpty()){
            throw new BandNotFoundException('بند یافت نشد');
        }
        
        return $band->first()->id;


    }

   

    public function delete($id)
    {

        DB::beginTransaction();


        try{

            
        $album=Album::find($id);

        $album->delete();

        $result=$this->imageFileUploader->deleteDirectory($album->thumbnail);


        if(!$result)
        {
            throw new DeleteAblumFailed('delete album failed');
            
        }
        DB::commit();

        return back()->with('success','البوم با موفقیت حذف شد');

        }catch(Exception $e){
            DB::rollBack();

            return back()->with('failed',$e->getMessage());

        }

    }




    public function edit($id)
    {

        $album=Album::find($id);

        

        return view('dashboard.edit.album',compact('album'));


    }





    public function update(AlbumUpdateRequest $request,$id)
    {
        
        try{
            DB::beginTransaction();

            $album=Album::find($id);

            $validatedData=$request->validated();
            
            $this->updateImageAndThumbnail($validatedData,$album);

            $album->update(['name'=>$validatedData['album-name'],'biography'=>$validatedData['album-bio']]);
    
            DB::commit();

            return back()->with('success','آلبوم با موفقیت بروزرسانی شد');

        }catch(Exception $e){

            DB::rollBack();

            return back()->with('failed',$e->getMessage());

        }


    }


    

    private function updateImageAndThumbnail(array $validatedData,$album)
    {
        if(isset($validatedData['album-image']))
        {

            $image=$this->imageFileUploader->updateImage([$validatedData['album-name']=>$validatedData['album-image']]);
           
            $album->update(['image'=>$image[0]['image']]);
        }


        if(isset($validatedData['album-thumbnail']))
        {
           $thumbnail= $this->imageFileUploader->updateThumbnail([$validatedData['album-name']=>$validatedData['album-thumbnail']]);
       
            $album->update(['thumbnail'=>$thumbnail[0]['thumbnail']]);


        }


    }



    public function archive(){

        $albums=Album::paginate('6');

        return view('album.archive',compact('albums'));



    }


}



