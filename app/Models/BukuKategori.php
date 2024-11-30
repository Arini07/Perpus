<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKategori extends Model
{
    use HasFactory;
    //protected $fillable = ['nama_kategori'];
    protected $guarded = ['id'];

    public function buku(){
        return $this->hasMany(Buku::class, 'buku_kategori_id');

    }

}
