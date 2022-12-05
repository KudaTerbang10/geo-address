<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table = 'm_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $foreignKey = 'id_kabupaten';
    protected $fillable = ['nama_kecamatan'];
}
