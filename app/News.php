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
        if (count($galleryImages) === 0) {
            $this->attributes['gallery_images'] = null;
            return;
        }

        $pathList = [];

        foreach ($galleryImages as $image) {
            $pathList[] = is_string($image)
                ? $image
                : $image->store($this->getTable(), 'public');
        }

        $this->attributes['gallery_images'] = implode(';', $pathList);
    }

    public function getGalleryImagesAttribute($pathListStr)
    {
        if (!$pathListStr) {
            return [];
        }

        $images = collect(explode(';', $pathListStr));

        return $images
            ->transform(function ($path) {
                return asset("storage/{$path}");
            })
            ->all();
    }

    public function getGalleryImagesPathListAttribute()
    {
        if (!$this->attributes['gallery_images']) {
            return [];
        }

        return explode(';', $this->attributes['gallery_images']);
    }

    public function getGalleryImagesPathMapAttribute()
    {
        if (!$this->attributes['gallery_images']) {
            return [];
        }

        $map = [];
        $images = explode(';', $this->attributes['gallery_images']);

        foreach ($images as $image) {
            $map[$image] = asset("storage/{$image}");
        }

        return $map;
    }
}
