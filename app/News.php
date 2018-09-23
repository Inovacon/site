<?php

namespace App;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasImage;

    protected $guarded = [];
}
