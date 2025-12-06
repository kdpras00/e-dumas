<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'user_level';
    public $timestamps = false;
    protected $fillable = ['user_level'];

    public function users()
    {
        return $this->hasMany(User::class, 'user_level_id');
    }
}
