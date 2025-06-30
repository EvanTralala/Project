<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'kategori_id'
    ];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}