<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';
    protected $fillable = ['rw'];

    public function rts()
    {
        return $this->hasMany(Rt::class, 'rw_id');
    }
}
