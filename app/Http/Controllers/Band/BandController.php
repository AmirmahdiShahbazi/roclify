<?php

namespace App\Http\Controllers\Band;

use App\Exceptions\DeleteBandFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\BandStoreRequest;
use App\Http\Requests\UpdateBandRequest;
use App\Models\Band;
use App\Services\FileUploaderService\ImageUploader\BandImageUploader;
use App\Services\FileUploaderService\ImageUploader\ImageFileUploader;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    

    private $imageFileUploader;

    public function __construct(BandImageUploader $imageFileUploader)
    {
        $this->imageFileUploader=$imageFileUploader;
        
    }
    

    public function index()
    {
        $bands=Band::paginate(6);
        
        return view('dashboard.bands', compact('bands'));
    }


    public function create()
    {        

        return view('dashboard.create.band');
    }


    public function store(BandStoreRequest $request)
    {
        try{
            $validatedData=$request->validated();
        
            $thumbnail=$validatedData['band-thumbnail'];
    
            $image=$validatedData['band-image'];
    
            $uploadedFiles=$this->imageFileUploader->upload(['thumbnail'=>$thumbnail,'image'=>$image],$validatedData['band-name']);
    
            Band::create(['name'=>$validatedData['band-name'],'biography'=>$validatedData['band-bio']
            ,'user_id'=>1,'thumbnail'=>$uploadedFiles['thumbnail'],'image'=>$uploadedFiles['image']]);
            
            return back()->with('success','بند با موفقیت ساخته شد');

        }catch(Exception $e){

            return back()->with('failed',$e->getMessage());
        }



        

    }



    public function delete($id)
    {

        DB::beginTransaction();


        try{

            
        $band=Band::find($id);

        $band->delete();

        $result=$this->imageFileUploader->deleteDirectory($band->thumbnail);


        if(!$result)
        {
            throw new DeleteBandFailedException('delete band failed');
            
        }
        DB::commit();

        return back()->with('success','بند با موفقیت حذف شد');

        }catch(Exception $e){
            DB::rollBack();

            return back()->with('failed',$e->getMessage());

        }

    }


    public function edit($id)
    {


        $band=Band::find($id);

        return view('dashboard.edit.band',compact('band'));
    }


    public function update(UpdateBandRequest $request,$id)
    {
        
        try{
            DB::beginTransaction();

            $band=Band::find($id);

            $validatedData=$request->validated();
            
            $this->updateImageAndThumbnail($validatedData,$band);

            $band->update(['name'=>$validatedData['band-name'],'biography'=>$validatedData['band-bio']]);
    
            DB::commit();

            return back()->with('success','بند با موفقیت بروزرسانی شد');

        }catch(Exception $e){

            DB::rollBack();

            return back()->with('failed',$e->getMessage());

        }


    }





    private function updateImageAndThumbnail(array $validatedData,$band)
    {
        if(isset($validatedData['band-image']))
        {

            $image=$this->imageFileUploader->updateImage([$validatedData['band-name']=>$validatedData['band-image']]);
           
            $band->update(['image'=>$image[0]['image']]);
        }


        if(isset($validatedData['band-thumbnail']))
        {
           $thumbnail= $this->imageFileUploader->updateThumbnail([$validatedData['band-name']=>$validatedData['band-thumbnail']]);
       
            $band->update(['thumbnail'=>$thumbnail[0]['thumbnail']]);


        }


    }





    public function archive()
    {
        $bands=Band::paginate(6);
        
        return view('band.archive',compact('bands'));
    
    }

    public function single($id)
    {



        $band=Band::findOrFail($id);

        $bands=Band::where('id', '!=', $id)
        ->latest()
        ->take(5)
        ->get();

        $bands = (object)$bands->all();

        return view('band.single',compact('band','bands'));
    }


}



