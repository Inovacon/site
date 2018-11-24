<?php

namespace App;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasImage;

    protected $guarded = [];

    public function setGalleryImagesAttribute(array $galleryImages)
    {
        if (!count($galleryImages)) {
            $this->attributes['gallery_images'] = null;
            return;
        }

        $pathList = [];

        foreach ($galleryImages as $image) {
            $pathList[] = $image->store($this->getTable(), 'public');
        }

        $this->attributes['gallery_images'] = implode(';', $pathList);
    }

    public function getGalleryImagesAttribute($pathListStr)
    {
        if (!$pathListStr) {
            return null;
        }

        $images = collect(explode(';', $pathListStr));

        return $images
            ->transform(function ($path) {
                return asset("storage/{$path}");
            });
    }
}
