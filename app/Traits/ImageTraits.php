<?php
namespace App\Traits;
use Storage;
trait ImageTraits{
    public function TraitUploadImage($file, $folderName,$IdProduct){
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('public/'.$folderName.'/'.$IdProduct,$fileName);
        $dataUploadImageMulti = [
            'file_name' => $fileName,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadImageMulti;  
    }
}