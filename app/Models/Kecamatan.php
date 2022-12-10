<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'm_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $foreignKey = 'id_kabupaten';
    protected $fillable = ['nama_kecamatan','id_kabupaten'];
}
