<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function displayImages($dir1,$dir2,$filename)
    {
        $filename=$dir1.'/'.$dir2.'/'. $filename;
        return response()->file(storage_path('app').'/'.$filename);
    }
    
    public function displayFiles($dir1,$filename)
    {
        $filename=$dir1.'/'. $filename;
        return response()->file(storage_path('app').'/'.$filename);
    }

    public function downloadFiles($dir1,$filename)
    {
        $filename=$dir1.'/'. $filename;
        return response()->download(storage_path('app').'/'.$filename);
    }
}
