<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URLService extends Model
{
    protected $table = "urlservicetb";
    protected $fillable = ["fileid", "userid", "starttime", "endtime", "downloadsize", "isdownload", "key", "url"];
}
