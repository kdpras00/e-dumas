<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanDetail extends Model
{
    protected $table = 'pengaduan_detail';
    protected $fillable = [
        'detail_masalah',
        'pengaduan_header_id',
        'users_id',
        'status_id',
        'foto'
    ];

    public function header()
    {
        return $this->belongsTo(PengaduanHeader::class, 'pengaduan_header_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
