<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'fotos';
    protected $fillable = [
        'judul_foto',
        'deskripsi',
        'lokasi_file',
        'user_id',
        'album_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class,'foto_id');
    }

    public function islike($id){
        return  Like::where('user_id', $id)->where('foto_id', $this->id)->exists();
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'foto_id');
    }
}
