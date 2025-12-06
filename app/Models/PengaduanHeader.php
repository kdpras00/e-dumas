<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanHeader extends Model
{
    protected $table = 'pengaduan_header';
    protected $fillable = ['subject', 'kategori_id', 'no_pengaduan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function details()
    {
        return $this->hasMany(PengaduanDetail::class, 'pengaduan_header_id');
    }

    public function latestDetail()
    {
        return $this->hasOne(PengaduanDetail::class, 'pengaduan_header_id')->latestOfMany();
    }
}
