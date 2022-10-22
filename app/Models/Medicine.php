<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    // deklarasi fungsi softdelete di model obat
    use HasFactory, SoftDeletes;

    // deklarasi variabel fillable digunakan untuk memberikan permission kolom yang boleh di ubah datanya
    protected $fillable = [
        'medicine_name', 'medicine_made', 'expiry_date', 'created_by'
    ];


    // membuat relasi dengan table user
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
