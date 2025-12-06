<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';
    protected $fillable = ['rt', 'rw_id'];

    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'rt_id');
    }
}
