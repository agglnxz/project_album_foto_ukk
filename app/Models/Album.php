<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'nama_album',
        'deskripsi',
        'user_id'
    ];

    public function foto()
    {
        return $this->hasMany(Foto::class,'album_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
