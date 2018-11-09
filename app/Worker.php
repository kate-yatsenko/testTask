<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Worker extends Model
{
    use Sluggable;

    protected $fillable = ['firstName', 'middleName', 'lastName', 'phone', 'address'];

    public function subdivision() {
        return $this->belongsTo(Subdivision::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'firstName'
            ]
        ];
    }

    public static function add($fields) {
        $subdivision = new self;
        $subdivision->fill($fields);
        $subdivision->save();

        return $subdivision;
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
            return '/uploads/no-image.png';
        }
        return '/uploads/' . $this->image;

    }

    public function setSub($id) {
        if ($id == null) {
            return;
        }
        $this->subdivision_id = $id;
        $this->save();
    }

    public function getSubTitle()
    {
        return ($this->subdivision != null)
            ? $this->subdivision->title
            : '-';
    }

    public function getSubId(){
        return $this->subdivision!=null ? $this->subdivision->id : null;
    }

}
