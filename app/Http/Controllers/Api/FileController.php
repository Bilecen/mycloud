<?php

namespace App\Http\Controllers\Api;

use App\DosyaService;
use App\FileService;
use App\Http\Controllers\Controller;
use App\Http\Resources\DosyaResource;
use App\Http\Resources\FileResource;
use App\Http\Resources\UserFileResource;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getUserFile(Request $request)
    {
        $user = $request->user();
        $file = FileService::where('file', '=', 0)->where('sahip', '=', $user->id)->first();
        return new UserFileResource($file);
    }

    public function getFiles(Request $request)
    {
        $fileid = $request->fileid;
        $files = FileService::where("sahip", "=", $fileid)->get();
        return FileResource::collection($files);
    }

    public function getFile(Request $request)
    {
        $fileid = $request->fileid;
        $file = FileService::find($fileid);
        return new FileResource($file);
    }

    public function getDosyalar(Request $request)
    {
        $fileid = $request->fileid;
        $dosyalar = DosyaService::where("file", "=", $fileid)->get();
        return DosyaResource::collection($dosyalar);
    }

    public function getDosya(Request $request)
    {

    }
}
