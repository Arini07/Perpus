<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Sudah benar
    protected $primaryKey = 'id'; // Sesuai dengan tabel
    public $incrementing = true; // Default untuk primary key auto-increment
    protected $keyType = 'int'; // Default tipe data primary key

    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Kolom foreign key 'user_id' mengacu ke 'id' di tabel users
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id'); // Kolom foreign key 'buku_id' mengacu ke 'id' di tabel bukus
    }
}
