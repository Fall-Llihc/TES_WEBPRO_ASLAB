<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class course extends Model
{
    use HasFactory;

    /**
     * Menentukan tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'courses'; // Tambahkan ini

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'Judul',
        'Sub_Judul',
        'Kategori',
        'Deadline',
        'Deskripsi',
    ];
}
