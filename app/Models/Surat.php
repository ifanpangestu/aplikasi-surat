<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{

    protected $fillable = [
        'pengirim', 'isi_surat', 'penerima', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


