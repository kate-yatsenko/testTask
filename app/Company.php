<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'city', 'description'];

    public function subdivisions(){
        return $this->hasMany(Subdivision::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields) {
        $worker = new self;
        $worker->fill($fields);
        $worker->save();

        return $worker;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

    public function remove() {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage() {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image) {
        if ($image == null) {return;}

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;

    }
}
