<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

Trait GeneralFileService{

    public function SaveFile($file,$path){
        $file_extention = $file->getClientOriginalName();
        $file_name = date('Y-m-d').time().'.'.$file_extention;
        Storage::disk('public')->put($path.'/'.$file_name,file_get_contents($file));
        return $file_name;
    }

    public function SavePDFFile($file,$path){
        $file_name = date('Y-m-d').time().'.pdf';
        Storage::disk('public')->put($path.$file_name,$file);
        return $file_name;
    }

    public function removeFile($pathImage){
        if(file_exists($pathImage))
            unlink($pathImage);
    }

}
