<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Subdivision extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'address', 'description'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function workers(){
        return $this->hasMany(Worker::class);
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
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
        $this->delete();
    }

    public function setCompany($id) {
        if ($id == null) {
            return;
        }
        $this->company_id = $id;
        $this->save();
    }

    public function getCompanyTitle()
    {
        return ($this->company != null)
            ? $this->company->title
            : '-';
    }

    public function getCompanyId(){
        return $this->company!=null ? $this->company->id : null;
    }
}
