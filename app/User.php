<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function add($fields){
        $user = new self;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields) {
        $this->fill($fields); //name,email
        $this->save();
    }

    public function generatePassword($password) {
        if($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function remove() {
        $this->delete();
    }

    public function makeAdmin() {
        $this->is_admin = 1;
        $this->save();
    }

    public function makeNormal() {
        $this->is_admin = 0;
        $this->save();
    }

    public function toggleAdmin($value) {
        if($value == null) {
            return $this->makeNormal();
        }
        return $this->makeAdmin();
    }
}
