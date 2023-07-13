<?php

namespace App\Http\Controllers\Album;

use App\Exceptions\BandNotFoundException;
use App\Exceptions\DeleteAblumFailed;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumStoreRequest;
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
            
            ,'user_id'=>1,'thumbnail'=>$uploadedFiles['thumbnail'],'image'=>$uploadedFiles['image'],'band_id'=>$band_id,'download-link'=>$validatedData['album-link']]);
            

             
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



}



