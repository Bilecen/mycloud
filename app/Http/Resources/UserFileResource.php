<?php

namespace App\Http\Resources;

use App\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserFileResource extends JsonResource
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
            'supfiles' => FileService::where('file', '=', $this->file)->where('sahip', '=', $this->sahip)->get(),
            'yedek' => $this->isyedek,
            'zamandilimi' => $this->yedekaralik,
            'sonyedek' => $this->sonyedek
        ];
    }
}
