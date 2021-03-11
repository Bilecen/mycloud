<?php

namespace App\Http\Resources;

use App\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->filename,
            'basefile' => $this->file == 0 ? null : new FileResource(FileService::where("file", "=", $this->file)->first),
            'isyedek' => $this->isyedek,
            'sonyedek' => $this->sonyedek,
            'olusturmatarih' => $this->createdAt,
            'guncellemetarih' => $this->updateAt
        ];
    }
}
