<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['kategori'];

    public function pengaduanHeaders()
    {
        return $this->hasMany(PengaduanHeader::class, 'kategori_id');
    }

    public function petugas()
    {
        return $this->hasMany(User::class, 'kategori_id');
    }
}
